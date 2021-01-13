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
                      <h4> Ready Products For You</h4>
                      <div class="new-arrival-content d-flex align-items-center">
                          <!--each col-->
                      @foreach($ready_products as $ready_product)
                          <div class="new-arrival-column" style="padding-right: 11px;">
                            <div class="new-list text-center">
                                <a href="{{route('product-details', [$ready_product->slug])}}">
                                    <img src="{{asset($ready_product->image)}}" width="160px" alt="" style="height: 160px;"></a>
                                    <br>
                                <span> BDT {{$ready_product->sell_price}} </span>
                                <p>{{$ready_product->name}}</p>
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
