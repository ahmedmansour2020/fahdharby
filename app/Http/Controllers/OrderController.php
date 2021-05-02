<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Mail\SendMail;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\PromocodeUser;
use App\Models\VendorPromocodeUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;

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
        $order->user_id = $user->id;
        $order->mobile = request('mobile');
        $order->city = request('city');
        $order->area = request('area');
        $order->map = request('lng') . '/' . request('lat');
        $order->street = request('street');
        $order->home_job = request('home_job');
        
        $order->save();
        $discount = 0;
        $total = 0;
        $qty = 1;
        if (request('items')) {
            $items = request('items');
            foreach ($items as $item) {
                $new_item = new OrderItem();
                $new_item->order_id = $order->id;
                $new_item->product_id = $item;
                $new_item->qty = request('qty_' . $item);
                $new_item->total = request('total_' . $item);
                $new_item->discount = request('discount_' . $item);
                $new_item->save();
                $total += $new_item->total;
                $discount+=$new_item->discount;
                $qty = request('qty_' . $item);
            }
            foreach ($items as $item) {
                $cart = Cart::where('user_id', $user->id)->where('product_id', $item)->whereStatus(0)->first();
                $cart->status = 1;
                $cart->save();
                $qty = $cart->qty;
                $product = Product::find($item);
                $product->qty -= $qty;
                $product->save();
            }
        }

        $order->total = $total;
        $pc = new UserController();
        $promocodes = $pc->get_user_promocodes($total);
        foreach ($promocodes as $promocode) {
            $promocode_exist = PromocodeUser::find($promocode->id);
            $remain = $promocode->remain;
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
        $order->discount = $discount;
        $order->save();

        $order->final = $order->total - $discount;
        $order->save();

        if(request('coupones')){
            $coupones=request('coupones');
            foreach($coupones as $coupon){
                $coupone_id=explode('/',$coupon)[0];
                $spent=explode('/',$coupon)[1];
                $user_coupone=VendorPromocodeUser::find($coupone_id);
                $user_coupone->spent += $spent;
                $user_coupone->save();
            }
        }
        return redirect()->route('purchase', $order->id)->with('success', __('front.success_order'));

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

    public function send_email($order_id)
    {
        $user = Auth::user();
        $order = Order::find($order_id);
        $items = OrderItem::leftJoin('products', 'products.id', 'product_id')->where('order_id', $order_id)->select('order_items.*', 'products.name_ar as name')->get();
        $message = '
        <h1>رقم الطلب: ' . $order_id . '</h1>
        <h2>إجمالي السعر: ' . $order->total . '</h2>
        <h2>إجمالي الخصم: ' . $order->discount . '</h2>
        <h2> السعر النهائي: ' . $order->final . '</h2>
        لقد قمت بعملية شراء للمنتجات التالية
        <table style="border:1px solid gray;width:100%;text-align:center" border="1">
        <thead>
        <tr>
        <th>الصنف</th>
        <th>الكمية</th>
        <th>السعر</th>
        </tr>
        </thead>
        <tbody>
        ';
        foreach ($items as $item) {
            $message .= '
            <tr>
            <td>' . $item->name . '</td>
            <td>' . $item->qty . '</td>
            <td>' . $item->total . '</td>
            </tr>
            ';
        }
        $message .=
            '
        </tbody>
        </table>
        ';
        $data = array(
            'message' => $message,
            'mail' => $user->email,
            'subject' => 'إتمام عملية الشراء',
        );

        Mail::to($user->email)->send(new SendMail($data));

    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->payment_type = request('payment_type');
        $order->status = 1;
        $order->save();

        $this->send_email($id);

        $items = OrderItem::leftJoin('products', 'products.id', 'product_id')->where('order_id', $id)->select('order_items.*', 'products.name_ar as product_name', 'products.user_id')->get();
        $table = '
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>الصنف</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                    </tr>
                </thead>
                <tbody>
        ';
        foreach ($items as $item) {
            $table .= '
                <tr>
                    <td>' . $item->product_name . '</td>
                    <td>' . $item->qty . '</td>
                    <td>' . $item->total . '</td>
                </tr>';
        }
        $table .= '
        </tbody>
        </table>
        ';

        $message = '
        <h3 class="text-center text-success">تم تنفيذ طلب الشراء بنجاح</h3>
        <br>
        <div class="text-center">
            <h4>رقم الطلب : <span class="text-info">' . $order->id . '</span></h4>

            <br>
            ' . $table . '<hr>
             <p>إجمالي السعر : ' . $order->total . ' </p>' .
        '<p>إجمالي الخصم : ' . $order->discount . ' </p>' .
        '<p>السعر النهائي : ' . $order->final . ' </p><hr>
            <span class="text-primary">يرجى الاحتفاظ برقم الطلب لمتابعة طلبك</span>
        </div>

        ';

        foreach ($items as $item) {
            $notify = new Notification();
            $notify->user_id=$item->user_id;
            $notify->content='يوجد طلب جديد على المنتج '.$item->product_name;
            $notify->url=route('orders-dashboard');
            $notify->save();
        }

        return redirect()->route('home')->with('message', $message);
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
