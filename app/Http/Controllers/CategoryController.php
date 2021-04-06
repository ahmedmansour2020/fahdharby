<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LangController;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="الفئات";
        if (request()->ajax()) {
            $categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'image')->get();
            $index = 1;
            foreach ($categories as $category) {
                $category->index = $index++;
                if ($category->image != null) {
                    $category->image = asset('uploaded/' . $category->image);
                }
                $count = count(Category::where('parent_id', $category->id)->get());
                $category->count = $count;
            }
            return datatables()->of($categories)->addIndexColumn()->make(true);
        }
        return view('admin.show.categories',compact('title'));
    }
    public function index_sub($id)
    {
        $title="الفئات الفرعية";
        if (request()->ajax()) {
            $categories = Category::where('parent_id', $id)->select('id', 'name_' . LangController::lang() . ' as name', 'image')->get();
            $index = 1;
            foreach ($categories as $category) {
                $category->index = $index++;
                if ($category->image != null) {
                    $category->image = asset('uploaded/' . $category->image);
                }
            }
            return datatables()->of($categories)->addIndexColumn()->make(true);
        }
        return view('admin.show.categories', compact('id','title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="إضافة فئة";
        $action = 'add';
        $categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name')->get();
        return view('admin.add.category', compact('action', 'categories','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name_ar = request('name_ar');
        $category->name_en = request('name_en');
        $category->description_ar = request('description_ar');
        $category->description_en = request('description_en');
        $category->parent_id = request('parent_id');
        if (request('image')) {
            $file_extension = request('image')->getClientOriginalExtension();
            $file_name = "categories-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->image->move($path, $file_name);
            $category->image = $file_name;
        }
        $category->save();

        if (request('parent_id') == null) {
            return redirect()->route('category.index')->with('success', __('items.success_add'));
        } else {
            return redirect()->route('category.index_sub', request('parent_id'))->with('success', __('items.success_add'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title="تعديل فئة";
        $action = 'update';
        $saved = Category::find($id);
        $saved->image = $saved->image != null ? asset('uploaded/' . $saved->image) : asset('resources/assets/img/upload-img.png');
        $level = 1;
        if ($saved->parent_id == null) {
            $level = 2;
        }
        $categories = Category::whereNull('parent_id')->where('id', '<>', $id)->select('id', 'name_' . LangController::lang() . ' as name')->get();
        return view('admin.add.category', compact('action', 'categories', 'saved', 'level','title'));
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
        $category = Category::find($id);
        $category->name_ar = request('name_ar');
        $category->name_en = request('name_en');
        $category->description_ar = request('description_ar');
        $category->description_en = request('description_en');
        $category->parent_id = request('parent_id');
        if (request('image')) {
            $file_extension = request('image')->getClientOriginalExtension();
            $file_name = "categories-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->image->move($path, $file_name);
            $category->image = $file_name;
        }
        $category->save();

        if (request('parent_id') == null) {
            return redirect()->route('category.index')->with('success', __('items.success_update'));
        } else {
            return redirect()->route('category.index_sub', request('parent_id'))->with('success', __('items.success_update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::where('sub_category', $id)->get();
        $sub_products = Product::where('main_category', $id)->get();

        if (count($sub_products)+ count($products) != 0) {
            return redirect()->back()->with('alert', __('يوجد منتجات مربوطة بهذه الفئة'));
        } else {
            Category::find($id)->delete();
            return redirect()->back()->with('success', __('items.success_delete'));
        }
    }
    public function delete_image(Request $request)
    {
        $category_id = request('id');

        DB::update('update categories set image = null where id = ?', [$category_id]);
        return response()->json([
            'success' => true,

        ]);
    }

}
