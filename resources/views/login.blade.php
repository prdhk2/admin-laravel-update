<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login | Administrator Area | PT. Arline Prima Mandiri</title>

        <!-- Bootstrap -->
        <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{ asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
    </head>

    <body class="login">
        <div>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <span><img src="{{ asset('assets/images/arline-logo-small.png') }}" style="width: 100%;"></span>
                        <form method="post" action="{{ route('proses.login') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h1>Login Form</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" name="username" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" name="password" />
                            </div>
                            <div style="text-align: right;">
                                <button class="btn btn-primary submit" href="">Log in</button>
                            </div>
                            
                            <a class="reset_pass" href="#" style="margin-right: 0; float: left;">Lost your password?</a>
                            
                            <div class="clearfix"></div>

                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <p>©2022 All Rights Reserved. PT. Arline Prima Mandiri</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
