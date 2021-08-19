<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function remove_cart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function cart_list()
    {
        $user_id = Session::get('user')['id'];
        $data['products']  = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->select('products.*','cart.id as card_id')
        ->where('cart.user_id',$user_id)
        ->get();

        return view('cartlist',$data);
    }

    public function add_cart(Request $request)
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
    }

    static function cart_item()
    {
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }

}
