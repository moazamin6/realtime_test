<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Events\TaskEvent;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        return view('home')
            ->with('users', $users);
    }

    public function messagePost(Request $request)
    {
//        return $request->message;
        $user = User::find($request->user_select);
        $message = $request->message;
        event(new ChatEvent($user, $message));
        //return $request;
    }
}
