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
                    <div class="count">{{$user}}</div>
                    <div class="title">用户总数</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box brown-bg">
                    <i class="fa fa-shopping-cart"></i>
                    <div class="count">{{$message}}</div>
                    <div class="title">留言总数</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg">
                    <i class="fa fa-thumbs-o-up"></i>
                    <div class="count">{{$require}}</div>
                    <div class="title">需求总数</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box green-bg">
                    <i class="fa fa-cubes"></i>
                    <div class="count">{{$industry}}</div>
                    <div class="title">分类总数</div>
                </div><!--/.info-box-->
            </div><!--/.col-->


        </div><!--/.row-->
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费网站模板</a></div>







    </section>
@stop

