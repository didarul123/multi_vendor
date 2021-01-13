@extends('layouts.importer.app')

@section('content')

    <link rel="stylesheet" href="{{asset('public/backend/dist/css/product_details.css')}}">

    <section class="product-details-area gry-bg">
        <div class="container-fluid">

            <div class="bg-white">

               <!-- Product gallery and Description -->
               <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-6">
                    <div class="product-gal sticky-top d-flex flex-row-reverse xzoom-container">
                      
                            <div class="product-gal-img">
                                <img class="xzoom" src="{{ asset($product->image) }}" xoriginal="{{ asset($product->image) }}" style="width: 100%;"/>

                            </div>
                            <div class="product-gal-thumb">
                                <div class="xzoom-thumbs">

                                	@foreach($product_images as $product_image)
                                    <a href="{{ asset($product_image->product_image) }}">
                                        <img class="xzoom-gallery" width="80" src="{{ asset($product_image->product_image) }}"  xpreview="{{ asset($product_image->product_image) }}">
                                    </a>
                                    @endforeach
                                  
                                </div>
                            </div>
                     
                    </div>
                </div>
        
                    <div class="col-lg-6">
                        <!-- Product description -->
                        <div class="product-description-wrapper">
                            <!-- Product title -->
                            <h1 class="product-title mb-2">
                             	{{$product->name}}
                            </h1>

                            <div class="row align-items-center my-1">
                                <div class="col-6">
                                 
                            
                                </div>
                                <div class="col-6 text-right">
                                    <ul class="inline-links inline-links--style-1">
                                     
                                       	@if($product->qty > 0)
                                        <li>
                                            <span class="badge badge-md badge-pill bg-green">In Stok</span>
                                        </li>
                                   		@else
                                        <li>
                                            <span class="badge badge-md badge-pill bg-red">Out stock</span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>


                            <hr>

                            <div class="row align-items-center">
                                <div class="sold-by col-auto">
                                    <small class="mr-2">Sold by: </small><br>
                                    
                                        <a href="#">{{$shop->name}}</a>
                                   
                                        Inhouse product
                                </div>
                               
                                <div class="col-auto">
                                    <button class="btn btn-secondary">Message Seller</button>
                                </div>
                            </div>

                            <hr>

                           

                                <div class="row no-gutters mt-4">
                                    <div class="col-2">
                                        <div class="product-description-label">Price:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price-old">
                                            <del>
                                                <span>&#2547; {{$product->market_price}}</span>
                                            	<span class="piece">/ 1pcs</span>
                                            </del>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label mt-1">Discount Price:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price text-success">
                                            <strong>
                                                &#2547; <span >{{$product->sell_price}}</span>
                                                	<input type="hidden" id="DiscountPrice" value="{{$product->sell_price}}">
                                            </strong>
                                            <span class="piece">/ 1pcs</span>
                                        </div>
                                    </div>
                                </div>

                               

                            <hr>

                            
                                  	<div class="row no-gutters">
                                  		@foreach($product_attributes as $product_attribute)
                                        <div class="col-2">
                                            <div class="product-description-label mt-2">{{$product_attribute->attribute->name}}:</div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-inline checkbox-color mb-1">
                                              
                                                <li style="margin-top: 8px;">
                                                    {{ $product_attribute->product_attribute_attribute_value->attribute_value->value ?? ''}} &nbsp;
                                                </li>
                                               
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="avialable-amount">(<span id="available-quantity">{{$product->qty}}</span> (available)</div>
                                    <hr>
                               
                                @if($product->product_variation == 0)
                                
                                <form action="{{URL::to('importer/shop')}}" method="post">
                                	@csrf
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="input-group input-group--style-2 pr-3">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="minus" data-field="quantity" disabled="disabled">
                                                        <i class="la la-minus"></i>
                                                    </button>
                                                </span>

                                                <select name="attribute_value" id="attribute_value" class="form-control" onchange="AttributValue()" required="">
                                                	<option value="" selected="" disabled="">--Select--</option>
                                                	@foreach($product_attributes as $product_attribute)
                                                	<option value="{{ $product_attribute->product_attribute_attribute_value->attribute_value->value ?? ''}}">{{ $product_attribute->product_attribute_attribute_value->attribute_value->value ?? ''}}</option>
                                                	@endforeach
                                                </select>

<!--                                                 <p style="width: 150px;">{{ $product_attribute->product_attribute_attribute_value->attribute_value->value ?? ''}}</p>
                                                <input type="hidden" name="attribute_value_id" value="{{ $product_attribute->product_attribute_attribute_value->attribute_value->id ?? ''}}">
 -->
                                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                                <input type="text" name="quantity" class="form-control input-number text-center" placeholder="1" value="1" id="quantity" onkeyup="TotalAmountHandaler()">
                                               

                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="plus" data-field="quantity">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                @endif

                                <!-- Quantity + Add to cart -->
                                @if($product->product_variation == 1)
                                @foreach($product_variations as $product_variation)

                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="input-group input-group--style-2 pr-3">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="minus" data-field="quantity" disabled="disabled">
                                                        <i class="la la-minus"></i>
                                                    </button>
                                                </span>

                                                <p style="width: 64px;"></p>
                                                <p style="width: 64px;"></p>

                                                <input type="text" name="quantity" class="form-control input-number text-center" placeholder="1" value="1" min="1" max="10" >


                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="plus" data-field="quantity">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="avialable-amount">(<span id="available-quantity">{{$product->qty}}</span> (available)</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                                <hr>

                                <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                    <div class="col-2">
                                        <div class="product-description-label">Total Price:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price">
                                            <strong id="chosen_price">
                                               <span id="TotalPrice"> 0.00 </span> /-
                                            </strong>
                                        </div>
                                    </div>
                                </div>


                            <div class="d-table width-100 mt-3">
                                <div class="d-table-cell">
                                    <!-- Buy Now button -->
                                  
                                        <button type="submit" class="btn btn-danger btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now" >
                                            <i class="fas fa-shopping-cart"></i> Buy Now
                                        </button>
                            </form>
                            			<form action="{{route('importer/add-to-cart')}}" method="post">
                            				@csrf
                            				<input type="hidden" value="" name="attribute_value" id="AttributValue">
                            				<input type="hidden" value="1" name="quantity" id="qty">
                            				<input type="hidden" name="product_id" value="{{$product->id}}">


                                        	<button type="submit" class="btn btn-success btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart">
                                            <i class="fas fa-cart-plus"></i> 
                                            	<span class="d-md-inline-block"> Add to cart</span>
                                        	</button>
                                        </form>
                                  
                                </div>
                            </div>


                            <hr class="mt-2">

                           
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label">Refund:</div>
                                    </div>
                                    <div class="col-10">
                                        <a href="#" target="_blank">  <img src="images/refund-sticker.jpg" height="36"></a>
                                        <a href="#" class="ml-2" target="_blank">View Policy</a>
                                    </div>
                                </div>
                           
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label">Seller Guarantees:

                                        </div>
                                    </div>
                                    <div class="col-10">
                                       
                                            Verified seller
                                       
                                    </div>
                                </div>
                       
                            <div class="row no-gutters mt-4">
                                <div class="col-2">
                                    <div class="product-description-label mt-2">Share:</div>
                                </div>
                                <div class="col-10">
                                    <div id="share">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gry-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="seller-info-box mb-3">
                        <div class="sold-by position-relative">
                           
                                <div class="position-absolute medal-badge">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 287.5 442.2">
                                        <polygon style="fill:#F8B517;" points="223.4,442.2 143.8,376.7 64.1,442.2 64.1,215.3 223.4,215.3 "/>
                                        <circle style="fill:#FBD303;" cx="143.8" cy="143.8" r="143.8"/>
                                        <circle style="fill:#F8B517;" cx="143.8" cy="143.8" r="93.6"/>
                                        <polygon style="fill:#FCFCFD;" points="143.8,55.9 163.4,116.6 227.5,116.6 175.6,154.3 195.6,215.3 143.8,177.7 91.9,215.3 111.9,154.3
                                        60,116.6 124.1,116.6 "/>
                                    </svg>
                                </div>

                            <div class="title">Sold By</div>
                           
                                <a href="#" class="name d-block">{{$shop->name}}
                              
                                    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                              
                                    <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                             
                                </a>
                                <!-- <div class="location">Adabor,Mohammadpur</div> -->
                        

                        
                        </div>
                        <div class="row no-gutters align-items-center">
                          
                                <div class="col">
                                    <a href="#" class="d-block store-btn">Visit Store</a>
                                </div>
                                <div class="col">
                                    <ul class="social-media social-media--style-1-v4 text-center">
                                        <li>
                                            <a href="#" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                                <i class="fab fa-facebook-f text-primary"></i>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="google" target="_blank" data-toggle="tooltip" data-original-title="Google">
                                                <i class="fab fa-google text-danger"></i>
                                            </a>
                                        </li>
                                      
                                    </ul>
                                </div>

                        </div>
                    </div>

                </div>
                <div class="col-xl-9">
                    <div class="product-desc-tab bg-white">
                        <div class="tabs tabs--style-2">
                            <ul class="nav nav-tabs justify-content-center sticky-top bg-white">
                                <li class="nav-item">
                                    <a href="#tab_default_1" data-toggle="tab" class="nav-link text-uppercase strong-600  border-bottom border-success active show">Description</a>
                                </li>
                             
                               
                                <li class="nav-item">
                                    <a href="#tab_default_4" data-toggle="tab" class="nav-link text-uppercase strong-600">Reviews</a>
                                </li>
                            </ul>

                            <div class="tab-content pt-0">
                                <div class="tab-pane active show" id="tab_default_1">
                                    <div class="py-2 px-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mw-100 overflow--hidden">
                                                   {!!$product->description!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane" id="tab_default_4">
                                    <div class="fluid-paragraph py-4">
                                    
                                            <div class="block block-comment">
                                                <div class="block-image">
                                                    <img src="images/placeholder.jpg" data-src="images/placeholder.jpg" class="rounded-circle lazyload">
                                                </div>
                                                <div class="block-body">
                                                    <div class="block-body-inner">
                                                        <div class="row no-gutters">
                                                            <div class="col">
                                                                <h3 class="heading heading-6">
                                                                    <a href="javascript:;">Karim</a>
                                                                </h3>
                                                                <span class="comment-date">
                                                                   01/05/2021
                                                                </span>

                                                            </div>
                                                            <div class="col">
                                                                <div class="rating text-right clearfix d-block">
                                                                    <span class="star-rating star-rating-sm float-right">
                                                                       
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star"></i>  
                                                                            <i class="fa fa-star"></i> 
                                                                             <i class="fa fa-star"></i>
                                                                      
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <p class="comment-text">
                                                           user comment
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
      

                                      
                                                <div class="leave-review">
                                                    <div class="section-title section-title--style-1">
                                                        <h3 class="section-title-inner heading-6 strong-600 text-uppercase">
                                                            Write a review
                                                        </h3>
                                                    </div>
                                                    <form class="form-default" role="form" action="#" method="POST">
                                                      
                                                        <input type="hidden" name="product_id" value="">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="" class="text-uppercase c-gray-light">Your name</label>
                                                                    <input type="text" name="name" value="" class="form-control"  required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="" class="text-uppercase c-gray-light">Email</label>
                                                                    <input type="text" name="email" value="" class="form-control" required >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="c-rating mt-1 mb-1 clearfix d-inline-block">
                                                                    <input type="radio" id="star5" name="rating" value="5" required/>
                                                                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4" required/>
                                                                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3" required/>
                                                                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2" required/>
                                                                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1" required/>
                                                                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" rows="4" name="comment" placeholder="Your review" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-styled btn-base-1 btn-circle mt-4 btn-info">
                                                                Send review
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                         
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5">Any query about this product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="#" method="POST" enctype="multipart/form-data">
                
                    <input type="hidden" name="product_id" value="">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="title" value="" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="8" name="message" required placeholder="Your Question"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-base-1 btn-styled">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<script type="text/javascript">
    $(document).ready(function() {
        $('#share').jsSocials({
            showLabel: false,
            showCount: false,
            shares: ["email", "twitter", "facebook", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        });
     
    });
    function CopyToClipboard(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select().createTextRange();
                document.execCommand("Copy");

            } else if (window.getSelection) {
                var range = document.createRange();
                document.getElementById(containerid).style.display = "block";
                range.selectNode(document.getElementById(containerid));
                window.getSelection().addRange(range);
                document.execCommand("Copy");
                document.getElementById(containerid).style.display = "none";

            }
            showFrontendAlert('success', 'Copied');
        }



        $(".xzoom").xzoom({tint: '#333', Xoffset: 15});


    function TotalAmountHandaler(){
        var DiscountPrice = $('#DiscountPrice').val();
        var quantity = $('#quantity').val();
        var total = quantity * DiscountPrice;
        $('#TotalPrice').html(total);
        $('#qty').val(quantity);

    }

    function AttributValue(){
    	var attribute_value = $('#attribute_value').val();
    	$('#AttributValue').val(attribute_value);
    }
   
</script>



@endsection