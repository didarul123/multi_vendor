@extends('layouts.vendor.app')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Your Dashboard') }}</h1>
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
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                    $date = date('Y-m-d');
                    $today_sells = App\Models\Order::where('shop_id', $shop->id)->select('total_cost', 'total_qty')->where('status', 2)->where( 'created_at', 'LIKE', '%' . $date .'%')->get();
                    $sell = 0;
                ?>
                  @foreach($today_sells as $data)
                    <?php 
                      $sell = $sell+($data->total_cost*$data->total_qty);
                      ?>
                  @endforeach

                <h3>{{$sell}}</h3>

                <p>Total Sell</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Today Sell <i class="fas fa-dollar-sign"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                    $date = date('Y-m-d');
                    $today_orders = App\Models\Order::where('shop_id', $shop->id)->where( 'created_at', 'LIKE', '%' . $date .'%')->count();
                ?>
                <h3>{{$today_orders}}</h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Today Order <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                    $total_orders = App\Models\Order::where('shop_id', $shop->id)->count();
                ?>
                <h3>{{$total_orders}}</h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                    $success_orders = App\Models\Order::where('shop_id', $shop->id)->where('status', 2)->count();
                ?>
                <h3>{{$success_orders}}</h3>

                <p>Successful Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                    $pending_orders = App\Models\Order::where('shop_id', $shop->id)->where('status', 0)->count();
                ?>
                <h3>{{$pending_orders}}</h3>

                <p>Pending Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                    $processing_orders = App\Models\Order::where('shop_id', $shop->id)->where('status', 1)->count();
                ?>
                <h3>{{$processing_orders}}</h3>

                <p>Processing Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                    $cancel_orders = App\Models\Order::where('shop_id', $shop->id)->where('status', 3)->count();
                ?>
                <h3>{{$cancel_orders}}</h3>

                <p>Cancel Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


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





      </div>
    </section>


@endsection
