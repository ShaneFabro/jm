<header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="index.html" class="logo"><b>ADMINISTRATOR</b></a>
                <!--logo end-->
                <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    <ul class="nav top-menu">
                        <!-- settings start -->
                        <!-- settings end -->
                        <!-- inbox dropdown start-->
                        <!-- inbox dropdown end -->
                    </ul>
                    <!--  notification end -->
                </div>
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="{{ route('logout') }}   ">Logout</a></li>
                    </ul>
                </div>
            </header>
            <!--header end-->

            <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">

                        <p class="centered"><a href="profile.html"><img
                                    src="assets/img/BRUH.jpg"
                                    class="img-circle" width="60"></a></p>
                        <h5 class="centered">Mike Tyson</h5>

                        <li class="mt">
                            <a class="active" href="index.html">
                                <i class="fa fa-dashboard"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        @if(auth()->user()->isAdmin())

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-desktop"></i>
                                <span>Users</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('users.index')}}">View All Users</a></li>
                                <li><a href="{{route('users.create')}}">Create Users</a></li>
                                <li><a href="">Trashed Users</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span>Categories</span>
                            </a>
                            <ul class="sub">
                                <li><a href="calendar.html">View All Announcement Categories</a></li>
                                <li><a href="gallery.html">Create Categories</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Rubric</span>
                            </a>
                            <ul class="sub">
                                <li><a href="blank.html">View Rubric</a></li>
                                <li><a href="login.html">Create Category</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Courses</span>
                            </a>
                            <ul class="sub">
                                <li><a href="form_component.html">View Courses</a></li>
								 <li><a href="form_component.html">Create Course</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Organization of the Content</span>
                            </a>
                            <ul class="sub">
                                <li><a href="basic_table.html">Basic Table</a></li>
                                <li><a href="responsive_table.html">Responsive
                                        Table</a></li>
                            </ul>
                        </li>
                        <li class="mt">
                            <a class="active" href="index.html">
                                <i class="fa fa-dashboard"></i>
                                <span>Website Settings</span>
                            </a>
                        </li>

                        @endif

                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <section id="main-content">
        <section class="wrapper">
