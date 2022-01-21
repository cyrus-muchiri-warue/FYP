<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          
          <small class="text-white">
            {{auth()->user()->email}}

          </small>
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
               <li class="nav-item">
            <a href="{{route('projects.index')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
             Projects
              </p>
            </a>
          </li>
         
          
          <li class="nav-item">
            <a href="{{route('files.index')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
             Files
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('languages.index')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
             Languages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('activities.index')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
              Activities
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('notification.compose')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
               Notifications
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('notification.inbox')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
               Inbox
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('project.archive')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
               Archive
              </p>
            </a>
          </li>
      

          
     
     
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>