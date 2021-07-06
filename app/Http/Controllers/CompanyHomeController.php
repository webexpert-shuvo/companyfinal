<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Homeaboutus;
use Illuminate\Http\Request;

class CompanyHomeController extends Controller
{
    //Show Compnay Home Page


    public function Index()
    {

        $aboutushome = Homeaboutus::first();
        return view('company.homepage' , [

                'homeaboutdata'       => $aboutushome,

        ]);
    }



}
