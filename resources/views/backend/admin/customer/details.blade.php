@extends('layouts.admin.app')

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-center">{{$customer->first_name." ".$customer->last_name}} s'Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('public/backend/dist/img/avatar5.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$customer->first_name." ".$customer->last_name}}</h3>

                <p class="text-muted text-center">Customer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Id</b> <a class="float-right"># {{$customer->id ?? ''}}</a>
                  </li>                  
                  <li class="list-group-item">
                    <b>First Name</b> <a class="float-right">{{$customer->first_name ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Last Name</b> <a class="float-right">{{$customer->last_name ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$customer->email ?? ''}}</a>
                  </li>                  
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{$customer->phone ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">{{$customer->address ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Post Code</b> <a class="float-right">{{$customer->post_code ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>City</b> <a class="float-right">{{$customer->city ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Country</b> <a class="float-right">{{$customer->country ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right">
                      @php
                          if($customer->status == 1){
                                  echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                              }else{
                                  echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                              }
                      @endphp
                    </a>
                  </li>

                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content -->
  </div>




@endsection