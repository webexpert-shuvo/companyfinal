<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Homeaboutus;
use App\Models\HomeServices;
use Illuminate\Http\Request;

class CompanyHomeController extends Controller
{
    //Show Compnay Home Page


    public function Index()
    {

        $aboutushome = Homeaboutus::first();
        $homeservicesdata = HomeServices::latest()->get();
        return view('company.homepage' , [

                'homeaboutdata'         => $aboutushome,
                'homeservices'          => $homeservicesdata,

        ]);
    }



}
