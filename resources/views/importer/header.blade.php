

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #049A9A">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

    </ul>




    <!-- Right navbar links -->
    <ul class="nav navbar-nav">

        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('public/backend/dist/img/AdminLTELogo.png')}}" class="user-image" alt="User Image">
                <span class="hidden-xs" style="color: #fff;"> {{ Auth::user()->name  ?? '' }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header" style="background-color: #06B0B0">
                    <img src="{{asset('public/backend/dist/img/AdminLTELogo.png')}}" class="img-circle" alt="User Image">

                    <p>
                       {{ Auth::user()->name ?? ''  }}
                        <small>E-shop</small>
                    </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->name ?? '' }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('importer.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('importer.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
            <li style="position: relative; left: 900px;">
              <?php  
                  $a = Cart::content()->count();
              ?>
              
              <a href="{{route('importer/show-cart')}}" style="color: white; font-size: 20px;">Cart <span>{{$a}}</span></a>
            </li>

        <li>
{{--   <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}

        </li>
    </ul>

  </nav>
  <!-- /.navbar -->