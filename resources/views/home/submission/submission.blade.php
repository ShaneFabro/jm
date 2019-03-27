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
    <link rel="shortcut icon" type="image/png" href="assets/images/head_logo2.png" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
                            <li><a href="/events">ANNOUNCEMENTS</a></li>
                            <li><a href="/jobs">JOB LISTINGS</a></li>
                            <li><a href="/submission">SUBMIT RESUME</a></li>

                            <!--FORMER SUBMENU -->
                    </li>
                </ul>
                </li>

                <li><a href="{{route('login')}}" class="button primary">LOGIN</a></li>
                </ul>
            </nav>
        </header>


        <!-- Main -->
        <div id="main" class="wrapper style1">
            <div class="container">
                <header class="major">
                    <h2>SUBMIT A RESUME</h2>

                </header>
                <!-- Form -->
                <section>
                    {!! Form::open(['action' => 'StudentSubmissionController@store', 'method' => 'POST', 'enctype' =>
                    'multipart/form-data']) !!}
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-4 col-4-xsmall">
                            {{Form::label('fname', 'First Name:')}}
                            {{Form::text('fname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                        </div>

                        <div class="col-4 col-12-xsmall">
                            {{Form::label('mname', 'Middle Name:')}}
                            {{Form::text('mname', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
                        </div>
                        <div class="col-4 col-12-xsmall">
                            {{Form::label('lname', 'Last Name:')}}
                            {{Form::text('lname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                        </div>
                        <div class="col-12">
                        </div>
                        <div class="col-1 col-12-medium">
                        </div>
                        <div class="col-5 col-12-xsmall">
                            {{Form::label('studnum', 'Student Number:')}}
                            {{Form::text('studnum', '', ['class' => 'form-control', 'placeholder' => 'Student Number'])}}
                        </div>
                        <div class="col-5 col-12-xsmall">
                            {{Form::label('course', 'Course:')}}
                            {{Form::select('course', ['BS in Accountancy' => 'BS in Accountancy', 'BS in Accounting Information Systems' => 'BS in Accounting Information Systems', 'BS in Actuarial Science' => 'BS in Actuarial Science', 'BS in Advertising Arts' => 'BS in Advertising Arts', 'BS in Applied Physics' => 'BS in Applied Physics', 'BS in Architecture' => 'BS in Architecture', 'BS in Asian Studies' => 'BS in Asian Studies', 'BS in Behavioral Science' => 'BS in Behavioral Science', 'BS in Biochemistry' => 'BS in Biochemistry', 'BS in Biology' => 'BS in Biology', 'BSIS in Business Analytics' => 'BSIS in Business Analytics', 'BSBA in Business Economics' => 'BSBA in Business Economics', 'BS in Chemical Engineering' => 'BS in Chemical Engineering', 'BS in Chemistry' => 'BS in Chemistry', 'BS in Civil Engineering' => 'BS in Civil Engineering', 'BA in Communication Arts' => 'BA in Communication Arts', 'BM in Composition' => 'BM in Composition', 'BS in Computer Science' => 'BS in Computer Science', 'BA in Creative Writing' => 'BA in Creative Writing', 'BSHM in Culinary Entrepreneurship' => 'BSHM in Culinary Entrepreneurship', 'BSCS in Data Science' => 'BSCS in Data Science', 'BA in Economics' => ' BA in Economics', 'Bachelor of Education' => 'Bachelor of Education', 'BS in Electrical Engineering' => 'BS in Electrical Engineering', 'BS in Electronics Engineering' => 'BS in Electronics Engineering', 'BA in English Language Studies' => 'BA in English Language Studies', 'BS in Entrepreneurship' => 'BS in Entrepreneurship', 'BSBA in Financial Management' => ' BSBA in Financial Management', 'BS in Food Technology' => 'BS in Food Technology', 'BA in History' => 'BA in History', 'BSHM in Hospitality Leadership' => 'BSHM in Hospitality Leadership', 'BS in Hotel and Restaurant Management' => 'BS in Hotel and Restaurant Management', 'BSBA in Human Resource Development Management'=> 'BSBA in Human Resource Development Management', 'BFA in Industrial Design' => 'BFA in Industrial Design', 'BS in Industrial Engineering' => 'BS in Industrial Engineering', 'BS in Information Systems'=> 'BS in Information Systems', 'BSIT in Information Technology Automation' => 'BSIT in Information Technology Automation', 'BS in Interior Design' => 'BS in Interior Design', 'BM in Jazz' => 'BM in Jazz', 'BA in Journalism' => 'BA in Journalism', 'Bachelor of Laws' => 'Bachelor of Laws', 'BA in Legal Management' => 'BA in Legal Management', 'Bachelor of Library and Information Science' => 'Bachelor of Library and Information Science', 'BA in Literature' => 'BA in Literature', 'BS in Management Accounting'=> 'BS in Management Accounting', 'BSBA in Marketing Management' => 'BSBA in Marketing Management', 'BS in Mechanical Engineering' => 'BS in Mechanical Engineering', 'BS in Medical Technology'=> 'BS in Medical Technology', 'BS in Microbiology' => 'BS in Microbiology', 'Bachelor of Music' => 'Bachelor of Music', 'BM in Music Education'=> 'BM in Music Education', 'BM in Music Technology' => 'BM in Music Technology', 'BM in Music Theater' => 'BM in Music Theater', 'BS in Nursing'=> 'BS in Nursing', 'BS in Nutrition and Dietetics' => 'BS in Nutrition and Dietetics', 'BS in Occupational Therapy' => 'BS in Occupational Therapy', 'BFA in Painting'=> 'BFA in Painting', 'BM in Performance(Music)' => 'BM in Performance(Music)', 'BS in Pharmacy' => 'BS in Pharmacy', 'BA in Philosophy'=> 'BA in Philosophy', 'BS in Physical Therapy' => 'BS in Physical Therapy', 'BA in Political Science' => 'BA in Political Science', 'BEEd in Pre-School Education'=> 'BEEd in Pre-School Education', 'BS in Psychology' => 'BS in Psychology', 'BSTM in Recreation and Leisure Management' => 'BSTM in Recreation and Leisure Management', 'Bachelor of Sacred Theology'=> 'Bachelor of Sacred Theology', 'Bachelor of Secondary Education' => 'Bachelor of Secondary Education', 'BSIS in Service Management' => 'BSIS in Service Management', 'BA in Sociology'=> 'BA in Sociology', 'BEEd in Special Education' => 'BEEd in Special Education', 'Bachelor of Special Needs Education' => 'Bachelor of Special Needs Education', 'BS in Speech & Language Pathology'=> 'BS in Speech & Language Pathology', 'BPhEd in Sports and Wellness Management' => 'BPhEd in Sports and Wellness Management', 'BS in Sports Science' => 'BS in Sports Science', 'BSTM in Travel Operations and Service Management'=> 'BSTM in Travel Operations and Service Management', 'BS in Travel Management' => 'BS in Travel Management', 'BSIT in Web and Mobile Development'=> 'BSIT in Web and Mobile Development',], null, ['class' => 'form-control' ,'placeholder' => 'Course'])}}
                        </div>
                        <div class="col-12">
                        </div>
                        <div class="col-1 col-12-medium">
                        </div>
                        <div class="col-5 col-12-xsmall">
                            {{Form::label('contnum', 'Contact Number:')}}
                            {{Form::text('contnum', '', ['class' => 'form-control', 'placeholder' => 'Contact Number'])}}
                        </div>
                        <div class="col-5 col-12-xsmall">
                            {{Form::label('emailadd', 'Email Address:')}}
                            {{Form::email('emailadd', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                        </div>
                        <div class="col-12">
                        </div>
                        <h5 style="margin:auto;">
                            *Please upload an image or pdf format of your résumé and name the file by your full name
                            (ex. Dela Cruz, Juan)*
                        </h5>




                        <ul class="actions" style="width: 53%; margin: auto;">
                            <li>
                                <a href="/download/Sample-Thomasian-Resume.pdf" target="_blank">
                                    <button type="button" class="btn"
                                        style="color: white; background-color: black; margin-top: -2px; padding: 8px 30px 8px 23px">View
                                        a Sample Thomasian Resumé</button>
                                </a>
                            </li>
                            <li><a href="/download/THOMASIAN RESUME FORMAT 17-18.pdf" target="_blank">
                                    <button type="button" class="btn"
                                        style="color: white; background-color: black; margin-top: -2px; padding-top: 8px; padding-bottom: 8px">View
                                        Thomasian Resumé Format Guide
                                    </button>
                                </a>
                            </li>
                        </ul>
                        <br />

                        <ul class="actions" style="width: 70%; margin: auto; padding-left: 25%;">
                            <li>{{Form::file('resume', ['class' => 'choose', 'accept' => 'application/pdf'])}}</li>
                        </ul>

                        <ul class="actions" style="width: 70%; margin: auto; padding-left: 25%;">
                            <li>{{Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'submit', 'disabled', 'onclick' => 'return ConfirmSubmit()'])}}
                            </li>
                        </ul>


                    </div>
                    {!! Form::close() !!}
                    <div class="row">
                        <div class="col-1 col-12-medium">
                        </div>
                        <div class="col-10 col-12-medium" width="100%">
                            <input type="checkbox" id="toggle">
                            <label for="toggle">I understand that the information contained in my resume may be viewed
                                by
                                the
                                Career Services Counselors, staff,
                                <br>and Career Ambassadors for resume clinic purposes, and will be stored temporarily in
                                the
                                CCC-Career Services database.</label>
                        </div>
                        <div class="col-1 col-12-medium">
                        </div>
                    </div>

                </section>

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
            <script>
            $('#toggle').click(function() {
                //check if checkbox is checked
                if ($(this).is(':checked')) {

                    $('#submit').removeAttr('disabled'); //enable input

                } else {
                    $('#submit').attr('disabled', true); //disable input
                }
            });

            function ConfirmSubmit() {
                var submit = confirm("Are you sure you want to submit?");
                if (submit)
                    return true;
                else
                    return false;
            }
            </script>

</body>

</html>