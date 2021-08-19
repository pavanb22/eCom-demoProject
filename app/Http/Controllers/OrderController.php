<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function order_now()
    {
       $user_id = Session::get('user')['id'];
        $data['total'] = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->select('products.*','cart.id as card_id')
        ->where('cart.user_id',$user_id)
        ->sum('products.price');

        return view('order',$data);
    }
    
    function order_place(Request $request)
    {
        $user_id = Session::get('user')['id'];
        $cart_products = Cart::where('user_id',$user_id)->get();

        foreach ($cart_products as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address = $request->address;
            $order->status = 'pending';
            $order->payment_method = $request->payment;
            $order->payment_status = 'pending';
            $order->save();
        }
        
        Cart::where('user_id',$user_id)->delete();
        return redirect("/");
    }

    function my_order()
    {
        $user_id = Session::get('user')['id'];
        $data['orders'] =  DB::table('orders')
        ->join('products','orders.product_id','products.id')
        ->select('products.*','orders.*')
        ->where('orders.user_id',$user_id)
        ->get();

        return view('myorder',$data);
    }
}
