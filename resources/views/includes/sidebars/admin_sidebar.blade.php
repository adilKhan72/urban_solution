
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('storage/project_images/favcion_navbar_logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
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
          

          <li class="nav-item has-treeview {{ (request()->is('admindashboard/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Projects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Projects List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>New Project</p>
                </a>
              </li>
            </ul>
          </li>



               <li class="nav-item has-treeview {{ (request()->is('admindashboard/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Tasks List
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Tasks</p>
                </a>
              </li>
            </ul>
          </li>





          <li class="nav-item has-treeview {{ (request()->is('option*')) ? 'menu-open' : '' }}" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Options
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
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


              <li class="nav-item has-treeview {{ (request()->is('admindashboard/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                System Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Basic</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item has-treeview {{ (request()->is('admindashboard/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Project Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            

            <li class="nav-item has-treeview {{ (request()->is('admindashboard/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Tasks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Tasks List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>CheckList</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview {{ (request()->is('admindashboard/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-sitemap"></i>
              <p>
                Scope & Services
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Scopes&Types</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Services</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item has-treeview {{ (request()->is('admindashboard/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-columns"></i>
              <p>
                Requirements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Types & Details</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-globe"></i>
                  <p>Area_Unit Types</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-bullseye"></i>
                  <p>Zones</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-user-secret nav-icon"></i>
                  <p>Clients</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-th nav-icon"></i>
                  <p>Mouzas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admindashboard.profile.index')}}" class="nav-link {{ (request()->is('admindashboard/profile')) ? 'active' : '' }}">
                  <i class="fa fa-cubes nav-icon"></i>
                  <p>Societies</p>
                </a>
              </li>


            </ul>
          </li>





            </ul>
          </li>








          
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































          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-arrow-right nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e_commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

