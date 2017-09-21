@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <a href="{{url('admin/User/add')}}" >添加用户</a>
                </header>
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th> id</th>
                        <th> openid</th>
                        <th>头像 </th>
                        <th> 昵称</th>
                        <th> 电话</th>
                        <th> 职位</th>
                        <th> 公司名字</th>
                        <th> 公司分类</th>
                        <th> 产品信息</th>
                        <th> 是否公开</th>
                        <th> 是否注册</th>
                        <th> 用户来源</th>
                        <th>操作 </th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->openid}}</td>
                            <td><img width="30" height="30" src="{{$user->avatar}}"></td>
                            <td>{{$user->nickname}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->position}}</td>
                            <td>{{$user->company_name}}</td>
                            <td>{{$user->company_classify}}</td>
                            <td>{{$user->product_info}}</td>
                            <td>
                                @if($user->public ==1)
                                   <span class="btn-success"> 公开</span>
                                @else
                                    <span class="btn-warning">不公开</span>
                                @endif
                            </td>
                            <td>
                                @if($user->status ==1)
                                    <span class="btn-success">已注册</span>
                                @else
                                    <span class="btn-warning">未注册</span>
                                @endif
                            </td>
                            <td>
                                @if($user->type ==1)
                                    <span class="btn-primary">前台注册</span>
                                @else
                                   <span class="btn-info">后台模拟</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="{{url('admin/User/delete')}}/id/{{$user->id}}"><i>删除</i></a>
                                    <a class="btn btn-success" href="{{url('admin/User/detail')}}/id/{{$user->id}}"><i>详情</i></a>
                                    @if($user->status != 1)
                                        <a class="btn btn-primary" href="{{url('admin/User/register')}}/id/{{$user->id}}"><i>注册</i></a>
                                    @endif
                                    @if($user->public ==1)
                                        <a class="btn btn-info" href="{{url('admin/User/unpublic')}}/id/{{$user->id}}"><i>不公开</i></a>
                                    @else
                                        <a class="btn btn-info" href="{{url('admin/User/setPublic')}}/id/{{$user->id}}"><i>公开</i></a>
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $users->links() }}
            </section>
        </div>
    </div>

    </div><!--/.row-->







</section>
@stop