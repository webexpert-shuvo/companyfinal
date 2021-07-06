<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HomeHeroController extends Controller
{
    //Show backened Hero Slider

    public function Index()
    {
        $allherodata =  Hero::latest()->get();
        return view('backend.layouts.hero.index' , [

            'alldata'       => $allherodata,

        ]);
    }

    //Show Create Page
    public function heroAdd()
    {
        return view('backend.layouts.hero.create');
    }

    //Hero Store

    public function heroStore(Request $request)
    {

        $herodata =    Hero::create([
            'name'              =>  $request -> name,
            'content'           =>  $request -> logcontent,
            'readmoretext'      =>  $request -> readmore,
        ]);


        //Slider Image Upload
        $fileuname = '';
        if ($request -> hasFile('photo')) {
            $fileget = $request -> file('photo');
            $fileuname =  md5(time().rand()).'.'.$fileget  ->getClientOriginalExtension();
            $fileget -> move(public_path('backend/assets/img/slider'), $fileuname);

            $herodata -> image()->create([

                'imagename'     => $fileuname,

            ]);

        }

        return redirect()->back()->with('success'  , 'Slider Insert Successfull');

    }


    //Slider Delete

    public function heroDelete(Request $request , $id)
    {
        $slider_delete_id  = Hero::find($id);
        $slider_delete_id  -> delete();
        $slider_delete_id  -> update();

        return redirect()->back()->with('success'  , 'Slider Deleted Successfull');
    }


}
