<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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

        $exist = Cart::where('user_id', $user->id)->where('product_id', request('product_id'))->where('status','<',2)->first();

        if (!$exist) {

            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = request('product_id');
            if (request('qty') != null) {
                $cart->qty = request('qty');
            }
            $cart->save();
        }
        $count = count(Cart::where('user_id', $user->id)->where('status','<' ,2)->get());
        $total_price = 0;
    
           $cart_items=Cart::leftJoin('products','products.id','product_id')->where('user_id', $user->id)->where('carts.status','<' ,2)->select('main_price','carts.qty','product_id')->get();
           foreach ($cart_items as $item){
               $offer=ProductPrice::where('product_id',$item->product_id)->where('status',1)->first();
             
               if($offer){
                $item->total=($item->main_price-($item->main_price*$offer->offer))*$item->qty;
               }else{
                $item->total=$item->main_price*$item->qty;
               }
           }
           foreach ($cart_items as $item){
               $total_price+=$item->total;
           }
      
        return response()->json([
            'success' => true,
            'count' => $count,
            'total_price'=>$total_price,
        ]);
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
    public function edit_cart_qty(Request $request)
    {
        $user=Auth::user();
        $id = request('id');
        $qty = request('qty');
        $cart = Cart::find($id);
        $cart->qty = $qty;
        $cart->save();

        $product = Product::find($cart->product_id);
        $offer_pr=ProductPrice::where('product_id',$product->id)->where('status',1)->first();
        if($offer_pr){
            $total=(int)($product->main_price-($product->main_price*$offer_pr->offer))*$qty;

        }else{
            $total = (int)($product->main_price * $qty);
        }
       

        $total_price=0;
        $cart_items=Cart::leftJoin('products','products.id','product_id')->where('user_id', $user->id)->where('carts.status','<',2)->select('main_price','carts.qty','product_id')->get();
        foreach ($cart_items as $item){
            $offer=ProductPrice::where('product_id',$item->product_id)->where('status',1)->first();
            
            if($offer){
             $item->total=($item->main_price-($item->main_price*$offer->offer))*$item->qty;

            }else{
             $item->total=$item->main_price*$item->qty;
            }
        }
        foreach ($cart_items as $item){
            $total_price+=(int)$item->total;
        }
        return response()->json([
            'success' => true,
            'total' => $total,
            'total_price'=>$total_price,
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
        $user = Auth::user();
        $cart = Cart::find($id);
        if ($user->id == $cart->user_id) {
            $cart->delete();
        }
        return redirect()->back();
    }
}
