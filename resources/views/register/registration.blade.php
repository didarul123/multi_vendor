@extends('layouts.frontend.app')

@section('content')


<div class="container-flex">
    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="
        background-image: url('{{asset('public/frontend/img/register_back_img.jpg')}}');" id="register_left">

            <div>
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
            </div>




            <div class="row justify-content-center align-items-center" style="height: 60vh; margin-top:60px;">
                <a href="{{route('loginForm')}}" class="btn btn-info" role="button">Login</a>
                <h2 style="text-align: right; margin-left:460px;">Create Your Account</h2>
                <p style="text-align: right; font-size:15px; margin-right:10px; margin-left:50px; color:antiquewhite;">Create your dream website in just a few clicks with Jimdo's quick and easy ... Jimdo leverages the power of AI to deliver a fully personalized website, not an ... for every field, or connect your social media accounts and we'll take your photos and.</p>

                <header>
                    <!-- <button type="button" class="btn"><a href="#" style="width:50px; color:darkslateblue"><i class="fab fa-facebook-square"></i></a></button>
                    <button type="button" class="btn"><a href="#" style="width:50px; color:darkslateblue"><i class="fab fa-facebook-square"></i></a></button>



                         background-image: url("photo/background4.jpg");




                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a> -->

                </header>



            </div>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="register_logo">
            <img style="border-radius: 20px; " src="{{asset('public/frontend/img/logo.png')}}" alt="E-Shop" height="100px" width="100px" class="register_logo" alt="">
            <h5>New to "E-Shop"?? <span><br></span> Please create a new account.</h5>
            <form action="{{route('customer-registration')}}" method="post">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your First Name" id="name" name="first_name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Last Name" id="name" name="last_name">
                </div>

                <div class="form-group"  style="width: 350px">
                    <select name="gender" id="" class="form-control" style="position: relative;left: 198px;">
                        <option value="0" disabled="" selected="">Select Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="con_pwd" placeholder="Confirm password" name="password_confirmation">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="City" id="phone" name="city">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" placeholder="Post Code" name="post_code">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Country" id="phone" name="country">
                </div>

                <div class="form-group">
                    <textarea name="address" id="" class="form-control" placeholder="Your Address"></textarea>
                </div>

                <button type="submit" class="btn btn-default">Register Now</button>
            </form>

                            <h6 class="mb-5 text-center" style="font-weight: 900; ">
                                <a href="{{route('vendor-registration')}}" style="color: white">ARE YOU A VENDOR ??</a> || 
                                <a href="{{route('importer-registration')}}" style="color: white">ARE YOU AN IMPORTER ??</a>  ||
                                <a href="{{route('merchant-registration')}}" style="color: white">ARE YOU A MERCHANT ??</a>
                            </h6>
        </div>

    </div>


</div>























{{--
    <section class="quotation-section my-40">
        <div class="container-fluid">
            <h2 class="heading-1 py-4">REGISTRATION</h2>

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

 --}}


@endsection
