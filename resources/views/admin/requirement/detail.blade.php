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
                        <label class="col-lg-2 control-label">类型</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                @if($info->type == 1)
                                    用户需求
                                @else
                                    平台需求
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">需求行业名称</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->industry_name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">需求行业种类</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->species_name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">标题</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->title}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">创建时间</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->created}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">点击数</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->clicks}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">留言数</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->messages}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">更新时间</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->updated}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">状态</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                             @if($info->status == 1)
                                未审核    <a class="btn btn-info" href="{{url('admin/Requirement/audit')}}/id/{{$info->id}}"><i>去审核</i></a>
                              @else
                                已审核
                             @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">创建者</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{$info->nickname}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">内容</label>
                        <div class="col-lg-10">
                            <textarea class="form-control-static">{{$info->content}}</textarea>
                        </div>
                    </div>



                </div>
            </section>
        </div>


    </div>

    </div>

</section>
@stop