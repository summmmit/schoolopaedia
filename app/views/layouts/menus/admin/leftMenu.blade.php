

<div class="main-navigation left-wrapper transition-left">
    <div class="navigation-toggler hidden-sm hidden-xs">
        <a href="#main-navbar" class="sb-toggle-left">
        </a>
    </div>
    <div class="user-profile border-top padding-horizontal-10 block">
        <div class="inline-block">
            <img src="{{ URL::asset('assets/projects/images/profilepics/'.Auth::user()->pic) }}" alt="" height="50px" width="50px">
        </div>
        <div class="inline-block">
            <h5 class="no-margin"> Welcome </h5>
            <h4 class="no-margin"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h4>
        </div>
    </div>
    <!-- start: MAIN NAVIGATION MENU -->
    <ul class="main-navigation-menu">
        <li>
            <a href="{{ URL::route('admin-dashboard'); }}"><i class="fa fa-home"></i> <span class="title"> Home </span><span class="label label-default pull-right "> HOME </span> </a>
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
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->
</div>