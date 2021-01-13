@extends('layouts.vendor.app')

@section('content')





    <section class="content mt-5">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <!-- general form elements -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shipping Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('vendor/total-amount')}}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Full Name</label>
                        <input name="f_name" type="text" class="form-control" value="{{$shop_owner->name}}" required="" readonly="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Phone Number</label>
                        <input name="number" type="text" class="form-control" value="{{$shop_owner->phone}}" required="" readonly="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Company Name</label>
                        <input name="text" type="text" class="form-control" value="{{$shop_owner->company}}" required="" readonly="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="shipping_address" class="form-control" id="" rows="2" required=""></textarea>
                  </div>
	                  	
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >City</label>
                        <input name="city" type="text" class="form-control" value="" required="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Post Code</label>
                        <input name="postcode" type="text" class="form-control" value="" required="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Country</label>
                        <input name="country" type="text" class="form-control" value="" required="">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Next</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->



        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->








@endsection		