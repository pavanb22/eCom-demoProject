<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_email' => 'required',
            'user_password' => 'required',
        ]);

        if (!$validator->fails())
        {
            $user_details =  User::where(['email' => $request->user_email])->first();

            if (!$user_details && Hash::check($request->user_password,$user_details->password)) {
                return "user not match";
            }
            else{
                $request->session()->put('user',$user_details);
                return redirect("/");
            }

        } 
        else
        {
            $errors = $validator->errors();
            return view('/login',compact('errors'));
        }
           
    }

    function test_relation_one()
    {
       // return Order::find(1)->orderData;
       return User::find(1)->orderData;
    }

    public function route_bind(User $key)
    {
        return $key;
    }
}
