<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolg extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user()
    {
       return $this -> belongsTo('App\Models\User');
    }


    public function category()
    {
       return $this -> belongsToMany('App\Models\Category');
    }

    public function tag()
    {
       return $this -> belongsToMany('App\Models\Tag');
    }

    function image()
    {
        return $this -> morphOne(Image::class, 'imageable');
    }





}
