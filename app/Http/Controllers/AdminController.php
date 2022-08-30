<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
      if(Auth::id())
        {
        if(Auth::user()->usertype==1)
        {

        return view('admin.home');
      }
     else{
         return redirect()->back();
     }
     }
    else{
    return redirect('login');
    }
    }
