@extends('layouts.frontend.app')

@section('content')







<div class="container main_login">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
            <h5 style="margin-left:190px; padding-top:25px">
                Welcome to E-Shop, Please login... </h2>
            </h5>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
            <p>
                New member? <a href="{{route('registration')}}">Register</a> here.
            </p>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-2 col-md-2">
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="login">
           
            <form action="{{route('customer-login')}}" method="post">
                @csrf

                <div class="form-group login">
                    <label for="email">Email or phone:</label>
                    <input type="text" class="form-control login" name="email" id="">
                </div>
                <div class="form-group login">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                
                <h6 class="mb-5 text-center" style="font-weight: 900">
                    <a href="{{route('VendorLoginForm')}}" style="color: #1696e7;">VENDOR LOGIN FORM | </a> 
                    <a href="{{route('ImporterLoginForm')}}">IMPORTER LOGIN FORM | </a> 
                    <a href="{{route('MerchantLoginForm')}}">MERCHANT LOGIN FORM | </a>
                </h6>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 justify-content-center">
            <div class="form-group">
                <button type="submit" class="btn btn-default" id="login_submit">Login</button>
            </div>

            </form>

            <small>or login with</small>
            <br>
            <div class="login_ggl">
                <a href="#" class="btn btn-info" role="button"><i class="fab fa-facebook-square"></i>Facebook </a>
            </div>

            <div class="login_ggl" id="google">
                <a href="#" class="btn btn-info" role="button"><i class="fab fa-google"></i> Google</a>
            </div>

            <div class="login_ggl" id="twiter">
                <a href="#" class="btn btn-info" role="button"><i class="fab fa-twitter"></i> Twitter</a>
            </div>


        </div>

        <div class="col-lg-2 col-md-2">
        </div>

    </div>
</div>







{{--
    <section class="quotation-section my-40">
        <div class="container-fluid">
            <h2 class="heading-1 py-4">CUSTOMER LOGIN FORM</h2>

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

                        @if(session()->has('notif'))
                           <div class="alert alert-success">
                               <strong style="font-size: 18px">{{session()->get('notif')}}</strong>
                           </div>
                        @endif

                        @if(session()->has('login_failed'))
                           <div class="alert alert-danger">
                               <strong style="font-size: 18px">{{session()->get('login_failed')}}</strong>
                           </div>
                        @endif

                        <form action="{{route('customer-login')}}" method="post">
                        	@csrf
                            <h4 class="mb-5 text-center" style="font-weight: 900"><a href="{{route('VendorLoginForm')}}">VENDOR LOGIN FORM | </a> <a href="{{route('ImporterLoginForm')}}">IMPORTER LOGIN FORM | </a> <a href="{{route('MerchantLoginForm')}}">MERCHANT LOGIN FORM | </a></h4>

                            <h2 class="mb-5 text-center"  style="color: #1696e7;">CUSTOMER LOGIN FORM</h2>
                            <div class="row">


                                <div class="col-12">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="Email" name="email">
                                </div>
                                <div class="col-12">
                                	<span style="color: red">Required *</span>
                                	<input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="Password"  name="password">
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="button button-transparent bg-theme border-0 py-3 px-5 mt-4 float-right" data-color="white">Login</button>
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


 --}}

@endsection
