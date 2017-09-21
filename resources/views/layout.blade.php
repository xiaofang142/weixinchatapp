<?php
/**
 * Created by PhpStorm.
 * User: WangLin
 * Date: 2017/8/29
 * Time: 14:22
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{asset('/img/favicon.png')}}">

    <title>@yield('title', 'Home Page')</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{asset('/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{asset('/asseery-ets/jquasy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('/css/owl.carousel.css')}}" type="text/css">
    <link href="{{asset('/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{asset('/css/fullcalendar.css')}}">
    <link href="{{asset('/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/xcharts.min.css')}}" rel=" stylesheet">
    <link href="{{asset('/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="{{asset('/js/html5shiv.js')}}"></script>
    <script src="{{asset('/js/respond.min.js')}}"></script>
    <script src="{{asset('/js/lte-ie7.js')}}"></script>
    <![endif]-->
</head>

<body>
<!-- container section start -->
<section id="container" class="">


    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
        </div>

        <!--logo start-->
        <a href="index.html" class="logo">Nice <span class="lite">Admin</span></a>
        <!--logo end-->



        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">

                <!-- task notificatoin start -->

                <!-- alert notification end-->
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="{{asset('img/avatar1_small.jpg')}}">
                            </span>
                        <span class="username">注销</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li>
                            <a href="{{url('admin/Login/loginout')}}"><i class="icon_key_alt"></i> Log Out</a>
                        </li>

                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>
    <!--header end-->

    <!--sidebar start-->

    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="{{url('admin/User/index')}}">
                        <i class="icon_profile"></i>
                        <span>用户管理</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="" href="{{url('admin/Requirement/index')}}">
                        <i class=" icon_calendar"></i>
                        <span>需求管理</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="" href="{{url('admin/Message/index')}}">
                        <i class="icon_mail_alt"></i>
                        <span>留言管理</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="" href="{{url('admin/Industry/index')}}">
                        <i class=" icon_pin_alt"></i>
                        <span>行业管理</span>
                    </a>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
  @yield('content')
    </section>
    <!--main content end-->
</section>
<!-- container section start -->

<!-- javascripts -->
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/jquery-ui-1.10.4.min.js')}}"></script>
<script src="{{asset('/js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<!-- nice scroll -->
<script src="{{asset('/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('/js/jquery.nicesocrll.js')}}" type="text/javascript"></script>
<!-- charts scripts -->
<script src="{{asset('/assets/jquery-knob/js/jquery.knob.js')}}"></script>
<script src="{{asset('/js/jquery.sparkline.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('/js/owl.carousel.js')}}" ></script>
<!-- jQuery full calendar -->
<<script src="{{asset('/js/fullcalendar.min.js')}}"></script> <!-- Full Google Calendar - Calendar -->
<script src="{{asset('/assets/fullcalendar/fullcalendar/fullcalendar.js')}}}"></script>
<!--script for this page only-->
<script src="{{asset('/js/calendar-custom.js')}}"></script>
<script src="{{asset('/js/jquery.rateit.min.js')}}"></script>
<!-- custom select -->
<script src="{{asset('/js/jquery.customSelect.min.js')}}" ></script>
<script src="{{asset('/assets/chart-master/Chart.js')}}}"></script>

<!--custome script for all page-->
<script src="{{asset('/js/scripts.js')}}"></script>
<!-- custom script for this page-->
<script src="{{asset('/js/sparkline-chart.js')}}"></script>
<script src="{{asset('/js/easy-pie-chart.js')}}"></script>
<script src="{{asset('/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('/js/xcharts.min.js')}}"></script>
<script src="{{asset('/js/jquery.autosize.min.js')}}"></script>
<script src="{{asset('/js/jquery.placeholder.min.js')}}"></script>
<script src="{{asset('/js/gdp-data.js')}}"></script>
<script src="{{asset('/js/morris.min.js')}}"></script>
<script src="{{asset('/js/sparklines.js')}}"></script>
<script src="{{asset('/js/charts.js')}}"></script>
<script src="{{asset('/js/jquery.slimscroll.min.js')}}"></script>
<script>

    //knob
    $(function() {
        $(".knob").knob({
            'draw' : function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function(){
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code){
                el.html(el.html()+' (GDP - '+gdpData[code]+')');
            }
        });
    });



</script>

</body>
</html>

