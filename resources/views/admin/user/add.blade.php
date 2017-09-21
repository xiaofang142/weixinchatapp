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

                <form class="form-horizontal" method="post" onsubmit="return checkform();" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-1 control-label">头像</label>
                        <div class="col-sm-11">
                            <input type="file" class="form-control"  name="avatar" id="avatar" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">昵称</label>
                        <div class="col-sm-11">
                             <input type="text" name="nickname" id="nickname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">电话</label>
                        <div class="col-sm-11">
                            <input type="text"  name="mobile" id="mobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">公司职位</label>
                        <div class="col-sm-11">
                            <input type="text"  name="position" id="position" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">状态</label>
                        <div class="col-sm-11">
                            <label class="checkbox-inline">
                                <input  type="radio" checked id="status" name="status" value="1"> 注册
                            </label>
                            <label class="checkbox-inline">
                                <input  type="radio" id="status" name="status" value="0">  不注册
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">公司名字</label>
                        <div class="col-sm-11">
                            <input type="text"  name="company_name" id="company_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">公司分类</label>
                        <div class="col-sm-11">
                            <input type="text" name="company_classify" id="company_classify" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">公司业务或产品</label>
                        <div class="col-sm-11">
                            <input type="text" name="product_info" id="product_info" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">是否公开联系方式</label>
                        <div class="col-sm-11">
                            <label class="checkbox-inline">
                                <input  type="radio" name="public" value="0" checked>   不公开
                            </label>
                            <label class="checkbox-inline">
                                <input  type="radio" name="public" value="1"> 公开
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">公司业务或产品</label>
                        <div class="col-sm-11">
                            <input type="text" name="product_info" id="product_info" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-1 control-label">所属行业</label>
                        <div class="col-sm-11">
                            <select name="industry_id" id="industry_id" class="form-control">
                                @foreach($industrys as $industry)
                                    <option  value="{{$industry->id}}">{{$industry->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">提交需求</button>
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
                            alert('电话不能为空');
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