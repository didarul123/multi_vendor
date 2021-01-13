@extends('layouts.merchant.app')

@section('content')
<style>
	ul{
		margin: 0;
		padding: 0;
	}
	li{
		list-style: none;
	}
	.user-wrapper, .massege-wrapper{
		border: 1px solid #dddddd;
		overflow-y: auto;
	}
	.user-wrapper{
		height: 600px;
	}
	.user{
		cursor: pointer;
		padding: 5px 0;
		position: relative;
	}
	.user:hover{
		background: #eeeeee;
	}
	.user:last:child{
		margin-bottom: 0;
	}
	.pending{
		position: absolute;
		left: 13px;
		top: 9px;
		background: #b600ff;
		margin: 0;
		border-radius: 50%;
		width: 18px;
		height: 18px;
		line-height: 10px;
		padding-left: 5px;
		color: #ffffff;
		font-size: 12px;

	}
	.media-left{
		margin: 0 10px;
	}
	.media-left img{
		width: 64px;
		border-radius: 64px;
	}
	.media-body{
		padding: 6px 0;
	}
	.message-wrapper{
		padding: 10px;
		height: 536px;
		background: #eeeeee;
	}
	.message .message:last-child{
		margin-bottom: 0;
	}
	.receved, .sent{
		width: 45%;
		padding: 3px 10px;
		border-radius: 10px;
	}
	.receved{
		background: #ffffff;
	}
	.sent{
		background: #3bebff;
		float: right;
		text-align: right;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.message p{
		margin: 5px 0;
	}
	.date{
		background: #777777;
		font-size: 12px;
	}
	.active{
		background: #eeeeee;
	}
	input[type=text]{
		width: 100%;
		padding: 12px 20px;
		margin: 15px 0 0 0;
		display: inline-block;
		border-radius: 4px;
		box-sizing: border-box;
		outline: none;
		border: 1px solid #cccccc;

	}
	.input[type=text]:focus{
		border: 1px solid #aaaaaa;
	}
</style>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="user-wrapper">
					<ul class="users">
						<li class="user">
							<span class="pending">1</span>

							<div class="media">
								<div class="media-left">
									<img src="{{asset('public/backend/dist/img/AdminLTELogo.png')}}" alt="" class="media-object">
								</div>
								<div class="media-body">
									<p class="name">{{$merchant->name}}</p>
									<p class="email">{{$merchant->email}}</p>
								</div>
							</div>

						</li>						

					</ul>
				</div>
			</div>

			<div class="col-md-8" id="messages">
				<div class="massege-wrapper">
					<ul class="messages" id="sender_msg">

						@foreach($messages as $message)
						<li class="message clearfix">
							<div class="receved">
								<p>{{$message->message ?? ''}}</p>
								<p class="date">{{$message->created_at ?? ''}}</p>
							</div>
						</li>
						<li class="message clearfix">
							<div class="sent">
								<p></p>
								<p class="date"></p>
							</div>
						</li>
						@endforeach


					</ul>
				</div>
				<div class="input-text">
					<form id="submit">
						@csrf
						<input type="hidden" name="sender_id" id="sender_id" value="{{$user_id}}">
						<input type="hidden" name="sender_type" id="sender_type" value="{{$user_type}}">
						<input type="hidden" name="recever_id" id="recever_id" value="{{$merchant->id}}">
						<input type="hidden" name="recever_type" id="recever_type" value="{{$merchant->type}}">

						<input type="text" name="message" id="message">
					</form>
				</div>
			</div>

		</div>
	</div>





<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<script>
	

    $(document).ready(function(){

        $("#submit").submit(function(e){
    		    e.preventDefault();

	            sender_id = $("#sender_id").val();
	            sender_type = $("#sender_type").val();
	            recever_id = $("#recever_id").val();
	            recever_type = $("#recever_type").val();
	            message = $("#message").val();

	            $.ajax({
	                type:"POST",
	                data:{"sender_id":sender_id, "sender_type":sender_type, "recever_id":recever_id, "recever_type":recever_type, "message":message, "_token":"{{csrf_token()}}"},
	                url:"{{URL::to('vendor/message')}}",
	                success:function(data){

	                	$('#sender_msg').append(
							`
							<li class="message clearfix">
								<div class="sent">
									<p> `+ data.message+` </p>
									<p class="date"> `+ data.created_at+` </p>
								</div>
							</li>

							`
	                	);

	                	$('#message').val('')

	                }
	            });

        });

    });	




</script>

@endsection