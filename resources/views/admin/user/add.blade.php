@extends('layout')
@section('content')
<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    新增平台用户
                </header>
                <form method="post" enctype="multipart/form-data" onsubmit="return checkform();">
                    {{csrf_field()}}
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-lg-2 control-label">头像</label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><input type="file" name="avatar" id="avatar"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">昵称</label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><input type="text" name="nickname" id="nickname"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">职位</label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><input type="text" name="position" id="position"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">电话</label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><input type="text" name="mobile" id="mobile"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">状态</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                注册<input checked type="radio" name="status" value="1">
                                不注册<input type="radio" name="status" value="0">
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司名字</label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><input type="text" name="company_name" id="company_name"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司行业</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                @foreach($industrys as $industry)
                                    {{$industry->name}}:<input type="radio" value="{{$industry->id}}"  name="industry_id">
                               @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司分类</label>
                        <div class="col-lg-10">
                            <p class="form-control-static"><input type="text" name="company_classify" id="company_classify"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">业务或产品</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">    <input type="text" name="product_info" id="product_info"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">联系方式</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">
                                不公开 <input type="radio" name="public" value="0">
                                公开 <input checked type="radio" name="public" value="1">
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">业务或产品</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">    <input type="text" name="product_info" id="product_info"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <p class="form-control-static">    <input type="submit" value="提交"></p>
                        </div>
                    </div>
                </div>

                </form>
                <script>
                    function checkform() {
                        var avatar =$('#avatar').val();
                        if(avatar == null || avatar == undefined || avatar == ''){
                            alert('头像不能为空');
                            return false;
                        }
                        var nickname =$('#nickname').val();
                        if(nickname == null || nickname == undefined || nickname == ''){
                            alert('昵称不能为空');
                            return false;
                        }
                        var mobile =$('#mobile').val();
                        if(mobile == null || mobile == undefined || mobile == ''){
                            alert('mobile不能为空');
                            return false;
                        }
                        var company_name =$('#company_name').val();
                        if(company_name == null || company_name == undefined || company_name == ''){
                            alert('公司名字不能为空');
                            return false;
                        }
                        var company_classify =$('#company_classify').val();
                        if(company_classify == null || company_classify == undefined || company_classify == ''){
                            alert('分类不能为空');
                            return false;
                        }
                        var product_info =$('#product_info').val();
                        if(product_info == null || product_info == undefined || product_info == ''){
                            alert('公司主营业务或产品不能为空');
                            return false;
                        }


                        //基本验证
                    }
                </script>

            </section>
        </div>

    </div>
    </div><!--/.row-->

</section>
@stop