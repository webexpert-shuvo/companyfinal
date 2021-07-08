<?php

namespace App\Http\Controllers;

use App\Models\Bolg;
use Illuminate\Http\Request;

class PostHomepageController extends Controller
{
    //Show Post Page

    public function Index()
    {
        $singleblog = Bolg::where('status' , 'Active')->latest()->get();
        return view('company.blog' , [

            'posts'     => $singleblog,

        ]);
    }


}
