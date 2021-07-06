<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //Show Tag Page

    public function Index()
    {
        return view('backend.layouts.blogtag.index');
    }

    //Tag Store

    public function tagStore(Request $request)
    {
        Tag::create([
            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),
        ]);
    }

    // All Tags

    public function tagAll()
    {
        $tagsdata = Tag::latest()->get();

        $content = '';
        $i = 1;

        foreach ($tagsdata as $tags) {

            //Status

            if ( $tags -> status == 'Active') {
                $status_tag = '<span class="badge badge-success">Active</span>';
            }else{
                $status_tag = '<span class="badge badge-danger">Inactive</span>';
            }

            //Action

            if ($tags -> status == 'Active') {
                $tag_status_btn = '<a   tag_status_id="'.$tags -> id.'" href="" class="btn btn-sm btn-success tag_status_btn"> <i class="fa fa-eye"></i></a>';
            }else{

                $tag_status_btn = '<a tag_status_id="'.$tags -> id.'" href="" class="btn btn-sm btn-dark tag_status_btn"> <i class="fa fa-eye-slash"></i></a>';

            }


            $content .= '<tr>';
            $content .= '<td>'. $i ; $i ++ .'</td>';
            $content .= '<td>'.$tags -> name.'</td>';
            $content .= '<td>'.$tags -> slug.'</td>';
            $content .= '<td>'.$tags -> created_at -> diffForHumans().'</td>';
            $content .= '<td>'.$status_tag.'</td>';
            $content .= '<td>'.$tag_status_btn.' <a href="" tag_edit_id="'.$tags -> id.'" class="btn btn-sm btn-info tag_edit_btn"><i class="fa fa-edit"></i> </a>  <a href="" tag_trash_id="'.$tags -> id.'" class="btn btn-sm btn-danger tag_trash_btn"><i class="fa fa-trash"></i> </a> </td>';
            $content .= '</tr>';
        }

        echo   $content;


    }

    //tag Status update

    public function tagStatusUpdate(Request $request , $id)
    {

        $tag_status_id = Tag::find($id);

        if ($tag_status_id -> status == 'Active') {
            $tag_status_id -> status = 'Inactive';
            $tag_status_id -> update();
        }else{
            $tag_status_id -> status = 'Active';
            $tag_status_id -> update();
        }
    }


    //Tag Edit Data
    public function tagEditData(Request $request , $id)
    {
        $tag_edit_id = Tag::find($id);

        return [

                'name'      => $tag_edit_id  -> name,

        ];

    }

    //Tag Update
    public function tagUpdate(Request $request , $id)
    {
       $tag_update_id =  Tag::find($id);

       $tag_update_id -> name =  $request -> name;
       $tag_update_id -> slug =  Str::slug($request -> name);
       $tag_update_id -> update();

    }

    //Tag Delete

    public function tagDelete(Request $request , $id)
    {
        $tag_delete_id  =  Tag::find($id);
        $tag_delete_id -> delete();
        $tag_delete_id -> update();

    }





}
