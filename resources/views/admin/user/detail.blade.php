@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   用户信息
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">id</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->id}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">openid</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->openid}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">头像</label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><img width="50" height="50" src="{{$info->avatar}}"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">昵称</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->nickname}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">职位</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->position}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">电话</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->mobile}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">状态</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                             @if($info->status == 1)
                                 已注册
                              @else
                                未注册
                             @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司名字</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->company_name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司行业</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司分类</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->company_classify}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司主营业务或产品</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->product_info}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">是否公开联系方式</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                @if($info->public ==1)
                                    公开
                                @else
                                    不公开
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">用户来源</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                @if($info->type ==1)
                                   前台注册
                                @else
                                   后台模拟
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">剩余查看  用户数量</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->checks}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">剩余留言次数</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->messages}}</p>
                        </div>
                    </div>

                </div>
            </section>
        </div>


    </div>

    </div>

</section>
@stop