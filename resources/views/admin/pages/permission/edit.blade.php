@extends('admin.dashboard')
@section('titlePage', 'Edit Permission')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Permissions</li>
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
                                <a href="{{ route('admin.permissions.index') }}" class="btn btn-success float-right">Back <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        <form action="{{ route('admin.permissions.update',$permission->id) }}" method="post" >
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name"
                                        name="name" value="{{ old('name',$permission->name) }}">
                                        @error('name') <span class="text-danger error">{{ $message }}</span> @enderror
                                    </div>
                                <!------------------------------------ End Name------------------------------------------->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right ml-1">Edit</button>
                                <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary float-right">Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-2">
                                <h2>Pirmissions Roles </h2>
                            </div>
                            <div class="col-md-9">
                                @if ($permission->roles)

                                    @foreach ($permission->roles as $permission_role)
                                        <a data-toggle="modal" data-target="#exampleModal{{ $permission_role->id }}"
                                            class="btn btn-danger btn-sm badge bg-danger">{{ $permission_role->name }}</a>
                                        @include('admin.pages.permission.delete_role_rerimissions',['permission_id'=>$permission->id])
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        <form action="{{ route('admin.permissions.roles', $permission->id) }}" method="post">
                            @csrf

                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Role</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="">Select Roles</option>
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
    </div>
@endsection
