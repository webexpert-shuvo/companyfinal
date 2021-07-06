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
                            <h4 class="card-title">All Category</h4> <br>
                            <a href="" class="btn btn-sm btn-success cate_add_btn">Add New Category</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="allcate">


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>

    {{-- Category Add Modal Start --}}

    <div id="category_add_modal" class="modal modal-fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add New Category</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="category_add_form">
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Category Name">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Category" class="btn btn-sm btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    {{-- Category Add Modal End --}}


        {{-- Category Edit Modal Start --}}

        <div id="category_edit_modal" class="modal modal-fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Add New Category</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="category_edit_form">
                            @csrf
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Category Name">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add Category" class="btn btn-sm btn-success">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        {{-- Category Add Modal End --}}


@endsection
