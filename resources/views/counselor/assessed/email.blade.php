<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Featured Tabs</title>


    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,700'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <!-- <link rel="stylesheet" href="/eval/css/bootstrap.css">
    <style type="text/css">
   
    </style> -->

</head>

<body>
    <div class="w3-row">



        <div class="container">


            <section id="fancyTabWidget" class="tabs t-tabs">
                <ul class="nav nav-tabs fancyTabs" role="tablist">

                    <li class="tab fancyTab active">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-desktop"></span><span
                                class="hidden-xs">{{$title_ContactInfo}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-graduation-cap"></span><span
                                class="hidden-xs">{{$title_Education}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab2" href="#tabBody2" role="tab" aria-controls="tabBody2" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-user-circle"></span><span
                                class="hidden-xs">{{$title_Experience}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab3" href="#tabBody3" role="tab" aria-controls="tabBody3" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-users"></span><span
                                class="hidden-xs">{{$title_Involvement}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab4" href="#tabBody4" role="tab" aria-controls="tabBody4" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-eye"></span><span
                                class="hidden-xs">{{$title_Visual}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab5" href="#tabBody5" role="tab" aria-controls="tabBody5" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-sitemap"></span><span
                                class="hidden-xs">{{$title_Organization}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>


                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab6" href="#tabBody6" role="tab" aria-controls="tabBody6" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-comments"></span><span
                                class="hidden-xs">{{$title_Grammar}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                    <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0"
                        aria-hidden="false" tabindex="0">
                        <div>
                            <div class="row">
                                <!-- Contact Info -->
                                @if($contactinfo1 != null || $contactinfo2 != null || $contactinfo3 != null)
                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            @if($contactinfo1 != null)
                                            @foreach($contactinfo1 as $contact1)
                                            {{$contact1}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            @if($contactinfo2 != null)
                                            @foreach($contactinfo2 as $contact2)
                                            {{$contact2}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Needs Improvement</h3>
                                            @if($contactinfo3 != null)
                                            @foreach($contactinfo3 as $contact3)
                                            {{$contact3}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        {!! $contact_info_comment !!}
                    </div>
                    <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true"
                        tabindex="0">
                        <div>
                            <div class="row">
                                <!-- Education -->
                                @if($education1 != null || $education2 != null || $education3 != null)
                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            @if($education1 != null)
                                            @foreach($education1 as $educ1)
                                            {{$educ1}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            @if($education2 != null)
                                            @foreach($education2 as $educ2)
                                            {{$educ2}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Needs Improvement</h3>
                                            @if($education3 != null)
                                            @foreach($education3 as $educ3)
                                            {{$educ3}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        {!! $education_comment !!}
                    </div>
                    <div class="tab-pane  fade" id="tabBody2" role="tabpanel" aria-labelledby="tab2" aria-hidden="true"
                        tabindex="0">
                        <div>
                            <div class="row">
                                <!-- Experience -->
                                @if($experience1 != null || $experience2 != null || $experience3 != null)
                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            @if($experience1 != null)
                                            @foreach($experience1 as $exp1)
                                            {{$exp1}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            @if($experience2 != null)
                                            @foreach($experience2 as $exp2)
                                            {{$exp2}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Needs Improvement</h3>
                                            @if($experience3 != null)
                                            @foreach($experience3 as $exp3)
                                            {{$exp3}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        {!! $experience_comment !!}
                    </div>
                    <div class="tab-pane  fade" id="tabBody3" role="tabpanel" aria-labelledby="tab3" aria-hidden="true"
                        tabindex="0">
                        <div>
                            <div class="row">
                                <!-- Involvement -->
                                @if($involvement1 != null || $involvement2 != null || $involvement3 != null)
                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            @if($involvement1 != null)
                                            @foreach($involvement1 as $involve1)
                                            {{$involve1}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            @if($involvement2 != null)
                                            @foreach($involvement2 as $involve2)
                                            {{$involve2}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Needs Improvement</h3>
                                            @if($involvement3 != null)
                                            @foreach($involvement3 as $involve3)
                                            {{$involve3}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        {!! $involvement_comment !!}
                    </div>
                    <div class="tab-pane  fade" id="tabBody4" role="tabpanel" aria-labelledby="tab4" aria-hidden="true"
                        tabindex="0">
                        <div>
                            <div class="row">
                                <!-- Visual -->
                                @if($visual1 != null || $visual2 != null || $visual3 != null)
                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            @if($visual1 != null)
                                            @foreach($visual1 as $vis1)
                                            {{$vis1}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            @if($visual2 != null)
                                            @foreach($visual2 as $vis2)
                                            {{$vis2}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Needs Improvement</h3>
                                            @if($visual3 != null)
                                            @foreach($visual3 as $vis3)
                                            {{$vis3}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        {!! $visual_comment !!}
                    </div>
                    <div class="tab-pane  fade" id="tabBody5" role="tabpanel" aria-labelledby="tab5" aria-hidden="true"
                        tabindex="0">
                        <div>
                            <div class="row">
                                <!-- Organization -->
                                @if($organization1 != null || $organization2 != null || $organization3 != null)
                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            @if($organization1 != null)
                                            @foreach($organization1 as $org1)
                                            {{$org1}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            @if($organization2 != null)
                                            @foreach($organization2 as $org2)
                                            {{$org2}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Needs Improvement</h3>
                                            @if($organization3 != null)
                                            @foreach($organization3 as $org3)
                                            {{$org3}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        {!! $organization_comment !!}
                    </div>
                    <div class="tab-pane  fade" id="tabBody6" role="tabpanel" aria-labelledby="tab6" aria-hidden="true"
                        tabindex="0">
                        <div>
                            <div class="row">
                                <!-- Grammar -->
                                @if($grammar1 != null || $grammar2 != null || $grammar3 != null)
                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            @if($grammar1 != null)
                                            @foreach($grammar1 as $gram1)
                                            {{$gram1}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            @if($grammar2 != null)
                                            @foreach($grammar2 as $gram2)
                                            {{$gram2}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Needs Improvement</h3>
                                            @if($grammar3 != null)
                                            @foreach($grammar3 as $gram3)
                                            {{$gram3}}
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    {!! $grammar_comment !!}
                </div>

            </section>

        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>



    <script src="/eval/js/index.js"></script>




</body>

</html>