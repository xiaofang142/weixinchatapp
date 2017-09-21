

@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    分类列表   &nbsp;&nbsp;<a href="{{url('admin/Industry/add')}}">添加分类</a>
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
                                    <span class="btn-primary">行业</span>
                                @elseif($industry->type == 2)
                                    <span class="btn-info">种类</span>
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

            </section>
        </div>
    </div>

    </div><!--/.row-->







</section>
@stop