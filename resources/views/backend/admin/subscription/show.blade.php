@extends('layouts.admin.app')

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
          		@if(session()->has('exist_replay'))
			       <div class="alert alert-warning">
			           <strong>{{session()->get('exist_replay')}}</strong>
			       </div>     
			    @endif
	            <!-- Horizontal Form -->
		            <div class="card card-info">
		              <div class="card-header">
		                <h3 class="card-title">Send Email - </h3>
		              </div>
		              <!-- /.card-header --> 
		              <!-- form start -->
		              <form class="form-horizontal" action="{{route('admin/send-email')}}" method="post" enctype="multipart/form-data">
		              	@csrf

		                <div class="card-body">
		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
		                    <div class="col-sm-9">
		                      <input type="text" class="form-control" name="email" value="{{$subscription->email}}">
		                    </div>
		                  </div>			                  

		                  	<div class="form-group row">
		                    	<label for="inputEmail3" class="col-sm-3 col-form-label">Subject</label>
		                    	<div class="col-sm-9">
		                      		<input type="text" class="form-control" name="subject" value="" required=""> 
		                    	</div>
		                  	</div>	


	                  		<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Message</label>
			                    <div class="col-sm-9">
			                      	<textarea name="text" id="" cols="30" rows="5" class="form-control" required=""></textarea>
			                    </div>
		                  	</div>	


		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info"><i class="fas fa-reply-all"></i> Send </button>
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