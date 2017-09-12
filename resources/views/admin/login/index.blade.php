<?php
/**
 * Created by PhpStorm.
 * User: WangLin
 * Date: 2017/8/29
 * Time: 10:53
 */
use Illuminate\Support\Facades\URL;
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{asset('/img/favicon.png')}}}">

    <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="{{asset('/js/html5shiv.js')}}"></script>
    <script src="{{asset('/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="login-img3-body">

<div class="container">

    <form  class="login-form" method="post" action="{{url('admin/login')}}">
        {{csrf_field()}}
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <label class="checkbox">

            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
    </form>

</div>


</body>
</html>

