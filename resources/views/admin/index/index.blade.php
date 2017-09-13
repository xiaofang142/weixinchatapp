<?php
/**
 * Created by PhpStorm.
 * User: WangLin
 * Date: 2017/8/29
 * Time: 14:22
 */
?>
@extends('layout')
@section('content')
    <section class="wrapper">
        <!--overview start-->

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box blue-bg">
                    <i class="fa fa-cloud-download"></i>
                    <div class="count"></div>
                    <div class="title">用户总数</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box brown-bg">
                    <i class="fa fa-shopping-cart"></i>
                    <div class="count"></div>
                    <div class="title">订单总数</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg">
                    <i class="fa fa-thumbs-o-up"></i>
                    <div class="count"></div>
                    <div class="title">未付款订单数</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box green-bg">
                    <i class="fa fa-cubes"></i>
                    <div class="count"></div>
                    <div class="title">已付款订单数</div>
                </div><!--/.info-box-->
            </div><!--/.col-->


        </div><!--/.row-->
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费网站模板</a></div>







    </section>
@stop

