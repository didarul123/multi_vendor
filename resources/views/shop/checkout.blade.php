@extends('layouts.frontend.app')

@section('content')




    <section class="quotation-section my-40">
        <div class="container-fluid">
            <h2 class="heading-1 py-4">SHIPPING ADDRESS</h2>

            <div class="row">
                <div class="col-lg-12 d-flex align-content-center">
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

		                @if(session()->has('shop_notif'))
		                   <div class="alert alert-danger">
		                       <strong style="font-size: 18px">{{session()->get('shop_notif')}}</strong>
		                   </div>     
		                @endif  


                        <form role="form" action="{{URL::to('total-amount')}}" method="post">
                        	@csrf

                            <h2 class="mb-5 text-center"  style="color: #1696e7;">SHIPPING ADDRESS</h2>
                            <div class="row">


                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="Full Name" name="f_name" required="">
                                </div>
                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="Phone Number"  name="number" required="">
                                </div>


                                <div class="col-12">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="Address"  name="shipping_address" required="">
                                </div>
                                <div class="col-4">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="City" name="city" required="" >
                                </div>
                                <div class="col-4">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="Post Code"  name="postcode" required="">
                                </div>
                                <div class="col-4">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="Country"  name="country" required="">
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="button button-transparent bg-theme border-0 py-3 px-5 mt-4 float-right" data-color="white">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container fluid -->
    </section>





@endsection