@extends('admin.dashboard')
@section('titlePage','All Pirmission')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Pirmission</li>
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-md-9">
                        @include('admin.layouts.message')
                    </div>
                    <div class="col-md-3">
                        <a href="{{route('admin.permissions.create')}}" class="btn btn-success float-right">Create <i class="fas fa-plus"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>

                    @forelse ($permissions as $key => $item)
                    <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>


                   <a href="{{route('admin.permissions.edit',$item->id)}}"
                    class="btn btn-neutral btn-sm" ><i class="fas fa-edit text-secondary"></i></a>


                    <a data-toggle="modal" data-target="#exampleModal{{$item->id}}"
                        class="btn btn-neutral btn-sm" ><i class="fas fa-trash-alt text-danger"></i></a>

                    @include('admin.pages.permission.delete')
                    </td>
                    </tr>
                    @empty
                    <td colspan="6"><span class="text-danger">Not data </span></td>
                    @endforelse




                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>
@endsection
