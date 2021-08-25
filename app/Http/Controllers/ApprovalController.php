<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use App\Models\VendorPromocode;
use Illuminate\Support\Facades\DB;
use App\Models\VendorPromocodeUser;
use App\Http\Controllers\LangController;

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
                        ->select('duration', DB::raw('date(products.updated_at) as update_date'), 'price', 'qty', 'products.id', 'products.status as pr_status', 'products.name_' . LangController::lang() . ' as name', 'products.description_' . LangController::lang() . ' as description')
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
                case 'offers':
                    $items = ProductOffer::orderBy('id','desc')->get();

                    foreach ($items as $item) {
                        $product=Product::find($item->product_id);
                        $image = ProductImage::where('product_id', $product->id)->where('main', 1)->first();
                        if ($image) {
                            $item->image = asset('uploaded/' . $image->name);
                        } else {
                            $item->image = null;
                        }
                        $item->main_price=$product->price;
                        $item->after_price=(int)($product->price-($product->price*$item->offer/100));
                        $item->name=$product->name_ar;
                    }
                    break;
                case 'coupones':
                    $items = VendorPromocode::leftJoin('users','users.id','user_id')->select('vendor_promocodes.*','users.name as user')->orderBy('vendor_promocodes.id', 'desc');
                    
                    if($status!=""){
                        $items->where('vendor_promocodes.status',$status);
                    }
                    
                    $items=$items->get();
                    foreach ($items as $promocode) {
                        $count = count(VendorPromocodeUser::where('promocode_id', $promocode->id)->get());
                        $promocode->count = $count;
                        $date = date('Y-m-d');
                        if ($date >= $promocode->start && $date <= $promocode->end) {
                            $promocode->status_type = 1;
                        } elseif ($date < $promocode->start) {
                            $promocode->status_type = 0;
                        } elseif ($date > $promocode->start) {
                            $promocode->status_type = 2;
                        }
                    }
                    break;
            }
            return datatables()->of($items)->addIndexColumn()->make(true);
        }
        return view('admin.approval.'.$id, compact('title'));
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
    public function change_offer_status(Request $request)
    {
        $id = request('id');
        $status = request('status');

        $product = ProductOffer::find($id);
        $product->approved = $status;
        $product->save();
        $message = "";
        switch ($status) {
            case 1:
                $message = "تمت الموافقة على هذا العرض";
                break;
            case 0:
                $message = "تم إيقاف هذا العرض";
                break;
        }
        return response()->json([
            'success' => true,
            'message'=>$message
        ]);
    }
    public function change_coupones_status(Request $request)
    {
        $id = request('id');
        $status = request('status');

        $promo = VendorPromocode::find($id);
        $promo->status = $status;
        $promo->save();
        $message = "";
        switch ($status) {
            case 1:
                $message = "تمت الموافقة على هذا الكوبون";
                break;
            case 0:
                $message = "تم إيقاف هذا الكوبون";
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
