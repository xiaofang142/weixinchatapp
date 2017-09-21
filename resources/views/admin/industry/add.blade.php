@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  修改分类信息  &nbsp;  &nbsp; &nbsp; &nbsp; <a href="javascript:history.go(-1)">返回上一页</a>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" onsubmit="return checkform();">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">分类名字</label>
                            <div class="col-sm-11">
                                <input name="name" id="name" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">类型</label>
                            <div class="col-sm-11">
                                <label class="checkbox-inline">
                                    <input class="cb-radio" type="radio" checked id="type" name="type" value="1"> 行业分类
                                </label>
                                <label class="checkbox-inline">
                                    <input class="cb-radio" type="radio" id="type" name="type" value="2">  种类分类
                                </label>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">提交分类</button>
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
        if(name == null || name == '' || name == undefined){
            alert('分类名不能为空');
            return false;
        }
        var type = $(".cb-radio:checked").val();
        var  status;
        $.ajax({
            type:'post',
            url:"{{url('admin/Industry/checkName')}}",
            data:{name:name,_token:"{{csrf_token()}}",type:type},
            async:false,
            success:function (message) {
               status = message;
            }

        });
        if(status == -1){
            alert('同一分类下面分类名不能重复');
            return false
        }
    }
</script>