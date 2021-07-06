<?php

namespace App\Http\Controllers;

use App\Models\HomeClient;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
    //client page Show

    public function Index()
    {
        $homeclientsdata = HomeClient::latest()->get();
        return view('backend.layouts.homeclient.index' , [

                'alldata'   => $homeclientsdata,

        ]);
    }


    //Home Add
    public function homeClientAdd()
    {
       return view('backend.layouts.homeclient.create');
    }

    //home Create
    public function homeClientStore(Request $request)
    {

        $clientData =  HomeClient::create([

            'name'      => $request -> name,

        ]);

        //Client Upload
        $fileuname = '';
        if ($request -> hasFile('photo')) {
           $fileget = $request -> file('photo');
           $fileuname =  md5(time().rand()).'.'.$fileget -> getClientOriginalExtension();
           $fileget -> move(public_path('backend/assets/img/client') , $fileuname );

           $clientData -> image()->create([

                'imagename'     => $fileuname,

           ]);


        }


        return redirect()->back()->with('success' , 'Client Added Successful');





    }






}
