<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">

        <div class="text-center">
            <a href="/" class="logo"><i class="icon-magnet icon-c-logo"></i>Technologies<span><i class="md md-add-alarm"></i></span></a>
            <!-- Image Logo here -->
            <!--<a href="index.html" class="logo">-->
            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
            <!--</a>-->
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">

                    <img src="{{url('uploads/'.getUserData()->profile_image)}}" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>Welcome ! {{getUserData()->first_name}}</small> </h5>
                    </div>

                    <!-- item-->
                    <a href="/profile" class="dropdown-item notify-item">
                        <i class="md md-account-circle"></i> <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="/change-password" class="dropdown-item notify-item">
                        <i class="md md-settings"></i> <span>Change Password</span>
                    </a>


                    <!-- item-->
                    <a href="/logout" class="dropdown-item notify-item">
                        <i class="md md-settings-power"></i> <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            {{--<li class="float-left">--}}
                {{--<button class="button-menu-mobile open-left waves-light waves-effect">--}}
                    {{--<i class="dripicons-menu"></i>--}}
                {{--</button>--}}
            {{--</li>--}}
            {{--<li class="hide-phone app-search">--}}
                {{--<form role="search" class="">--}}
                    {{--<input type="text" placeholder="Search..." class="form-control">--}}
                    {{--<a href=""><i class="fa fa-search"></i></a>--}}
                {{--</form>--}}
            {{--</li>--}}
        </ul>

    </nav>

</div>
