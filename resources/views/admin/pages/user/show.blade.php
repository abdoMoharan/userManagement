@extends('admin.dashboard')
@section('titlePage', 'Edit user')

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
                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name"
                                        name="name" value="{{ old('name', $user->name) }}" disabled>
                                </div>
                                <!------------------------------------ End Name------------------------------------------->
                                <!------------------------------------Start Email------------------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="email" value="{{ old('email', $user->email) }}" disabled>
                                </div>
                                <!------------------------------------End Email------------------------------------------->
                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        {{-- Role --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-2">
                                <h2>Role </h2>
                            </div>
                            <div class="col-md-9">
                                @if ($user->roles)

                                    @foreach ($user->roles as $user_role)
                                        <a data-toggle="modal" data-target="#exampleModal{{ $user_role->id }}"
                                            class="btn btn-danger btn-sm badge bg-danger">{{ $user_role->name }}</a>
                                        @include('admin.pages.user.delete_role',['user_id'=>$user->id])
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        <form action="{{ route('admin.users.roles', $user->id) }}" method="post">
                            @csrf

                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Roles</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="">Select role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <!------------------------------------ End Name------------------------------------------->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right ml-1">Assign</button>

                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        {{-- Role --}}
        {{-- Piremissions --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-2">
                                <h2> Pirmissions</h2>
                            </div>
                            <div class="col-md-9">
                                @if ($user->permissions)

                                    @foreach ($user->permissions as $user_pirmission)
                                        <a data-toggle="modal" data-target="#exampleModal{{ $user_pirmission->id }}"
                                            class="btn btn-danger btn-sm badge bg-danger">{{ $user_pirmission->name }}</a>
                                        @include('admin.pages.user.delete_permission',['user_id'=>$user->id])
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        <form action="{{ route('admin.users.permissions', $user->id) }}" method="post">
                            @csrf

                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Pirmissions</label>
                                    <select name="permission" id="" class="form-control">
                                        <option value="">Select Pirmissions</option>
                                        @foreach ($permissions as $pirmission)
                                            <option value="{{ $pirmission->name }}">{{ $pirmission->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <!------------------------------------ End Name------------------------------------------->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right ml-1">Assign</button>

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
