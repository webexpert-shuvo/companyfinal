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
                            <h4 class="card-title">Add Slider</h4> <br>
                            <a href="{{ route('show.hero') }}" class="btn btn-sm btn-success">All Slider</a>
                        </div>
                        <div class="card-body">

                            @if (session('success'))
                                <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                            @endif



                            <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Slider Title" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <textarea name="logcontent" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <input name="readmore" type="text" class="form-control" placeholder="Read More Text" autocomplete="">
                                </div>
                                <div class="form-group">
                                    <input name="photo" type="file" >
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-sm btn-success" value="Add Slider">
                                </div>


                            </form>

                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>
@endsection
