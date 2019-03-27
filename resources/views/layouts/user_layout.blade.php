<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{csrf_token()}}">

    @if(auth()->user()->isAdmin())
    <title>Counselor Dashoard</title>
    @elseif(auth()->user()->isCounselor())
    <title>Counselor Dashboard</title>
    @endif

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,700'>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="/eval/css/style.css">
    <link rel="stylesheet" href="/eval/css/bootstrap.css">

    <!--external css-->
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/css/toaster.min.css')}}">
    @include('includes.tinyeditor')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('dashboard/js/toaster.min.js')}}"></script>
    <script>
    @if(Session::has('success'))
    toastr.success('{{ Session::get('
        success ') }}')
    @endif
    </script>
    <script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <section id="container">

        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation">
                </div>
            </div>
            <!--logo start-->
            @if(auth()->user()->isAdmin())
            <a href="/admin" class="logo"><b>ADMINISTRATOR</b></a>
            @elseif(auth()->user()->isCounselor())
            <a href="/counselor" class="logo"><b>COUNSELOR</b></a>
            @endif
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
                @if(auth()->user()->isCounselor())
                <div id="app">
                    <notification :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}">
                    </notification>
                </div>
                @endif
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
                    @foreach($users as $user)
                    <p class="centered"><a href="#"><img
                                src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"
                                class="img-circle" width="60"></a></p>
                    <h5 class="centered">{{$user->first_name}} {{$user->last_name}}</h5>
                    @endforeach


                    @if(auth()->user()->isAdmin())
                    <li class="mt">
                        <a href="/admin">
                            <i class="fa fa-dashboard"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('users.index')}}">View All Users</a></li>
                            <!-- <li><a href="{{route('users.create')}}">Create Users</a></li> -->
                            <li><a href="{{route('users.trashed')}}">Trashed Users</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>Categories</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('categories.index')}}">Announcement Categories</a></li>
                            <!-- <li><a href="{{route('categories.create')}}">Create Categories</a></li> -->
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Rubric</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('rubric.index')}}">View Rubric</a></li>
                            <!-- <li><a href="{{route('rubric.createcategory')}}">Create Category</a></li> -->
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>Courses</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('courses.index')}}">View Courses</a></li>
                            <!-- <li><a href="{{route('courses.create')}}">Create Course</a></li> -->
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>Colleges</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('colleges.index')}}">View Colleges</a></li>
                            <!-- <li><a href="{{route('colleges.create')}}">Create Course</a></li> -->
                        </ul>
                    </li>

                    <li class="mt">
                        <a href="{{route('settings.index')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Website Settings</span>
                        </a>
                    </li>

                    @elseif(auth()->user()->isCounselor())
                    <li class="mt">
                        <a href="/counselor">
                            <i class="fa fa-dashboard"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>Announcements</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('announcements.index')}}">View All Announcements</a></li>
                            <li><a href="{{route('announcements.create')}}">Create Announcements</a></li>
                            <li><a href="{{route('announcements.trashed')}}">Trashed Announcements</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Jobs</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('jobs.index')}}">View All Jobs</a></li>
                            <li><a href="{{route('jobs.create')}}">Create Job</a></li>
                            <li><a href="{{route('jobs.trashed')}}">Trashed Jobs</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>Evaluation</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('evaluation.index')}}">View Non-Evaluated Resumes</a></li>
                            <li><a href="{{route('assessed.index')}}">View Evaluated Resumes</a></li>
                        </ul>
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

                @yield('content')

            </section>
        </section>

        <script src="{{asset('assets/js/jquery.js')}}"></script>
        <script src="{{asset('assets/js/jquery-1.8.3.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}">
        </script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>
        <script src="{{asset('assets/js/common-scripts.js')}}"></script>
        <script src="{{asset('assets/js/notification.js')}}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>




</body>

</html>