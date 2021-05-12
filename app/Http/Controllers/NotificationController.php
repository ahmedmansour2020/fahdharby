<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Notification;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use App\Models\VendorPromocode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public static function approval_counts()
    {
        return NotificationController::products_approval_counts()+NotificationController::offers_approval_counts()+NotificationController::coupone_approval_counts();
    }
    public static function products_approval_counts()
    {
        $products = Product::whereStatus(0)->get();
        return count($products);
    }
    public static function offers_approval_counts()
    {
        $products = ProductOffer::whereApproved(0)->get();
        return count($products);
    }
    public static function coupone_approval_counts()
    {
        $coupones = VendorPromocode::whereStatus(0)->get();
        return count($coupones);
    }

    public function get_current_notifications()
    {
        $products_approval=NotificationController::products_approval_counts();
        $offers_approval=NotificationController::offers_approval_counts();
        $coupone_approval=NotificationController::coupone_approval_counts();
        $all_aproval=NotificationController::approval_counts();

        return response()->json([
            'products_approval'=>$products_approval,
            'offers_approval'=>$offers_approval,
            'coupones_approval'=>$coupone_approval,
            'all_aproval'=>$all_aproval,
        ]);
    }

    public static function get_user_notifications(){
        $user=Auth::user();
        $notifications=Notification::where('user_id',$user->id)->orderBy('status','asc')->orderBy('id','desc')->limit(10)->get();
        $count=count(Notification::where('user_id',$user->id)->where('status',0)->get());
        
        $output=[
            'notifications'=>$notifications,
            'count'=>$count,
        ];

        return $output;
    }

    public function notification_seen(Request $request){
        $id=request('id');
        $notification=Notification::find($id);
        $notification->status=1;
        $notification->save();

        return response()->json([
            'success'=>true,
        ]);
    }
    public function read_notifications(Request $request){
        $user=auth()->user();
        DB::update('update notifications set status=1 where user_id=?',[$user->id]);

        return response()->json([
            'success'=>true,
        ]);
    }
}
