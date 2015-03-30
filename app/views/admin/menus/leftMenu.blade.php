

<div class="main-navigation left-wrapper transition-left">
    <div class="navigation-toggler hidden-sm hidden-xs">
        <a href="#main-navbar" class="sb-toggle-left">
        </a>
    </div>
    <div class="user-profile border-top padding-horizontal-10 block">
        <div class="inline-block">
            <img src="{{ URL::asset('assets/projects/images/profilepics/'.Auth::user()->pic) }}" alt="" class="img-responsive img-circle">
        </div>
        <div class="inline-block">
            <h5 class="no-margin"> Welcome </h5>
            <h4 class="no-margin"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h4>
        </div>
    </div>
    <!-- start: MAIN NAVIGATION MENU -->
    <ul class="main-navigation-menu">
        <li>
            <a href="index.html"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">LABEL</span> </a>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="fa fa-desktop"></i> <span class="title"> Check ALL </span><i class="icon-arrow"></i> </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">
                        <span class="title"> Group Companies </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"> Your Buildings </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"> Floors of any Building </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"> Rooms of a Floor </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"> Members of a Company </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="fa fa-desktop"></i> <span class="title"> Add or Edit </span><i class="icon-arrow"></i> </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">
                        <span class="title"> Group Company </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"> Building to any Company </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"> Floors to any Building </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"> Rooms of any Building Floor </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="title"> Members of a Company </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ URL::route('admin-time-table'); }}"><i class="fa fa-desktop"></i> <span class="title"> Add or Edit TimeTable </span></a>
        </li>
        <li>
            <a href="{{ URL::route('admin-create-time-table'); }}"><i class="fa fa-desktop"></i> <span class="title"> Create TimeTable </span></a>
        </li>
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->
</div>