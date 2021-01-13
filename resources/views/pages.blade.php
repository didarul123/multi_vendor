@extends('layouts.frontend.app')

@section('content')







<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="breadcrumb-wrap">
					<h3>{{$content->title}}</h3>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="checkout-area pt-30 pb-100" id="myDIV">
	<div class="container">
		<div class="row">
			<div class="col-xl-12" style="background-color: white">
				
				<p>{!! $content->content !!}</p>
						
			
			</div>
		</div>
	</div>
</div>









@endsection
