@extends('layouts.frontend.app')

@section('content')



    <section class="quotation-section my-40">
        <div class="container-fluid">

            <div class="row">
                        
                <div class="col-lg-7 d-flex align-content-center">
                    <div class="bg-white h-100 px-40 py-50">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="font-size: 18px">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('notif'))
                           <div class="alert alert-success">
                               <strong style="font-size: 18px">{{session()->get('notif')}}</strong>
                           </div>     
                        @endif  
                        
                        <form action="{{route('submit-order')}}" method="post">
                        	@csrf

		                	<input type="hidden" name="f_name" value="{{$f_name}}">
		                	<input type="hidden" name="l_name" value="{{$l_name}}">
		                	<input type="hidden" name="number" value="{{$number}}">
		                	<input type="hidden" name="shipping_address" value="{{$shipping_address}}">
		                	<input type="hidden" name="city" value="{{$city}}">
		                	<input type="hidden" name="postcode" value="{{$postcode}}">
		                	<input type="hidden" name="country" value="{{$country}}">

		                	<input type="hidden" name="shop_id" value="{{$shop->id ?? ''}}">

                            <h2 class="mb-5 text-center"  style="color: #1696e7;">TOTAL AMOUNT</h2>
                            <div class="row">

                                <div class="col-12">
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Amount"  name="total_cost" value="{{$total}}" readonly="">
                                </div>

                                <div class="col-12">

                                    <select class="form-control h-auto fz-small mb-20 py-3 px-4" name="payment_method" onchange="PaymentHandaler()">
                                        <option value="" disabled="" selected="">Select payment method</option>
				                    	@foreach($paymentMethods as $paymentMethod)
				                    	<option value="{{$paymentMethod->id}}">{{$paymentMethod->name}}</option>
				                    	@endforeach
                                    </select>

                                </div>

                                <div class="col-12" style="display: none" id="transaction_id">
                                	<input type="number" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Transaction ID" name="transaction_id" value="" required="">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="button button-transparent bg-theme border-0 py-3 px-5 mt-4 float-right" data-color="white">Submit Order</button>
                                </div>
                                <br>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- end of col -->




                <div class="col-lg-5 d-flex align-content-center">
                    <div class="bg-white h-100 px-40 py-50">

                            <h2 class="mb-5 text-center"  style="color: #1696e7;">ADMIN ACCOUNT DETAILS</h2>
                            <div class="row">
					            <div class="card card-primary w-100" style="font-style: 15px">
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
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container fluid -->
    </section>

<script>
	
    function PaymentHandaler(){
    	$('#transaction_id').show();
    	$('#account_number').show();
    	console.log(1);
    }


</script>



@endsection