@extends('layouts.admin.app')

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          	<div class="col-md-4 mt-5">

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
		                <h3 class="card-title">Edit Attribute Value</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('admin/attribute_value/'.$attribute_value->id)}}" method="post" enctype="multipart/form-data">
		              	@csrf
		              	@method('PATCH')
		                <div class="card-body">

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Attribute Name</label>
		                    <div class="col-sm-9">
		                      <select name="attribute_id" id="" class="form-control">
		                      	<option value="" selected="" disabled="">---Select Attribute---</option>
		                      	@foreach($attributes as $attribute)
								<option value="{{$attribute->id}}" @php echo $attribute->id==$attribute_value->attribute_id?"selected":""; @endphp>{{$attribute->name}}</option>
		                      	@endforeach
		                      </select>
		                    </div>
		                  </div>	

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Value</label>
		                    <div class="col-sm-9">
		                      <input type="text" class="form-control" name="value" placeholder="Attribute Value" value="{{$attribute_value->value}}">
		                    </div>
		                  </div>			                  

		                  	<div class="form-group row">
		                    	<label for="inputEmail3" class="col-sm-3 col-form-label">Slug</label>
		                    	<div class="col-sm-9">
		                      		<input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$attribute_value->slug}}">
		                    	</div>
		                  	</div>	



	                  		<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
			                    <div class="col-sm-9">
			                      	<input type="text" class="form-control" name="description" placeholder="Description" value="{{$attribute_value->description}}">
			                    </div>
		                  	</div>	


			                  <div class="form-group row">
			                    <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
			                    <div class="col-sm-9">
			                      <select name="status" id="" class="form-control">
                        			<option value="1" @php echo $attribute_value->status==1?"selected":""; @endphp>Active</option>
                        			<option value="0" @php echo $attribute_value->status==0?"selected":""; @endphp>Inactive</option>
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




          	<div class="col-md-8 mt-5">

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
		              <div class="card-header mb-2">
		                <h3 class="card-title">Manage Attribute Value</h3>
		              </div>

			              <table id="example1" class="table table-bordered table-striped">
			                <thead>
			                <tr>
			                  <th>Sl.</th>
			                  <th>Attribute</th>
			                  <th>Value</th>
			                  <th>Slug</th>
			                  <th>Description</th>
			                  <th>Status</th>
			                  <th>Action</th>
			                </tr>
			                </thead>
			                <tbody>
					            @php $i=1 @endphp
					            @foreach($attribute_values as $attribute_value)
					                <tr>
					                  	<td>{{$i++}}</td>
					                    <td>{{$attribute_value->attribute->name}}</td>
					                    <td>{{$attribute_value->value}}</td>
					                    <td>{{$attribute_value->slug}}</td>
					                    <td>{{$attribute_value->description ?? ''}}</td>
						                <td>
						                    @php
						                        if($attribute_value->status == 1){
						                                echo  "<div class='badge badge-success badge-shadow'>Active</div>";
						                            }else{
						                                echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
						                            }
						                    @endphp
					                      
						                </td>
					                  	<td>
					                      <div class="row">
					                        
					                        <a href="{{URL::to('admin/attribute_value/'.$attribute_value->id.'/edit')}}" title="Edit" style="float: left;margin-right: 10px;">
					                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
					                            </button>
					                        </a>

					                        <form action="{{URL::to('admin/attribute_value/'.$attribute_value->id)}}" method="post" style="float: left;margin-right: 10px;">
					                          @csrf
					                          @method('DELETE')
					                          <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
					                        </form>

					                      </div>


					                  	</td>
					                </tr>
									@endforeach
				
			                </tfoot>
			              </table>

	            </div>
	            <!-- /.card -->
			</div>



		</div>
	</div>
</section>


@endsection