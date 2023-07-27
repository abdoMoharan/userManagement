@extends('admin.dashboard')
@section('titlePage', 'Create user')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">users</li>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                @include('admin.layouts.message')
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-success float-right">Back <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        <form action="{{ route('admin.users.store') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name"
                                        name="name" value="{{ old('name') }}">
                                </div>
                                <!------------------------------------ End Name------------------------------------------->
                                <!------------------------------------Start Email------------------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="email" value="{{ old('email') }}">
                                </div>
                                <!------------------------------------End Email------------------------------------------->

                                <!------------------------------------Start Password------------------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password" name="password">
                                </div>
                                <!------------------------------------End Password------------------------------------------->
                                <!------------------------------------Start Mobile------------------------------------------->
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="number" class="form-control" id="mobile" placeholder="mobile"
                                        name="mobile" value="{{ old('mobile') }}">
                                </div>
                                <!------------------------------------End Mobile------------------------------------------->
                                <!------------------------------------Start Mobile------------------------------------------->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image"
                                        name="image">
                                </div>
                                <!------------------------------------End Mobile------------------------------------------->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" value="admin"
                                                @checked(old('type') == 'admin')>
                                            <label class="form-check-label" for="exampleCheck1">Admin</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" value="user"
                                                @checked(old('type') == 'user')>
                                            <label class="form-check-label" for="exampleCheck1">User</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="1"
                                                @checked(old('status') == 1)>
                                            <label class="form-check-label" for="exampleCheck1">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="0"
                                                @checked(old('status') == 0)>
                                            <label class="form-check-label" for="exampleCheck1">Unactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right ml-1">Add</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-primary float-right">Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
