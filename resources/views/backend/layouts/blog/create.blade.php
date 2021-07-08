@extends('backend.layouts.app')
@section('backend-content')

    @include('backend.layouts.header')
    @include('backend.layouts.menu')


    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user()-> name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Post</h4> <br>
                            <a href="{{ route('show.blog') }}" class="btn btn-sm btn-success">All Bolg Post</a>
                        </div>
                        <div class="card-body">

                            @if (session('success'))
                                <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                            @endif

                            <form action="{{ route('blog.store') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Post Title</label>
                                    <div class="col-lg-9">
                                        <input name="name" type="text" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Category</label>
                                    <div class="col-lg-9">

                                        <select class="selectdata form-control" name="categorys[]" multiple>

                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat -> id }}">{{  $cat -> name }}</option>
                                            @endforeach

                                          </select>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag</label>
                                    <div class="col-lg-9">

                                        @foreach ($tags as $tag)
                                            <label for="tag{{ $tag -> id }}">
                                                <input name="tags[]" value="{{ $tag -> id }}" type="checkbox" id="tag{{ $tag -> id }}">{{ $tag -> name }}<br>
                                            </label><br>
                                        @endforeach



                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Description</label>
                                    <div class="col-lg-9">
                                       <textarea name="logcontent" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Featured Image</label>
                                    <div class="col-lg-9">
                                        <input type="file" name="photo" >
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>
@endsection
