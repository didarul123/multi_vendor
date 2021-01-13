@extends('layouts.importer.app')

@section('content')



    <section class="content mt-5">
      <div class="container-fluid">
        <div class="row">

          <!--/.col (left) -->

          <div class="col-md-6 offset-1">
            <!-- general form elements -->
	            @if ($errors->any())
	                <div class="alert alert-danger">
	                    <ul>
	                        @foreach ($errors->all() as $error)
	                            <li>{{ $error }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
			    @if(session()->has('notif'))
			       <div class="alert alert-success">
			           <strong>{{session()->get('notif')}}</strong>
			       </div>     
			    @endif
			    @if(session()->has('empty_notif'))
			       <div class="alert alert-danger">
			           <strong>{{session()->get('empty_notif')}}</strong>
			       </div>     
			    @endif

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Total Amount</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('importer/submit-order')}}" method="post">
              	@csrf
                <div class="card-body">

                	<input type="hidden" name="f_name" value="{{$f_name}}">
                	<input type="hidden" name="l_name" value="{{$l_name}}">
                	<input type="hidden" name="number" value="{{$number}}">
                	<input type="hidden" name="shipping_address" value="{{$shipping_address}}">
                	<input type="hidden" name="city" value="{{$city}}">
                	<input type="hidden" name="postcode" value="{{$postcode}}">
                	<input type="hidden" name="country" value="{{$country}}">

                	<input type="hidden" name="shop_id" value="{{$shop->id}}">


                  <div class="form-group">
                    <label>Amount</label>
                    <?php
                    	$total = Cart::total();
                    ?>
                    <input type="text" class="form-control" name="total_cost" value="{{$total}}" readonly="">

                  </div>

                  <div class="form-group">

                    <label>Payment Method</label>
                    <select name="payment_method" id="" class="form-control" onchange="PaymentHandaler()">
                    	<option value="" selected="" disabled="">Select payment method</option>
                    	@foreach($paymentMethods as $paymentMethod)
                    	<option value="{{$paymentMethod->id}}">{{$paymentMethod->name}}</option>
                    	@endforeach
                    </select>
                  </div>

	                  <div class="form-group" style="display: none" id="transaction_id">
	                    <label>Transaction ID</label>
	                    <input type="number" class="form-control" name="transaction_id" value="" required="">
	                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit Order</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->



          <div class="col-md-4">
            <!-- general form elements -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Admin Account Details</h3>
              </div>

              	<div class="card-body">
                  <div class="form-group" id="bkash">
                    <label>Bkash Account Number</label>
                    <input type="number" class="form-control" name="bkash" value="{{$admin->bkash}}" readonly="">
                  </div> 

                  <div class="form-group" id="nagad">
                    <label>Nagad Account Number</label>
                    <input type="number" class="form-control" name="nagad" value="{{$admin->nagad}}" readonly="">
                  </div>   

                  <div class="form-group" id="bank">
                    <label>Bank Account Details</label>
                    <input type="text" class="form-control" name="bank_name" value="{{$admin->bank_name}}" readonly=""> <br>
                    <input type="text" class="form-control" name="bank_branch" value="{{$admin->bank_branch}}" readonly=""><br>
                    <input type="text" class="form-control" name="bank_account" value="{{$admin->bank_account}}" readonly=""><br>
                  </div>                  
                </div>
              </div>

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<script>
    $( document ).ready(function() {
	    $.ajaxSetup({
		    headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
	    });
    });

    function PaymentHandaler(){
    	$('#transaction_id').show();
    	$('#account_number').show();
    	console.log(1);
    }

</script>



@endsection		