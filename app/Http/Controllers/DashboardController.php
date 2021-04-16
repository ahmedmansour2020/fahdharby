<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LangController;

class DashboardController extends Controller
{
    public function orders()
    {
        $title = 'الطلبيات';
        return view('home/orders', compact('title'));
    }
    public function location()
    {
        $user= Auth::user();
        if($user->city==null &&$user->area==null&&$user->street==null&&$user->map==null&&$user->mobile==null&&$user->home_job==null){
            $location=false;
        }else{
            $location=true;
        }

        $title = 'المكان';
        return view('home/location', compact('title','location','user'));
    }
    public function save_location(Request $request){
        $user=Auth::user();
        $user->mobile=request('mobile');
        $user->city=request('city');
        $user->area=request('area');
        $user->street=request('street');
        $user->map=request('lng').'/'.request('lat');
        $user->home_job=request('home_job');
        $user->save();

        return redirect()->back();
    }
    public function pay()
    {
        $title = 'الدفع';
        return view('home/pay', compact('title'));
    }
    public function wallet()
    {
        $title = 'المحفظة';
        return view('home/wallet', compact('title'));
    }
    public function process_pay()
    {
        $title = 'خطوات الدفع';
        return view('home/process-pay', compact('title'));
    }
    public function product_return()
    {
        $title = 'إرجاع المنتج';
        return view('home/product-return', compact('title'));
    }
    public function create_order_return()
    {
        $title = 'إنشاء أمر مرتجع';
        return view('home/create-order-return', compact('title'));
    }
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
    public static function genders(){
      $genders=Gender::select('id','name_'.LangController::lang().' as name')->get();
      return $genders;
    }
}
