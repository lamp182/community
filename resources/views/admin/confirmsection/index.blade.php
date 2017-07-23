@extends('admin.layout.index')
@section('content')
<form action="{{url('admin/moderators')}}" method="get">
    <div class="widget-body  am-fr">
	
                                <div class="widget-title  am-cf">版主申请</div>
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                    <div class="am-form-group tpl-table-list-select">
                                        
                                    </div>
                                </div>
                                
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>板块名称</th>
                                                <th>版主</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($data as $k=>$v)  
                                          
                                <tr class="gradeX">
                                    
                                                
                                                
                                                <td class="am-text-middle">{{$v->id}}
                                                </td>
                                                <td class="am-text-middle">{{$v['section']['name']}}
                                                </td>
                                                <td class="am-text-middle">{{$v['username']}}
                                                </td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                    

                                                    <a href="javascript:;" onclick="del({{$v->id}})" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-times"></i> 取消版主
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
</form>
<script type="text/javascript">

    function del(id){

        ///询问框
            layer.confirm('是否确认取消版主？', {
                btn: ['确定','取消'] //按钮
            }, function(){
//        $.post(url,data,function(){});
                $.post("{{url('admin/confirmsection/del')}}/"+id,{'_method':'post','_token':"{{csrf_token()}}"},function(data){
                   console.log(data.status);
                    if(data.status == 0){
//                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
//                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }
                });

            }, function(){

            });

        }
    
</script>

@endsection