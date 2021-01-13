@extends('layouts.admin.app')

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-center">{{$importer->name ?? ''}} s'Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Importer Profile</li>
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

                <h3 class="profile-username text-center">{{$importer->name ?? ''}}</h3>

                <p class="text-muted text-center">Importer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Id</b> <a class="float-right"># {{$importer->id ?? ''}}</a>
                  </li>                  
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$importer->email ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{$importer->phone ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Company</b> <a class="float-right">{{$importer->company ?? ''}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Total Products</b> <a class="float-right">{{$total_products}}</a>
                  </li>
                  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Payment Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Bank Name</strong>
                <p class="text-muted">
                  {{$importer->bank_name ?? ''}}
                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Branch Name</strong>
                <p class="text-muted">
                  {{$importer->branch_name ?? ''}}
                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Account No</strong>
                <p class="text-muted">
                  {{$importer->account_no ?? ''}}
                </p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                <p class="text-muted">{{$importer->address ?? ''}}</p>
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