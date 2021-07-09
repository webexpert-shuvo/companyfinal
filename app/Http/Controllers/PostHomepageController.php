<?php

namespace App\Http\Controllers;

use App\Models\Bolg;
use Illuminate\Http\Request;

class PostHomepageController extends Controller
{
    //Show Post Page

    public function Index()
    {
        $singleblog = Bolg::where('status' , 'Active')->latest()->paginate(1);
        return view('company.blog' , [

            'posts'     => $singleblog,

        ]);
    }


    //Search Post Show

    //Blog Search By Search Box

    public function blogSearch(Request $request)
    {
        $search_data = $request -> search;

        $searchposts =    Bolg::where('name','LIKE','%'. $search_data . '%') -> oRwhere('logcontent','LIKE','%'.$search_data.'%')->latest()->get();

        return view('company.blog-search' , [

            'posts'    =>   $searchposts,

        ]);
    }







}
