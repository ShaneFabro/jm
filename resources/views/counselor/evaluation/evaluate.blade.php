@extends('layouts.user_layout')

@section('content')

<div class="w3-row">
    <div class="container">
        <div class="w3-col s5">

            <object data="/resumes/{{$submission}}" type="application/pdf" width="100%" height="1000px"
                style="margin-left:-25%">
                <p>It appears you don't have a PDF plugin for this browser.
                    No biggie... you can <a href="resume.pdf">click here to
                        download the PDF file.</a></p>
            </object>


        </div>
        <div class="w3-col s7">
            <section id="fancyTabWidget" class="tabs t-tabs">
                <ul class="nav nav-tabs fancyTabs" role="tablist">

                    <li class="tab fancyTab active">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-desktop"></span><span
                                class="hidden-xs">{{$title_ContactInfo->name}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-graduation-cap"></span><span
                                class="hidden-xs">{{$title_Education->name}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab2" href="#tabBody2" role="tab" aria-controls="tabBody2" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-user-circle"></span><span
                                class="hidden-xs">{{$title_Experience->name}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab3" href="#tabBody3" role="tab" aria-controls="tabBody3" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-users"></span><span
                                class="hidden-xs">{{$title_Involvement->name}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab4" href="#tabBody4" role="tab" aria-controls="tabBody4" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-eye"></span><span
                                class="hidden-xs">{{$title_Visual->name}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>

                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab5" href="#tabBody5" role="tab" aria-controls="tabBody5" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-sitemap"></span><span
                                class="hidden-xs">{{$title_Organization->name}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>


                    <li class="tab fancyTab">
                        <div class="arrow-down">
                            <div class="arrow-down-inner"></div>
                        </div>
                        <a id="tab6" href="#tabBody6" role="tab" aria-controls="tabBody6" aria-selected="true"
                            data-toggle="tab" tabindex="0"><span class="fa fa-comments"></span><span
                                class="hidden-xs">{{$title_Grammar->name}}</span></a>
                        <div class="whiteBlock"></div>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                    <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0"
                        aria-hidden="false" tabindex="0">
                        <div>
                            <div class="row">
                                <!-- Contact Information -->
                                <div class="col-md-12">
                                    @if($decode_ratings)
                                    <div class="w3-row">

                                        @foreach($decode_ratings as $decode_rating)
                                        @if($decode_rating->id == 1)
                                        <div class="w3-col s4 ">
                                            <h3>{{$decode_rating->name}}</h3>
                                        </div>
                                        @elseif($decode_rating->id == 2)
                                        <div class="w3-col s4 ">
                                            <h3> {{$decode_rating->name}}</h3>
                                        </div>
                                        @elseif($decode_rating->id == 3)
                                        <div class="w3-col s4 ">
                                            <h3> {{$decode_rating->name}}</h3>
                                        </div>
                                        @endif
                                        @endforeach

                                        @endif
                                        {!! Form::open(['method'=>'POST', 'action'=>
                                        'Counselor\CounselorEvaluationController@store'])!!}
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->

                                            @foreach($decode_cats as $decode_cat)
                                            @if($decode_cat->title_id == $title_ContactInfo->id &&
                                            $decode_cat->rating_id == 1)

                                            <div class="joblist">
                                                <div class="joblist-content">

                                                    <input type="checkbox" name="contactinfo1[]"
                                                        value="{{$decode_cat->name}}">
                                                    <label for="lists[new]">{{$decode_cat->name}}</label>

                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            @foreach($decode_cats as $decode_cat)
                                            @if($decode_cat->title_id == $title_ContactInfo->id &&
                                            $decode_cat->rating_id == 2)

                                            <div class="joblist">
                                                <div class="joblist-content">
                                                    <input type="checkbox" name="contactinfo2[]"
                                                        value="{{$decode_cat->name}}">
                                                    <p>{{$decode_cat->name}}</p>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            @foreach($decode_cats as $decode_cat)
                                            @if($decode_cat->title_id == $title_ContactInfo->id &&
                                            $decode_cat->rating_id == 3)

                                            <div class="joblist">
                                                <div class="joblist-content">
                                                    <input type="checkbox" name="contactinfo3[]"
                                                        value="{{$decode_cat->name}}">
                                                    <p>{{$decode_cat->name}}</p>
                                                </div>
                                            </div>

                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('contact_info_comment', 'Comment:') !!}
                                            {!! Form::textarea('contact_info_comment', null, ['class'=>'form-control', 'rows' => 2,
                                            'cols' => 40]) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true"
                        tabindex="0">
                        <div class="row">
                            <!-- Education -->
                            <div class="col-md-12">
                                @if($decode_ratings)
                                <div class="w3-row">

                                    @foreach($decode_ratings as $decode_rating)
                                    @if($decode_rating->id == 1)
                                    <div class="w3-col s4 ">
                                        <h3>{{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 2)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 3)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @endif
                                    @endforeach

                                    @endif

                                    <!--COL 1 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->

                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Education->id && $decode_cat->rating_id ==
                                        1)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="education1[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>

                                            </div>
                                        </div>



                                        @endif
                                        @endforeach
                                    </div>
                                    <!--COL 2 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Education->id && $decode_cat->rating_id ==
                                        2)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="education2[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>



                                        @endif
                                        @endforeach

                                    </div>
                                    <!--COL 3 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Education->id && $decode_cat->rating_id ==
                                        3)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="education3[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>

                                </div>
                                <div class="form-group">
                                    {!! Form::label('education_comment', 'Comment:') !!}
                                    {!! Form::textarea('education_comment', null, ['class'=>'form-control', 'rows' => 2, 'cols'
                                    => 40]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane  fade" id="tabBody2" role="tabpanel" aria-labelledby="tab2" aria-hidden="true"
                        tabindex="0">
                        <div class="row">
                            <!-- Experience -->
                            <div class="col-md-12">
                                @if($decode_ratings)
                                <div class="w3-row">

                                    @foreach($decode_ratings as $decode_rating)
                                    @if($decode_rating->id == 1)
                                    <div class="w3-col s4 ">
                                        <h3>{{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 2)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 3)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @endif
                                    @endforeach

                                    @endif

                                    <!--COL 1 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->

                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Experience->id && $decode_cat->rating_id ==
                                        1)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="experience1[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>

                                            </div>
                                        </div>



                                        @endif
                                        @endforeach
                                    </div>
                                    <!--COL 2 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Experience->id && $decode_cat->rating_id ==
                                        2)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="experience2[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>



                                        @endif
                                        @endforeach

                                    </div>
                                    <!--COL 3 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Experience->id && $decode_cat->rating_id ==
                                        3)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="experience3[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>


                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('experience_comment', 'Comment:') !!}
                                    {!! Form::textarea('experience_comment', null, ['class'=>'form-control', 'rows' => 2, 'cols'
                                    => 40]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane  fade" id="tabBody3" role="tabpanel" aria-labelledby="tab3" aria-hidden="true"
                        tabindex="0">
                        <div class="row">
                            <!-- Involvement -->
                            <div class="col-md-12">
                                @if($decode_ratings)
                                <div class="w3-row">

                                    @foreach($decode_ratings as $decode_rating)
                                    @if($decode_rating->id == 1)
                                    <div class="w3-col s4 ">
                                        <h3>{{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 2)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 3)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @endif
                                    @endforeach

                                    @endif

                                    <!--COL 1 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->

                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Involvement->id && $decode_cat->rating_id ==
                                        1)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="involvement1[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>

                                            </div>
                                        </div>



                                        @endif
                                        @endforeach
                                    </div>
                                    <!--COL 2 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Involvement->id && $decode_cat->rating_id ==
                                        2)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="involvement2[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>



                                        @endif
                                        @endforeach

                                    </div>
                                    <!--COL 3 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Involvement->id && $decode_cat->rating_id ==
                                        3)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="involvement3[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>


                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('involvement_comment', 'Comment:') !!}
                                    {!! Form::textarea('involvement_comment', null, ['class'=>'form-control', 'rows' => 2, 'cols'
                                    => 40]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane  fade" id="tabBody4" role="tabpanel" aria-labelledby="tab4" aria-hidden="true"
                        tabindex="0">
                        <div class="row">
                            <!-- Visual -->
                            <div class="col-md-12">
                                @if($decode_ratings)
                                <div class="w3-row">

                                    @foreach($decode_ratings as $decode_rating)
                                    @if($decode_rating->id == 1)
                                    <div class="w3-col s4 ">
                                        <h3>{{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 2)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 3)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @endif
                                    @endforeach

                                    @endif
                                    <!--COL 1 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->

                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Visual->id && $decode_cat->rating_id == 1)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="visual1[]" value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>

                                            </div>
                                        </div>



                                        @endif
                                        @endforeach
                                    </div>
                                    <!--COL 2 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Visual->id && $decode_cat->rating_id == 2)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="visual2[]" value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>



                                        @endif
                                        @endforeach

                                    </div>
                                    <!--COL 3 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Visual->id && $decode_cat->rating_id == 3)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="visual3[]" value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>


                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('visual_comment', 'Comment;') !!}
                                    {!! Form::textarea('visual_comment', null, ['class'=>'form-control', 'rows' => 2, 'cols'
                                    => 40]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane  fade" id="tabBody5" role="tabpanel" aria-labelledby="tab5" aria-hidden="true"
                        tabindex="0">
                        <div class="row">
                            <!-- Organization -->
                            <div class="col-md-12">
                                @if($decode_ratings)
                                <div class="w3-row">

                                    @foreach($decode_ratings as $decode_rating)
                                    @if($decode_rating->id == 1)
                                    <div class="w3-col s4 ">
                                        <h3>{{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 2)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 3)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @endif
                                    @endforeach

                                    @endif

                                    <!--COL 1 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->

                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Organization->id && $decode_cat->rating_id
                                        == 1)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="organization1[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>

                                            </div>
                                        </div>



                                        @endif
                                        @endforeach
                                    </div>
                                    <!--COL 2 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Organization->id && $decode_cat->rating_id
                                        == 2)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="organization2[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>



                                        @endif
                                        @endforeach

                                    </div>
                                    <!--COL 3 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Organization->id && $decode_cat->rating_id
                                        == 3)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="organization3[]"
                                                    value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>


                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('organization_comment', 'Comment;') !!}
                                    {!! Form::textarea('organization_comment', null, ['class'=>'form-control', 'rows' => 2, 'cols'
                                    => 40]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane  fade" id="tabBody6" role="tabpanel" aria-labelledby="tab6" aria-hidden="true"
                        tabindex="0">
                        <div class="row">
                            <!-- Grammar -->
                            <div class="col-md-12">
                                @if($decode_ratings)
                                <div class="w3-row">

                                    @foreach($decode_ratings as $decode_rating)
                                    @if($decode_rating->id == 1)
                                    <div class="w3-col s4 ">
                                        <h3>{{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 2)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @elseif($decode_rating->id == 3)
                                    <div class="w3-col s4 ">
                                        <h3> {{$decode_rating->name}}</h3>
                                    </div>
                                    @endif
                                    @endforeach

                                    @endif

                                    <!--COL 1 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->

                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Grammar->id && $decode_cat->rating_id == 1)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="grammar1[]" value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>

                                            </div>
                                        </div>



                                        @endif
                                        @endforeach
                                    </div>
                                    <!--COL 2 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Grammar->id && $decode_cat->rating_id == 2)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="grammar2[]" value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>



                                        @endif
                                        @endforeach

                                    </div>
                                    <!--COL 3 -->
                                    <div class="w3-col s4 ">
                                        <!-- insert content here-->
                                        @foreach($decode_cats as $decode_cat)
                                        @if($decode_cat->title_id == $title_Grammar->id && $decode_cat->rating_id == 3)

                                        <div class="joblist">
                                            <div class="joblist-content">
                                                <input type="checkbox" name="grammar3[]" value="{{$decode_cat->name}}">
                                                <p>{{$decode_cat->name}}</p>
                                            </div>
                                        </div>


                                        @endif
                                        @endforeach

                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('grammar_comment', 'Comment:') !!}
                                    {!! Form::textarea('grammar_comment', null, ['class'=>'form-control', 'rows' => 2, 'cols'
                                    => 40]) !!}
                                </div>
                                {{ Form::hidden('email', $email) }}
                                {{ Form::hidden('title_ContactInfo', $title_ContactInfo->name)}}
                                {{ Form::hidden('title_Education', $title_Education->name)}}
                                {{ Form::hidden('title_Experience', $title_Experience->name)}}
                                {{ Form::hidden('title_Involvement', $title_Involvement->name)}}
                                {{ Form::hidden('title_Visual', $title_Visual->name)}}
                                {{ Form::hidden('title_Organization', $title_Organization->name)}}
                                {{ Form::hidden('title_Grammar', $title_Grammar->name)}}
                                {{ Form::hidden('submissionid', $submissionid)}}

                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>


                </div>

            </section>
        </div>
    </div>
</div>
<script>
function onButtonClick() {
    document.getElementById('textInput').className = "show";
}
.hide {
    display: none;
}
.show {
    display: block;
}
</script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="/eval/js/index.js"></script>


</section>
</div>
@stop

@extends('layouts.user_footer')