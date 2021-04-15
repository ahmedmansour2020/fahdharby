<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;
use App\Models\PromocodeUser;
use Illuminate\Support\Facades\Auth;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="كوبونات الخصم";
        if (request()->ajax()) {
            $promocodes = Promocode::orderBy('id','desc')->get();
            $index = 1;
            foreach ($promocodes as $promocode) {
                $promocode->index = $index++;
                $count=count(PromocodeUser::where('promocode_id',$promocode->id)->get());
                $promocode->count=$count;
                $date=date('Y-m-d');
                if($date>=$promocode->start&&$date<=$promocode->end){
                    $promocode->status=1;
                }elseif($date<$promocode->start){
                    $promocode->status=0;
                }elseif($date>$promocode->start){
                    $promocode->status=2;
                }
            }
            return datatables()->of($promocodes)->addIndexColumn()->make(true);
        }
        return view('admin.show.promocodes',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="إضافة كوبون خصم";
        $action = 'add';
        return view('admin.add.promocode', compact('action', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promocode=new Promocode();
        $promocode->code=request('code');
        $promocode->value=request('value');
        $promocode->minimum=request('minimum');
        $promocode->start=request('start');
        $promocode->end=request('end');

        $promocode->save();
        return redirect()->route('promocode.index')->with('success', __('items.success_add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title="تعديل كوبون خصم";
        $action = 'update';
        $saved=Promocode::find($id);
        return view('admin.add.promocode', compact('action', 'title','saved'));
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
        $promocode= Promocode::find($id);
        $promocode->code=request('code');
        $promocode->value=request('value');
        $promocode->minimum=request('minimum');
        $promocode->start=request('start');
        $promocode->end=request('end');

        $promocode->save();
        return redirect()->route('promocode.index')->with('success', __('items.success_add'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       PromocodeUser::where('promocode_id',$id)->delete();
       Promocode::find($id)->delete();
       return redirect()->back()->with('success', __('items.success_delete'));
    }
    public function add_promocode(Request $request){
        $promocode=request('promocode');
        $date=date('Y-m-d');
        $user=Auth::user();
        $exist=Promocode::where('code',$promocode)->first();
       
        if($exist){
            if($date>$exist->end){
                return response()->json([
                    'success'=>false,
                    'message'=>'هذا الكوبون منتهي',
                ]);
            }else{
                $user_promocode=new PromocodeUser();
                $user_promocode->user_id=$user->id;
                $user_promocode->promocode_id=$exist->id;
                $user_promocode->save();

                return response()->json([
                    'success'=>true,
                    'message'=>'تم إضافة الكوبون بنجاح',
                ]);
            }
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'هذا الكوبون غير صحيح',
            ]);
        }
    }
}
