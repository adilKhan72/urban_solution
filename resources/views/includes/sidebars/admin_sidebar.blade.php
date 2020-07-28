
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="
      @isset($favicon_logo->setting_value)
      {{ URL::asset('storage/system_files/'.$favicon_logo->setting_value) }}
      @endif
      " alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'The Urban Solutions') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        @if (Auth::user()->profile_pic != "" || Auth::user()->profile_pic != null)
          <img src="{{ asset('storage/user_files/profile_pic/'.Auth::user()->profile_pic) }}" class="img-circle elevation-2" alt="User Img">
        @else
          <img src="{{ asset('storage/default_images/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
        @endif
        </div>
        <div class="info">
          <a href="{{route('admindashboard.profile.index')}}" class="d-block">{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}  {{ Auth::user()->last_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i>
                  <p> {{ __('Logout') }} </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </li>


               <li class="nav-header">PROJECT</li>
          <li class="nav-item has-treeview {{ (request()->is('admindashboard/projecttab*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Projects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.projecttab.index')}}" class="nav-link {{ (request()->is('admindashboard/projecttab')) ? 'active' : '' }}">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Projects List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.projecttab.newproject')}}" class="nav-link {{ (request()->is('admindashboard/projecttab/newproject')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>New Project</p>
                </a>
              </li>
            </ul>
          </li>



               <li class="nav-item has-treeview {{ (request()->is('admindashboard/tasks*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Tasks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.tasks.index')}}" class="nav-link {{ (request()->is('admindashboard/tasks')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Task List</p>
                </a>
              </li>
            </ul>
          </li>













          <li class="nav-item has-treeview {{ (request()->is('admindashboard/projectsetting*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Project Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            

            <li class="nav-item has-treeview {{ (request()->is('admindashboard/projectsetting/tasks*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Tasks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.projectsetting.tasks.list')}}" class="nav-link {{ (request()->is('admindashboard/projectsetting/tasks/list')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Tasks List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.projectsetting.tasks.checklist')}}" class="nav-link {{ (request()->is('admindashboard/projectsetting/tasks/checklist')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>CheckList</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item {{ (request()->is('admindashboard/projectsetting/scopeandservice*')) ? 'menu-open' : '' }}">
          <a href="{{route('admindashboard.projectsetting.scopeandservice.listscopeandservices')}}" class="nav-link {{ (request()->is('admindashboard/projectsetting/scopeandservice/listscopeandservices')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-sitemap"></i>
              <p>
                Scope & Services
              </p>
            </a>
          </li>




          <li class="nav-item {{ (request()->is('admindashboard/projectsetting/requirements*')) ? 'menu-open' : '' }}">
            <a href="{{route('admindashboard.projectsetting.requirements.index')}}" class="nav-link {{ (request()->is('admindashboard/projectsetting/requirements')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-columns"></i>
              <p>
                Requirements
              </p>
            </a>
          </li>


          <li class="nav-item">
                <a href="{{route('admindashboard.projectsetting.other')}}" class="nav-link {{ (request()->is('admindashboard/projectsetting/other')) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-cubes"></i>
                  <p>Other Settings</p>
                </a>
              </li>




            </ul>
          </li>












          <li class="nav-header">USERS</li>

          
          <li class="nav-item has-treeview {{ (request()->is('admindashboard/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Profile View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admindashboard.profile.informations.index')}}" class="nav-link {{ (request()->is('admindashboard/profile/informations')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Personal Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admindashboard.profile.projects.index')}}" class="nav-link {{ (request()->is('admindashboard/profile/projects')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Personal Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admindashboard.profile.qualitifcations.index')}}" class="nav-link {{ (request()->is('admindashboard/profile/qualitifcations')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Personal Qualitifcation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admindashboard.profile.experiences.index')}}" class="nav-link {{ (request()->is('admindashboard/profile/experiences')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Personal Experience</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admindashboard.profile.skills.index')}}" class="nav-link {{ (request()->is('admindashboard/profile/skills')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Personal Skills</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admindashboard.profile.emergency_contacts.index')}}" class="nav-link {{ (request()->is('admindashboard/profile/emergency_contacts')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Emergency Contacts</p>
                </a>
              </li>
            </ul>
          </li>










          <li class="nav-item has-treeview {{ (request()->is('admindashboard/users*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Manage Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.users.index')}}" class="nav-link {{ (request()->is('admindashboard/users')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>

            </ul>
          </li>










          <li class="nav-header">SYSTEM</li>




              <li class="nav-item has-treeview {{ (request()->is('admindashboard/systemsetting*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                System Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.systemsetting.index')}}" class="nav-link {{ (request()->is('admindashboard/systemsetting')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Basic</p>
                </a>
              </li>
            </ul>
          </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

