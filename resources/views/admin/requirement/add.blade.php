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
                            <label for="inputEmail3" class="col-sm-1 control-label">title</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="title" id="title" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">content</label>
                            <div class="col-sm-11">
                                <textarea name="content" id="content" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">所属行业</label>
                            <div class="col-sm-11">
                                <select name="industry_id" id="industry_id" class="form-control">
                                    @foreach($industrys as $industry)
                                    <option value="{{$industry->id}}">{{$industry->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">所属种类</label>
                            <div class="col-sm-11">
                                <select name="species_id" id="species_id" class="form-control">
                                    @foreach($species as $specie)
                                    <option value="{{$specie->id}}">{{$specie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-1 control-label">发布者</label>
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
                                <button type="submit" class="btn btn-default">提交需求</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        function checkform() {
                            var title =$('#title').val();
                            if(title == '' || title == null || title == undefined){
                                alert('需求标题不能为空');
                                return false;
                            }
                            var content =$('#content').val();
                            if(content == '' || content == null || content == undefined){
                                alert('需求内容不能为空');
                                return false;
                            }
                            var industry =$('#industry_id').val();
                            if(industry == '' || industry == null || industry == undefined){
                                alert('行业分类不能为空');
                                return false;
                            }
                            var species =$('#species_id').val();
                            if(species == '' || species == null || species == undefined){
                                alert('种类分类不能为空');
                                return false;
                            }
                            var user =$('#user_id').val();
                            if(user == '' || user == null || user == undefined){
                                alert('关联不能为空');
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