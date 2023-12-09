

@include('include.header')
@include('sweetalert::alert')

<!-- top navigation -->
<div class="top_nav">
<div class="nav_menu">
    <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars" style="color: #ffffff;"></i></a>
    </div>
    <nav class="nav navbar-nav">
        <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" style="color: #ffffff !important;">
                    <img src="{{ asset('assets/images/img.jpg')}}" alt="">Administrator
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('user.management')}}"> Profile</a>
                    <form id="log_out" action="{{route('logout')}}" method="POST">
                        {{@csrf_field()}}
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('log_out').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div>
</div>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
<!-- top tiles -->
<div class="row" style="display: inline-block; width: 60%;" >
    <div class="tile_count">
        <div class="col-md-3 col-sm-3  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
            <div class="count">{{count($dataUser)}}</div>
            <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
        </div>
        <div class="col-md-3 col-sm-3  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Product</span>
            <div class="count">{{count($dataProduct)}}</div>
            <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
        </div>
        <div class="col-md-3 col-sm-3  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Customer</span>
            <div class="count green">{{count($dataClient)}}</div>
            <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
        </div>
        <div class="col-md-3 col-sm-3  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Project</span>
            <div class="count">{{count($dataGallery)}}</div>
            <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
        </div>
    </div>
</div>
<!-- /top tiles -->

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="dashboard_graph">

            <div class="col-md-12 col-sm-12 ">
                <img src="{{asset('https://dataupload.arline.tech/dashboard.jpg')}}" style="width: 100%; border-radius: 5px;">
            </div>
            {{-- <div class="col-md-3 col-sm-3  bg-white">
                <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12 col-sm-12 ">
                    <div>
                        <p>Facebook Campaign</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Twitter Campaign</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 ">
                    <div>
                        <p>Conventional Media</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Bill boards</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="clearfix"></div>
        </div>
    </div>

</div>
                    
@include('include.script')
