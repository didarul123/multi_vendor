@extends('layouts.frontend.app')

@section('content')


    <section class="quotation-section my-40">
        <div class="container-fluid">
            <h2 class="heading-1 py-4">MERCHANT LOGIN FORM</h2>

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

                        <form action="{{route('merchant-login')}}" method="post">
                        	@csrf
                            <h4 class="mb-5 text-center" style="font-weight: 900"><a href="{{route('VendorLoginForm')}}" >VENDOR LOGIN FORM | </a> <a href="{{route('ImporterLoginForm')}}">IMPORTER LOGIN FORM | </a> <a href="{{route('MerchantLoginForm')}}" style="color: #1696e7;">MERCHANT LOGIN FORM | </a></h4>

                            <h2 class="mb-5 text-center"  style="color: #1696e7;">MERCHANT LOGIN FORM</h2>
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




@endsection