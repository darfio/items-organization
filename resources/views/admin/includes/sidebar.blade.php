  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="@if(!empty($dashboard_active)) {{ $dashboard_active }} @endif"><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="treeview @if(!empty($items_active)) {{ $items_active }} @endif">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>Items</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('items.index') }}">All Items</a></li>
            <li><a href="{{ route('items.create') }}">New Item</a></li>
          </ul>
        </li>

        <li class="treeview @if(!empty($item_cats_active)) {{ $item_cats_active }} @endif">
          <a href="#"><i class="fa fa-list"></i> <span>Categories</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('categories.index') }}">All Categories</a></li>
            <li><a href="{{ route('categories.create') }}">New Category</a></li>
          </ul>
        </li>        

      </ul>
      <!-- /.sidebar-menu -->


    </section>
    <!-- /.sidebar -->
  </aside>