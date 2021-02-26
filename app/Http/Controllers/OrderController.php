<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Promocode;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\PromocodesRange;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PromocodeController;

class OrderController extends Controller
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
        $user = Auth::user();
        $order = new Order();
        if ($user) {
            $order->user_id = $user->id;
            if($user->mobile==null){
                $user->mobile=request('mobile');
            }
            if($user->country==null){
                $user->country=request('country');
            }
            if($user->address==null){
                $user->address=request('address');
            }
            $user->save();
        }
            $order->name = request('name');
            $order->email = request('email');
            $order->mobile = request('mobile');
            $order->country = request('country');
            $order->address = request('address');
            $order->notes = request('notes');
        
        $order->save();
        $total = 0;
        $qty=1;
        if (request('items')) {
            $items = request('items');
            foreach ($items as $item) {
                $new_item = new OrderItem();
                $new_item->order_id = $order->id;
                $new_item->product_id = $item;
                $new_item->qty = request('qty_' . $item);
                $new_item->total = request('total_' . $item);
                $new_item->save();
                $total += $new_item->total;
                $qty= request('qty_' . $item);
            }
            foreach ($items as $item) {
                
                if($user){
                    $cart = Cart::where('user_id', $user->id)->where('product_id', $item)->first();
                    $cart->status = 2;
                    $cart->save();
                    $qty=$cart->qty;
                }
                $product=ProductDetail::where('product_id',$item)->first();
                $product->qty-=$qty;
                $product->save();
            }
        }
       
        $order->total = $total;
        $discount = 0;
        if ($user) {
            $promocodes = Promocode::where('user_id', $user->id)->where(DB::raw('value-spent'), '>', 0)->get();
            foreach ($promocodes as $promocode) {
                $promocode_exist = Promocode::find($promocode->id);
                $remain = $promocode_exist->value - $promocode_exist->spent;
                if ($total <= $remain) {
                    $promocode_exist->spent += $total;
                    $discount += $total;
                    $total = 0;
                    $promocode_exist->save();
                    break;

                } else {
                    $total -= $remain;
                    $promocode_exist->spent += $remain;
                    $discount += $remain;
                    $promocode_exist->save();
                }
            }
        }
        $order->discount = $discount;
        $order->save();
        $order->final = $order->total - $discount;
        $order->save();
        if ($user) {
            $price_rang=PromocodesRange::where('from','<=',DB::raw('"'.$order->total.'"'))->where('to','>=',DB::raw('"'.$order->total.'"'))->first();

            if($price_rang){
                $promocode = PromocodeController::pcGenerator(PromocodeController::generateRandomString());
                $pcode = new Promocode();
                $pcode->promocode = $promocode;
                $pcode->value = $price_rang->value;
                $pcode->save();
            }
        }
        return redirect()->route('home')->with('success',__('front.success_order'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
