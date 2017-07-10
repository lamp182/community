@extends('admin.layout.index')
@section('content')
    <h1 style="color:blue;text-align:center">修改栏目</h1>
    <div class="widget-body am-fr">

        <form id="form" class="am-form tpl-form-border-form" method="get">
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">栏目名称<span class="tpl-form-line-small-title"></span></label>
                <div class="am-u-sm-12">
                    <input type="text"  name="name"  style="width:700px" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="{{$name}}" value=""><span style="color:red" id="spanw"></span>
                </div>
            </div>
             <script>
                // 文档加载事件
               $(function(){
                    $('#user-name').blur(function(){
                        var rename = $('#user-name').val();
                        // alert(rename);
                        $.get("{{url('admin/columns/data')}}",{'name':rename},function(msg){
                            if(msg == 2){
                                 $('#spanw').html('栏目名称已存在,不能修改');
                                  return false; 
                            }

                            if(msg == 1){
                                $('#spanw').html('');

                                $('#submit').click(function(){
                                    // 获取input的val值
                                    var name = $('#user-name').val();
                                    // console.log(name);
                                    // 发送jaax
                                    $.get("{{url('admin/columns/updata')}}",{'id':{{$id}},'name':name},function(msg){
                                        if(msg == '修改成功'){
                                            alert(msg);
                                            location.href="{{url('admin/columns/index')}}"; 
                                        }else{
                                            alert(msg);
                                            location.href=location.href;
                                        }
                                        // alert(msg);
                            
                                    });
                                });
                            }
                        });
                    });
               });
            </script>
            <div class="am-form-group">
                <div class="am-u-sm-12 am-u-sm-push-12">
                    <button type="button" id="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">修改</button>
                </div>
            </div>
        </form>
    </div>


    @endsection