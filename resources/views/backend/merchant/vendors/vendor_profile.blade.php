@extends('layouts.merchant.app')

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-center">{{$vendor->name ?? ''}} s'Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor Profile</li>
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
                       src="{{asset('public/backend/dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$vendor->name ?? ''}}</h3>

                <p class="text-muted text-center">Vendor</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Id</b> <a class="float-right"># {{$vendor->id ?? ''}}</a>
                  </li>                  
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$vendor->email ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{$vendor->phone ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Company</b> <a class="float-right">{{$vendor->company ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Total Products</b> <a class="float-right">{{$total_product}}</a>
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