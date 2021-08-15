<!-- Brand Logo -->
<a href="../../index3.html" class="brand-link">
    <img src="{{asset('/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin System</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex mr-0">
      <div class="image">
        @if (Session::get('user')->role==1)
        <img style="width:50%" src="{{asset('/images/admin.png')}}" class="img-circle elevation-2" alt="User Image">
        @else
        <img style="width:90%" src="{{asset('/images/manager.jpg')}}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="infor ml-0">
        <a href="#" class="d-block">{{Session::get('user')->firstname}}</a>
        <a href="{{ route('admin.account.edit', Session::get('user')->id) }}">Change Profile</a>
        <a href="{{ route('admin.logout')}}" class="d-block">Logout</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @if (session('user')->role==1)
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Account
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Admin
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.account.index')}}" class="nav-link ml-3">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Admin List
                    </p>
                  </a>
                </li> 
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.account.create')}}" class="nav-link ml-3">
                    <i class="nav-icon fas fa-user-plus "></i>
                    <p>
                      Create New User
                    </p>
                  </a>
                </li> 
              </ul>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Customer
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.customer.index')}}" class="nav-link ml-3">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Customer List
                    </p>
                  </a>
                </li> 
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.customer.create')}}" class="nav-link ml-3">
                    <i class="nav-icon fas fa-user-plus "></i>
                    <p>
                      Create New User
                    </p>
                  </a>
                </li> 
              </ul>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fab fa-product-hunt"></i>
            <p>
              Product
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.brand.index')}}" class="nav-link ml-3">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  Brand
                </p>
              </a>
            </li> 
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.product.index')}}" class="nav-link ml-3">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  Product List
                </p>
              </a>
            </li> 
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.product.create')}}" class="nav-link ml-3">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>
                  Create New Product
                </p>
              </a>
            </li> 
          </ul>
			 <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.brand.create')}}" class="nav-link ml-3">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>
                  Insert New Brand
                </p>
              </a>
            </li> 
          </ul>
        </li>

        <li class="nav-item">
          <a href=#" class="nav-link">
            <i class="nav-icon fas fa-cart-arrow-down"></i>
            <p>
              Order
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.order.index')}}" class="nav-link ml-3">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  Order List
                </p>
              </a>
            </li> 
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.orderdetail.index')}}" class="nav-link ml-3">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>
                  Order Detail
                </p>
              </a>
            </li> 
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.customercomment.index')}}" class="nav-link">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Feedback
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->