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
                        <th><i class="icon_profile"></i> id</th>
                        <th><i class="icon_calendar"></i> openid</th>
                        <th><i class="icon_mail_alt"></i>头像 </th>
                        <th><i class="icon_pin_alt"></i> 昵称</th>
                        <th><i class="icon_mobile"></i> 电话</th>
                        <th><i class="icon_mobile"></i> 职位</th>
                        <th><i class="icon_mobile"></i> 公司名字</th>
                        <th><i class="icon_mobile"></i> 公司分类</th>
                        <th><i class="icon_mobile"></i> 产品信息</th>
                        <th><i class="icon_mobile"></i> 是否公开</th>
                        <th><i class="icon_mobile"></i> 是否注册</th>
                        <th><i class="icon_mobile"></i> 用户来源</th>
                        <th><i class="icon_cogs"></i>操作 </th>
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
                                    公开
                                @else
                                    不公开
                                @endif
                            </td>
                            <td>
                                @if($user->status ==1)
                                    已注册
                                @else
                                    未注册
                                @endif
                            </td>
                            <td>
                                @if($user->type ==1)
                                    前台注册
                                @else
                                   后台模拟
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