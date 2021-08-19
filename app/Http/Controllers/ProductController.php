<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index()
    {
        $data['products'] = Product::all();
        return view('product',$data);
    }

    public function detail($id)
    {
        $data['product'] = Product::find($id);
        return view('detail',$data);
    }

    public function product()
    {
        if (Session::has('user')) {
            return view('addproducts');
        }
        else
        {
            return redirect("/login");
        }
    }

    public function add_product(Request $request)
    {
        $path = $request->file('product_img')->store('public');
        if(!empty($path))
        {
            $user_id = Session::get('user')['id'];
            $product = new Product;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category = $request->category;
            $product->gallery = $path;
            $product->description = $request->desc;
            $product->save();
            return redirect('/add-product');
        }


    }

    /*public function add_cart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect("/cartlist");
        }
        else
        {
            return redirect("/login");
        }
    }*/

    /*static function cart_item()
    {
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }*/

    /*function cart_list()
    {
        $user_id = Session::get('user')['id'];
        $data['products']  = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->select('products.*','cart.id as card_id')
        ->where('cart.user_id',$user_id)
        ->get();

        return view('cartlist',$data);
    }*/

    /*function remove_cart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }*/

    /*function order_now()
    {
       $user_id = Session::get('user')['id'];
        $data['total'] = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->select('products.*','cart.id as card_id')
        ->where('cart.user_id',$user_id)
        ->sum('products.price');

        return view('order',$data);
    }*/

    /*function order_place(Request $request)
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
    }*/

   /* function my_order()
    {
        $user_id = Session::get('user')['id'];
        $data['orders'] =  DB::table('orders')
        ->join('products','orders.product_id','products.id')
        ->select('products.*','orders.*')
        ->where('orders.user_id',$user_id)
        ->get();

        return view('myorder',$data);
    }*/
       
}
