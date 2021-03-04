<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LangController;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user(); 
        if(request()->ajax()){
            $bookmark=Bookmark::join('products','products.id','product_id')
            ->where('user_id',$user->id)
            ->select('bookmarks.id','product_id','products.name_' . LangController::lang() .' as product_name')
            ->get();

            return datatables()->of($bookmark)->addIndexColumn()->make(true);
        }
        return view('');
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

        $exist = Bookmark::where('user_id', $user->id)->where('product_id', request('product_id'))->first();

        if (!$exist) {

            $bookmark = new Bookmark();
            $bookmark->user_id = $user->id;
            $bookmark->product_id = request('product_id');

            $bookmark->save();
        }
        $count = count(bookmark::where('user_id', $user->id)->get());
        return response()->json([
            'success' => true,
            'count' => $count,
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
        Bookmark::find($id)->delete();
        return redirect()->back()->with('success', __('items.success_delete'));
    }
}
