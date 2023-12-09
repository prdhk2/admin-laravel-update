<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{url('/')}}/dashboard"><i class="fa fa-home"></i> Dashboard </a>
            </li>
            <li><a><i class="fa fa-edit"></i> Forms Input<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('slider')}}">Slider</a></li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                    <li><a href="{{route('gallery')}}">Gallery</a></li>
                    <li><a href="{{route('our-team')}}">Our Team</a></li>
                    <li><a href="{{route('client')}}">Our Partner</a></li>
                    <li><a href="{{route('category')}}">Category</a></li>
                    <li><a href="{{route('product')}}">Product</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('user.management')}}"><i class="fa fa-user"></i> User Management </a>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Other</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{route('DataSEO')}}"><i class="fa fa-slack"></i> SEO </a>
            </li>
        </ul>
    </div>
</div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <div class="col-md-6" style="padding: 0;">
            <a data-toggle="tooltip" data-placement="top" title="FullScreen" style="width: 100%;">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
        </div>
        <div class="col-md-6" style="padding: 0;">
            <form id="log_out" action="{{route('logout')}}" method="POST">
                {{@csrf_field()}}
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('log_out').submit();" style="width: 100%;">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </form>
        </div>
    </div>
    <!-- /menu footer buttons -->
</div>