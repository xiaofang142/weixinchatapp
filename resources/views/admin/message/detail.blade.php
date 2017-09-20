@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   需求信息
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">id</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->id}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">发布者昵称</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->nickname}} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">所属需求标题</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->title}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">所属需求内容</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->content}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">内容</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->content}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">创建时间</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->created}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">回复状态</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                @if($info->status ==1)
                                    <span class="btn-warning">待回复</span>
                                @else
                                    <span class="btn-success">已回复</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    @if($info->status == 2)
                        <div class="form-group">
                            <label class="col-lg-2 control-label">回复内容</label>
                            <div class="col-lg-10">
                                <p class="form-control-static">{{$info->response}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">回复时间</label>
                            <div class="col-lg-10">
                                <p class="form-control-static">{{$info->recovery}}</p>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-lg-2 control-label">类型</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                @if($info->type == 1)
                                    <span class="btn-primary">普通</span>
                                @else
                                    <span class="btn-info">私密</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><a href="javascript:history.go(-1)">返回上一页</a> </p>
                        </div>
                    </div>
                    <br/>

                </div>
            </section>
        </div>


    </div>

    </div>

</section>
@stop