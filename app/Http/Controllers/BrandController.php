<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $brands = Brand::select('id', 'name_' . LangController::lang() . ' as name' . 'image')->get();
            $index = 1;
            foreach ($brands as $brand) {
                $brand->index = $index++;
                if ($brand->image != null) {
                    $brand->image = asset('uploaded/' . $brand->image);
                }
            }
            return datatables()->of($brands)->addIndexColumn()->make(true);
        }
        return view('admin.show.brands');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'add';
        return view('admin.add.brand', compact('action'));
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

        if (request('image')) {
            $file_extension = request('image')->getClientOriginalExtension();
            $file_name = "categories-" . time() . '.' . $file_extension;
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
        $action = 'update';
        $saved = Brand::find($id);
        return view('admin.add.brand', compact('action', 'saved'));
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
        $brand = Brand::find();
        $brand->name_ar = request('name_ar');
        $brand->name_en = request('name_en');

        if (request('image')) {
            $file_extension = request('image')->getClientOriginalExtension();
            $file_name = "categories-" . time() . '.' . $file_extension;
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
        Brand::find($id)->delete();
        return redirect()->back()->with('success', __('items.success_delete'));
    }
    public function delete_image(Request $request)
    {
        $brand_id = request('brand_id');
        DB::update('update brands set image = null where id = ?', [$brand_id]);
        return response()->json([
            'success' => true,
        ]);

    }
}
