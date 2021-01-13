
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
            <a href="{{URL::to('merchant/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview">
            <a href="{{URL::to('merchant/order')}}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Order
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview
          {{ request()->is('merchant/withdraw') ? 'menu-open' : '' }}
          ">
            <a href="{{URL::to('merchant/withdraw')}}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Withdraw
              </p>
            </a>
          </li>
          

<!--           <li class="nav-item has-treeview">
            <a href="{{URL::to('merchant/order')}}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Order
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview
          {{ request()->is('merchant/withdraw') ? 'menu-open' : '' }}
          ">
            <a href="{{URL::to('merchant/withdraw')}}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Withdraw
              </p>
            </a>
          </li>    -->       


          <li class="nav-item has-treeview  
              {{ request()->is('merchant/attribute/create') ? 'menu-open' : '' }}
              {{ request()->is('merchant/attribute') ? 'menu-open' : '' }}
              {{ request()->is('merchant/attribute_value') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fab fa-bimobject"></i>
              <p class=" has-treeview">
                Attribute
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('merchant/attribute/create') ? 'active' : '' }}">
                <a href="{{URL::to('merchant/attribute/create')}}" class="nav-link {{ request()->is('merchant/attribute/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Attribute</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('merchant/attribute') ? 'active' : '' }}">
                <a href="{{URL::to('merchant/attribute')}}" class="nav-link {{ request()->is('merchant/attribute') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Attribute</p>
                </a>
              </li>

              <li class="nav-item {{ request()->is('merchant/attribute_value') ? 'active' : '' }}">
                <a href="{{URL::to('merchant/attribute_value')}}" class="nav-link {{ request()->is('merchant/attribute_value') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Attribute Value</p>
                </a>
              </li>  


            </ul>
          </li>



          <li class="nav-item has-treeview  
              {{ request()->is('merchant/product/create') ? 'menu-open' : '' }}
              {{ request()->is('merchant/product') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p class=" has-treeview">
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('merchant/product/create') ? 'active' : '' }}">
                <a href="{{URL::to('merchant/product/create')}}" class="nav-link {{ request()->is('merchant/product/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('merchant/product') ? 'active' : '' }}">
                <a href="{{URL::to('merchant/product')}}" class="nav-link {{ request()->is('merchant/product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview
          {{ request()->is('merchant/vendors') ? 'menu-open' : '' }}
          ">
            <a href="{{route('merchant/vendors')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Vendors
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{URL::to('merchant/shop')}}" class="nav-link">
              <i class="fas fa-shopping-cart"></i> &nbsp;
              <p>
                Shop Now
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{URL::to('merchant/order-history')}}" class="nav-link">
              <i class="fas fa-shopping-cart"></i> &nbsp;
              <p>
                Order history
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>





