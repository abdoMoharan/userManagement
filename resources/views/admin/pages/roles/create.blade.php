@extends('admin.dashboard')
@section('titlePage', 'Create Role')

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
                        <form action="{{ route('admin.roles.store') }}" method="post" >
                            @csrf
                            <div class="card-body">
                                <!------------------------------------Start Name------------------------------------------->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name"
                                        name="name" value="{{ old('name') }}">
                                        @error('name') <span class="text-danger error">{{ $message }}</span> @enderror
                                    </div>
                                <!------------------------------------ End Name------------------------------------------->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right ml-1">Add</button>
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary float-right">Back</a>
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
