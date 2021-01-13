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
          		
	            <!-- Horizontal Form -->
		            <div class="card card-info">
		              <div class="card-header">
		                <h3 class="card-title">Edit Category</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('admin/category/'.$category->id)}}" method="post" enctype="multipart/form-data">

		              	@csrf
		              	@method('PATCH')
		                <div class="card-body">
		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
		                    <div class="col-sm-9">
		                      <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{$category->name}}">
		                    </div>
		                  </div>		 

		                  	<!--<div class="form-group row">-->
		                   <!-- 	<label for="inputEmail3" class="col-sm-3 col-form-label">Slug</label>-->
		                   <!-- 	<div class="col-sm-9">-->
		                   <!--   		<input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$category->slug}}">-->
		                   <!-- 	</div>-->
		                  	<!--</div>	-->


	                  		<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Parent Category</label>
			                    <div class="col-sm-9">
			                    	<select name="parent_id" id="" class="form-control">
			                    		<option value="">---Select Parent Category---</option>
										@foreach($categories as $parent)
											@if($category->parent_id == 0)
												<option value="{{$parent->id}}" @php echo $id==$parent->id?"selected":""; @endphp>{{$parent->name}}</option>
											@else
												<option value="{{$parent->id}}" @php echo $category->parent_id==$parent->id?"selected":""; @endphp>{{$parent->name}}</option>
											@endif
										@endforeach
			                    	</select>
			                    </div>
		                  	</div>	


	                  		<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
			                    <div class="col-sm-9">
			                      	<input type="text" class="form-control" name="discription" placeholder="Description" value="{{$category->discription}}">
			                    </div>
		                  	</div>	

		                  	<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Thumbnail</label>
			                    <div class="col-sm-9">
			                    	@if(isset($category))
					                <div class="form-group">
					                    <img src="{{ asset($category->image) }}" alt="Image" style="width: 30%; margin-top: 8px">
					                    <input type="hidden" name="old_image" value="{{ $category->image }}">
					                </div>
				            		@endif

			                      <input type="file" class="form-control" name="image" placeholder="Fetaure Image">
			                    </div>
		                  	</div>



		                  <div class="form-group row">
		                    <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
		                    <div class="col-sm-9">
		                      <select name="status" id="" class="form-control">
                        			<option value="1" @php echo $category->status==1?"selected":""; @endphp>Active</option>
                        			<option value="0" @php echo $category->status==0?"selected":""; @endphp>Inactive</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info">Update</button>
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


@endsection