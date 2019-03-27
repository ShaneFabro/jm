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
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="shortcut icon" type="image/png" href="assets/images/head_logo2.png" />

    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload landing">
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
                            <li><a href="{{route('events')}}">EVENTS AND UPDATES</a></li>
                            <li><a href="{{route('jobs')}}">JOB LISTINGS</a></li>
                            <li><a href="{{route('submission.index')}}">RESUME CLINIC</a></li>

                            <!--FORMER SUBMENU -->
                    </li>
                </ul>
                </li>


                @if(auth()->guest())
                <li><a href="{{ route('login') }}" class="button primary">Login</a></li>
                @elseif(auth()->user()->isAdmin())
                <li><a href="{{route('indexadmin')}}" class="button primary">Admin Dashboard</a></li>
                @elseif(auth()->user()->isCounselor())
                <li><a href="{{route('indexcounselor')}}" class="button primary">Counselor Dashboard</a></li>
                @endif
                </ul>
            </nav>
        </header>

        <!-- Banner -->
        <section id="banner">
            <div class="content">
                <header>
                    <img src="{{url('assets/images/headlogo.png')}}" class="lcenter">
                    <h2 class="usttitle">{{$settings->site_name}}</h2>


                    <P align="center">Empowering Thomasians to MAP(Meaningful and Purposeful) Careers</P>

                </header>


            </div>
            <a href="#one" class="goto-next scrolly">Next</a>
        </section>

        <!-- One -->
        <section id="one" class="spotlight style1 bottom">
            <span class="image fit main"><img src="{{url('assets/images/ust1.jpg')}}" alt="" /></span>
            <div class="content">
                <div class="container">
                    <header class="major">
                        <h2>SERVICES</h2>
                    </header>
                    <div class="row">



                        <div class="col-4 col-12-medium">
                            <h3>Career Development and Training </h3>
                            <br>
                            <ul>
                                <li>Thomasian has G.U.T.S: Gear-up Tools for Success (ThomGUTS)</li>
                                <li>Mock Interview Sessions</li>
                                <li>Resume Clinic</li>
                                <li>OJT/Practicum/Internship Orientation</li>
                                <li>Career Information for Students – employment and internship postings</li>
                            </ul>
                        </div>

                        <div class="col-4 col-12-medium">
                            <h3>Employer Partnership Program</h3>
                            <br>
                            <ul>
                                <li>University-Wide Career Fair</li>
                                <li>Information sessions</li>
                                <li>On-campus interviews and recruitment</li>
                            </ul>
                        </div>
                        <div class="col-4 col-12-medium">
                            <h3>Career Ambassadors’ Training Program</h3>
                            <ul>
                                <li>Recruitment</li>
                                <li>Basic Training for New Career Ambassadors</li>
                                <li>Advanced Training for current Career Ambassadors</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#two" class="goto-next scrolly">Next</a>
        </section>

        <!-- Two -->
        <section id="two" class="spotlight style2 right">
            <span class="image fit main"><img src="{{url('assets/images/ust4.jpg')}}" alt="" /></span>
            <div class="content">
                <div class="events">
                    <div class="events-content">
                        <header class="major">
                            <h2>About Us</h2>
                        </header>

                        <strong>
                            <h4>As part of the University of Santo Tomas Community, the Counseling and Career Center –
                                Career Services contributes
                                to Thomasians’ Career Readiness and Employability through the provision of comprehensive
                                and developmental career
                                programs and services. These are carried out in collaboration with different
                                stakeholders within the University and
                                partnerships with key sectors of society (i.e. industry, academe, and government) to
                                ensure students’ career success.
                            </h4>
                        </strong>
                    </div>
                </div>
            </div>
            <a href="#three" class="goto-next scrolly">Next</a>
        </section>

        <!-- Three -->
        <section id="three" class="spotlight style3 left">
            <span class="image fit main bottom"><img src="{{url('assets/images/ust3.jpg')}}" alt=""
                    class="img-responsive" /></span>
            <div class="content">
                <header class="major">
                    <h2>Events and Updates</h2>
                </header>


                <strong>

                </strong>

                @foreach($announcements as $announcement)



                <div class="col-md-4 hover">

                    <span class="image fit event"> <img
                            src="{{$announcement->photo ? $announcement->photo->file : 'http://placehold.it/400x400'}}"
                            alt="" />


                    </span>
                    <span class="image fit event title">
                        {{$announcement->title}}
                        <h3><strong>>{!!str_limit($announcement->body, 150)!!}</strong></h3>
                    </span>


                </div>

                <ul class="actions special">
                    <li><a href="/events" class="button">See More</a></li>
                </ul>


                @endforeach

                <a href="#four" class="goto-next scrolly">Next</a>
        </section>

        <!-- Four -->
        <section id="four" class="spotlight style3 middle">
            <div class="content">
                <div class="container">
                    <header class="major">
                        <h2>Job Lists</h2>
                    </header>
                    <div class="box alt">
                        <div class="row gtr-uniform">
                            @foreach($jobs as $job)


                            <div class="col-md-4 hover">
                                <a href="{{route('job_view', $job->id)}}">
                                    <span class="image fit event"> <img src="{{$job->photo->file}}" alt="" />


                                    </span>
                                    <span class="image fit event title">
                                        {{$job->job_title}}
                                        <h3><strong>>{{$job->company}}</strong></h3>
                                    </span>

                                </a>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    <footer class="major">
                        <ul class="actions special">
                            <li><a href="/jobs" class="button">See more</a></li>
                        </ul>
                    </footer>
                </div>
                <div>
                    <a href="#five" class="goto-next scrolly">Next</a>
                </div>
            </div>
        </section>

        <!-- Five -->
        <section id="five" class="wrapper  style3 special fade-up">
            <div class="content">
                <div class="container">
                    <header class="major">
                        <h1 class="tigerready">ARE YOU TIGER READY?</h1>
                    </header>
                    <div class="box alt">
                        <footer class="major">
                            <ul class="actions special">
                                <li><a href="/submission" class="button">Submit Resumé</a></li>
                            </ul>
                        </footer>
                    </div>
                </div>
            </div>

            <a href="#five" class="goto-next scrolly">Next</a>
        </section>


        <!-- Footer -->
        <footer id="footer">
            <div class="content">
                <div class="container footerd">
                    <div class="row">
                        <!-- left -->
                        <div class="col-1 col-12-medium">
                        </div>

                        <div class="col-5 col-6-medium">
                            <div class="content">
                                <div class="container">
                                    <div class="row">
                                        <header>
                                            <h3 style="margin-bottom: -5px;"><strong>UNIVERSITY OF SANTO TOMAS</strong>
                                            </h3>

                                        </header>
                                        <p style="padding-bottom: 25px;">UST CAREER AND COUNSELING CENTER</p>
                                        <!-- next line col -->
                                        <div class="col-12 col-12-medium">
                                        </div>
                                        <img src="{{url('assets/images/pqa_logo.png')}}" class="footerz"
                                            alt="{{url('assets/images/pqa_logo.png')}}">

                                        <img src="{{url('assets/images/iso_logo.png')}}" class="footerz"
                                            alt="{{url('assets/images/iso_logo.png')}}">

                                        <img src="{{url('assets/images/QS_Stars_4Star.png')}}" class="footerz"
                                            style="padding-top: 12px" alt="{{url('assets/images/iso_logo.png')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- right -->
                        <div class="col-5 col-8-medium">
                            <div class="content">
                                <div class="container footerd">
                                    <div class="row">

                                        <!-- LOCATION -->
                                        <div class="col-1 col-1-medium">
                                            <span class="fa fa-map-marker"></span>
                                        </div>

                                        <div class="col-8 col-4-medium">

                                            <p class="footerp">{{$settings->address}}
                                            </p>
                                        </div>

                                        <!-- next line col -->
                                        <div class="col-12 col-12-medium">
                                        </div>

                                        <!-- phone -->
                                        <div class="col-1 col-1-medium">
                                            <span class="fa fa-phone-square"></span>
                                        </div>

                                        <div class="col-8 col-4-medium">
                                            <p class="footerp">{{$settings->contact_number}}
                                            </p>
                                        </div>


                                        <!-- next line col -->
                                        <div class="col-12 col-12-medium">
                                        </div>



                                        <!-- mail -->
                                        <div class="col-1 col-1-medium">
                                            <span class="fa fa-envelope"></span>
                                        </div>

                                        <div class="col-8 col-4-medium">
                                            <p class="footerp">{{$settings->contact_email}}
                                            </p>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="copyright">
                <li>&copy; Capstoned. All rights reserved.</li>
            </ul>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>