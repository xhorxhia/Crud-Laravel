<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use Auth;
use DB;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');

        // $title=... 
        // return view('pages.index')->with('title',$title)
    }

   
}
