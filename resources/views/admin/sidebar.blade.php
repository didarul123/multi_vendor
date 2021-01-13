
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="background-color: #049A9A">
      <img src="{{asset('public/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block"> {{ Auth::user()->name  ?? '' }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{URL::to('admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{URL::to('admin/order')}}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Order
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview
          {{ request()->is('admin/withdraw') ? 'menu-open' : '' }}
          ">
            <a href="{{URL::to('admin/withdraw')}}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Withdraw
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview  
              {{ request()->is('admin/category/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/category') ? 'menu-open' : '' }}
              {{ request()->is('admin/subcategory/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/subcategory') ? 'menu-open' : '' }}
              {{ request()->is('admin/prosubcategory/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/prosubcategory') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fas fa-plus-square"></i>
              <p class=" has-treeview">
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/category/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/category/create')}}" class="nav-link {{ request()->is('admin/category/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/category') ? 'active' : '' }}">
                <a href="{{URL::to('admin/category')}}" class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>

<!--               <li class="nav-item {{ request()->is('admin/subcategory/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/subcategory/create')}}" class="nav-link {{ request()->is('admin/subcategory/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sub Category</p>
                </a>
              </li>               

              <li class="nav-item {{ request()->is('admin/subcategory') ? 'active' : '' }}">
                <a href="{{URL::to('admin/subcategory')}}" class="nav-link {{ request()->is('admin/subcategory') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Sub Category</p>
                </a>
              </li> 

              <li class="nav-item {{ request()->is('admin/prosubcategory/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/prosubcategory/create')}}" class="nav-link {{ request()->is('admin/prosubcategory/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Pro Sub Category</p>
                </a>
              </li> 

              <li class="nav-item {{ request()->is('admin/prosubcategory') ? 'active' : '' }}">
                <a href="{{URL::to('admin/prosubcategory')}}" class="nav-link {{ request()->is('admin/prosubcategory') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Pro Sub Category</p>
                </a>
              </li>  -->

            </ul>
          </li>

          <li class="nav-item has-treeview  
              {{ request()->is('admin/brand/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/brand') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fab fa-bimobject"></i>
              <p class=" has-treeview">
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/brand/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/brand/create')}}" class="nav-link {{ request()->is('admin/brand/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Brand</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/brand') ? 'active' : '' }}">
                <a href="{{URL::to('admin/brand')}}" class="nav-link {{ request()->is('admin/brand') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Brand</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview  
              {{ request()->is('admin/attribute/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/attribute') ? 'menu-open' : '' }}
              {{ request()->is('admin/attribute_value') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fab fa-bimobject"></i>
              <p class=" has-treeview">
                Attribute
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/attribute/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/attribute/create')}}" class="nav-link {{ request()->is('admin/attribute/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Attribute</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/attribute') ? 'active' : '' }}">
                <a href="{{URL::to('admin/attribute')}}" class="nav-link {{ request()->is('admin/attribute') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Attribute</p>
                </a>
              </li>

              <li class="nav-item {{ request()->is('admin/attribute_value') ? 'active' : '' }}">
                <a href="{{URL::to('admin/attribute_value')}}" class="nav-link {{ request()->is('admin/attribute_value') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Attribute Value</p>
                </a>
              </li>  

            </ul>
          </li>

<!--           <li class="nav-item has-treeview  
              {{ request()->is('admin/color/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/color') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fas fa-tint"></i>
              <p class=" has-treeview">
                Color
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/color/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/color/create')}}" class="nav-link {{ request()->is('admin/color/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Color</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/color') ? 'active' : '' }}">
                <a href="{{URL::to('admin/color')}}" class="nav-link {{ request()->is('admin/color') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Color</p>
                </a>
              </li>
            </ul>
          </li> -->



<!--           <li class="nav-item has-treeview  
              {{ request()->is('admin/size/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/size') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p class=" has-treeview">
                Size
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/size/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/size/create')}}" class="nav-link {{ request()->is('admin/size/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Size</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/size') ? 'active' : '' }}">
                <a href="{{URL::to('admin/size')}}" class="nav-link {{ request()->is('admin/size') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Size</p>
                </a>
              </li>
            </ul>
          </li> -->



          <li class="nav-item has-treeview  
              {{ request()->is('admin/product/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/product') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p class=" has-treeview">
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/product/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/product/create')}}" class="nav-link {{ request()->is('admin/product/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/product') ? 'active' : '' }}">
                <a href="{{URL::to('admin/product')}}" class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview  
              {{ request()->is('admin/post/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/post') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p class=" has-treeview">
                Post
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/post/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/post/create')}}" class="nav-link {{ request()->is('admin/post/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Post</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/post') ? 'active' : '' }}">
                <a href="{{URL::to('admin/post')}}" class="nav-link {{ request()->is('admin/post') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Post</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview
          {{ request()->is('admin/vendor') ? 'menu-open' : '' }}
          ">
            <a href="{{URL::to('admin/vendor')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Vendors
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview
          {{ request()->is('admin/customer') ? 'menu-open' : '' }}
          ">
            <a href="{{URL::to('admin/customer')}}" class="nav-link">
              <i class="fas fa-user-shield"></i> &nbsp;
              <p>
                 Customer
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview
          {{ request()->is('admin/subscription') ? 'menu-open' : '' }}
          ">
            <a href="{{URL::to('admin/subscription')}}" class="nav-link">
              <i class="fas fa-envelope"></i>  &nbsp;
              <p>
                 Subscription
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview
              {{ request()->is('admin/page/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/page') ? 'menu-open' : '' }}              
              {{ request()->is('admin/deliverymethod/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/deliverymethod') ? 'menu-open' : '' }}              
              {{ request()->is('admin/social/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/social') ? 'menu-open' : '' }}              
              {{ request()->is('admin/paymentmethod/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/paymentmethod') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview
              {{ request()->is('admin/page/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/page') ? 'menu-open' : '' }} 
              ">
                <a href="" class="nav-link" style="margin-left: 21px;">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Page
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item {{ request()->is('admin/page/create') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/page/create')}}" class="nav-link {{ request()->is('admin/page/create') ? 'active' : '' }}"  style="margin-left: 44px;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Page</p>
                    </a>
                  </li>                   

                  <li class="nav-item {{ request()->is('admin/page') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/page')}}" class="nav-link {{ request()->is('admin/page') ? 'active' : '' }}"  style="margin-left: 44px;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Page</p>
                    </a>
                  </li>              
                </ul>
              </li> 


              <li class="nav-item has-treeview
              {{ request()->is('admin/deliverymethod/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/deliverymethod') ? 'menu-open' : '' }}
              ">
                <a href="" class="nav-link" style="margin-left: 21px;">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Delivery Method
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item {{ request()->is('admin/deliverymethod/create') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/deliverymethod/create')}}" class="nav-link {{ request()->is('admin/deliverymethod/create') ? 'active' : '' }}"  style="margin-left: 44px;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Method</p>
                    </a>
                  </li>                   

                  <li class="nav-item {{ request()->is('admin/deliverymethod') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/deliverymethod')}}" class="nav-link {{ request()->is('admin/deliverymethod') ? 'active' : '' }}"  style="margin-left: 44px;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Method</p>
                    </a>
                  </li>              
                </ul>
              </li> 


              <li class="nav-item has-treeview
              {{ request()->is('admin/paymentmethod/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/paymentmethod') ? 'menu-open' : '' }}
              ">
                <a href="" class="nav-link" style="margin-left: 21px;">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Payment Method
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item {{ request()->is('admin/paymentmethod/create') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/paymentmethod/create')}}" class="nav-link {{ request()->is('admin/paymentmethod/create') ? 'active' : '' }}"  style="margin-left: 44px;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Method</p>
                    </a>
                  </li>                   

                  <li class="nav-item {{ request()->is('admin/paymentmethod') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/paymentmethod')}}" class="nav-link {{ request()->is('admin/paymentmethod') ? 'active' : '' }}"  style="margin-left: 44px;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Method</p>
                    </a>
                  </li>              
                </ul>
              </li> 

              <li class="nav-item has-treeview
              {{ request()->is('admin/social/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/social') ? 'menu-open' : '' }}
              ">
                <a href="" class="nav-link" style="margin-left: 21px;">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Social Link
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
<!--                   <li class="nav-item {{ request()->is('admin/social/create') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/social/create')}}" class="nav-link {{ request()->is('admin/social/create') ? 'active' : '' }}"  style="margin-left: 44px;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Link</p>
                    </a>
                  </li>   -->                 

                  <li class="nav-item {{ request()->is('admin/social') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/social')}}" class="nav-link {{ request()->is('admin/social') ? 'active' : '' }}"  style="margin-left: 44px;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Link</p>
                    </a>
                  </li>              
                </ul>
              </li> 

            </ul>
          </li>





          





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>





