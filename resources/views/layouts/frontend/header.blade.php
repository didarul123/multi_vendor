 <style>
     

/* header middle */
.wrapper {
    background: #eee;
}

/*.search-form form a.search-btn {
    display: inline-block;
    background: orangered;
    padding: 8px 16px;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    color: #fff;
}*/
.search-btn {
    display: inline-block;
    background: orangered;
    padding: 7.5px 17px;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    color: #fff;
    border: 0;
}
.search-form form input {
    height: 39px;
    border: 2px solid orangered;
    padding: 0 10px;
    flex: 1;
}
.header-area {
    background: white;
}
.header-middle {
    padding: 20px 0;
}
.search-form {
    margin-top: 5px;
}
select#search-category {
    padding: 6px 3px 6px 7px;
    border: 2px solid orangered;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    border-right: 0;
}
.header-middle .search-form form {
    display: flex;
    justify-content: center;
    align-items: center;
}
.icon-wrap.d-flex {
    justify-content: flex-end;
}
.icont-content span {
    display: block;
}

.icont-content span a {
    color: #000;
}
.icon-inner {
    margin-right: 15px;
}
.icon-inner a {
    color: #000;
}
/* header bottom*/
.header-bottom nav {
    padding: 8px 0;
}
.header-bottom {
    border-top: 1px solid #eee;
}

 </style>


    <?php
        $categories = App\Models\Category::where('status', 1)->where('parent_id', 0)->get();
        $user_id = Session::get('user_id');
        $user_name = Session::get('name');

        $first_name = Session::get('first_name');
        $Cart = Cart::content()->count();
    ?>

    <header>
    <header class="header-area">

        <!-- Header middle -->
        <div class="header-middle">
            <div class="container-fluid">
                 <div class="row">
                    <div class="col-md-2">
                       <div class="logo-area">
                           <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/assets/images/logo.png')}}" alt=""></a>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search-form" style="position: relative;">
                            <form action="{{route('search-product')}}" method="post">
                                @csrf
                               <select name="category_id" id="search-category">
                                @foreach($categories as $category)
                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                               </select>
                               <input type="text" placeholder="What Are You Looking For..." name="product_name" onkeyup="ProductSearch(this)">
                               <button class="search-btn" type="submit"><i class="fa fa-search" ></i> Search</button>
                            </form>
                            <div style="background: rgb(255, 255, 255);width: 72%;padding: 4px;overflow-y: scroll;position: absolute;z-index: 1; border: 1px solid #cccccc;left: 109px;" id="show_product"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-wrap d-flex">

                            @if($user_id)
                                @if($first_name)

                                    <div class="icon-inner d-flex ">
                                        <i class="fal fa-user" style="margin-top: 8px;  margin-right: 10px"></i>
                                        <div class="icont-content">
                                            <span><a href="" class="login">{{$first_name}}</a></span>
                                        </div>
                                    </div>

                                @else

                                    <div class="icon-inner d-flex ">
                                        <i class="fal fa-user" style="margin-top: 8px;  margin-right: 10px"></i>
                                        <div class="icont-content">
                                            <span><a href="" class="login">{{$user_name}}</a></span>
                                        </div>
                                    </div>

                                @endif
                                    <div class="icon-inner d-flex ">
                                        <i class="fal fa-sign-out" style="margin-top: 8px;  margin-right: 10px"></i>
                                        <div class="icont-content">
                                            <span><a href="{{route('logout')}}" class="login">Logout</a></span>
                                        </div>
                                    </div>

                            @else

                            <div class="icon-inner d-flex ">
                                <i class="fal fa-user" style="margin-top: 8px; font-size: 33px; margin-right: 10px"></i>
                                <div class="icont-content">
                                    <span><a href="{{route('loginForm')}}" class="login">Sign In</a></span>
                                    <span><a href="{{route('registration')}}" class="login">Join Free</a></span>
                                </div>
                            </div>
                            <div class="icon-inner text-center d-flex flex-column" style="margin-top: 6px;">
                                <i class="fal fa-comment "></i>
                                <a href="" class="message">message</a>
                            </div>
                            <div class="icon-inner text-center" style="margin-top: 6px;">
                                <i class="fal fa-comment-dollar d-block"></i>
                                <a href="" class="order">Orders</a>
                            </div>
                            <div class="icon-inner text-center" style="margin-top: 6px;">
                                <i class="fal fa-cart-plus d-block"></i>
                                <a href="" class="cart">Cart</a>
                            </div>
                            @endif
                        </div>
                    </div>
                 </div>
            </div>
        </div>


        <!--header bottom-->
        <div class="header-bottom">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fa fa-bars"></i>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{URL::to('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('ready-to-ship')}}">Ready to Ship</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle service-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="service-dropdown-menu">
                                <div class="left-side">
                                    <ul>
                                        <li><a href=""><i class="fas fa-dollar-sign"></i> Trade Assurance</a></li>
                                        <li><a href=""><i class="fas fa-dollar-sign"></i> Pay Later</a></li>
                                        <li><a href=""><i class="fas fa-dollar-sign"></i> Payment Terms: Net-60</a></li>
                                        <li><a href=""><i class="fas fa-dollar-sign"></i> Production Monitoring & Inspection Services</a></li>
                                        <li><a href=""><i class="fas fa-dollar-sign"></i> Logistic Service</a></li>
                                    </ul>
                                </div>
                                <div class="right-side">
                                    <p>Sourcing Solutions</p>
                                    <ul>
                                        <li><a href="">Submit RFQ</a></li>
                                        <li><a href="">Suppliers by Regions</a></li>
                                    </ul>
                                </div>
                            </div>
                          </div>
                        </li>

                      </ul>
                      <ul class="ml-auto">
                        <li><a href="">Get the App |</a></li>
                        <li><a href="">English- USD</a></li>
                      </ul>
                    </div>
                  </nav>
            </div>
        </div>
    </header>


<script src="{{asset('public/frontend/js/jquery-3.5.1.min.js')}}"></script>

<script>
 
$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$("#show_product").hide();

});
   
function ProductSearch(element){

  var token =  $("input[name=_token]").val();
  var datastr = "product_name=" + element.value + "&token=" + token; 
    if (element.value != '') { 
        $.ajax({
            type: "POST",
            url: '<?php echo route('product-search')?>',
            data: datastr,
            success: function( msg ) {
                $("#show_product").show();
                $('#show_product').html(msg);
                console.log(msg);
            }
        });
    }else {
        $('#show_product').hide();
    }
}

</script>