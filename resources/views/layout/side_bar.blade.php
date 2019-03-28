@if(Session::get('user_type')==UserType::SUPER_ADMIN)
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="/" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a>

                </li>

                <li class="has_sub">
                    <a href="/admin/user" class="waves-effect"><i class="ti-user"></i> <span> User </span> <span class="menu-arrow"></span> </a>

                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    @endif
