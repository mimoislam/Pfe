<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset ("dist/img/elit.jpg")}}" class="img-circle " alt="User Image">
        </div>

        @if (Route::has('login'))
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
        </div>
      @endif

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
              <p>
                Servers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.servers.index') }}" class= "user-panel nav-link">

                  <p>Dashboard</p>

                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.servers.create') }}" class ="user-panel  nav-link ">

                  <p>Ajouter</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Scan Engines
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.scanEngs.index') }}" class= "user-panel  nav-link">

                  <p>Dashboard</p>

                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.scanEngs.create') }}" class =" user-panel  nav-link ">

                  <p>Ajouter</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-columns"></i>
              <p>
                Audits
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.audit.index') }}" class="user-panel  nav-link ">

                      <p>Dashboard</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="{{ route('admin.audit.create') }}" class="user-panel  nav-link ">

                  <p>Ajouter</p>
                </a>
              </li>


            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-edit"></i>
              <p>
                PlayBooks
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.playbooks.index')}}" class="user-panel nav-link ">

                      <p>Dashboard</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="{{route('admin.playbooks.create')}}" class="user-panel nav-link ">

                  <p>Ajouter</p>
                </a>
              </li>


            </ul>
          </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Regex
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.regex.index')}}" class="user-panel nav-link ">

                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.regex.create')}}" class="user-panel nav-link ">

                            <p>Ajouter</p>
                        </a>
                    </li>


                </ul>
            </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="fas regular fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.playbooks.index')}}" class="user-panel nav-link ">

                      <p>Dashboard</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="{{route('admin.playbooks.create')}}" class="user-panel nav-link ">

                  <p>Ajouter</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.permissions.index')}}" class="user-panel nav-link ">

                  <p>Permissions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.playbooks.create')}}" class="user-panel nav-link ">

                  <p>Roles</p>
                </a>
              </li>



            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
