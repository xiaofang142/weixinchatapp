

@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    留言列表  &nbsp;&nbsp;<a href="{{url('admin/Message/add')}}">添加留言</a>

                </header>
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th>id</th>
                        <th> 用户名</th>
                        <th>需求标题 </th>
                        <th> 留言内容</th>
                        <th> 留言时间</th>
                        <th> 回复内容</th>
                        <th> 回复时间</th>
                        <th> 类型</th>
                        <th>状态</th>
                        <th>操作 </th>
                    </tr>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{$message->id}}</td>
                            <td>{{$message->nickname}}</td>
                            <td>{{$message->title}}</td>
                            <td>{{$message->content}}</td>
                            <td>{{$message->created}}</td>
                            <td>{{$message->response}}</td>
                            <td>{{$message->recovery}}</td>
                            <td>
                            @if($message->type == 1)
                                <span class="btn-primary">普通</span>
                            @else
                                <span class="btn-info">私密</span>
                            @endif
                            </td>
                            <td>
                                @if($message->status == 1)
                                   <span class="btn-warning">待回复</span>
                                @else
                                    <span class="btn-success">已回复</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="{{url('admin/Message/delete')}}/id/{{$message->id}}"><i>删除</i></a>
                                    <a class="btn btn-success" href="{{url('admin/Message/detail')}}/id/{{$message->id}}"><i>详情</i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $messages->links() }}
            </section>
        </div>
    </div>

    </div><!--/.row-->







</section>
@stop