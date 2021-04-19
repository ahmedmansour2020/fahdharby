<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="التقييمات";
        if(request()->ajax()){
            $products=Product::
            join('reviews','reviews.product_id','products.id')
            ->select('products.id','products.name_ar as name',DB::raw('count(reviews.id) as count'))
            ->groupBy('products.id','name')
            ->get();

            return datatables()->of($products)->addIndexColumn()->make(true);
        }
        return view('vendor/show/products_rates',compact('title'));
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
        $user = auth()->user();
        $review = new Review();
        $review->user_id = $user->id;
        $review->product_id = request('product_id');
        $review->review = request('review');
        $review->rate = request('rate');
        $review->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rates=Review::leftJoin('users','user_id','users.id')->where('product_id',$id)->select('reviews.*','users.name as user','avatar')->orderBy('reviews.id','desc')->get();
        $title="التقييمات";
        return view('vendor.show.rate',compact('rates','title'));
    }

    public function change_status(Request $request,$id){
        $review=Review::find($id);
        if($review->status == 0){
            $review->status=1;
        }else{
            $review->status=0;
        }
        $review->save();

        return redirect()->back();
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
