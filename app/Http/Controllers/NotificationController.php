<?php

namespace App\Http\Controllers;

use App\Models\Product;

class NotificationController extends Controller
{
    public static function approval_counts()
    {
        return NotificationController::products_approval_counts();
    }
    public static function products_approval_counts()
    {
        $products = Product::whereStatus(0)->get();
        return count($products);
    }

    public function get_current_notifications()
    {
        $products_approval=NotificationController::products_approval_counts();
        $all_aproval=NotificationController::approval_counts();

        return response()->json([
            'products_approval'=>$products_approval,
            'all_aproval'=>$all_aproval,
        ]);
    }

}
