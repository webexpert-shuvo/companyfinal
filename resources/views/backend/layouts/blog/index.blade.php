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
                            <h4 class="card-title">All Posts</h4> <br>
                            <a href="{{ route('blog.create') }}" class="btn btn-sm btn-success">Add New Post</a>
                            @if (session('success'))
                                <p class="alert alert-success">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
                            @endif

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($alldata as $data)
                                            <tr>
                                                <td>{{ $loop -> index + 1 }}</td>
                                                <td>{{ $data ->  user -> name }}</td>
                                                <td>{{ $data -> name }}</td>
                                                <td>
                                                    <img src="{{ URL::to('') }}/backend/assets/img/post/{{ $data -> image -> imagename  }}" alt=""  style="widows: 100px;height:100px;"  >
                                                </td>
                                                <td>{{ $data -> created_at -> diffforHumans()}}</td>
                                                <td><a href="" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>
@endsection
