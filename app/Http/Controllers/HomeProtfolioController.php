<?php

namespace App\Http\Controllers;

use App\Models\HomeProtfolio;
use Illuminate\Http\Request;

class HomeProtfolioController extends Controller
{
    //Show Protfolio Page

    public function Index()
    {
        $allprotfoliodata  = HomeProtfolio::latest()->get();
        return view('backend.layouts.homeprotfolio.index',[

                'alldata'       => $allprotfoliodata,

        ]);
    }

    //Show Protfolio Page

    public function homeProtfolioAdd()
    {
        return view('backend.layouts.homeprotfolio.create');
    }



    //Protfolio Store

    public function homeProtfolioStore(Request $request)
    {

        $protfoliodata =    HomeProtfolio::create([

            'name'      => $request -> name,
        ]);

        //Gallery Upload

        $fileuname = [];
        if ($request -> hasFile('photo')) {
            $fileget = $request -> file('photo');

            foreach ($fileget as $gallery) {
                $fileuname = md5(time().rand()).'.'.$gallery->getClientOriginalExtension();
                $gallery -> move(public_path('backend/assets/img/gallery') ,$fileuname );
                $protfoliodata -> image() ->create([

                    'imagename'   => $fileuname,

                ]);


            }



        }


        return redirect()->back()->with('success' , 'Protfolio Add Successful');


    }







}
