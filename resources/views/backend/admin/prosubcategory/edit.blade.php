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
		                <h3 class="card-title">Add Pro Sub Category</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('admin/prosubcategory/'.$prosubcategory->id)}}" method="post" >
		              	@csrf
		              	@method('PATCH')
		                <div class="card-body">
		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-3 col-form-label">Sub Pro Category Name</label>
		                    <div class="col-sm-9">
		                      <input type="text" class="form-control" name="name" placeholder="Sub Category Name" value="{{$prosubcategory->name}}">
		                    </div>
		                  </div>		                  
	                  
		                  <div class="form-group row">
		                    	<label for="inputPassword3" class="col-sm-3 col-form-label">Category</label>
		                    	<div class="col-sm-9">
		                      		<select name="category_id" id="category_id" class="form-control"  onchange="GetSubCategory(this.value)">
		                      			<option value="" selected="" disabled="">
		                      				---- Select Parent Category ----
		                      			</option>
		                      			@foreach($categories as $category)
		                      			<option value="{{$category->id}}" @php echo $category->id==$prosubcategory->category_id?"selected":""; @endphp>{{$category->name}}</option>
		                      			@endforeach
		                      		</select>
		                    	</div>
		                  </div>		                  

		                  <div class="form-group row">
		                    	<label for="inputPassword3" class="col-sm-3 col-form-label">Sub Category</label>
		                    	<div class="col-sm-9">
		                      		<select name="subcategory_id" id="subcategory_id" class="form-control">
		                      			<option value="" selected="" disabled="">
		                      				---- Select Sub Category ----
		                      			</option>
		                      			@foreach($subcategories as $subcategory)
		                      			<option value="{{$subcategory->id}}" @php echo $subcategory->id==$prosubcategory->subcategory_id?"selected":""; @endphp>{{$subcategory->name}}</option>
		                      			@endforeach
		                      		</select>
		                    	</div>
		                  </div>

		                  <div class="form-group row">
		                    <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
		                    <div class="col-sm-9">
		                      <select name="status" id="" class="form-control">
                        			<option value="1" @php echo $prosubcategory->status==1?"selected":""; @endphp>Active</option>
                        			<option value="0" @php echo $prosubcategory->status==0?"selected":""; @endphp>Inactive</option>
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
<script type="text/javascript">

  $( document ).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  });

  var token =  $("input[name=_token]").val();
  function GetSubCategory(val){
    var datastr = "category_id=" + val  + "&token="+token;
    $.ajax({
      type: "post",
      url: "<?php echo route('admin/get-subcategory');?>",
      data:datastr,
      cache:false,
      beforeSend: function() {
          // setting a timeout
          $('.loading_image').show();

      },

      success:function (data) {            
        $('#subcategory_id').html(data);
        $('.loading_image').hide();
      },
      error: function (jqXHR, status, err) {
        alert(status);
        console.log(err);
      },
      complete: function () {
        // alert("Complete");
      }
    });
  }





</script>


@endsection