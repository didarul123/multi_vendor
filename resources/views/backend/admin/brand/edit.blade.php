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
		                <h3 class="card-title">Edit Brand</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('admin/brand/'.$brand->id)}}" method="post" enctype="multipart/form-data">

		              	@csrf
		              	@method('PATCH')
		                <div class="card-body">
		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Brand Name</label>
		                    <div class="col-sm-9">
		                      <input type="text" class="form-control" name="name" placeholder="Brand Name" value="{{$brand->name}}">
		                    </div>
		                  </div>			                  

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Slug</label>
		                    <div class="col-sm-9">
		                      <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$brand->slug}}">
		                    </div>
		                  </div>		                  
	                  

				            @if(isset($brand))
				                <div class="form-group text-center">
				                    <img src="{{ asset($brand->brand_logo) }}" alt="Image" style="width: 20%">
				                    <input type="hidden" name="old_image" value="{{ asset($brand->brand_logo) }}">
				                </div>
				            @endif

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Thumbnail</label>
		                    <div class="col-sm-9">
		                      <input type="file" class="form-control" name="brand_logo" placeholder="Brand logo">
		                    </div>
		                  </div>

		                  <div class="form-group row">
		                    <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
		                    <div class="col-sm-9">
		                      <select name="status" id="" class="form-control">
                        			<option value="1" @php echo $brand->status==1?"selected":""; @endphp>Active</option>
                        			<option value="0" @php echo $brand->status==0?"selected":""; @endphp>Inactive</option>
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