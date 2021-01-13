@extends('layouts.frontend.app')

@section('content')



    <section class="wrapper">
        <!-- banner section -->




        <!--new arrival start-->
    <div class="new-area pt-4 mx-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="new-arrival-wrap">
                      <i class="fa fa-shopping-bag"></i>
                      <h4>Pro Sub Category Wise Products</h4>
                      <div class="new-arrival-content d-flex align-items-center">
                          <!--each col-->
                      @foreach($prosub_cat_products as $prosub_cat_product)
                          <div class="new-arrival-column">
                            <div class="new-list text-center">
                                <a href="{{route('product-details', [$prosub_cat_product->slug])}}">
                                    <img src="{{asset($prosub_cat_product->image)}}" width="160px" alt="" style="height: 160px;"></a>
                                    <br>
                                <span> BDT {{$prosub_cat_product->sell_price}} </span>
                                <p>{{$prosub_cat_product->name}}</p>
                              </div>
                          </div>
                    @endforeach

                      </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- new arrival end-->





    </section>



@endsection
