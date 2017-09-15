

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
                        <th><i class="icon_calendar"></i> 名字</th>
                        <th><i class="icon_mail_alt"></i>类型 </th>
                        <th><i class="icon_cogs"></i>操作 </th>
                    </tr>
                    @foreach ($industrys as $industry)
                        <tr>
                            <td>{{$industry->id}}</td>
                            <td>{{$industry->name}}</td>
                            <td>
                                @if($industry->type == 1)
                                    行业
                                @elseif($industry->type == 2)
                                    种类
                                @endif
                            </td>

                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="{{url('admin/Industry/delete')}}/id/{{$industry->id}}"><i>删除</i></a>
                                    <a class="btn btn-success" href="{{url('admin/Industry/update')}}/id/{{$industry->id}}"><i>修改</i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach





                    </tbody>
                </table>
                {{ $industrys->links() }}
            </section>
        </div>
    </div>

    </div><!--/.row-->







</section>
@stop