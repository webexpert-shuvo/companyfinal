<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Show Category Page

    public function Index()
    {

        return view('backend.layouts.blogcategory.index');

    }

    //Category Create
    public function categoryStore(Request $request)
    {
        Category::create([
            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),
        ]);

    }

    //Category All

    public function categoryAll()
    {

        $allcate =  Category::latest()->get();


        $content = '';
        $i = 1;
        foreach ($allcate as $cate) {

            //Status check
            if ($cate -> status ==  'Active') {
                $status = '<span class="badge badge-success">Active</span>';
            }else{
                $status = '<span class="badge badge-danger">Inactive</span>';
            }

            //Status Update

            if ($cate -> status ==  'Active') {
                $status_update = '<a href="" cate_up_id="'.$cate -> id.'" class="btn btn-danger btn-sm cat_up_btn"><i class="fa fa-eye"></i></a>';
            }else{

                $status_update = '<a href="" cate_up_id="'.$cate -> id.'" class="btn btn-danger btn-sm cat_up_btn"><i class="fa fa-eye-slash"></i></a>';

            }

            $content .=  '<tr>';
            $content .=  '<td>'. $i ; $i ++.'</td>';
            $content .=  '<td>'.$cate -> name.'</td>';
            $content .=  '<td>'.$cate -> slug.'</td>';
            $content .=  '<td>'.$cate -> created_at -> diffForHumans().'</td>';
            $content .=  '<td>'.$status.'</td>';
            $content .=  '<td> '.$status_update.' <a href=" " cate_edit_id="'.$cate -> id.'" class="btn btn-sm btn-info cate_edit_btn"><i class="fa fa-edit"></i></a>  <a  cate_delete_id="'.$cate ->id.'" href=" " class="btn btn-sm btn-danger cate_delete_btn"><i class="fa fa-trash"></i></a> </td>';
            $content .=  '</tr>';
        }

        echo $content;
    }

    //Category update

    public function categoryUpdate(Request $request , $id)
    {
        $cate_update_id = Category::find($id);

        if ($cate_update_id -> status == 'Active') {
            $cate_update_id -> status =  'Inactive';
            $cate_update_id -> update();
        }else {
                $cate_update_id -> status =  'Active';
                $cate_update_id -> update();
        }
    }

    //Category edit
    public function categoryEdit(Request $request, $id)
    {

        $cate_edit_id = Category::find($id);

        return [

                'name'      => $cate_edit_id  -> name,

        ];


    }

    //category Update

    public function categoryNewupdate(Request $request , $id)
    {
        $cate_new_update = Category::find($id);

        $cate_new_update -> name = $request ->  name;
        $cate_new_update -> slug = Str::slug($request ->  name);
        $cate_new_update -> update();


    }




    //Category Deleted

    public function categoryDelete($id)
    {
        $cate_delete_id =  Category::find($id);
        $cate_delete_id -> delete();
        $cate_delete_id -> update();

    }







}
