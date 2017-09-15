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
                                    待回复
                                @else
                                    已回复
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
                                    普通
                                @else
                                    私密
                                @endif
                            </p>
                        </div>
                    </div>

                </div>
            </section>
        </div>


    </div>

    </div>

</section>
@stop