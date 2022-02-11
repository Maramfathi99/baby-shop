<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src= "{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/pp.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Maram AL-Baba</a>
       <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php
               $segment=Request::segment(2);
               ?>
          <li class="nav-item">
            <a href="{{route ('home.index') }}" class="nav-link 
            @if(!$segment)
            active
            @endif
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href='{{route("category.index")}}' class="nav-link 
             @if($segment=='categories')
            active
            @endif
            ">
              <i class="nav-icon fas fa-th"></i>
              <p>
             Categories
               
              </p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a href='{{route("product.index")}}' class="nav-link
              @if($segment=='products')
            active
            @endif
            ">
            <i class="fas fa-child"></i>
              <p>
              Products
              
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href='{{route("customer.index")}}' class="nav-link 
             @if($segment=='customers')
            active
            @endif
            ">
            <i class="fas fa-users"></i>
              <p>
              Customers
               
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href='{{route("user.index")}}' class="nav-link 
             @if($segment=='users')
            active
            @endif
            "> 
             <i class="fas fa-users"></i>
              <p>
              Users
               
              </p>
            </a>
          </li>

          <li class="nav-header">Action</li>
          <li class="nav-item">
 <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                       <i class="nav-icon far fa-circle text-danger"></i>

                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            
          </li>
        </ul>
      </nav>
    </div>
  </aside>