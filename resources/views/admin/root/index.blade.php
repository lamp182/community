@extends('admin.layout.index')
@section('content')
<form action="{{url('admin/root/index')}}" method="get">
    <div class="widget-body  am-fr">

                                <div class="widget-title  am-cf">管理员列表</div>
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                    <div class="am-form-group tpl-table-list-select">
                                        
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        <input type="text" id="inp" class="am-form-field" placeholder="用户名关键字" name="keywords" value="@if(!empty($key)){{$key}}@endif"/>
                                        <span class="am-input-group-btn">
                                            <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit">
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>头像</th>
                                                <th>用户名</th>
                                                <th>真实姓名</th>
                                                <th>身份证号码</th>
                                                <th>手机号码</th>
                                                <th>邮箱</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($data as $k=>$v)
                                <tr class="gradeX">
                                    <td>
                                                    <img src="assets/img/k.jpg" class="tpl-table-line-img" alt="">
                                                </td>
                                                <td class="am-text-middle">{{$v->name}}</td>
                                                <td class="am-text-middle">{{$v->realname}}</td>
                                                <td class="am-text-middle">{{$v->cid}}</td>
                                                <td class="am-text-middle">{{$v->phone}}</td>
                                                <td class="am-text-middle">{{$v->email}}</td>
                                      <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                                        <a href="{{ url('admin/root/update/'.$v->id) }}">
                                                        <!-- <a href="update/{{$v->id}}"> -->
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" onclick="delroot({{$v->id}})" class="tpl-table-black-operation-del" >
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                        <a href="{{ url('admin/root/changepass/'.$v->id) }}">
                                                        <i class="am-icon-asterisk"></i> 
                                                        修改密码
                                                    </a>
                                            </div>
                                    </td>
                                </tr>
                                            @endforeach
                                            <!-- more data -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="am-u-lg-12 am-cf">

                                    <!-- <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">
                                            <li class="am-disabled"><a href="#">«</a></li>
                                            <li class="am-active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">»</a></li>
                                        </ul>
                                    </div> -->
                                    <?php
                                        $key = empty($key)?'':$key;
                                        ?>
                                        <ul class="am-pagination">
                                                    
                                            <!-- {!! $data->render() !!} -->
                                            {!! $data->appends(['keywords' => $key])->render() !!}
                                        </ul>
                                        <style>
                                            .am-pagination ul li{
                                            float: left;
                                            font-size: 15px;
                                            padding: 0px 5px;
                                            }
                                        </style>
                                </div>
    </div>
</form>
<script type="text/javascript">

    function delroot(id){

        //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                // '_method':'post'提交方式
                $.post("{{url('admin/root/delroot')}}/"+id,{'_method':'post','_token':"{{csrf_token()}}"},function(data){
                if(data.status == 0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
                });


            }, function(){

            });

        }
    
</script>
@endsection