

@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    用户列表  &nbsp; <a href="{{url('admin/Requirement/add')}}" >添加需求</a>

                </header>
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th>id</th>
                        <th> 类型</th>
                        <th> 用户</th>
                        <th> 头像</th>
                        <th> 行业名</th>
                        <th> 种类名</th>

                        <th>标题 </th>
                        <th> 点击数</th>
                        <th> 留言数</th>
                        <th> 状态</th>
                        <th> 创建时间</th>
                        <th>操作 </th>
                    </tr>
                    @foreach ($requirements as $requirement)
                        <tr>
                            <td>{{$requirement->id}}</td>
                            <td>
                                @if($requirement->type == 1)
                                    用户
                                @else
                                    平台
                                @endif
                            </td>
                            <td>{{$requirement->nickname}}</td>
                            <td><img width="30" height="30" src="{{$requirement->avatar}}"></td>
                            <td>{{$requirement->industry_name}}</td>
                            <td>{{$requirement->species_name}}</td>
                            <td>{{$requirement->title}}</td>
                            <td>{{$requirement->clicks}}</td>
                            <td>{{$requirement->messages}}</td>
                            <td>
                                @if($requirement->status ==1)
                                   <span class="btn-warning"> 待审核</span>
                                @else
                                    <span class="btn-success">已审核</span>
                                @endif
                            </td>
                            <td>{{$requirement->created}}</td>
                            <td>
                                <div class="btn-group">

                                    <a class="btn btn-warning" href="{{url('admin/Requirement/delete')}}/id/{{$requirement->id}}">删除<i></i></a>
                                    <a class="btn btn-success" href="{{url('admin/Requirement/detail')}}/id/{{$requirement->id}}"><i>详情</i></a>
                                    @if($requirement->status ==1)
                                        <a class="btn btn-info" href="{{url('admin/Requirement/audit')}}/id/{{$requirement->id}}"><i>审核</i></a>
                                    @endif
                                </div>
                            </td>
                        @endforeach
                    </tbody>
                </table>
                {{ $requirements->links() }}
            </section>
        </div>
    </div>

    </div><!--/.row-->







</section>
@stop