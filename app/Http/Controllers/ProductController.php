<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LangController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                case 6:
                    $products->where('status', 4);
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "إضافة منتج جديد";
        $action = 'add';
        $main_categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name')->get();
        $sub_categories = Category::whereNotNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'parent_id')->get();
        $brands = Brand::select('id', 'name_' . LangController::lang() . ' as name')->get();
        return view('vendor.add.product', compact('action', 'main_categories', 'sub_categories', 'brands', 'title'));
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
        $product->duration = request('duration');
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
        $title = "تعديل منتج";
        $action = 'update';
        $saved = Product::find($id);
        $images = ProductImage::where('product_id', $id)->get();
        $main_categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name')->get();
        $sub_categories = Category::whereNotNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'parent_id')->get();
        $brands = Brand::select('id', 'name_' . LangController::lang() . ' as name')->get();
        return view('vendor.add.product', compact('action', 'main_categories', 'sub_categories', 'saved', 'images', 'brands', 'title'));
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
        $product->duration = request('duration');
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
}
