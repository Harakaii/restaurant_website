@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('/home')}}" class="brand-link text-decoration-none">
      <!-- <img src="{{ asset('/BackEndSourceFile') }}/dist/img/Romdoul.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-4" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Romdoul Restaurant</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/BackEndSourceFile') }}/dist/img/Profile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-decoration-none">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{ ($prefix=='/category')?'menu-open':'' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-bars"></i>
              <p>
              Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('show_cate_table') }}" class="nav-link {{ ($route=='/show_cate_table')?'active':'' }} ">
                <i class="fa fa-plus-circle nav-icon"></i>

                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage_cate') }}" class="nav-link {{ ($route=='/manage_cate')?'active':'' }}" >
                                  <i class="far fa-edit nav-icon"></i>

                  <p>Manage Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix=='/delivery')?'menu-open':'' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-caravan"></i>
              <p>
                Delivery 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('show_delivery_add_table') }}" class="nav-link ">
                <i class="fa fa-plus-circle nav-icon"></i>

                  <p>Add Delivery </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage_delivery') }}" class="nav-link">
                                  <i class="far fa-edit nav-icon"></i>

                  <p>Manage Delivery </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- coupond -->
          <li class="nav-item {{ ($prefix=='/coupon')?'menu-open':'' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-gifts"></i>
              <p>
                Coupond Code
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('show_add_coupon_table') }}" class="nav-link ">
                <i class="fa fa-plus-circle nav-icon"></i>

                  <p>Add Coupond Code </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage_coupon') }}" class="nav-link">
                                  <i class="far fa-edit nav-icon"></i>

                  <p>Manage Coupond Code </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Dish -->
          <li class="nav-item {{ ($prefix=='/dish')?'menu-open':'' }}">
            <a href="#" class="nav-link ">
             <i class="nav-icon fas fa-utensils"></i> 
              <p>
                Dish
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('show_add_dish_table') }}" class="nav-link ">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Add Dish </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage_dish') }}" class="nav-link">
                <i class="far fa-edit nav-icon"></i>

                  <p>Manage Dish </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Order -->
          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('show_order') }}" class="nav-link ">
                <i class="far fa-edit nav-icon"></i>

                  <p>Manage Order </p>
                </a>
              </li>

            </ul>
          </li>
          {{-- ================ Reports start here ==================================--}}


<li class="nav-item has-treeview {{ ($prefix=='/order')?'menu-open':'' }}">
     <a href="#" class="nav-link ">
         <i class="nav-icon fas fa-cogs" aria-hidden="true"></i>
         <p>
             Report
             <i class="right fas fa-angle-left"></i>
         </p>
     </a>
     <ul class="nav nav-treeview">
         <li class="nav-item">
             <a href="{{ route('booking_report') }}" class="nav-link {{ ($route=='booking_report')?'active':'' }}">
                 <i class="fa fa-plus-circle nav-icon"></i>
                 <p>Report List</p>
             </a>
         </li>
     </ul>
 </li>



 {{-- ================ Reports end here ==================================--}}
          

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>