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
		                <h3 class="card-title">Add Product</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="{{URL::to('admin/product')}}" method="post" enctype="multipart/form-data">
		              	@csrf
		                <div class="card-body">
		                  <div class="form-group row">

            				<input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            				<input type="hidden" name="user_id" value="{{$user_id}}">
            				<input type="hidden" name="user_type" value="{{$user_type}}">
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Product Name</label>
		                      	<input type="text" class="form-control" name="name" placeholder="Product Name" required="" value="{{$product->name}}">
		                    </div>

		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Brand</label>
		                      	<select name="brand_id" class="form-control" required="">
                                        @foreach($brands as $brand)
				                            <option value="{{$brand->id}}" @php echo $brand->id==$product->brand_id?"selected":""; @endphp>{{$brand->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>
		                    
		                    <div class="col-sm-6">
		                    	<label for="inputEmail3" class="col-form-label">Category</label>
		                      	<select name="category_id[]" id="category_id" class="form-control" multiple="multiple" required="">
                                        @foreach($product_categories as $product_category)
				                            <option value="{{$product_category->category_id}}" selected="">{{$product_category->category->name}}</option>
                                        @endforeach
		                      	</select>
		                    </div>			




		                  </div>		                  
		  
		                  	<div class="form-group row">
			                    <div class="col-sm-2">
			                    	<label for="inputEmail3" class="col-form-label" id="SimpleProductTitle" style="display: block"> Product Attribute</label>
			                      	<!-- <input type="checkbox" id="product_veriation" name="product_veriation" onchange="showVariation()" value="0"> -->
			                    </div>

			                    <div class="col-sm-6" id="SimpleProduct" style="display: block">
                                    <table class="table table-striped table-attributes" id="SimplePro">
                                        <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
							                @foreach($ProductAttributes as $ProductAttribute)
                                            <tr>
                                                <td>
							                      	<p>{{$ProductAttribute->attribute->name}}</p>
                                                </td>
                                                <td>
                                                	{{ $ProductAttribute->product_attribute_attribute_value->attribute_value->value}}
                                                </td>

                                            </tr>
							                @endforeach
                                        </tbody>
                                    </table>  

			                    </div>	
		                  	</div>

		                  	<div class="form-group row">
		                  		
			                    <div class="col-sm-2">
			                    	<label for="inputEmail3" class="col-form-label" id="product_veriation_title" style="display: block">Product Variation</label>
			                      	<input type="hidden" name="product_veriation" value="0" id="productV">
			                    </div>

			                    <div class="col-sm-12" id="productVeriation" style="display: block">
                                    <table class="table table-bordered table-striped variation" id="productVer">
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
													<input type="text" class="form-control" name="var_price[]">
                                                </td>
                                                <td>
													<input type="file" class="form-control" name="var_img[]">
                                                </td>
                                                <td> 
                                                	<button id="addVer"  type="button" class="btn btn-success btn-sm addVer"><i class="fa fa-plus-circle"></i> </button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table> 
			                    </div>	
		                  	</div>

		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info d-none">Save</button>
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


			$(document).on('click', '.remove', function(){
				$(this).closest('tr').remove();
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
					url: "<?php echo route('admin/get-attribute-value'); ?>",
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
					url: "<?php echo route('admin/get-attribute-value'); ?>",
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



		// JS Here
		$(document).ready(function() {

			const data = makeJson();
			const list = Object.values(data);

			var result = list[0].map(function(item) { return [item]; });

			for (var k = 1; k < list.length; k++) {
			    var next = [];
			    result.forEach(function(item) {
			        list[k].forEach(function(word) {
			            var line = item.slice(0);
			            line.push(word);
			            next.push(line);
			        })
			    });
			    result = next;
			}

			const tableRow = result.map(item => {
				 let htmlRow = $('<tr></tr>');
				 item.forEach(item1 => {
				 	htmlRow.append(`
				 		<td>

				 		<input type='text' value='${item1}' name='attribute_value_id[] ' class="form-control" readonly>
				 		
				 		</td>
				 		`);
				 });

				 htmlRow.append(`<td>
									<input type="text" class="form-control" name="var_price[]">
	                            </td>
	                            <td>
									<input type="file" class="form-control" name="var_img[]">
	                            </td>
	                            <td> 
	                            	<button id="addVer"  type="button" class="btn btn-danger btn-sm remove"><i class="fa fa-minus-circle"></i> </button>
	                            </td>`)
				 return htmlRow;
			});
			$('.variation').html(tableRow);

			function makeJson() {
				const rows = $('.table-attributes tbody tr');
				const attr_val = {};

				$.each(rows, (index, item) => {
					const attr = $(item).children().first().text().trim();
					const val = $(item).children().last().text().trim();

					if (!attr_val[attr]) {
						attr_val[attr] = [];
					}
					attr_val[attr] = [...attr_val[attr], val];
				});
				return attr_val;
			}
		});



</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>





@endsection