<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SentTestMailJob;
use App\Events\SomeoneCheckedProfile;
use Session;
use Pusher\Pusher;
use App\Notifications\ProfileViewNotification;

class SearchController extends Controller
{
    public function search_user(Request $request)
    {
        if ($request->session()->has('user')) {

            $user_id = Session::get('user')['id'];
            $name = $request->search_user;
            $data['users'] = User::where("name","like","%".$name."%")->whereNotIn('id', [$user_id])->get();
            if(count($data['users'])>0)
            {
                return view('search',$data);
            }
            else{
                $data['result'] = "User not found";
                return view('search',$data);
            }
        }
        else
        {
            return redirect("/login");
        }
    }

    public function user_detail($id)
    {
        $user_id = Session::get('user')['id'];
        $user = User::find($id);
        $user->notify(new ProfileViewNotification($user_id));
        //SentTestMailJob::dispatch($user)->delay(now()->addSeconds(5));
        SomeoneCheckedProfile::dispatch($user,$user_id);

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), 
            $options
        );
            
        $data['message'] = 'Someone view your profile click on for more info.';
        $data['id'] = $user_id;
        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);

        $data['user'] = $user;
        return view('userdetail',$data);
    }

    public function view_user($id, $notify_id = "")
    {
        if (Session::has('user')) {

            $user = User::find(Session::get('user')['id']);
            $user->unreadNotifications->where('id', $notify_id)->markAsRead();
            $data['user'] = User::find($id);
            return view('viewuser',$data);
        }
        else
        {
            return redirect("/login");
        }
    }

    public function mark_as_read()
    {
        if (Session::has('user')) {

            $user = User::find(Session::get('user')['id']);
            $user->unreadNotifications->markAsRead();
            return redirect()->back();
        }
        else
        {
            return redirect("/login");
        }
    }

    public function all_notification()
    {
        if (Session::has('user')) {
            return view('notification');
        }
        else
        {
            return redirect("/login");
        }
    }
}
