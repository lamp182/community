@extends('admin.layout.index')
@section('content')
<div>{{ session('error') }}</div>
<form class="am-form tpl-form-border-form" action="{{url('admin/root/uppass')}}"method="post" id="root_form">
    {{csrf_field()}}
        
        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                原密码
                <span class="tpl-form-line-small-title">
                    password
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="password" class="tpl-form-input  am-margin-top-xs" id="old" name="oldname" value="" placeholder="请输入原密码">
                <small class="one">
                    请填写原密码
                </small>
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                新密码
                <span class="tpl-form-line-small-title">
                    newpassword
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="password" class="tpl-form-input am-margin-top-xs" id="new" name="new"
                value="" placeholder="请输入新密码">
                <small>
                    请填写新密码
                </small>
            </div>
        </div>

		<input type="hidden" id="hidden" name="hidden" value="{{$id}}">

        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                确认密码
                <span class="tpl-form-line-small-title">
                    newrepassword
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="password" class="tpl-form-input am-margin-top-xs" id="replnew" name="relnew"
                value="" placeholder="请输入新密码">
                <small>
                    请再次填写新密码
                </small>
            </div>
        </div>
        <div class="am-form-group">
            <div class="am-u-sm-12 am-u-sm-push-12">
            <button type="submit" id="change" class="am-btn am-btn-primary tpl-btn-bg-color-success id='button' ">
                修改
            </button>
            </div>
        </div>

        <script type="text/javascript">
        $(function(){
        	$('#change').click(function(){
        	//原密码的值
        	var hidden = $('#hidden').val();
        	var old = $('#old').val();
        	var new = $('#new').val();
        	var relname = $('#relname').val();
        	// alert(old);
        	// return false;
        	$.post("{{url('admin/root/uppass?id='.$id)}}",{'data':old,'new':new,'relname':relname,'_method':'post','_token':"{{csrf_token()}}"},function(msg){
        		alert(msg);
        	})
        	return false;
       		 });
        });

        // $('#old').blur(function(){
        // 	var old = $('#old').val();
        // 	// alert(old);
        // 	$.post("{{url('admin/root/uppass?id='.$id)}}",{'data':old,'_method':'post','_token':"{{csrf_token()}}"},function(msg){
        // 		$('.one').html = '原密码错误!';
        // 	})
        // });
        
        </script>

</form>
@endsection