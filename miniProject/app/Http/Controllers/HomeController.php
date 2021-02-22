<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use CreateChatTables;

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
        return view('users.home');
    }

//per chatin
// public function allmessage()
// { 
//     return view('allmessage');
// }

// function jsonResponse(){
//     $user = DB::table('chats')->get();
//     return response()->json($user);
// }

// public function chat()
// {
//     return view('chatShow');
// }



 }
