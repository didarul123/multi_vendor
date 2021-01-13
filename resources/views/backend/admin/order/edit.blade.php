@extends('layouts.admin.app')

@section('content')




    <section class="content mt-5">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customer Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                @if($order->customer_id)
                <div class="card-body">
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control"  value='{{$order->customer->first_name." ".$order->customer->last_name}}' readonly="">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" value="{{$order->customer->email}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label >Phone</label>
                    <input type="text" class="form-control" value="{{$order->customer->phone}}" readonly="">
                  </div>
                </div>
                @else
                <div class="card-body">
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control"  value='{{$shop_owner->name}}' readonly="">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" value="{{$shop_owner->email}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label >Phone</label>
                    <input type="text" class="form-control" value="{{$shop_owner->phone}}" readonly="">
                  </div>
                </div>
                @endif
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->


          <div class="col-md-6">
            <!-- general form elements -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shipping Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin/update-shipping-address', [$order->id])}}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="shipping_address" class="form-control" id="" rows="2">{{$order->shipping_address ?? ''}}</textarea>
                  </div>
	                  	
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >City</label>
                        <input name="city" type="text" class="form-control" value="{{$order->city}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Post Code</label>
                        <input name="postcode" type="text" class="form-control" value="{{$order->postcode}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Country</label>
                        <input name="country" type="text" class="form-control" value="{{$order->country}}">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

          <div class="col-md-3">
            <!-- general form elements -->

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Order Summery</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin/update-order-summery', [$order->id])}}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Total QTY</label>
                    <input name="total_qty" type="text" class="form-control" value="{{$order->total_qty}}" readonly="">
                  </div>
                  @foreach($orderDetails as $details)
                    <div class="row">
                    <input type="hidden" name="product_id[]" value="{{$details->product->id}}">
                    <input type="hidden" name="qty[]" value="{{$details->qty}}">
                    </div>
                  @endforeach
                  <div class="form-group">
                    <label >Total Cost</label>
                    <input name="total_cost" type="text" class="form-control" value="{{$order->total_cost}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label>Delivery Method</label>
                    <input name="payment_method" type="text" class="form-control" value="{{$order->paymentmethod->name}}" readonly="">
                  </div>                  
                  <div class="form-group">
                    <label >Status</label>
                    <select name="status" id="" class="form-control">
                    	<option value="0" @php echo $order->status==0?"selected":""; @endphp>Pending</option>
                    	<option value="1" @php echo $order->status==1?"selected":""; @endphp>Processing</option>
                    	<option value="2" @php echo $order->status==2?"selected":""; @endphp>Approved</option>
                    	<option value="3" @php echo $order->status==3?"selected":""; @endphp>Canceled</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

          <!-- right column -->
          <div class="col-md-9">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Order Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    @foreach($orderDetails as $details)
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputName">Product Name</label>
                          <input type="text" id="inputName" class="form-control" name="product_name[]" placeholder="Product Name" value="{{$details->product->name}}">
                        </div>   
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="inputName">Qty</label>
                          <input type="text" id="inputName" class="form-control" name="quantity[]" placeholder="Product Color" value="{{$details->qty}}">
                        </div>   
                    </div>              

                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="inputName">Attribute</label>
                          <input type="text" id="inputName" class="form-control" name="attribute_value[]"  value="{{$details->attribute_value ?? ''}}">
                        </div>   
                    </div>  

                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="inputName">Product Owner</label>

                          <?php
                            $product_owner = App\Models\Vendor::where('id', $details->product_owner_id)->where('type', 'vendor')->first();
                          ?>
                          <br>

                          @if($details->product_owner_type == 'merchant')
                            <a href="{{URL::to('admin/merchant/'.$details->product_owner_id)}}">Profile - <i class="fas fa-user-circle"></i> </a>
                          @endif                          

                          @if($details->product_owner_type == 'vendor')
                            <a href="{{URL::to('admin/vendor/'.$details->product_owner_id)}}">Profile - <i class="fas fa-user-circle"></i> </a>
                          @endif

                          @if($details->product_owner_type == 'importer')
                            <a href="{{URL::to('admin/importer/'.$details->product_owner_id)}}">Profile - <i class="fas fa-user-circle"></i> </a>
                          @endif
                          
                        </div>   
                    </div> 
                    @endforeach  
                  </div>

                  </div>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->





@endsection