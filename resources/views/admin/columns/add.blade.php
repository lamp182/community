@extends('admin.layout.index')
@section('content')
    <h1 style="color:blue;text-align:center">添加栏目</h1>
    <div class="widget-body am-fr">

        <form id="form" class="am-form tpl-form-border-form" method="get">
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">栏目名称<span class="tpl-form-line-small-title"></span></label>
                <div class="am-u-sm-12">
                    <input type="text"  name="name"  style="width:700px" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="请输入栏目名称" value=""><span style="color:red" id="spanw"></span>
                    <!-- <small>请填写栏目名称10字左右。</small> -->
                </div>
            </div>
            <script>
                // 文档加载事件
                $(function(){
                    $('#user-name').blur(function(){
                        // $('#spanw').html('ssss');
                        var rename = $('#user-name').val();
                        $.get('select',{'rename':rename},function(msg){
                            if(msg == 2){
                                $('#spanw').html('栏目名称已存在');
                                // alert(msg);
                                return false;  
                            }
                            if(msg == 1){
                                $('#spanw').html('');
                                // alert(msg);

                                // 给提交按钮绑定点击事件
                                $('#submit').click(function(){
                                    // 获取input的val值
                                    var name = $('#user-name').val();
                                    // console.log(name);
                                    // 发送jaax
                                    $.get('doadd',{'name':name},function(msg){
                                        if(msg == '添加成功'){
                                            alert(msg);
                                            location.href='index'; 
                                        }else{
                                            alert(msg);
                                            location.href=location.href;
                                        }
                            
                                    });
                                });

                            }
                           
                            // alert(msg);
                        });
                    });

                  
                })
            </script>
            <div class="am-form-group">
                <div class="am-u-sm-12 am-u-sm-push-12">
                    <button type="button" id="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                </div>
            </div>
        </form>
    </div>


    @endsection