<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
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
        if (request()->ajax()) {
            $products = Product::
            leftJoin('categories as m','m.id','main_category')
            ->leftJoin('categories as s','s.id','sub_category')
            ->leftJoin('brands','brands.id','brand_id')
            ->select('price','qty','m.name_' . LangController::lang() . ') as main_category_name','s.name_' . LangController::lang() . ') as sub_category_name','products.id', 'status', 'products.name_' . LangController::lang() . ' as name', 'products.description_' . LangController::lang() . ' as description','brands.name_' . LangController::lang() .' as brand')
            ->get()
            ;

            $index = 1;
            foreach ($products as $product) {
                $product->index = $index++;

                $image = ProductImage::where('product_id', $product->id)->first();
                if ($image) {
                    $product->image = asset('uploaded/' .$image->name);
                } else {
                    $product->image = null;
                }
            }
            return datatables()->of($products)->addIndexColumn()->make(true);
        }

        return view('vendor.show.products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action='add';
        $main_categories=Category::whereNull('parent_id')->select('id','name_' . LangController::lang() . ' as name')->get();
        $sub_categories=Category::whereNull('parent_id')->select('id','name_' . LangController::lang() . ' as name','parent_id')->get();
        $brands=Brand::select('id','name_' . LangController::lang() . ' as name')->get();
        return view('vendor.add.product',compact('action','main_categories','sub_categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product();
        $product->name_ar=request('name_ar');
        $product->name_en=request('name_en');
        $product->description_ar=request('description_ar');
        $product->description_en=request('description_en');
        $product->price=request('price');
        $product->qty=request('qty');
        $product->main_category=request('main_category');
        $product->sub_category=request('sub_category');
        $product->brand_id=request('brand_id');
        $product->save();
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $item) {
                $path = 'uploaded/';
                $image = new ProductImage();
                $name = "product-" . time() . $item->getClientOriginalName();
                $item->move($path, $name);
                $image->name = $name;
                $image->product_id = $product->id;
                $image->save();
            }
        }
        return redirect()->route('product.index')->with('success',__('items.success_add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action='update';
        $saved=Product::find($id);
        $images=ProductImage::where('product_id',$id)->get();
        $main_categories=Category::whereNull('parent_id')->select('id','name_' . LangController::lang() . ' as name')->get();
        $sub_categories=Category::whereNull('parent_id')->select('id','name_' . LangController::lang() . ' as name','parent_id')->get();
        $brands=Brand::select('id','name_' . LangController::lang() . ' as name')->get();
        return view('vendor.add.product',compact('action','main_categories','sub_categories','saved','images','brands'));
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
        $product=Product::find($id);
        $product->name_ar=request('name_ar');
        $product->name_en=request('name_en');
        $product->description_ar=request('description_ar');
        $product->description_en=request('description_en');
        $product->price=request('price');
        $product->qty=request('qty');
        $product->main_category=request('main_category');
        $product->sub_category=request('sub_category');
        $product->brand_id=request('brand_id');
        $product->save();

        $images = ProductImage::where('product_id', $product->id)->get();
        $preloaded = request('preloaded');
        foreach ($images as $image) {
            if (!in_array($image->id, $preloaded)) {
                ProductImage::where('id', $image->id)->delete();
            }
        }
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $item) {
                $path = 'uploaded/';
                $image = new ProductImage();
                $name = "product-" . time() . $item->getClientOriginalName();
                $item->move($path, $name);
                $image->name = $name;
                $image->product_id = $product->id;
                $image->save();
            }
        }
        return redirect()->route('product.index')->with('success',__('items.success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('success', __('items.success_delete'));
    }

    public function change_status($id){
        $product=Product::find($id);
        if($product->status==0){
            $product->status=1;
        }else{
            $product->status=0;
        }
        return redirect()->back()->with('success', __('items.success_update'));
    }
}
