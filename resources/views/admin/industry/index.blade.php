

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
                        <th><i class="icon_calendar"></i> 用户名</th>
                        <th><i class="icon_mail_alt"></i>头像 </th>
                        <th><i class="icon_pin_alt"></i> 邮箱</th>
                        <th><i class="icon_mobile"></i> 余额</th>
                        <th><i class="icon_mobile"></i> 状态</th>
                        <th><i class="icon_cogs"></i>操作 </th>
                    </tr>
                    {{--@foreach ($users as $user)--}}
                        <tr>
                            {{--<td>{{$user->userid}}</td>--}}
                            {{--<td>{{$user->name}}</td>--}}
                            {{--<td><img width="50" height="50" src="{{$user->avatar}}"></td>--}}
                            {{--<td>{{$user->email}}</td>--}}
                            {{--<td>{{$user->balance}}</td>--}}
                            <td>
                                {{--@if($user->status ==1)--}}
                                {{--锁定--}}
                                {{--@else--}}
                                {{--正常--}}
                                {{--@endif--}}

                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a class="btn btn-primary" href="{{url('admin/User/recharge')}}/id/{{$user->userid}}"><i>充值</i></a>--}}
                                    {{--<a class="btn btn-success" href="{{url('admin/User/detail')}}/id/{{$user->userid}}"><i>详情</i></a>--}}
                                    {{--<a class="btn btn-info" href="{{url('admin/User/lockuser')}}/id/{{$user->userid}}"><i>--}}
                                            {{--@if($user->status ==1)--}}
                                            {{--解锁--}}
                                            {{--@else--}}
                                            {{--锁定--}}
                                            {{--@endif--}}
                                        {{--</i></a>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}





                    </tbody>
                </table>
                {{--{{ $users->links() }}--}}
            </section>
        </div>
    </div>

    </div><!--/.row-->







</section>
@stop