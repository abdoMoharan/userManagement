@extends('admin.dashboard')
@section('titlePage','Profile')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Profile</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">

            @livewire('profile.info-profile')

            <!-- /.card-body -->
          </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Info user</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->

                    @livewire('profile.info-user')
                    <!-- /.card-body -->



                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  @livewire('profile.change-password-form')
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    <!-- /.row -->
</div>
@endsection
