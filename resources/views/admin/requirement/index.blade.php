

@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    用户列表

                </header>
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> id</th>
                        <th><i class="icon_calendar"></i> 类型</th>
                        <th><i class="icon_mail_alt"></i>标题 </th>
                        <th><i class="icon_mobile"></i> 点击数</th>
                        <th><i class="icon_mobile"></i> 留言数</th>
                        <th><i class="icon_mobile"></i> 状态</th>
                        <th><i class="icon_pin_alt"></i> 创建时间</th>
                        <th><i class="icon_cogs"></i>操作 </th>
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
                            <td>{{$requirement->title}}</td>
                            <td>{{$requirement->clicks}}</td>
                            <td>{{$requirement->messages}}</td>
                            <td>
                                @if($requirement->status ==1)
                                    待审核
                                @else
                                    已审核
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