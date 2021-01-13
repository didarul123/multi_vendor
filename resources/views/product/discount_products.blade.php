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
                      <h4> Discount Products For You</h4>
                      <div class="new-arrival-content d-flex align-items-center">
                          <!--each col-->
                      @foreach($discount_products as $discount_product)
                          <div class="new-arrival-column" style="padding-right: 11px;">
                            <div class="new-list text-center">
                                <a href="{{route('product-details', [$discount_product->slug])}}">
                                    <img src="{{asset($discount_product->image)}}" width="160px" alt="" style="height: 160px;"></a>
                                    <br>
                                <span> BDT {{$discount_product->sell_price}} </span> 
                                <span style="background-color: orange; color: white; border-radius: 5px">-{{$discount_product->discount}}%</span>
                                <p>{{$discount_product->name}}</p>
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
