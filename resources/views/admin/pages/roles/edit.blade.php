@extends('admin.dashboard')
@section('titlePage', 'Edit Role')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Roles</li>
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
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-success float-right">Back <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        <form action="{{ route('admin.roles.update', $role->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name"
                                        name="name" value="{{ old('name', $role->name) }}">
                                    @error('name')
                                        <span class="text-danger error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!------------------------------------ End Name------------------------------------------->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right ml-1">Edit</button>
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary float-right">Back</a>
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
                                <h2>Role Pirmissions</h2>
                            </div>
                            <div class="col-md-9">
                                @if ($role->permissions)

                                    @foreach ($role->permissions as $role_permission)
                                        <a data-toggle="modal" data-target="#exampleModal{{ $role_permission->id }}"
                                            class="btn btn-danger btn-sm badge bg-danger">{{ $role_permission->name }}</a>
                                        @include('admin.pages.roles.delete_role_rerimissions',['role_id'=>$role->id])
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        <form action="{{ route('admin.roles.permissions', $role->id) }}" method="post">
                            @csrf

                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Pirmissions</label>
                                    <select name="permission" id="" class="form-control">
                                        <option value="">Select Pirmissions</option>
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
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
