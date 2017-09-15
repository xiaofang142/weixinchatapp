@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  修改分类信息
                </header>
                <div class="panel-body">
                    <form method="post" onsubmit="return checkform();">
                        {{csrf_field()}}
                    <input type="hidden" value="{{$info->id}}" name="id">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">名字</label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><input id="name" type="text" name="name" value="{{$info->name}}"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">类型</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                @if($info->type == 1)
                                    行业分类:<input class="cb-radio" checked type="radio" name="type" value="1">
                                    种类分类:<input class="cb-radio" type="radio" name="type" value="2">
                                @elseif($info->type == 2)
                                    行业分类:<input class="cb-radio"  type="radio" name="type" value="1">
                                    种类分类:<input class="cb-radio" checked type="radio" name="type" value="2">
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><input type="submit" value="提交"></p>
                        </div>
                    </div>
                    </form>
                </div>
            </section>
        </div>


    </div>

    </div>

</section>
@stop

<script>
    function checkform() {
        //检测重复和  不为空  由于分类属性已经构造完成  所有不必处理 这里只需要处理  检测名字是否重复
        var name = $('#name').val();
        var type = $(".cb-radio:checked").val();
        $.ajax({
            type:'post',
            url:"{{url('admin/Industry/checkName')}}",
            data:{name:name,_token:"{{csrf_token()}}",type:type},
            async:false,
            success:function (message) {
                console.log(message);
            }

        });
        return false;

    }
</script>