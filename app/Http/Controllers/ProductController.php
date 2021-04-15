<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LangController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $user = Auth::user();
        $tab = request('tab');
        $title = "المنتجات";
        $search = request('search');
        if (request()->ajax()) {
         

                $products = Product::
                leftJoin('categories', 'categories.id', 'sub_category')
                ->where('user_id', $user->id)
                ->select('duration', DB::raw('date(products.updated_at) as update_date'), 'price', 'qty', 'products.id', 'status', 'products.name_' . LangController::lang() . ' as name', 'products.description_' . LangController::lang() . ' as description')
                ->orderBy('products.id', 'desc');
                
                switch ($tab) {
                    case 1:
                    $products->where('status', 1);
                    break;
                    case 2:
                        $products->where('status', 0);
                    break;
                    case 3:
                        $products->where('status', 1)->where('qty', 0);
                        break;
                case 4:
                    $products->where('status', 2);
                    break;
                    case 5:
                        $products->where('status', 3);
                    break;
                    
            }
        
            
            if ($search) {
                $products->where(function ($query) use ($search) {
                    $query->where('products.name_' . LangController::lang(), 'like', '%' . $search . '%')
                        ->orWhere('categories.name_' . LangController::lang(), 'like', '%' . $search . '%');
                });
            }

            $products = $products->get();

            $index = 1;
            foreach ($products as $product) {
                $product->index = $index++;

                $image = ProductImage::where('product_id', $product->id)->where('main', 1)->first();
                if ($image) {
                    $product->image = asset('uploaded/' . $image->name);
                } else {
                    $product->image = null;
                }
            }
            return datatables()->of($products)->addIndexColumn()->make(true);
        }

        return view('vendor.show.management', compact('title'));
    }
    public function inventory()
    {
        $title = "تعديل المخزون";
        if (request()->ajax()) {
            $user = Auth::user();
            $products = Product::where('user_id', $user->id)->select('id', 'qty', 'name_' . LangController::lang() . ' as name')->orderBy(DB::raw('cast(qty as integer)'), 'asc')->get();
            $index = 1;
            foreach ($products as $product) {
                $product->index = $index++;

                $image = ProductImage::where('product_id', $product->id)->where('main', 1)->first();
                if ($image) {
                    $product->image = asset('uploaded/' . $image->name);
                } else {
                    $product->image = null;
                }
            }
            return datatables()->of($products)->addIndexColumn()->make(true);
        }
        return view('vendor.show.inventory', compact('title'));
    }
    public function edit_qty($id, $qty)
    {
        $user = Auth::user();
        if ($user->role_id == 1) {
            $items = Product::find($id);
            $items->qty = $items->qty + $qty;
            $items->save();
        } else {
            $product = Product::where('id', $id)->where('user_id', $user->id)->first();
            if ($product) {
                $product->qty = $product->qty + $qty;
                $product->save();
            }else{
                return redirect()->back();
            }
        }
        return redirect()->back()->with('success', __('items.success_update'));
    }
    public function make_zero($id)
    {
        $user = Auth::user();
        if ($user->role_id == 1) {
            $items = Product::find($id);
            $items->qty = 0;
            $items->save();
        } else {
            $product = Product::where('id', $id)->where('user_id', $user->id)->first();
            if ($product) {
                $product->qty = 0;
                $product->save();
            }else{
                return redirect()->back();
            }
        }
        return redirect()->back()->with('success', __('items.success_update'));
    }
    public function to_products_offers(){
        $title="قائمة المنتجات";
        $user=Auth::user();
        if(request()->ajax()){
            $products=Product::whereStatus(1)->where('user_id',$user->id)->select('products.*','name_'.LangController::lang().' as name')->orderBy('id','desc')->get();
            foreach ($products as $product) {
                $image = ProductImage::where('product_id', $product->id)->where('main', 1)->first();
                if ($image) {
                    $product->image = asset('uploaded/' . $image->name);
                } else {
                    $product->image = null;
                }
            }
            return datatables()->of($products)->addIndexColumn()->make(true);
        }
        return view('vendor.show.products_offers',compact('title'));
    }
    public function to_product_offers($id){
        $status=request('status');
        $product=Product::find($id);
        $title="عروض المنتج ".$product->name_ar;
        if(request()->ajax()){
            $offers=ProductOffer::where('product_id',$id)->orderBy('id','desc');
            if($status!=""){
                $offers->where('status',$status);
            }
            $offers=$offers->get();
            foreach($offers as $offer){
                $offer->main_price=$product->price;
                $offer->after_price=(int)($product->price-($product->price*$offer->offer/100));
            }
            return datatables()->of($offers)->addIndexColumn()->make(true);
        }
        return view('vendor.show.product_offers',compact('title','id'));
    }
    public function add_offer(Request $request){
        $id=request('id');
        $start=request('start');
        $end=request('end');
        $offer=request('offer');
        $new_offer=new ProductOffer();
        $new_offer->product_id=$id;
        $new_offer->start=$start;
        $new_offer->end=$end;
        $new_offer->offer=$offer;
        $new_offer->save();

        return response()->json([
            'success'=>true,
        ]);
    }
    public function delete_offer($id){
        $offer=ProductOffer::find($id);
        $product=Product::find($offer->product_id);
        $user=Auth::user();
        if($user->role_id==1){
            ProductOffer::find($id)->delete();
        }else{

            if($product->user_id==$user->id){
                ProductOffer::find($id)->delete();
            }
        }

        return redirect()->back();
    }
    public static function arrange_offers_status(){
        $date=date('Y-m-d');
        $offers=ProductOffer::get();
        foreach($offers as $offer){
            $changed_offer=ProductOffer::find($offer->id);
            if($date>=$changed_offer->start&&$date<=$changed_offer->end){
                $changed_offer->status=1; 
            }elseif($date<$changed_offer->start){
                $changed_offer->status=0; 
            }elseif($date>$changed_offer->end){
                $changed_offer->status=2;
            }
            $changed_offer->save();
        }
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $from="supplier";
        $duration=Setting::where('key','duration_number')->first();
        if(!$duration){
            $duration_number=30;
        }else{
            $duration_number=$duration->value;
        }
        $title = "إضافة منتج جديد";
        $action = 'add';
        $main_categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name')->get();
        $sub_categories = Category::whereNotNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'parent_id')->get();
        $brands = Brand::select('id', 'name_' . LangController::lang() . ' as name')->get();
        return view('vendor.add.product', compact('action', 'main_categories', 'sub_categories', 'brands', 'title','duration_number','from'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $product = new Product();
        $product->user_id = $user->id;
        $product->name_ar = request('name_ar');
        $product->name_en = request('name_en');
        $product->duration = request('duration').' '.request('time');
        $product->description_ar = request('description_ar');
        $product->description_en = request('description_en');
        $product->price = request('price');
        $product->qty = request('qty');
        $product->main_category = request('main_category');
        $product->sub_category = request('sub_category');
        $product->brand_id = request('brand_id');
        $product->save();

        $index = 0;
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $item) {
                $path = 'uploaded/';
                $image = new ProductImage();
                $name = "product-" . time() . $item->getClientOriginalName();
                $item->move($path, $name);
                $image->name = $name;
                $image->product_id = $product->id;
                if ($index == 0) {
                    $image->main = 1;
                }
                $image->save();
                $index++;
            }
        }
        return redirect()->route('product.stored')->with('success', __('items.success_add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $duration=Setting::where('key','duration_number')->first();
        if(!$duration){
            $duration_number=30;
        }else{
            $duration_number=$duration->value;
        }
        $user=Auth::user();
        $title = "تعديل منتج";
        $action = 'update';
        $from="supplier";
        if($user->role_id==1){
            $from="admin";
            $saved = Product::find($id);
        }else{
            $saved = Product::where('user_id',$user->id)->where('id',$id)->firstOrFail();
        }

        $images = ProductImage::where('product_id', $id)->get();
        $main_categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name')->get();
        $sub_categories = Category::whereNotNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'parent_id')->get();
        $brands = Brand::select('id', 'name_' . LangController::lang() . ' as name')->get();
        return view('vendor.add.product', compact('action', 'main_categories', 'sub_categories', 'saved', 'images', 'brands', 'title','from','duration_number'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name_ar = request('name_ar');
        $product->name_en = request('name_en');
        $product->duration = request('duration').' '.request('time');
        $product->description_ar = request('description_ar');
        $product->description_en = request('description_en');
        $product->price = request('price');
        $product->qty = request('qty');
        $product->main_category = request('main_category');
        $product->sub_category = request('sub_category');
        $product->brand_id = request('brand_id');
        $product->save();

        $images = ProductImage::where('product_id', $product->id)->get();
        $preloaded = request('preloaded');
        foreach ($images as $image) {
            if (!in_array($image->id, $preloaded)) {
                ProductImage::where('id', $image->id)->delete();
            }
        }
        $first = ProductImage::where('main', 1)->where('product_id', $product->id)->first();
        if ($first) {
            $index = 1;
        } else {
            $index = 0;
        }

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $item) {
                $path = 'uploaded/';
                $image = new ProductImage();
                $name = "product-" . time() . $item->getClientOriginalName();
                $item->move($path, $name);
                $image->name = $name;
                $image->product_id = $product->id;
                if ($index == 0) {
                    $image->main = 1;
                }
                $image->save();
                $index++;
            }
        }
        $first_1 = ProductImage::where('main', 1)->where('product_id', $product->id)->first();
        if (!$first_1) {
            $first_2 = ProductImage::where('product_id', $product->id)->first();
            if ($first_2) {
                $first_2->main = 1;
                $first_2->save();
            }
        }
        return redirect()->route('product.stored')->with('success', __('items.success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $action = false;
        if ($user->role_id == 1) {
            $action = true;
            $product = Product::find($id);
        } else {
            $product = Product::where('user_id', $user->id)->where('id', $id)->first();
            if ($product) {
                $action = true;
            }
        }

        if ($action) {
            ProductImage::where('product_id', $product->id)->delete();
            Product::find($id)->delete();
            return redirect()->back()->with('success', __('items.success_delete'));
        } else {
            return redirect()->back();
        }
    }

    public function change_status($id)
    {
        $product = Product::find($id);
        if ($product->status == 0) {
            $product->status = 1;
        } else {
            $product->status = 0;
        }
        return redirect()->back()->with('success', __('items.success_update'));
    }
    public function to_main_image($id)
    {
        $title="اختيار الصورة الرئيسية";
        $product=Product::where('id',$id)->select('id','name_' . LangController::lang() . ' as name')->first();
        $images=ProductImage::where('product_id',$id)->get();
        return view('vendor.add.product_images',compact('product','images','title'));
    }
    public function set_main_image(Request $request){
        $id=request('main');
        $product_id=request('product');
        $images=ProductImage::where('product_id',$product_id)->get();
        foreach($images as $image){
            $item=ProductImage::find($image->id);
            $item->main=0;
            $item->save();
        }
        $main_image=$images = ProductImage::find($id);
        $main_image->main=1;
        $main_image->save();

        return redirect()->route('product.index')->with('success', __('items.success_update'));
    }
}
