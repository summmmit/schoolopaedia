<?php
$user_id = Sentry::getUser()->id;

$userDetails = UserDetails::where('user_id', '=', $user_id)->get()->first();

?>

<div class="main-navigation left-wrapper transition-left">
    <div class="navigation-toggler hidden-sm hidden-xs">
        <a href="#main-navbar" class="sb-toggle-left">
        </a>
    </div>
    <div class="user-profile border-top padding-horizontal-10 block">
        <div class="inline-block">
            <img src="{{ URL::asset('assets/projects/images/profilepics/'.$userDetails->pic) }}" alt="" height="50px" width="50px">
        </div>
        <div class="inline-block">
            <h5 class="no-margin"> Welcome </h5>
            <h4 class="no-margin"> {{ $userDetails->first_name }} {{ $userDetails->last_name }} </h4>
        </div>
    </div>
    <!-- start: MAIN NAVIGATION MENU -->
    <ul class="main-navigation-menu">
        <li>
            <a href="{{ URL::route('admin-home'); }}"><i class="fa fa-home"></i> <span class="title"> Home </span><span class="label label-default pull-right "> HOME </span> </a>
        </li>
        <li>
            <a href="{{ URL::route('admin-profile'); }}"><i class="fa fa-desktop"></i> <span class="title"> Your Profile </span></a>
        </li>
        <li>
            <a href="{{ URL::route('admin-time-table'); }}"><i class="fa fa-desktop"></i> <span class="title"> Add or Edit TimeTable </span></a>
        </li>
        <li>
            <a href="{{ URL::route('admin-create-time-table'); }}"><i class="fa fa-desktop"></i> <span class="title"> Create TimeTable </span></a>
        </li>
        <li>
            <a href="{{ URL::route('admin-school-settings'); }}"><i class="fa fa-caret-up"></i> <span class="title"> School Settings </span></a>
        </li>
        <li>
            <a href="{{ URL::route('admin-school-students'); }}"><i class="fa fa-caret-up"></i> <span class="title"> Students </span></a>
        </li>
        <li>
            <a href="{{ URL::route('admin-school-teachers'); }}"><i class="fa fa-caret-up"></i> <span class="title"> Teachers </span></a>
        </li>
        <li>
            <a href="{{ URL::route('admin-school-events'); }}"><i class="fa fa-caret-up"></i> <span class="title"> Events </span></a>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> School Settings </span><i class="icon-arrow"></i> </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">
                        <span class="title">Sessions</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title">Schedule</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->
</div>