@extends('admin.dashboard')
@section('titlePage','All users')

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
                    <div class="col-md-9">
                        @include('admin.layouts.message')
                    </div>
                    <div class="col-md-3">
                        <a href="{{route('admin.users.create')}}" class="btn btn-success float-right">Create <i class="fas fa-plus"></i></a>
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
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Type</th>
                    <th width="60">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @forelse ($users as $key => $item)
                    <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->mobile}}</td>
                    <td><span  class="badge bg-success">{{$item->type}}</span></td>
                    <td class="d-flex justify-content-end">
                   @if ($item->id != 1)
                   @if ($item->status == 1 )
                   {{-- Status Active --}}
                   <a href="{{route('admin.users.update-status',$item->id)}}"
                    class="btn btn-neutral btn-sm"><i class="fas fa-star text-success"></i></a>
                   @else
                   {{-- Status Unactive --}}
                   <a href="{{route('admin.users.update-status',$item->id)}}"
                    class="btn btn-neutral btn-sm"><i class="far fa-star text-warning"></i></a>
                   @endif
                   @endif
                   <a href="{{route('admin.users.edit',$item->id)}}"
                    class="btn btn-neutral btn-sm" ><i class="fas fa-edit text-secondary"></i></a>

                    @if ($item->id != 1)
                    <a data-toggle="modal" data-target="#exampleModal{{$item->id}}"
                        class="btn btn-neutral btn-sm" ><i class="fas fa-trash-alt text-danger"></i></a>
                    @endif
                    @include('admin.pages.user.delete')
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
