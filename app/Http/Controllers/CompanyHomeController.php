<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class CompanyHomeController extends Controller
{
    //Show Compnay Home Page


    public function Index()
    {

        return view('company.homepage');
    }



}
