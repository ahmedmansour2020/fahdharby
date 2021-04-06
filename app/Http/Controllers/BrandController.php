<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="العلامات التجارية";
        if (request()->ajax()) {
            $brands = Brand::select('id', 'name_' . LangController::lang() . ' as name' ,'url', 'image')->orderBy('id','desc')->get();
            $index = 1;
            foreach ($brands as $brand) {
                $brand->index = $index++;
                if ($brand->image != null) {
                    $brand->image = asset('uploaded/' . $brand->image);
                }
            }
            return datatables()->of($brands)->addIndexColumn()->make(true);
        }
        return view('admin.show.brands', compact('title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="إضافة علامة تجارية";
        $action = 'add';
        return view('admin.add.brand', compact('action','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name_ar = request('name_ar');
        $brand->name_en = request('name_en');
        $brand->url = request('url');
        if (request('image')) {
            $file_extension = request('image')->getClientOriginalExtension();
            $file_name = "brands-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->image->move($path, $file_name);
            $brand->image = $file_name;
        }
        $brand->save();
        return redirect()->route('brand.index')->with('success', __('items.success_add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title="تعديل العلامة التجارية";
        $action = 'update';
        $saved = Brand::find($id);
        $saved->image = $saved->image != null ? asset('uploaded/' . $saved->image) : asset('resources/assets/img/upload-img.png');
        return view('admin.add.brand', compact('action', 'saved','title'));
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
        $brand = Brand::find($id);
        $brand->name_ar = request('name_ar');
        $brand->name_en = request('name_en');
        $brand->url = request('url');
        if (request('image')) {
            $file_extension = request('image')->getClientOriginalExtension();
            $file_name = "brands-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->image->move($path, $file_name);
            $brand->image = $file_name;
        }
        $brand->save();
        return redirect()->route('brand.index')->with('success', __('items.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products= Product::where('brand_id',$id)->get();
        foreach($products as $item){
            $product=Product::find($item->id);
            $product->brand_id=null;
            $product->save();
        }
        Brand::find($id)->delete();
        return redirect()->back()->with('success', __('items.success_delete'));
    }
    public function delete_image(Request $request)
    {
        $brand_id = request('id');
        DB::update('update brands set image = null where id = ?', [$brand_id]);
        return response()->json([
            'success' => true,
        ]);

    }
}
