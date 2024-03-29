<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LangController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOffer;
use App\Models\Promocode;
use App\Models\Review;
use App\Models\Slider;
use App\Models\User;
use App\Models\VendorPromocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $check_auth = false;
        if ($user) {
            $check_auth = true;
        }
        $title = 'الصفحة الرئيسية';
        $sliders = Slider::whereStatus(1)->get();
        foreach ($sliders as $slider) {
            $slider->image = asset('uploaded/' . $slider->image);
            $slider->content = str_replace(" ", "&nbsp;", $slider->content);
            $slider->content = str_replace("\n", "<br>", $slider->content);
        }
        $latest_products = Product::whereStatus(1)->select('id', 'name_' . LangController::lang() . ' as name', 'price', 'description_' . LangController::lang() . ' as description')->orderBy('id', 'desc')->limit(4)->get();
        foreach ($latest_products as $product) {
            $reviews = Review::
                leftJoin('users', 'users.id', 'user_id')
                ->where('product_id', $product->id)
                ->whereStatus(1)
                ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
                ->orderBy('reviews.id', 'desc')
                ->get();
            $total = 5 * count($reviews);
            $total_reviews = 0;
            foreach ($reviews as $review) {
                $total_reviews += $review->rate;
            }
            if (count($reviews) == 0) {
                $reviews_stars = 0;
            } else {
                $reviews_stars = (100 * $total_reviews / $total);
            }
            $product->reviews_stars = $reviews_stars;
            $product->reviews = count($reviews);

            $check_cart_related = false;
            if ($user) {
                $cart_item = Cart::where('user_id', $user->id)->where('product_id', $product->id)->whereStatus(0)->first();
                if ($cart_item) {
                    $check_cart_related = true;
                }
            }
            $product->check_cart_related = $check_cart_related;
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        $this->product_main_image($latest_products);

        $high_sales = Product::
            leftJoin('order_items', 'product_id', 'products.id')
            ->whereStatus(1)
            ->select(DB::raw('count(order_items.id) as sales'), 'products.id', 'name_' . LangController::lang() . ' as name', 'price', 'description_' . LangController::lang() . ' as description')
            ->groupBy('products.id', 'name', 'price', 'description', )
            ->orderBy('sales', 'desc')
            ->limit(4)
            ->get()->shuffle();
        foreach ($high_sales as $product) {
            $reviews = Review::
                leftJoin('users', 'users.id', 'user_id')
                ->where('product_id', $product->id)
                ->whereStatus(1)
                ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
                ->orderBy('reviews.id', 'desc')
                ->get();
            $total = 5 * count($reviews);
            $total_reviews = 0;
            foreach ($reviews as $review) {
                $total_reviews += $review->rate;
            }
            if (count($reviews) == 0) {
                $reviews_stars = 0;
            } else {
                $reviews_stars = (100 * $total_reviews / $total);
            }
            $product->reviews_stars = $reviews_stars;
            $product->reviews = count($reviews);

            $check_cart_related = false;
            if ($user) {
                $cart_item = Cart::where('user_id', $user->id)->where('product_id', $product->id)->whereStatus(0)->first();
                if ($cart_item) {
                    $check_cart_related = true;
                }
            }
            $product->check_cart_related = $check_cart_related;
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        $this->product_main_image($high_sales);

        $offers_products = Product::join('product_offers', 'product_id', 'products.id')->whereApproved(1)->where('products.status', 1)->where('product_offers.status', 1)->select('products.id', 'name_ar as name', 'price as old_price', 'offer')->limit(4)->get();
        $this->product_main_image($offers_products);
        foreach ($offers_products as $product) {
            $product->price = (int) ($product->old_price - ($product->old_price * $product->offer / 100));
        }
        return view('welcome', compact('title', 'sliders', 'latest_products', 'check_auth', 'offers_products', 'high_sales'));
    }
    public function see_more($type){
        $products;
        $title="";
        switch($type){
            case 'offers':
                $title=" العروض";
                $products = Product::join('product_offers', 'product_id', 'products.id')->whereApproved(1)->where('products.status', 1)->where('product_offers.status', 1)->select('products.id', 'name_ar as name', 'price as old_price', 'offer');
                break;
                case 'latest':
                $title=" المنتجات";
                $products = Product::whereStatus(1)->select('id', 'name_' . LangController::lang() . ' as name', 'price', 'description_' . LangController::lang() . ' as description')->orderBy('id', 'desc');
                break;
                case 'high_sale':
                $title="  المنتجات الأعلى مبيعًا";
                $products = Product::
                leftJoin('order_items', 'product_id', 'products.id')
                ->whereStatus(1)
                ->select(DB::raw('count(order_items.id) as sales'), 'products.id', 'name_' . LangController::lang() . ' as name', 'price', 'description_' . LangController::lang() . ' as description')
                ->groupBy('products.id', 'name', 'price', 'description' )
                ->orderBy('sales', 'desc');
                break;
        }

        $products=$products->paginate(10);

        foreach($products as $product){
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        $this->product_main_image($products);

        return view('home.products',compact('products','title'));
    }
    public static function getParentCategory($limit)
    {
        $categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'image')->limit($limit)->get();
        foreach ($categories as $category) {
            $category->image = asset('uploaded/' . $category->image);
        }
        return $categories;
    }
    public function product_main_image($products)
    {
        foreach ($products as $product) {
            $image = ProductImage::whereMain(1)->where('product_id', $product->id)->first();
            if ($image) {

                $product->image = asset('uploaded/' . $image->name);
            }
        }
    }
    public function to_sub_categories($id)
    {
        $main_category = Category::where('id', $id)->select('id', 'name_' . LangController::lang() . ' as name', 'image')->first();
        if ($main_category->image != null) {
            $main_category->image = asset('uploaded/' . $main_category->image);
        }
        $title = $main_category->name;
        $sub_categories = Category::where('parent_id', $id)->select('id', 'name_' . LangController::lang() . ' as name', 'image')->get();
        foreach ($sub_categories as $category) {
            if ($category->image != null) {
                $category->image = asset('uploaded/' . $category->image);
            }
        }
        return view('home.categories', compact('title', 'main_category', 'sub_categories'));
    }
    public function to_all_categories()
    {
        $title = "جميع التصنيفات";
        $categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'image')->get();
        foreach ($categories as $category) {
            if ($category->image != null) {
                $category->image = asset('uploaded/' . $category->image);
            }
        }
        return view('home.categories', compact('title', 'categories'));
    }

    public function to_products($id)
    {
        $sub_category = Category::where('id', $id)->select('id', 'name_' . LangController::lang() . ' as name', 'image')->first();
        if ($sub_category->image != null) {
            $sub_category->image = asset('uploaded/' . $sub_category->image);
        }
        $title = $sub_category->name;
        $products = Product::
            whereStatus(1)
            ->where('sub_category', $id)
            ->select('id', 'name_' . LangController::lang() . ' as name', 'price', 'description_' . LangController::lang() . ' as description')
            ->orderBy('id', 'desc')
            ->paginate(10);
        foreach ($products as $product) {
            if (strlen($product->description) > 100) {
                $product->description = substr($product->description, 100) . "...";
            }
            $product->description = str_replace("\n", "<br>", $product->description);
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        $this->product_main_image($products);
        return view('home.products', compact('title', 'sub_category', 'products'));
    }

    public function product_details($id)
    {
        $product = Product::where('id', $id)->whereStatus(1)->select('sub_category', 'duration', 'qty', 'price', 'user_id', 'id', 'name_' . LangController::lang() . ' as name', 'description_' . LangController::lang() . ' as description')->firstOrFail();
        $images = ProductImage::where('product_id', $id)->get();
        $title = $product->name;
        $supplier = User::find($product->user_id);
        $offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
        if ($offer) {
            $product->old_price = $product->price;
            $product->price = (int) ($product->price - ($product->price * $offer->offer / 100));
        } else {
            $product->old_price = null;
        }
        $user = Auth::user();
        $check_auth = false;
        $check_cart = false;
        if ($user) {
            $check_auth = true;
            $cart = Cart::where('user_id', $user->id)->where('product_id', $product->id)->whereStatus(0)->first();
            if ($cart) {
                $check_cart = true;
            }
        }

        $related_products = Product::
            where('sub_category', $product->sub_category)
            ->whereStatus(1)
            ->where('id', '<>', $product->id)
            ->select('duration', 'qty', 'price', 'user_id', 'id', 'name_' . LangController::lang() . ' as name', 'description_' . LangController::lang() . ' as description')
            ->get();
        $this->product_main_image($related_products);
        foreach ($related_products as $item) {
            $check_cart_related = false;
            if ($user) {
                $cart_item = Cart::where('user_id', $user->id)->where('product_id', $item->id)->whereStatus(0)->first();
                if ($cart_item) {
                    $check_cart_related = true;
                }
            }
            $item->check_cart_related = $check_cart_related;
            $related_offer = ProductOffer::where('product_id', $item->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $item->old_price = $item->price;
                $item->price = (int) ($item->price - ($item->price * $related_offer->offer / 100));
            } else {
                $item->old_price = null;
            }
            $re_reviews = Review::
                leftJoin('users', 'users.id', 'user_id')
                ->where('product_id', $item->id)
                ->whereStatus(1)
                ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
                ->orderBy('reviews.id', 'desc')
                ->get();
            $re_total = 5 * count($re_reviews);
            $total_re_reviews = 0;
            foreach ($re_reviews as $review) {
                $total_re_reviews += $review->rate;
            }
            if (count($re_reviews) == 0) {
                $re_reviews_stars = 0;
            } else {
                $re_reviews_stars = (100 * $total_re_reviews / $re_total);
            }
            $item->reviews_stars = $re_reviews_stars;
            $item->reviews = count($re_reviews);
        }
        $reviews = Review::
            leftJoin('users', 'users.id', 'user_id')
            ->where('product_id', $product->id)
            ->whereStatus(1)
            ->select('reviews.*', 'users.name as user', 'facebook_id', 'twitter_id', 'microsoft_id', 'google_id', 'avatar', DB::raw('date(reviews.created_at) as date'))
            ->orderBy('reviews.id', 'desc')
            ->get();
        $rate_1 = 0;
        $rate_2 = 0;
        $rate_3 = 0;
        $rate_4 = 0;
        $rate_5 = 0;
        foreach ($reviews as $review) {
            if ($review->avatar != null) {

                if ($review->facebook_id != null || $review->twitter_id != null || $review->microsoft_id != null || $review->google_id != null) {
                    $review->avatar = $review->avatar;
                } else {
                    $review->avatar = asset('uploaded/' . $review->avatar);
                }
            }
            if ($review->rate == 1) {
                $rate_1++;
            }
            if ($review->rate == 2) {
                $rate_2++;
            }
            if ($review->rate == 3) {
                $rate_3++;
            }
            if ($review->rate == 4) {
                $rate_4++;
            }
            if ($review->rate == 5) {
                $rate_5++;
            }
        }
        if (count($reviews) > 0) {
            $rate_1 = (int) (($rate_1 / count($reviews)) * 100);
            $rate_2 = (int) (($rate_2 / count($reviews)) * 100);
            $rate_3 = (int) (($rate_3 / count($reviews)) * 100);
            $rate_4 = (int) (($rate_4 / count($reviews)) * 100);
            $rate_5 = (int) (($rate_5 / count($reviews)) * 100);
        }

        $check_review = false;

        if ($user) {
            $review = Review::where('product_id', $product->id)->where('user_id', $user->id)->first();
            if ($review) {
                $check_review = true;
            }
        } else {
            $check_review = true;
        }

        $total = 5 * count($reviews);
        $total_reviews = 0;
        foreach ($reviews as $review) {
            $total_reviews += $review->rate;
        }
        if (count($reviews) == 0) {
            $reviews_stars = 0;
        } else {

            $reviews_stars = (100 * $total_reviews / $total);
        }
        return view('home.product-details', compact('reviews_stars', 'check_review', 'title', 'reviews', 'images', 'product', 'supplier', 'check_auth', 'check_cart', 'related_products', 'rate_1', 'rate_2', 'rate_3', 'rate_4', 'rate_5'));
    }

    public function add_to_cart(Request $request)
    {
        $user = Auth::user();
        $product_id = request('product_id');
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $product_id;
        $cart->save();

        return response()->json([
            'success' => true,
        ]);
    }

    public function cart()
    {
        $title = 'سلة الطلبات';
        $user = Auth::user();
        $products = Cart::leftJoin('products', 'products.id', 'product_id')
            ->where('carts.user_id', $user->id)
            ->where('carts.status', 0)
            ->select('products.*', 'products.description_' . LangController::lang() . ' as description', 'products.name_' . LangController::lang() . ' as name', 'carts.id as cart_id', 'carts.qty as cart_qty')
            ->get();
        $this->product_main_image($products);
        foreach ($products as $product) {
            $reviews = Review::
                leftJoin('users', 'users.id', 'user_id')
                ->where('product_id', $product->id)
                ->whereStatus(1)
                ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
                ->orderBy('reviews.id', 'desc')
                ->get();
            $total = 5 * count($reviews);
            $total_reviews = 0;
            foreach ($reviews as $review) {
                $total_reviews += $review->rate;
            }
            if (count($reviews) == 0) {
                $reviews_stars = 0;
            } else {
                $reviews_stars = (100 * $total_reviews / $total);
            }
            $product->reviews_stars = $reviews_stars;
            $product->reviews = count($reviews);
            $product->supplier = User::find($product->user_id)->name;
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        return view('home/add_to_cart', compact('title', 'products'));
    }
    public function change_cart_qty(Request $request)
    {
        $id = request('id');
        $qty = request('qty');
        $cart = Cart::find($id);
        $cart->qty = $qty;
        $cart->save();
        $user = Auth::user();
        $all_cart = Cart::leftJoin('products', 'products.id', 'carts.product_id')
            ->where('carts.user_id', $user->id)
            ->where('carts.status', 0)
            ->select('products.price', 'carts.qty', 'products.id', 'products.qty as product_qty')
            ->get();
        foreach ($all_cart as $item) {
            if ($item->product_qty - $item->qty <= 0) {
                $item->qty = 0;
            }
            $offer = ProductOffer::where('product_id', $item->id)->whereStatus(1)->whereApproved(1)->first();
            if ($offer) {
                $item->total = (int) ($item->price - ($item->price * $offer->offer / 100)) * $item->qty;
            } else {
                $item->total = $item->price * $item->qty;
            }
        }
        $total = 0;
        foreach ($all_cart as $item) {
            $total += $item->total;
        }
        return response()->json([
            'success' => true,
            'total' => $total,
        ]);
    }
    public function remove_from_cart($id)
    {
        $user = Auth::user();
        $exist = Cart::where('user_id', $user->id)->where('id', $id)->first();

        if ($exist) {
            Cart::find($id)->delete();
        }
        return redirect()->back();
    }

    public function checkout()
    {
        $title = "إتمام عملية الدفع";
        $user = Auth::user();
        $products = Cart::leftJoin('products', 'products.id', 'product_id')
            ->where('carts.user_id', $user->id)
            ->where('carts.status', 0)
            ->where(DB::raw('products.qty-carts.qty'), '>', 0)
            ->select('products.*', 'products.description_' . LangController::lang() . ' as description', 'products.name_' . LangController::lang() . ' as name', 'carts.id as cart_id', 'carts.qty as cart_qty')
            ->get();
        $subtotal = 0;
        $vendors = [];
        foreach ($products as $oi) {
            array_push($vendors, $oi->user_id);
        }
        $vendors = array_unique($vendors);
        $used_coupones=[];
        foreach ($products as $product) {
            $product->discount=0;
            $reviews = Review::
                leftJoin('users', 'users.id', 'user_id')
                ->where('product_id', $product->id)
                ->whereStatus(1)
                ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
                ->orderBy('reviews.id', 'desc')
                ->get();
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
            $subtotal += $product->price * $product->cart_qty;

        }
        foreach ($vendors as $vendor) {
            $total_items_price = 0;
            foreach ($products as $oi) {
                if ($oi->user_id == $vendor) {
                    $total_items_price += ($oi->price*$oi->cart_qty);
                }
            }
            $coupones = $this->get_vendor_promocodes($total_items_price,$vendor);
            $coupone_discount=0;
            foreach ($coupones as $coupone){
                $remain=$coupone->remain;
                foreach($products as $pr){
                    if($pr->discount==0&&$pr->user_id==$vendor){
                        $product_total=$pr->price*$pr->cart_qty;
                        if ($product_total <= $remain) {
                            $pr->discount=$product_total;
                            $remain-=$product_total;
                            // break;
                            $coupone_discount+=$pr->discount;
                            
                        } else {
                            $pr->discount=$remain;
                            $remain=0;
                            $coupone_discount+=$pr->discount;
                        }
                    }
                }
                $coupone_data=['id'=>$coupone->id,'spent'=>$coupone_discount];
                array_push($used_coupones,$coupone_data);
    
            }
        }
    
        $promocodes = $this->get_user_promocodes($subtotal);
        $discount = 0;
        foreach($products as $product){
            $discount+=$product->discount;
        }
        foreach ($promocodes as $promocode) {
            $discount += $promocode->remain;
        }
        if ($discount > $subtotal) {
            $discount = $subtotal;
        }
        $total = $subtotal - $discount;
        return view('home/checkout', compact('title', 'products', 'subtotal', 'discount', 'total','used_coupones'));
    }
    public function purchase($id)
    {
        $order = Order::find($id);

        $title = "إتمام عملية الشراء";
        if ($order->status == 0) {

            return view('home/purchase', compact('id', 'title'));
        } else {
            return redirect()->back();
        }
    }
    public function get_user_promocodes($price)
    {
        $user = Auth::user();
        $date = date('Y-m-d');
        $promocodes = Promocode::leftJoin('promocode_users', 'promocode_users.promocode_id', 'promocodes.id')
            ->where('user_id', $user->id)
            ->where('promocodes.start', '<=', $date)
            ->where('promocodes.end', '>=', $date)
            ->where('promocodes.minimum', '<=', $price)
            ->where(DB::raw('(promocodes.value-promocode_users.spent)'), '>', 0)
            ->select(DB::raw('(promocodes.value-promocode_users.spent) as remain'), 'promocode_users.id', 'promocode_users.spent', 'promocode_id')
            ->orderBy('remain', 'asc')
            ->get();

        return $promocodes;
    }
    public function get_vendor_promocodes($price, $vendor_id)
    {
        $user = Auth::user();
        $date = date('Y-m-d');
        $promocodes = VendorPromocode::leftJoin('vendor_promocode_users', 'vendor_promocode_users.promocode_id', 'vendor_promocodes.id')
            ->where('vendor_promocode_users.user_id', $user->id)
            ->where('vendor_promocodes.start', '<=', $date)
            ->where('vendor_promocodes.end', '>=', $date)
            ->where('vendor_promocodes.minimum', '<=', $price)
            ->where('vendor_promocodes.user_id', $vendor_id)
            ->where(DB::raw('(vendor_promocodes.value-vendor_promocode_users.spent)'), '>', 0)
            ->select(DB::raw('(vendor_promocodes.value-vendor_promocode_users.spent) as remain'), 'vendor_promocode_users.id', 'vendor_promocode_users.spent', 'promocode_id')
            ->orderBy('remain', 'asc')
            ->get();

        return $promocodes;
    }

    public function search(Request $request)
    {
        $word = request('search');
        $title = " نتائج بحث : " . $word;
        $products = Product::
            leftJoin('brands', 'brands.id', 'brand_id')
            ->select('products.*', 'products.name_ar as name', 'products.description_ar as description')
            ->whereStatus(1);
        $products->where(function ($query) use ($word) {
            $query->where('products.name_ar', 'like', '%' . $word . '%')
                ->orWhere('products.description_ar', 'like', '%' . $word . '%')
                ->orWhere('brands.name_ar', 'like', '%' . $word . '%');
        });
        $products = $products->paginate(10);

        foreach ($products as $product) {
            if (strlen($product->description) > 100) {
                $product->description = substr($product->description, 100) . "...";
            }
            $product->description = str_replace("\n", "<br>", $product->description);
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        $this->product_main_image($products);
        return view('home.products', compact('title', 'products'));
    }
    public function filter_by_vendor($id)
    {
        $user = User::find($id);
        $title = " منتجات التاجر : " . $user->name;
        $products = Product::
            where('user_id', $id)
            ->select('products.*', 'products.name_ar as name', 'products.description_ar as description')
            ->whereStatus(1)
            ->paginate(10);

        foreach ($products as $product) {
            if (strlen($product->description) > 100) {
                $product->description = substr($product->description, 100) . "...";
            }
            $product->description = str_replace("\n", "<br>", $product->description);
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        $this->product_main_image($products);
        return view('home.products', compact('title', 'products'));
    }
    public function redirect_to_product($id)
    {
        $user = Auth::user();
        if ($user) {
            return redirect()->route('product-details', $id);
        } else {
            return '';
        }
    }

}
