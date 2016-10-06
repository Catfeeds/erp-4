          <!-- Main Header -->
          <header class="main-header">

            <!-- Logo -->
            <a href="{!!route('home')!!}" class="logo"><b>Luster</b>ERP</a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">{{ trans('labels.toggle_navigation') }}</span>
              </a>
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                  <li class="dropdown">                  
                  @include('backend.includes.partials.language')
                  </li>
                  <!-- Messages: style can be found in dropdown.less-->
                  <li class="dropdown messages-menu">
                  @include('backend.includes.partials.messages')
                  </li><!-- /.messages-menu -->

                  <!-- Notifications Menu -->
                  <li class="dropdown notifications-menu">
                  @include('backend.includes.partials.notifications')
                  </li>
                  <!-- Tasks Menu -->
                  <li class="dropdown tasks-menu">
                  @include('backend.includes.partials.tasks')
                  </li>
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                  @include('backend.includes.partials.toggle')
                  </li>
                </ul>
              </div>
            </nav>
          </header>
