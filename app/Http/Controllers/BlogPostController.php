<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Bolg;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{

    //Show BLog  Page
    public function Index()
    {
        $allbolgdata = Bolg::where('status', 'Active')->latest()->get();
        return view('backend.layouts.blog.index' , [

            'alldata'       => $allbolgdata,

        ]);
    }


    //Blog Create
    public function blogCreate()
    {
        $tagalldata = Tag::where('status' ,'Active' )->latest()->get();
        $catealldata = Category::where('status' ,'Active' )->latest()->get();
        return view('backend.layouts.blog.create' , [

            'tags'      => $tagalldata,
            'cats'      => $catealldata,

        ]);
    }

    //Blog Store
    public function blogStore(Request $request)
    {
        $postdata =  Bolg::create([
                'user_id'       => Auth::user()->id,
                'name'          => $request -> name,
                'slug'          => Str::slug($request -> name),
                'logcontent'    => $request -> logcontent,
        ]);

        $postdata -> category()->attach($request -> categorys);
        $postdata -> tag()->attach($request -> tags);

        $fileuname = ' ';
        if($request -> hasFile('photo')){
            $getfile =  $request -> file('photo');
            $fileuname =  md5(time().rand()).'.'. $getfile -> getClientOriginalExtension();
            $getfile -> move(public_path('backend/assets/img/post'), $fileuname );

            $postdata -> image()->create([

                'imagename'     =>  $fileuname,

            ]);

        }

        return redirect()->back()->with('success' , 'Post Insert Done');
    }


}
