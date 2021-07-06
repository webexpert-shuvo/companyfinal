<?php

namespace App\Http\Controllers;

use App\Models\HomeServices;
use Illuminate\Http\Request;

class HomeServicesController extends Controller
{
    //Show Services Page

    public function Index()
    {
        $homeservicesdata = HomeServices::latest()->get();
        return view('backend.layouts.homeservices.index' , [
            'alldata'   => $homeservicesdata,
        ]);
    }

    //Show create page
    public function homeServicesAdd()
    {
        return view('backend.layouts.homeservices.create');
    }

    //Home Services Store

    public function homeServicesStore(Request $request)
    {
        HomeServices::create([
            'name'          => $request -> name,
            'iconname'      => $request -> iconname,
            'shortcontent'  => $request -> shortcontent,
        ]);

        return redirect()->back()->with('success' , 'New Services Add Done');

    }



}
