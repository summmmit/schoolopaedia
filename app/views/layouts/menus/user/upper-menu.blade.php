
<ul class="nav navbar-right">
    <!-- start: USER DROPDOWN -->
    <li class="dropdown current-user">
        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
            <img src="{{ URL::asset('assets/projects/images/profilepics/'.Auth::user()->pic) }}" class="img-circle" alt="" height="50px" width="50px">
            <span class="username hidden-xs">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span> <i class="fa fa-caret-down "></i>
        </a>
        <ul class="dropdown-menu dropdown-dark">
            <li>
                <a href="pages_user_profile.html">
                    My Profile
                </a>
            </li>
            <li>
                <a href="pages_calendar.html">
                    My Calendar
                </a>
            </li>
            <li>
                <a href="pages_messages.html">
                    My Messages (3)
                </a>
            </li>
            <li>
                <a href="login_lock_screen.html">
                    Lock Screen
                </a>
            </li>
            <li>
                <a href="{{ URL::route('user-sign-out'); }}">
                    Log Out
                </a>
            </li>
        </ul>
    </li>
    <!-- end: USER DROPDOWN -->
</ul>