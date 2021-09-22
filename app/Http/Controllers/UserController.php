<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use App\Mail\ResetPassword;
use Session;
use Socialite;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_email' => 'required',
            'user_password' => 'required',
        ],[
            'user_email.required' => 'Email is required',
            'user_password.required' => 'Password is required'
        ]);

        if (!$validator->fails())
        {
            $user_details =  User::where(['email' => $request->user_email])->first();

            if($user_details)
            {
                    if(Hash::check($request->user_password,$user_details->password))
                    {
                        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

                        if($remember_me)
                        {
                            Cookie::queue('login_email', $request->user_email, time()+60*60*24*10);
                            Cookie::queue('login_password', $request->user_password, time()+60*60*24*10);
                        }
                        else{
                            Cookie::queue(Cookie::forget('login_email'));
                            Cookie::queue(Cookie::forget('login_password'));
                        }

                        $request->session()->put('user',$user_details);
                        return redirect("/");
                    }
                    else{
                        return redirect("/login");
                    }
            }
            else{
                return redirect("/login");
            }
        } 
        else
        {
            $errors = $validator->errors();
            return view('/login',compact('errors'));
        }
           
    }

    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_email' => 'required',
        ],[
            'user_email.required' => 'Email is required',
        ]);

        if (!$validator->fails())
        {
            $user_details =  User::where(['email' => $request->user_email])->first();
            if (!$user_details) {
                return "user not found";
            }
            else{
                Mail::to($user_details->email)
                    ->send(new ResetPassword($user_details));
                Session::flash('success', 'Reset password link sent to your registered mail'); 
                return redirect("/forgot-password");   
            }

        } 
        else
        {
            $errors = $validator->errors();
            return view('forgotpassword',compact('errors'));
        }
    }

    public function update_password(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ],[
            'password.required' => 'Password is required',
            'password.confirmed' => 'Confirm password is same as password',
            'password_confirmation.required' => 'Confirm Password is required',
        ]);

        if (!$validator->fails())
        {
            $user =  User::where(['id' => $id])->first();
            $user->password = Hash::make($request->password);
            $user->save();
            $request->session()->flash('success','Password updated successfully');
            return redirect("/login");
        } 
        else
        {
            $errors = $validator->errors();
            return view('resetpassword',compact('errors','id'));
        }
    }

    public function redirect_google(){
        return Socialite::driver('google')->redirect();
    }

    public function handle_google_callback(){
        $user = Socialite::driver('google')->user();
        $user_exists = User::where('social_id', $user->id)->first();
        if($user_exists){
            Session::put('user',$user_exists);
            return redirect("/");
        }
        else{
            $new_user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id'=> $user->id,
                'social_type'=> 'google',
                'password' => encrypt('my-google')
            ]);

            Session::put('user',$new_user);
            return redirect("/");
        }
    }

    public function redirect_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handle_facebook_callback(){
        $user = Socialite::driver('facebook')->user();
        $user_exists = User::where('social_id', $user->id)->first();
        if($user_exists){
            Session::put('user',$user_exists);
            return redirect("/");
        }
        else{
            $new_user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id'=> $user->id,
                'social_type'=> 'facebook',
                'password' => encrypt('my-facebook')
            ]);

            Session::put('user',$new_user);
            return redirect("/");
        }
    }

    function test_relation_one()
    {
       return User::find(1)->orderData;
    }

    public function route_bind(User $key)
    {
        return $key;
    }

    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }
}
