<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Elements - Landed by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/assets/css/paginationt.css">


    <noscript>
        <link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <h1 id="logo"><a href="index.html" class="usthead">UST</a>
                <a href="/" class="usthead2">counseling</a>
            </h1>
            <nav id="nav">

                <ul>

                    <li>

                        <a href="#">MENU</a>
                        <ul>
                            <!-- NOSIDEBAR -->
                            <li><a href="{{route('events')}}">ANNOUNCEMENTS</a></li>
                            <li><a href="{{route('jobs')}}">JOB LISTINGS</a></li>
                            <li><a href="{{route('submission.index')}}">RESUME CLINIC</a></li>

                            <!--FORMER SUBMENU -->
                    </li>

                </ul>

                </li>
                @if(auth()->guest())
                <li><a href="{{route('login')}}" class="button primary">LOGIN</a></li>
                @elseif(auth()->user()->isAdmin())
                <li><a href="{{route('indexadmin')}}" class="button primary">Admin Dashboard</a></li>
                @elseif(auth()->user()->isCounselor())
                <li><a href="{{route('indexcounselor')}}" class="button primary">Counselor Dashboard</a></li>
                @endif

                </ul>

            </nav>
        </header>

        <!-- Main -->

        <div id="main" class="wrapper style1">
            <div class="container">
                <header class="major">
                    <h2>Events and Updates</h2>
                    <h3>Category: {{$category_name}}</h3>
                    {!! Form::open(['action' => 'EventController@searchevent', 'method' => 'POST']) !!}
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-4 col-4-xsmall">
                        </div>
                        <div class="col-4 col-4-xsmall">
                            <input type="text" name="searchevent" id="searchevent" placeholder=" Search..." />
                        </div>
                    </div>
                </header>
                <!--LEFT SIDE -->
                <div class="row">


                    <div class="col-md-3">


                        <h4>Categories</h4>

                        <ul class="ast-content-ul-list">
                            @foreach($categories as $category)
                            <li><a href="{{route('event_sort', $category->id)}}}">{{$category->category_name}}</a></li>
                            @endforeach

                        </ul>
                    </div>

                    <!--RIGHT SIDE -->
                    <div class="col-md-9">
                        <!-- Text -->
                        <section>
                            <div class="row">
                                <!--LEFT SIDE -->
                                <div class="box alt">
                                    <div class="row gtr-50 gtr-uniform">
                                        @if($announcements->count() != 0)
                                        @foreach($announcements as $announcement)
                                        <div class="col-md-4 hover">
                                            <a href="{{route('event_view', $announcement->id)}}}">
                                                <span class="image fit event"> <img
                                                        src="{{$announcement->photo ? $announcement->photo->file : 'http://placehold.it/400x400'}}"
                                                        alt="" />
                                                </span>
                                                <span class="image fit event title">
                                                    {{$announcement->created_at}}
                                                    <h3><strong>{{$announcement->title}}</strong></h3>
                                                </span>

                                            </a>
                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            @else
                            <h1>NO RESULTS FOUND</h1>
                            @endif
                            
                            <div style="text-align:right;">
                            {{$announcements->links()}}
                            </div>
                    </div>
                </div>





                <!--RIGHT SIDE -->


                <div class="col-12">
                </div>


            </div>
        </div>
    </div>

    </section>


    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
            <li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

    </div>

    <!-- Scripts -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.scrolly.min.js"></script>
    <script src="/assets/js/jquery.dropotron.min.js"></script>
    <script src="/assets/js/jquery.scrollex.min.js"></script>
    <script src="/assets/js/browser.min.js"></script>
    <script src="/assets/js/breakpoints.min.js"></script>
    <script src="/assets/js/util.js"></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>