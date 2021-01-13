@extends('layouts.importer.app')

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
		                <h3 class="card-title">Edit Product</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('importer/product/'.$product->id)}}" method="post" enctype="multipart/form-data">
		              	@csrf
		              	@method('PATCH')
		                <div class="card-body">
		                  <div class="form-group row">

            				<input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
		                    <input type="hidden" name="user_id" value="{{$product->importer_id}}">

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Product Name</label>
		                      <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{$product->name}}">
		                    </div>

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Brand</label>
		                      	<select name="brand_id" class="form-control">
		                      		<option value="" selected="" disabled="">----Selected Brand----</option>}
                                        @foreach($brands as $brand)
				                            <option value="{{$brand->id}}" @php echo $brand->id==$product->brand_id?"selected":""; @endphp>{{$brand->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Category</label>
		                      	<select name="category_id[]" id="category_id" class="form-control" onchange="GetSubCategory(this.value)"  multiple="multiple">
		                      		<option value="" disabled="">----Selected Catgory----</option>}
                                        @foreach($product_categories as $product_category)
				                            <option value="{{$product_category->category_id}}" selected="">{{$product_category->category->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>		                    

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Product Style</label>
		                      	<select name="" id="product_veriation" class="form-control" onclick="showVariation(0)">
				                    <option value="" selected="">---Select---</option>
				                    <option value="1" @php echo $product->product_veriation==0?"selected":""; @endphp>Simple Product</option>
				                    <option value="2" @php echo $product->product_veriation==1?"selected":""; @endphp>Variation Product</option>
		                      	</select>
		                    </div>	

		                  </div>		                  
		                  
		                  	@if($product->product_veriation == 0)
		                  	<div class="form-group row">
			                    <div class="col-sm-2">
			                    	<label for="inputEmail3" class="col-form-label" id="SimpleProductTitle" style="display: none">Simple Product</label>
			                      	<!-- <input type="checkbox" id="product_veriation" name="product_veriation" onchange="showVariation()" value="0"> -->
			                    </div>

			                    <div class="col-sm-6" id="SimpleProduct" >
                                    <table class="table table-striped" id="SimplePro">
                                        <thead>
	                                        <tr>
	                                            <th>Attribute</th>
	                                            <th>Value</th>
	                                            <th>Action</th>
	                                        </tr>
                                        </thead>
                                        <tbody>
											@foreach($product->attributes as $product_attribute)
                                            <tr>
                                                <td>
							                      	<select name="attribute_id[]" id="attribute_id1" class="form-control attribute_id">
							                      		<option value="">---Select Attribute---</option>
							                      		@foreach($attributes as $attribute)
															<option value="{{$attribute->id}}" @php echo $attribute->id==$product_attribute->attribute_id?"selected":""; @endphp>{{$attribute->name}}</option>
														@endforeach
							                      	</select>
                                                </td>
                                                <td>
							                      	<select name="attribute_value_id[]" id="attribute_value_id" class="form-control attribute_value_id">
							                      		<option value="{{ $product_attribute->product_attribute_attribute_value->attribute_value->id}}">{{ $product_attribute->product_attribute_attribute_value->attribute_value->value}}</option>
							                      	</select>
                                                </td>

                                                <td> 
                                                	<button id="addSimpleProduct"  type="button" class="btn btn-success btn-sm addSimpleProduct"><i class="fa fa-plus-circle"></i> </button>
                                                </td>
                                            </tr>
											@endforeach
                                            <tr></tr>

                                        </tbody>
                                    </table>  

			                    </div>	
		                  	</div>
		                  	@else
		                  	<div class="form-group row">
			                    <div class="col-sm-2">
			                    	<label for="inputEmail3" class="col-form-label" id="SimpleProductTitle" style="display: none">Simple Product</label>
			                      	<!-- <input type="checkbox" id="product_veriation" name="product_veriation" onchange="showVariation()" value="0"> -->
			                    </div>

			                    <div class="col-sm-6" id="SimpleProduct" style="display: none">
                                    <table class="table table-striped" id="SimplePro">
                                        <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
							                      	<select name="attribute_id[]" id="attribute_id1" class="form-control attribute_id">
							                      		<option value="">---Select Attribute---</option>
														@foreach($attributes as $attribute)
															<option value="{{$attribute->id}}">{{$attribute->name}}</option>
														@endforeach
							                      	</select>
                                                </td>
                                                <td>
							                      	<select name="attribute_value_id[]" id="attribute_value_id" class="form-control attribute_value_id">
							                      	</select>
                                                </td>

                                                <td> 
                                                	<button id="addSimpleProduct"  type="button" class="btn btn-success btn-sm addSimpleProduct"><i class="fa fa-plus-circle"></i> </button>
                                                </td>
                                            </tr>
                                            <tr></tr>

                                        </tbody>
                                    </table>  

			                    </div>	
		                  	</div>
		                  	@endif


		                  	@if($product->product_veriation == 1)
		                  	<div class="form-group row">
			                    <div class="col-sm-2">
			                    	<label for="inputEmail3" class="col-form-label">Product Variation</label>
			                      	<!-- <input type="checkbox" id="product_veriation" name="product_veriation" value="0"> -->
			                    </div>

			                    <div class="col-sm-12" id="productVeriation">
                                    <table class="table table-striped" id="productVer">
                                        <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($ProductVariations as $ProductVariation)
                                            <tr>
                                                <td>
							                      	<select name="var_attribute_id[]" id="attribute_id" class="form-control attribute_id">
							                      		<option value="">---Select Attribute---</option>
														@foreach($attributes as $attribute)
															<option value="{{$attribute->id}}" @php echo $attribute->id==$ProductVariation->var_attribute_id?"selected":""; @endphp>{{$attribute->name}}</option>
														@endforeach
							                      	</select>
                                                </td>
                                                <td>
							                      	<select name="var_attribute_value_id[]" id="attribute_value_id" class="form-control attribute_value_id">
							                      		<option value="{{$ProductVariation->var_attribute_value_id}}">{{$ProductVariation->var_attribute_value->value}}</option>
							                      	</select>
                                                </td>
                                                <td>
							                      	<select name="var_attribute_id2[]" id="attribute_id2" class="form-control attribute_id2">
							                      		<option value="">---Select Attribute---</option>
														@foreach($attributes as $attribute)
															<option value="{{$attribute->id}}" @php echo $attribute->id==$ProductVariation->var_attribute_id2?"selected":""; @endphp>{{$attribute->name}}</option>
														@endforeach
							                      	</select>
                                                </td>
                                                <td>
							                      	<select name="var_attribute_value_id2[]" id="attribute_value_id2" class="form-control attribute_value_id2">
							                      		<option value="{{$ProductVariation->var_attribute_value_id2}}">{{$ProductVariation->var_attribute_value2->value}}</option>
							                      	</select>
                                                </td>
                                                <td>
													<input type="text" class="form-control" name="var_price[]" value="{{$ProductVariation->var_price}}">
                                                </td>
                                                <td style="width: 250px">
							                    	@if(isset($ProductVariation))
										                <img src="{{ asset($ProductVariation->var_img) }}" alt="Image" style="width: 30%;">
										                <input type="hidden" name="old_var_img" value="{{ $ProductVariation->var_img }}">
							                    	@endif
													<input type="file" class="form-control" name="var_img[]">
                                                </td>
                                                <td> 
                                                	<button id="addVer"  type="button" class="btn btn-success btn-sm addVer"><i class="fa fa-plus-circle"></i> </button>
                                                </td>
                                            </tr>
                                            <tr></tr>
                                            @endforeach
                                        </tbody>
                                    </table>  
			                    </div>	
		                  	</div>
		                  	@else
		                  	<div class="form-group row">
		                  		
			                    <div class="col-sm-2">
			                    		<label for="inputEmail3" class="col-form-label" id="product_veriation_title" style="display: none">Product Variation</label>
			                      	<!-- <input type="checkbox" id="product_veriation" name="product_veriation" value="0"> -->
			                    </div>

			                    <div class="col-sm-12" id="productVeriation" style="display: none">
                                    <table class="table table-striped" id="productVer">
                                        <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
							                      	<select name="var_attribute_id[]" id="attribute_id" class="form-control attribute_id">
							                      		<option value="">---Select Attribute---</option>
														@foreach($attributes as $attribute)
															<option value="{{$attribute->id}}">{{$attribute->name}}</option>
														@endforeach
							                      	</select>
                                                </td>
                                                <td>
							                      	<select name="var_attribute_value_id[]" id="attribute_value_id" class="form-control attribute_value_id">
							                      	</select>
                                                </td>



                                                <td>
							                      	<select name="var_attribute_id2[]" id="attribute_id2" class="form-control attribute_id2">
							                      		<option value="">---Select Attribute---</option>
														@foreach($attributes as $attribute)
															<option value="{{$attribute->id}}">{{$attribute->name}}</option>
														@endforeach
							                      	</select>
                                                </td>

                                                <td>
							                      	<select name="var_attribute_value_id2[]" id="attribute_value_id2" class="form-control attribute_value_id2">
							                      	</select>
                                                </td>



                                                <td>
													<input type="text" class="form-control" name="var_price[]">
                                                </td>
                                                <td>
													<input type="file" class="form-control" name="var_img[]">
                                                </td>
                                                <td> 
                                                	<button id="addVer"  type="button" class="btn btn-success btn-sm addVer"><i class="fa fa-plus-circle"></i> </button>
                                                </td>
                                            </tr>
                                            <tr></tr>

                                        </tbody>
                                    </table>  

			                    </div>	
		                  	</div>
			                @endif

		                  	<div class="form-group row">
			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Buying Price</label>
			                      <input type="number" step=".01" class="form-control" name="buying_price" value="{{$product->buying_price}}">
			                    </div>			                    

			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Market Price</label>
			                      <input type="number" step=".01" class="form-control" name="market_price" value="{{$product->market_price}}">
			                    </div>

			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Selling Price</label>
			                      <input type="number"  step=".01" class="form-control" name="sell_price" value="{{$product->sell_price}}">
			                    </div>


			                    <div class="col-sm-4">
			                    	<label for="inputEmail3" class=" col-form-label">Product Qty</label>
			                      <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
			                    </div> 
		                  	</div>

		                  	<div class="form-group row">
			                    <div class="col-sm-4">
			                    <label for="inputEmail3" class="col-form-label">Product Color</label>
									<select class="form-control" id="color" name="color_id[]" multiple="multiple">
										@foreach($product_colors as $color)
									  		<option value="{{$color->color_id}}" selected="">{{$color->color->name}}</option>
									  	@endforeach
									</select>
			                    </div> 

			                    <div class="col-sm-4">
				             		<label for="inputEmail3" class="col-form-label">Feature Image</label>
			                      	<input type="file" class="form-control" name="image" >
			                    	@if(isset($product))
					                <div class="form-group">
					                    <img src="{{ asset($product->image) }}" alt="Image" style="width: 30%; margin-top: 8px">
					                    <input type="hidden" name="old_image" value="{{ $product->image }}">
					                </div>
				            		@endif
			                    </div>


			                    <div class="col-sm-4">
			                    	<label for="inputEmail3" class="col-form-label">Product Image</label>
									@if(count($productImages) > 0)
				                    	@foreach($productImages as $productImage)
					                    	@if(isset($productImage))
								                <div class="form-group">
								                    <img src="{{ asset($productImage->product_image) }}" alt="Image" style="width: 30%">
								                    <input type="hidden" name="old_product_image" value="{{ $productImage->product_image }}">
								                </div>
					                    	@endif
	                                    <table class="table table-striped" id="productImage">
	                                        <thead>
	                                        <tr>
	                                            <th>Image</th>
	                                            <th>Action</th>
	                                        </tr>
	                                        </thead>
	                                        <tbody>
	                                            <tr>
	                                                <td><input type="file" class="form-control" name="product_image[]"></td>
	                                                <td> <button id="add"  type="button" class="btn btn-success add"><i class="fa fa-plus-circle"></i> </button></td>
	                                            </tr>
	                                            <tr></tr>

	                                        </tbody>
	                                    </table>  
                                    @endforeach
                                   	@else
	                                    <table class="table table-striped" id="productImage">
	                                        <thead>
	                                        <tr>
	                                            <th>Image</th>
	                                            <th>Action</th>
	                                        </tr>
	                                        </thead>
	                                        <tbody>
	                                            <tr>
	                                                <td><input type="file" class="form-control" name="product_image[]" ></td>
	                                                <td> <button id="add"  type="button" class="btn btn-success add"><i class="fa fa-plus-circle"></i> </button></td>
	                                            </tr>
	                                            <tr></tr>

	                                        </tbody>
	                                    </table> 
                                    @endif
			                    </div>

		                  	</div>		                  	

		                  <div class="form-group row">
		                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Details</label>
		                    <div class="col-sm-9  mt-3">
						        <div class="col-md-12">
						            <div class="mb-3">
						                <textarea name="description" class="textarea" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$product->description!!}</textarea>
						            </div>
						        </div>
		                    </div>
		                  </div>		                  


		                  
		                  	<div class="form-group row">
			                    <label for="inputEmail3" class="col-sm-2 col-form-label">Note</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" name="note" placeholder="Note" value="{{$product->note}}">
			                    </div> 
		                  	</div>

		                  <div class="form-group row">
		                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
		                    <div class="col-sm-9">
		                      <select name="status" id="" class="form-control">
                        			<option value="1" @php echo $product->status==1?"selected":""; @endphp>Active</option>
                        			<option value="0" @php echo $product->status==0?"selected":""; @endphp>Inactive</option>
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




<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- <script src="{{asset('admin/jquery.min.js')}}"></script> -->
<script type="text/javascript">
		$( document ).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$(document).on('click', '.add', function(){
				var html = '';
				html += '<tr>';
				html += '<td><input type="file" name="product_image[]" class="form-control" required/></td>';
				html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus-circle"></span></button></td></tr>';
				$('#productImage').append(html);
			});

			$(document).on('click', '.remove', function(){
				$(this).closest('tr').remove();
			});

			$(document).on('click', '.addVer', function(){
				var html = '';
				html += '<tr>';

				html += '<td><select name="var_attribute_id[]" id="attribute_id" class="form-control attribute_id"><option value="">---Select Attribute---</option>@foreach($attributes as $attribute)<option value="{{$attribute->id}}">{{$attribute->name}}</option>@endforeach</select></td>';
				html += '<td><select name="var_attribute_value_id[]" id="attribute_value_id" class="form-control attribute_value_id"></select></td>';


				
				html += '<td><select name="var_attribute_id2[]" id="attribute_id2" class="form-control attribute_id2"><option value="">---Select Attribute---</option>@foreach($attributes as $attribute)<option value="{{$attribute->id}}">{{$attribute->name}}</option>@endforeach</select></td>';

				html += '<td><select name="var_attribute_value_id2[]" id="attribute_value_id2" class="form-control attribute_value_id2"></select></td>';


				html += '<td><input type="text" class="form-control" name="var_price[]"></td>';
				html += '<td><input type="file" class="form-control" name="var_img[]"></td>';
				html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus-circle"></span></button></td></tr>';
				$('#productVer').append(html);
			});


			$(document).on('click', '.addSimpleProduct', function(){
				var html = '';
				html += '<tr>';

				html += '<td><select name="attribute_id[]" id="attribute_id" class="form-control attribute_id"><option value="">---Select Attribute---</option>@foreach($attributes as $attribute)<option value="{{$attribute->id}}">{{$attribute->name}}</option>@endforeach</select></td>';
				html += '<td><select name="attribute_value_id[]" id="attribute_value_id" class="form-control attribute_value_id"></select></td>';

				html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus-circle"></span></button></td></tr>';
				$('#SimplePro').append(html);
			});


		    $('#color').select2({
		      placeholder: 'Select Color'
		    });
		    $('#size_id').select2({
		      placeholder: 'Select Size'
		    });
		    $('#category_id').select2({
		      placeholder: 'Select Category'
		    });
		    $('#attribute_id').select2({
		      placeholder: 'Select Attribute'
		    });

        });  


		$(document).ready(function(){
			$(document).on("change", ".attribute_id", function(e){
				var $this = $(this);
				var token =  $("input[name=_token]").val();
				var datastr = "attribute_id=" + e.target.value  + "&token="+token;
				$.ajax({
					type: "post",
					url: "<?php echo route('importer/get-attribute-value'); ?>",
					data:datastr,
					cache:false,
					success:function (data) {
						console.log(data);
						$this.parent().siblings().find('.attribute_value_id').html(data);
					},
					error: function (jqXHR, status, err) {
						alert(status);
						console.log(err);
					},
					complete: function () {
						// alert("Complete");
					}
				});
			})
		})

		$(document).ready(function(){
			$(document).on("change", ".attribute_id2", function(e){
				var $this = $(this);
				var token =  $("input[name=_token]").val();
				var datastr = "attribute_id=" + e.target.value  + "&token="+token;
				$.ajax({
					type: "post",
					url: "<?php echo route('importer/get-attribute-value'); ?>",
					data:datastr,
					cache:false,
					success:function (data) {
						console.log(data);
						$this.parent().siblings().find('.attribute_value_id2').html(data);
					},
					error: function (jqXHR, status, err) {
						alert(status);
						console.log(err);
					},
					complete: function () {
						// alert("Complete");
					}
				});
			})
		})


		function showVariation() {
			var value = $('#product_veriation').val();

			// $('#productVeriation').toggle();

			// $('#productVeriation').show();

			if (value == 1) {
				$('#SimpleProductTitle').show();
				$('#SimpleProduct').show();
				$('#productVeriation').hide();
				$('#product_veriation_title').hide();
			}else{
				$('#productVeriation').show();
				$('#product_veriation_title').show();
				$('#SimpleProduct').hide();
				$('#SimpleProductTitle').hide();
			}
		}

</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>





@endsection