<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>USTCC</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="shortcut icon" type="image/png" href="assets/images/head_logo2.png" />
    <noscript>
        <link rel="stylesheet" href="/assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <h1 id="logo"><span class="usthead"><a href="/">UST</span>
                <span class="usthead2">counseling</a></span>
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

            <div class="row gtr-150 gtr-uniform">


                <div class="col-xs-1"></div>


                <div class="col-xs-7">
                    <p>

                    </p>
                    <img class="image fit img-responsive"
                        src="{{$announcements->photo ? $announcements->photo->file : 'http://placehold.it/400x400'}}"
                        alt="" />
                    {{$announcements->created_at ? $announcements->created_at->diffForHumans() : 'no date'}}
                    {!!$announcements->body!!}

                </div>



                <!-- Sidebar -->

                <div class="col-xs-3"> @foreach($randoms as $random)

                    <h3><a href="{{route('event_view', $random->id)}}">{{$random->title}}</a></h3>

                    <footer>
                        <ul class="actions">
                            <li><a href="{{route('event_view', $random->id)}}" class="button">View Event</a>
                            </li>
                        </ul>
                    </footer>

                    <hr>
                    @endforeach
                </div>

                <div class="col-xs-1"></div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <div>
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
                <li>&copy; Capstoned. All rights reserved.</li>
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
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c8aa4a437e1791e">
    </script>
</body>

</html>