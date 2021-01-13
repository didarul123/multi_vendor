@extends('layouts.vendor.app')

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
		                <h3 class="card-title">Replay - </h3>
		              </div>
		              <!-- /.card-header --> 
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('vendor/replay/'.$message->id)}}" method="post" enctype="multipart/form-data">
		              	@csrf

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
		                      		<input type="text" class="form-control" name="subject" value="{{$message->subject}}" disabled="">
		                    	</div>
		                  	</div>	


	                  		<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Message</label>
			                    <div class="col-sm-9">
			                      	<textarea name="message" id="" cols="30" rows="5" class="form-control"  disabled="">{{$message->message}}</textarea>
			                    </div>
		                  	</div>	

	                  		<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Replay</label>
			                    <div class="col-sm-9">
			                      	<textarea name="replay" id="" cols="30" rows="5" class="form-control" >{{$replay_message->replay_msg ?? ''}}</textarea>
			                    </div>
		                  	</div>	


		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info"><i class="fas fa-reply-all"></i> Replay </button>
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