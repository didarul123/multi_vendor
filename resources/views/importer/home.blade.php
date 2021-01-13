@extends('layouts.importer.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Importer Dashboard') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <h3>{{$products}}</h3>

                <p>Total Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


        </div>


          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Vendor" role="tab" aria-controls="Vendor" aria-selected="true">Vendor</a>
            </li>

         

          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Vendor" role="tabpanel" aria-labelledby="home-tab">
              
                
                <section class="content">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Manage Vendor</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Sl.</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Company</th>
                              <th>Address</th>
                              <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                        @php $i=1 @endphp
                        @foreach($vendors as $vendor)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$vendor->name}}</td>
                                <td>{{$vendor->email}}</td>
                                <td>{{$vendor->phone}}</td>
                                <td>{{$vendor->company}}</td>
                                <td>{{$vendor->address}}</td>
                              <td>
                                  @php
                                      if($vendor->status == 1){
                                              echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                          }else{
                                              echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                          }
                                  @endphp
                                  
                              </td>
                            </tr>
                    @endforeach
              
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </section>


            </div>

          </div>


        </div>


      </div>
    </section>

@endsection

