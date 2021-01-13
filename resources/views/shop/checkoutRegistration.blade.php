@extends('layouts.frontend.app')

@section('content')



    <section class="quotation-section my-40">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-4 d-flex align-content-center">
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
                        
                        <form action="{{route('customer-login')}}" method="post">
                        	@csrf

                            <h2 class="mb-5 text-center"  style="color: #1696e7;">CUSTOMER LOGIN</h2>
                            <div class="row">

                                <div class="col-12">
                                	<span style="color: red">Required *</span>
                                	<input type="email" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Email"  name="email">
                                </div>

                                <div class="col-12">
                                	<span style="color: red">Required *</span>
                                	<input type="password" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Password" name="password">
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="button button-transparent bg-theme border-0 py-3 px-5 mt-4 float-right" data-color="white">Submit</button>
                                </div>
                                <br>
                           		 <h5 class="mb-5 text-center mt-5" style="font-weight: 900"><a href="{{route('VendorLoginForm')}}">VENDOR LOGIN FORM | </a> <a href="{{route('ImporterLoginForm')}}">IMPORTER LOGIN FORM | </a> <a href="{{route('MerchantLoginForm')}}">MERCHANT LOGIN FORM | </a></h5>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- end of col -->




                <div class="col-lg-8 d-flex align-content-center">
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
                        
                        <form action="{{route('customer-registration')}}" method="post">
                        	@csrf
                            <h4 class="mb-5 text-center" style="font-weight: 900"><a href="{{route('vendor-registration')}}">ARE YOU A VENDOR ??</a> <a href="{{route('importer-registration')}}">ARE YOU AN IMPORTER ??</a> <a href="{{route('merchant-registration')}}">ARE YOU A MERCHANT ??</a></h4>

                            <h2 class="mb-5 text-center"  style="color: #1696e7;">CUSTOMER REGISTRATION</h2>
                            <div class="row">
                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="First Name" name="first_name">
                                </div>
                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="Last Name"  name="last_name">
                                </div>
                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                    <select class="form-control h-auto fz-small mb-20 py-3 px-4" name="gender">
                                        <option value="" disabled="" selected="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Phone Number" name="phone">
                                </div>

                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="email" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Email"  name="email">
                                </div>

                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="password" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Password" name="password">
                                </div>

                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="password" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Confirm Password" name="password_confirmation">
                                </div>

                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Address" name="address">
                                </div>

                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="City" name="city">
                                </div>

                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Post Code"  name="post_code">
                                </div>

                                <div class="col-6">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Country" name="country">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="button button-transparent bg-theme border-0 py-3 px-5 mt-4 float-right" data-color="white">Submit</button>
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