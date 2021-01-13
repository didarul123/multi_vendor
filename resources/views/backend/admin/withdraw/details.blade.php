@extends('layouts.admin.app')

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 text-center">
            <h1 class="text-center">{{$withdraw->vendor->name ?? ''}} s'Withdraw Details </h1>
            @if($withdraw->status == 0)
            <a href="{{route('admin/active-withdraw',[$withdraw->id])}}"><button class="btn btn-info btn-sm text-white">Approve This Request</button></a>
            @endif

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Withdraw Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
          <div class="col-md-8">
              <!-- Profile Image -->
              <div class="card card-primary card-outline" style="margin-right: 35px;">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{asset('public/backend/dist/img/user4-128x128.jpg')}}"
                         alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{$withdraw->vendor->name ?? ''}}</h3>

                  <p class="text-muted text-center">Vendor</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Id</b> <a class="float-right"># {{$withdraw->vendor->id ?? ''}}</a>
                    </li>                  
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{$withdraw->vendor->email ?? ''}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <a class="float-right">{{$withdraw->vendor->phone ?? ''}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Company</b> <a class="float-right">{{$withdraw->vendor->company ?? ''}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Payment Method</b> <a class="float-right">{{$withdraw->paymentmethod->name ?? ''}}</a>
                    </li>                    

                    <li class="list-group-item">
                      <b>Amount</b> <a class="float-right">{{$withdraw->amount ?? ''}} BDT</a>
                    </li>                    
                    <li class="list-group-item">
                      <b>Date</b> <a class="float-right">{{$withdraw->created_at ?? ''}}</a>
                    </li>                    
                    <li class="list-group-item">
                      <b>Status</b> <a class="float-right">
                        @php
                            if($withdraw->status == 1){
                                    echo  "<div class='badge badge-success badge-shadow'>Approve</div>";
                                }else{
                                    echo  "<div class='badge badge-danger badge-shadow'>Pending</div>";
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

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content -->
  </div>




@endsection