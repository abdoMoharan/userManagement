@extends('admin.dashboard')
@section('titlePage','Dahboard')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">

        @can('dashboard')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$users}}</h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                  <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{route('admin.users.index')}}" class="small-box-footer">More info <i class="fas fa-users"></i></a>
            </div>
          </div>
        @endcan
        <!-- ./col -->


      </div>
    <!-- /.row -->
</div>
@endsection
