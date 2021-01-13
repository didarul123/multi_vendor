@extends('layouts.admin.app')

@section('content')



<style>
	
.note-editor.note-frame .note-editing-area .note-editable {
    height: 200px;
}


</style>

<section class="content  mt-5">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          	<div class="col-md-12">

	            @if ($errors->any())
	                <div class="alert alert-danger">
	                    <ul>
	                        @foreach ($errors->all() as $error)
	                            <li>{{ $error }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
          		

	            <!-- Horizontal Form -->
		            <div class="card card-info">
		              <div class="card-header">
		                <h3 class="card-title">Edit Post</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('admin/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
		              	@csrf
		              	@method('PATCH')
		                <div class="card-body">
		                  <div class="form-group row">

            				<input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Post Title</label>
		                      <input type="text" class="form-control" id="title" name="title" placeholder="Post Title" value="{{$post->title}}" onkeyup="Makeslug()">
		                    </div>		

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Slug</label>
		                      <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$post->slug}}">
		                    </div>		                    

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Meta Title</label>
		                      	<input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="{{$post->meta_title}}">
		                    </div>

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Meta Description</label>
		                      	<textarea name="meta_description" class="form-control" id="" cols="30" rows="2">{{$post->meta_description}}</textarea>
		                    </div>

		                    
		                    <div class="col-sm-4">
		                    	<label for="inputEmail3" class="col-form-label">Category</label>
		                      	<select name="category_id[]" id="category_id" class="form-control" multiple="multiple">
                                        @foreach($categories as $category)
                                        	@foreach($post_categories as $post_category)
				                            		<option value="{{$category->id}}" @php echo $category->id==$post_category->category_id?"selected":""; @endphp>{{$category->name}}</option>
				                            @endforeach
                                        @endforeach

		                      	</select>
		                    </div>		                    
		                    <div class="col-sm-4">
			             		<label for="inputEmail3" class="col-form-label">Feature Image</label>
		                    	@if(isset($post))
				                <div class="form-group">
				                    <img src="{{ asset($post->image) }}" alt="Image" style="width: 30%; margin-top: 8px">
				                    <input type="hidden" name="old_image" value="{{ $post->image }}">
				                </div>
			            		@endif
		                      	<input type="file" class="form-control" name="image" >
		                    </div>	                  	

		                  </div>		                  



		                  	<div class="form-group row">
		                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Post Description</label> 
						        <div class="col-md-12">
						            <div class="mb-3">
						                <textarea name="description" class="textarea" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post->description}}</textarea>
						            </div>
						        </div>
		                  	</div>		                  



		                  <div class="form-group row">
		                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
		                    <div class="col-sm-9">
		                      <select name="status" id="" class="form-control">
                        			<option value="1" @php echo $post->status==1?"selected":""; @endphp>Active</option>
                        			<option value="0" @php echo $post->status==0?"selected":""; @endphp>Inactive</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info">Save</button>
		                  <button type="reset" class="btn btn-default float-right">Cancel</button>
		                </div>
		                <!-- /.card-footer -->
		              </form>
	            </div>
	            <!-- /.card -->
			</div>
		</div>
	</div>
</section>




<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- <script src="{{asset('admin/jquery.min.js')}}"></script> -->
<script type="text/javascript">
		$( document ).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

		    $('#category_id').select2({
		      placeholder: 'Select Category'
		    })
        });  


		function Makeslug(){
		    var post_title = $('#title').val();
		    Text = post_title.toLowerCase();
		    Text = post_title.replace(/[^a-zA-Z0-9]+/g,'-');
		    $("#slug").val(Text);  
		}

</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>





@endsection