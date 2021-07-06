<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    //Admin Log Page Show

    public function AdminLogin()
    {
        return view('backend.login');
    }

    //Show Register Page
    public function AdminRegister()
    {

        return view('backend.register');
    }


    public function Index()
    {
       return view('backend.admin-panel');
    }


}
