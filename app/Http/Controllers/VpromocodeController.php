<?php

namespace App\Http\Controllers;

use App\Models\VendorPromocode;
use App\Models\VendorPromocodeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VpromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $title = "كوبونات الخصم";
        if (request()->ajax()) {
            $promocodes = VendorPromocode::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            $index = 1;
            foreach ($promocodes as $promocode) {
                $promocode->index = $index++;
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
            return datatables()->of($promocodes)->addIndexColumn()->make(true);
        }
        return view('vendor.show.promocodes', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "إضافة كوبون خصم";
        $action = 'add';
        return view('vendor.add.promocode', compact('action', 'title'));
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
        $promocode = new VendorPromocode();
        $promocode->user_id = $user->id;
        $promocode->code = request('code');
        $promocode->value = request('value');
        $promocode->minimum = request('minimum');
        $promocode->start = request('start');
        $promocode->end = request('end');
        $promocode->save();
        return redirect()->route('coupone.index')->with('success', __('items.success_add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "تعديل كوبون خصم";
        $action = 'update';
        $saved = VendorPromocode::find($id);
        return view('vendor.add.promocode', compact('action', 'title', 'saved'));
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
        $promocode = VendorPromocode::find($id);
        $promocode->code = request('code');
        $promocode->value = request('value');
        $promocode->minimum = request('minimum');
        $promocode->start = request('start');
        $promocode->end = request('end');

        $promocode->save();
        return redirect()->route('coupone.index')->with('success', __('items.success_add'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VendorPromocodeUser::where('promocode_id', $id)->delete();
        VendorPromocode::find($id)->delete();
        return redirect()->back()->with('success', __('items.success_delete'));
    }

}
