  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user() ? Auth::user()->name : '' }} </p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <ul class="treeview-menu">
             <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Manage Users</a></li>
                <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i> Create User</a></li>
              </ul>
            </li>


             <li class="treeview">
              <a href="#">
                <i class="fa fa-plus"></i>
                <span>Posts</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('posts.index') }}"><i class="fa fa-circle-o"></i> Manage Posts</a></li>
                <li><a href="{{ route('posts.create') }}"><i class="fa fa-circle-o"></i> Create Post</a></li>
              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-object-group"></i>
                <span>Categories</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> All Users</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Create User</a></li>
              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-tv"></i>
                <span>Media</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> All Users</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Create User</a></li>
              </ul>
            </li>










          </ul>
        </li>


    </section>
    <!-- /.sidebar -->
  </aside>