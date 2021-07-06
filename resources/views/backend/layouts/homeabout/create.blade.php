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
                            <h4 class="card-title">Add About Us</h4> <br>
                            <a href="{{ route('show.homeabout') }}" class="btn btn-sm btn-success">Home Abouts Us</a>
                        </div>
                        <div class="card-body">

                            @if (session('success'))
                                <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                            @endif

                            <form action="{{ route('homeabout.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="About Title" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <textarea name="shortcontent" id="" cols="30" rows="10" class="form-control" placeholder="Short Content"></textarea>                                </div>
                                <div class="form-group">
                                    <textarea name="logcontent" id="" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-sm btn-success" value="Add About Us Content">
                                </div>


                            </form>

                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>
@endsection
