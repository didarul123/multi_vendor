@extends('layouts.frontend.app')

@section('content')





<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-lg-9">
            @if(session()->has('empty_notif'))
               <div class="alert alert-danger">
                   <strong style="font-size: 18px">{{session()->get('empty_notif')}}</strong>
               </div>     
            @endif  
			
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-6">
								<a href="{{URL::to('/')}}"><button type="button" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
								</button></a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<form action="{{URL::to('update-cart')}}">
					<?php foreach($contents as $content) {?>
					<input type="hidden" name="rowid[]" value="{{$content->rowId}}">
					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="{{ asset($content->options->image) }}">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong>{{$content->name}}</strong></h4><h4><small>{{$content->options->attribute_value}}</small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong>{{$content->price}} <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" name="quantity[]" value="{{$content->qty}}">
							</div>
							<div class="col-xs-2">
								<a href="{{ route('remove-from-cart',[$content->rowId])}}"><button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button></a>
							</div>
						</div>
					</div>
					<hr>
					<?php }?>


					<div class="row">
						<div class="text-center">
							<div class="col-xs-12">
								<button type="submit" class="btn btn-info btn-sm">
									Update cart
								</button>
							</div>
						</div>
					</div>
					</form>
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-12">
							<h4 class="text-right">Total <strong>{{$sub_total}} /-</strong></h4>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
	      <div class="mb-3">
	        <div class="pt-4">

	          <h2 class="mb-3">The total amount of</h2>

	          <ul class="list-group list-group-flush">
	            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
	              Temporary amount
	              <span>{{$sub_total}} /-</span>
	            </li>
	            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
	              Shipping
	              <span>{{$shipping}} /-</span>
	            </li>
	            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
	              <div>
	                <strong>The total amount of</strong>
	                <strong>
	                  <p class="mb-0">(including VAT)</p>
	                </strong>
	              </div>
	              <span><strong>{{$total ?? ''}} /-</strong></span>
	            </li>
	          </ul>
	          	<a href="{{URL::to('checkout')}}"><button type="button" class="btn btn-primary btn-block">go to checkout</button></a>
	        </div>
	      </div>
		</div>
	</div>
</div>






@endsection