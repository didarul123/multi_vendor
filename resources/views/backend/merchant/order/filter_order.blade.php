@extends('layouts.merchant.app')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{route('merchant/filter-order')}}" method="get">
                  @csrf
                   <div class="row mb-5">
                      <div class="col-xl-2 col-md-2">
                          <label class="col-form-label"><b> From <i class="text-danger">*</i> </b></label>
                          <input type="date" class="form-control" name="from_date" value="{{$from_date ?? ''}}">
                      </div>
                      <div class="col-xl-2 col-md-2">
                          <label class="col-form-label"><b> TO <i class="text-danger">*</i> </b></label>
                          <input type="date" class="form-control" name="to_date" value="{{$to_date ?? ''}}">
                      </div>
                      <div class="col-xl-2 col-md-2">
                          <label class="col-form-label"><b> Method <i class="text-danger">*</i> </b></label>
                          <select class="form-control selectric" name="payment_method">
                              <option value="">----Select----</option>
                              @foreach($methods as $method)
                              <option value="{{$method->id}}" @php echo $method->id == $payment_method?'selected':'';@endphp>{{$method->name}}</option>
                              @endforeach
                          </select>
                      </div>                                         
                      <div class="col-xl-2 col-md-2">
                          <label class="col-form-label"><b>Status<i class="text-danger">*</i> </b></label>
                          <select class="form-control select2" name="status">
                              <option value="" selected="" disabled="">----Select----</option>
                              <option value="0" @php echo $status == 0?'selected':'';@endphp>Pending</option>
                              <option value="1" @php echo $status == 1?'selected':'';@endphp>Processing</option>
                              <option value="2" @php echo $status == 2?'selected':'';@endphp>Approved</option>
                              <option value="3" @php echo $status == 3?'selected':'';@endphp>Cancel</option>
                          </select>
                      </div> 
                      <div class="col-xl-2 col-md-2">
                          <label class="col-form-label"><p></p></label><br>
                          <input type="submit" class="btn btn-success" value="Filter">
                      </div> 

                  </div>
              </form>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Order By</th>
                  <th>Total Cost</th>
                  <th>Payment Method</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                      $i=1;
                      $total_qty=0;
                      $total_cost=0;
                   @endphp
            @foreach($orders as $order)
                  <?php

                    $orderTotal = App\Models\OrderDetails::where('order_id', $order->id)->where('product_owner_id', $user_id)->where('product_owner_type', $user_type)->sum('product_price');
                      $shop = App\Models\Shop::where('id', $order->shop_id)->first();

                      if ($shop->owner_type == 'vendor') {
                        $shop_owner = App\Models\Vendor::where('id', $shop->owner_id)->first();
                      }
                      if ($shop->owner_type == 'merchant') {
                        $shop_owner = App\Models\Merchant::where('id', $shop->owner_id)->first();
                      }
                      if ($shop->owner_type == 'importer') {
                        $shop_owner = App\Models\Importer::where('id', $shop->owner_id)->first();
                      }
                  ?>
                <tr>
                    <td>{{$i++}}</td>
                    @if($order->customer_id)
                    <td>{{$order->customer->first_name." ".$order->customer->last_name }}</td>
                    @else
                    <td>{{$shop_owner->name}}</td>
                    @endif
                    <td>{{$orderTotal}}</td>
                    <td>{{$order->paymentmethod->name}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        @php
                            if($order->status == 0){
                               echo  "<div class='badge badge-warning badge-shadow'>Pending</div>";
                             }
                             if($order->status == 1){
                               echo  "<div class='badge badge-info badge-shadow'>Processing</div>";
                             }
                             if($order->status == 2){
                               echo  "<div class='badge badge-success badge-shadow'>Approved</div>";
                             }
                             if($order->status == 3){
                               echo  "<div class='badge badge-danger badge-shadow'>Canceled</div>";
                             }
                        @endphp
                        
                    </td>
                    <td>
                      
                      <div class="row">
                        <a href="{{URL::to('merchant/order/'.$order->id)}}" title="View" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                            </button>
                        </a>                        

                        <a href="{{URL::to('merchant/order/'.$order->id.'/edit')}}" title="Edit" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                            </button>
                        </a>

                      </div>


                    </td>

                </tr>
            @endforeach
                 <tfoot>
                  <tr>
                    <th></th>
                    <th></th>

                    
                    <th></th>
                    <th></th>
                  </tr>
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

@endsection