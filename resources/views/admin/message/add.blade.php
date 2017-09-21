@extends('layout')
@section('content')

<section class="wrapper">
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    添加留言  &nbsp;  &nbsp; &nbsp; &nbsp; <a href="javascript:history.go(-1)">返回上一页</a>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" onsubmit="return checkform();">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">留言内容</label>
                            <div class="col-sm-11">
                                <textarea name="content" id="content" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">回复内容（可选）</label>
                            <div class="col-sm-11">
                                <textarea name="response" id="response" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">类型</label>
                            <div class="col-sm-11">
                                <label class="checkbox-inline">
                                    <input type="radio" checked id="type" name="type" value="1"> 普通
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="type" name="type" value="2"> 私密
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">所属关联需求</label>
                            <div class="col-sm-11">
                                <select name="requirement_id" id="requirement_id" class="form-control">
                                    @foreach($requirements as $requirement)
                                    <option value="{{$requirement->id}}">{{$requirement->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">留言者</label>
                            <div class="col-sm-11">
                                <select name="user_id"  id="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->nickname}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">提交留言</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        function checkform() {
                            var content =$('#content').val();
                            if(content == '' || content == null || content == undefined){
                                alert('留言内容不能为空');
                                return false;
                            }
                            var requirement =$('#requirement_id').val();
                            if(requirement == '' || requirement == null || requirement == undefined){
                                alert('关联需求不能为空');
                                return false;
                            }
                            var user =$('#user_id').val();
                            if(user == '' || user == null || user == undefined){
                                alert('关联用户不能为空');
                                return false;
                            }
                            
                        }
                    </script>
                </div>
            </section>
        </div>


    </div>

    </div>

</section>
@stop