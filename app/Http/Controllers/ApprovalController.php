<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LangController;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "مركز الموافقة";
        $status= request('status');
        if (request()->ajax()) {
            $items;
            switch ($id) {
                case 'products':
                    $items = Product::
                        leftJoin('categories', 'categories.id', 'sub_category')
                        ->select('duration', DB::raw('date(products.updated_at) as update_date'), 'price', 'qty', 'products.id', 'status', 'products.name_' . LangController::lang() . ' as name', 'products.description_' . LangController::lang() . ' as description')
                        ->orderBy('products.id', 'desc');
                        
                        if($status!=""){
                            $items->where('products.status',$status);
                        }
                        
                        $items=$items->get();

                    foreach ($items as $product) {
                        $image = ProductImage::where('product_id', $product->id)->where('main', 1)->first();
                        if ($image) {
                            $product->image = asset('uploaded/' . $image->name);
                        } else {
                            $product->image = null;
                        }
                    }
                    break;
            }
            return datatables()->of($items)->addIndexColumn()->make(true);
        }
        return view('admin.approval.products', compact('title'));
    }
    public function change_product_status(Request $request)
    {
        $id = request('id');
        $status = request('status');

        $product = Product::find($id);
        $product->status = $status;
        $product->save();
        $message = "";
        switch ($status) {
            case 1:
                $message = "تمت الموافقة على هذا المنتج";
                break;
            case 2:
                $message = "تم إيقاف هذا المنتج مؤقتا";
                break;
            case 3:
                $message = "تم رفض هذا المنتج";
                break;
        }
        return response()->json([
            'success' => true,
            'message'=>$message
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
