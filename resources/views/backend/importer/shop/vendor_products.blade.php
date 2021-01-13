@extends('layouts.importer.app')

@section('content')

<style>
	
.product-card {
  	transition: 0.3s; 
}

img {
  	max-width: 100%; 
	height: 250px;
	width: 100%;
}

.heading-1 {
    font-size: 24px;
    font-weight: 700;
    margin-left: 10px;
    top: 10px;
    position: relative;
}

.flex.justify-between{
	text-align: center;
}

</style>

    <section class="for-you">
        <div class="container-fluid">
            <h2 class="mb-4 heading-1">SHOP NOW</h2>

            <div class="row m-0">

            	@foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3 mb-3 px-2">
                    <a href="{{URL::to('importer/shop/'.$product->id)}}" class="text-black">
                        <div class="bg-white hover-shadow rounded p-3 product-card">
                            <img src="{{ asset($product->image) }}" alt="{{$product->name}}">
                            <a href="{{URL::to('importer/shop/'.$product->id)}}" class="fz-small hover-underline mb-4 text-black d-inline-block" style="font-size: 20px; font-weight: 700;">{{$product->name}}</a>
                            <h5 class="heading-3 mb-0">BDT {{$product->sell_price}} /-</h5>
                            <p class="fz-small text-muted">1 pcs (Min. Order)</p>
                        </div>
                    </a>
                </div>
                @endforeach


            </div>
            {{$products->links()}}
        </div>
    </section>





@endsection