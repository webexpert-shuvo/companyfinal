<?php

namespace App\Http\Controllers;

use App\Models\Homeaboutus;
use Illuminate\Http\Request;

class HomeAboutusController extends Controller
{
    //Show Home Abouts Us Controller

    public function Index()
    {
        $aboutusdata  = Homeaboutus::latest()->get();
        return view('backend.layouts.homeabout.index' , [

            'alldata'   => $aboutusdata,

        ]);
    }

    public function homeaboutusAdd()
    {
        return view('backend.layouts.homeabout.create');
    }


    //Store Home About us data
    public function homeaboutusStore(Request $request)
    {

        Homeaboutus::create([
            'name'          => $request -> name,
            'shortcontent'  => $request -> shortcontent,
            'logcontent'   => $request -> logcontent,
        ]);

        return redirect()->back()-> with('success' , 'About Us Updated Done');


    }


}
