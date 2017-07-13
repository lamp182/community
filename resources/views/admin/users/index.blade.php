@extends('admin.layout.index')
@section('content')
<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">用户列表</div>
                                <div class="widget-function am-fr">
                                </div>
                            </div>

                            <div class="widget-body  widget-body-lg am-fr">
								
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                        <tr>
                                            <th>用户id</th>
                                            <th>邮箱</th>
                                            <th>手机</th>
                                            <th>密码</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k=>$v)
                                        <tr class="gradeX">
                                            <td>{{$v->id}}</td>
                                            <td>{{$v->email}}</td>
                                            <td>{{$v->phone}}</td>
                                            <td>{{$v->password}}</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="{{ url('admin/user/update/'.$v->id) }}">
                                                        <i class="am-icon-pencil"></i> 编辑
                                                    </a>
                                                    <a href="{{ url('admin/user/details/'.$v->id) }}">
                                                        <i class="am-icon-comments"></i> 详情
                                                    </a>
                                                    <a href="javascript:;" onclick="deluser({{$v->id}})" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                        <!-- more data -->
                                        
                                    </tbody>

                                </table>
									<ul class="am-pagination">
                                            {!! $data->render() !!}
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
                    </div>
<script type="text/javascript">

    function deluser(id){

        //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                // '_method':'post'提交方式
                $.post("{{url('admin/user/deluser')}}/"+id,{'_method':'post','_token':"{{csrf_token()}}"},function(data){
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