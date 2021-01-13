@extends('layouts.merchant.app')

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          	<div class="col-md-8 offset-2 mt-5">

	            @if ($errors->any())
	                <div class="alert alert-danger">
	                    <ul>
	                        @foreach ($errors->all() as $error)
	                            <li>{{ $error }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
          		@if(session()->has('notif'))
			       <div class="alert alert-success">
			           <strong>{{session()->get('notif')}}</strong>
			       </div>     
			    @endif
	            <!-- Horizontal Form -->
		            <div class="card card-info">
		              <div class="card-header">
		                <h3 class="card-title">Contact With {{$vendor->name}}</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('merchant/message')}}" method="post" enctype="multipart/form-data">
		              	@csrf

						<input type="hidden" name="sender_id" id="sender_id" value="{{$user_id}}">
						<input type="hidden" name="sender_type" id="sender_type" value="{{$user_type}}">
						<input type="hidden" name="recever_id" id="recever_id" value="{{$vendor->id}}">
						<input type="hidden" name="recever_type" id="recever_type" value="{{$vendor->type}}">

		                <div class="card-body">
		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Your Name</label>
		                    <div class="col-sm-9">
		                      <input type="text" class="form-control" name="name" value="{{$user->name}}" readonly="">
		                    </div>
		                  </div>			                  

		                  	<div class="form-group row">
		                    	<label for="inputEmail3" class="col-sm-3 col-form-label">Subject</label>
		                    	<div class="col-sm-9">
		                      		<input type="text" class="form-control" name="subject">
		                    	</div>
		                  	</div>	


	                  		<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Message</label>
			                    <div class="col-sm-9">
			                      	<textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
			                    </div>
		                  	</div>	


		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info">Send</button>
		                </div>
		                <!-- /.card-footer -->
		              </form>
	            </div>
	            <!-- /.card -->
			</div>
		</div>
	</div>
</section>


@endsection