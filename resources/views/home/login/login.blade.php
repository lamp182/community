<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>17173通行证_中国游戏第一门户站</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><!--fix：多核浏览器兼容模式下jQuery误判导致表单检测插件bug-->
<!-- buildX:css https://s.ue.17173cdn.com/a/passport/v1//home/css/dist/site.css -->
<link href="/home/css/reset-and-utils-1.0_1.css" rel="stylesheet" type="text/css" />
<link href="/home/css/n-style_1.css" rel="stylesheet" type="text/css" />
<link href="/home/css/passport-artdialog_1.css" rel="stylesheet" type="text/css" />
<link href="/home/css/global-topbar_1.css" rel="stylesheet">
<!-- endbuild -->
<script type="text/javascript" src="/home/js/jquery-1.7.2_1.js"></script>
<script type="text/javascript" src="/home/js/passport_1.js"></script>
<!-- build:js https://s.ue.17173cdn.com/a/passport/v1//home/js/dist/plugins.js -->
<script type="text/javascript" src="/home/js/placeholder_1.js"></script>
<script type="text/javascript" src="/home/js/artdialog.min_1.js"></script>
<script type="text/javascript" src="/home/js/artdialog.plugins_1.js"></script>
<script type="text/javascript" src="/home/js/jquery.validate_1.js"></script>
<script type="text/javascript" src="/home/js/jquery.pwstrength_1.js"></script>
<script type="text/javascript" src="/home/js/jquery.emailmatch_1.js"></script>
<script type="text/javascript" src="/home/js/jquery.mask_1.js"></script>
<script type="text/javascript" src="/home/js/hideshowpassword_1.js"></script>
<script type="text/javascript" src="/home/js/md5_1.js"></script>
<script type="text/javascript" src="/home/js/retina-1.1.0.min_1.js"></script>
<!-- endbuild -->
<!-- build:js https://s.ue.17173cdn.com/a/passport/v1//home/js/dist/script.js -->
<script type="text/javascript" src="/home/js/passport-script_1.js"></script>
<script type="text/javascript" src="/home/js/n-script_1.js"></script>
<script type="text/javascript" src="/home/js/ppcontrol_1.js"></script>
<!-- endbuild -->
<link type="image/x-icon" rel="shortcut icon" href="/favicon.ico" />
<link type="image/x-icon" rel="icon" href="/favicon-hd.ico" />
<!--[if IE 6]>
	<script type="text/javascript" src="/home/js/ddpng-0.0.8a.min_1.js"></script>
    <script type="text/javascript">
	jQuery(function($){
		DD_belatedPNG.fix('.logo-17173');
		DD_belatedPNG.fix('#reg-page .btn-login');
		DD_belatedPNG.fix('#reg-page.reg-form-page .btn-submit span');
        DD_belatedPNG.fix('.box-nav-way ul li a');
	}); 
    </script>
<![endif]-->
</head>

<body class="guest">
<div id="wrap">
  <div id="wrapTop">
    <div id="wrapBtm"> 
        <div id="header">
            <div class="con-in">
                <a class="logo logo-17173" href="/" title="17173.com 通行证">17173.com 通行证</a>
				<span class="logo-17173-nolink"></span>
                <ul class="nav-header">
                    <li><a class="a-nav" href="http://help.17173.com" target="_blank" title="帮助中心">帮助中心</a></li>
                    <li><a class="a-nav" href="http://about.17173.com/control.shtml" target="_blank" title="家长监护">家长监护</a></li>
					<li><a class="a-nav" href="http://help.17173.com/help/wenti.shtml" target="_blank" title="意见反馈">意见反馈</a></li>
					<li class="">
						<a class="a-nav" href="http://about.17173.com/site-map.shtml" target="_blank" title="站内导航">站内导航</a>
					</li>
                </ul>
                            </div>
		</div>	   
			<script>
//适配
if(/AppleWebKit.*Mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))){
    window.location.href="https://passport.17173.com/wap"
}

</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--div#content-->
<div id="content" class="content-login clearfix">
<div class="con-in index-con-in">
  
  <!--main-->
  <div class="main">
	<!--box-login-->
	<div class="box-login box-login-1 js-tab" style=" ">
	  <!--<ul class="gb-tab">
		<li><a href="javascript:;">登录</a></li>
		<li style="display:none"><a href="javascript:;">手机号码登录</a></li>
	  </ul>
	  -->
	  <div class="gb-tab-pn">
		<div class="tab-con pprt-form-box" id="login_normal">
			<form class="js-validateMeX form-index-1 pprt-form" autocomplete="off" action="/home/login/insert" method="post">
			  {{ csrf_field() }}
			  <div class="fbox passport">
			  	<div class="fbox-main clearfix">
					<!--label for="passport">通行证：</label-->
					<div class="border-passport">
						<span class="input-ibox"><i class="ico"></i></span>
						<span class="input-empty"><i class="empty"></i></span>
						<input type="text" class="input-txt input-passport" id="passport" name="email" placeholder="手机/邮箱"/>
					</div><span id="span"></span>
					<span class="btn btn-clear js-clear" data-target="#passport" style="display:none"></span>
				</div>
				<span id="span"></span>
				
				<!-- <div class="fbox-tip">
					<span class="login-err alarm"></span>
				</div> -->
			  </div>
			  <div class="fbox pw">
			  	<div class="fbox-main">
					<!--label for="pw">密&nbsp;&nbsp;&nbsp;码：</label-->
					<div class="border-passport">
					<span class="input-ibox"><i class="ico"></i></span>
					<span class="input-empty"><i class="empty"></i></span>
						<input type="password" autocomplete="off" class="input-txt input-pw js-md5" id="password" name="password" maxlength="20" placeholder="密码"/>
					</div><span id="span1"></span> 
					<span class="mark"  style="color:red; font-size:12px;">
                                   @if(session('errors'))
                                <span>{{ session('errors') }}</span>
                                @else 
                                <span></span>
                                @endif
                                </span>   
					<!--br class="clear" /-->
				</div>
			  </div>
			  

			  <div class="ue-passport-validcode-container" style="display: none;"></div>
			  <div class="fbox fbox-remember">
					<span class="remember">
					<label for="persistentcookie"><input class="check-remember" name="persistentcookie" id="persistentcookie" type="checkbox"><span>下次自动登录</span></label>
					</span>
					<span class="tip tip-pw"><a href="{{url('/home/default/default')}}" title="忘记密码？" target="_blank">忘记密码</a>|<a class="" href="{{url('/home/zhuce/zhuce')}}" data-currevent="even1">立即注册</a><!--<a href="/safe/UserFind" title="请尝试***@17173.com登录" class="ppcontrol" data-currevent="even3" target="_blank">账号</a>--></span></span>
				</div>
			  <span class="clear"></span>
			  <div class="fbox box-btn"><input  id="denglu" class="btn btn-submit" type="submit" value="登录" /></div>
			  <!-- <button class="btn btn-submit" type="submit"><span>登录</span></button> -->
			  <!--quick-login-->
			  <div class="quick-login">
    <span>一键登录：</span>
	<a class="a-3 open-platform-qq" href="#" title="可使用腾讯帐号登录"></a>
	<a class="open-platform-weixin" style="background: url(/home/images/weixin_1.png)" href="#" title="可使用微信帐号登录"></a>
    <a class="a-2 open-platform-weibo" href="#"  title="可使用微博帐号登录"></a>
	<a class="a-5 open-platform-baidu" href="#" title="可使用百度帐号登录"></a>
	<!--<a class="a-1 open-platform-sohu" href="#" title="可使用搜狐帐号登录"></a>-->
	<a class="a-6 open-platform-renren" href="#" title="可使用人人帐号登录"></a>
	<a class="a-7 open-platform-douban" href="#" title="可使用豆瓣帐号登录"></a>
    <a class="a-8 open-platform-cyou" href="#" title="可使用畅游帐号登录"></a>
	<!--<a class="a-4 open-platform-ww37" href="#" title="可使用37玩玩帐号登录"></a>-->
    
    <a href="javascript:" class="quickdo"></a>
	
	
    <!-- <a class="a-2" href="#" title=""></a>
    <a class="a-3" href="#" title=""></a>
    <a class="a-4" href="#" title=""></a>
    <a class="a-5" href="#" title=""></a>
    <a class="a-6" href="#" title=""></a>
    <a class="a-7" href="#" title=""></a> -->
</div>
 			<!-- <input type="hidden" name="id" value="id" /> -->
			  <!--/quick-login-->
			  <!--<div class="add"><a class="btn btn-reg ppcontrol" href="/register" data-currevent="even1">立即注册</a></div>-->
			</form>
			<div class="wait-box" style="display:none;margin:70px;">
				<div class="logging-in">
					<img src="/home/picture/loading-white-16x16.gif" width="16" height="16" /> 正在登录, 请稍候...
				</div>
				<div class="logging-out">
					<img src="/home/picture/loading-white-16x16.gif" width="16" height="16" /> 正在注销, 请稍候...
				</div>
			</div>
		</div>
		<script>
						var time = false;
						$('#passport').blur(function(){
							var input = $('#passport').val();

							
							$.post("{{url('/home/login/dologin')}}",{'email':input,'_token':"{{csrf_token()}}"},function(msg){
						 // console.log(msg);
								if(msg==1){
									 $('#span').html("<font color='green'  size='2'>用户已存在</font>");		
									 	time = true;	
							}else{
								$('#span').html("<font color='red' size='2'>用户不存在</font>");		
									
							}
							});
						});

						$('#denglu').click(function(){
								return time;
						});
				</script>
		<div class="tab-con" style="display:none">
			<form class="form-index-2 js-validateMeX">

			  <p class="passport">
				<label for="passport">手机号：</label>
				<input type="text" class="input-txt input-passport" id="passport-m" maxlength="20" />
				<span class="btn btn-clear js-clear" data-target="#passport-m"></span>
				<span class="alarm">用户名或密码错误</span>
			  </p>
			  <div class="mobile">
							<label for="mobile"></label>
							<div class="box-select js-select-container" style=" margin:0 10px 0 0; height:28px;">
								<input name="city[]" type="text" style="display:none" id="city0" class="js-select-value valid" data-visual=".js-select-container" value="1" />
								<span class="curr js-select-name">请选择</span>
								<span class="arrow"></span>
								<ul class="list-select mouse-hover js-select-dropdown">
									
								</ul>
							</div>
							<a href="javascript:;">点击获取</a>
						</div>
			  <p class="pw">
				<label for="pw">密码：</label>
				<input type="password" autocomplete="off" class="input-txt input-pw js-md5" id="pw" name="password" maxlength="20" />
				<br class="clear" /> <span class="tip"><a href="#" title="忘记密码？" target="_blank">忘记密码？</a></span></span>
				<span class="alarm">可以尝试动态密码</span></p>
			  <!--quick-login-->
			  <div class="quick-login">
    <span>一键登录：</span>
	<a class="a-3 open-platform-qq" href="#" title="可使用腾讯帐号登录"></a>
	<a class="open-platform-weixin" style="background: url(/home/images/weixin_1.png)" href="#" title="可使用微信帐号登录"></a>
    <a class="a-2 open-platform-weibo" href="#"  title="可使用微博帐号登录"></a>
	<a class="a-5 open-platform-baidu" href="#" title="可使用百度帐号登录"></a>
	<!--<a class="a-1 open-platform-sohu" href="#" title="可使用搜狐帐号登录"></a>-->
	<a class="a-6 open-platform-renren" href="#" title="可使用人人帐号登录"></a>
	<a class="a-7 open-platform-douban" href="#" title="可使用豆瓣帐号登录"></a>
    <a class="a-8 open-platform-cyou" href="#" title="可使用畅游帐号登录"></a>
	<!--<a class="a-4 open-platform-ww37" href="#" title="可使用37玩玩帐号登录"></a>-->
    
    <a href="javascript:" class="quickdo"></a>
	
	
    <!-- <a class="a-2" href="#" title=""></a>
    <a class="a-3" href="#" title=""></a>
    <a class="a-4" href="#" title=""></a>
    <a class="a-5" href="#" title=""></a>
    <a class="a-6" href="#" title=""></a>
    <a class="a-7" href="#" title=""></a> -->
</div>
 {{ csrf_field() }}
			  <!--/quick-login-->
			  <span class="clear"></span>
			  <p class="box-btn"><input type="submit" class="btn btn-submit" value="提交" /></p>
			  <!-- <button class="btn btn-submit" type="submit"><span>登录</span></button> -->
			  <p class="add"><a class="tip" href="#" title="没有通行证？">没有通行证？</a><a class="btn btn-reg">马上注册一个！</a></p>
			</form>
		</div>
	  </div>
	</div>
	<!--/box-login-->
	<!--nav-func-->
	<!-- <ul class="nav-func">   
        
		<li><a class="a-1" href="/password/forget">找回密码</a></li>
		<li><a class="a-2" href="/appeal">账号申诉</a></li> -->
		<!--<li><a class="a-3 ppcontrol" href="/safe/UserFind" data-currevent="even4">找回账号</a></li>-->
<!-- 		<li><a class="a-4" href="/register/reactivate">重新激活帐号</a></li>
		<li><a class="a-5 ppcontrol" href="/appeal" data-currevent="even5">忘记密保问题</a></li>
        
        
	</ul> -->
	<!--/nav-func-->
  </div>
  <!--/main--> 
</div>
</div>
<!--/div#content--> 
<div class="global-footer">
	<a href="http://about.17173.com/" target="_blank">关于17173</a> |
	<a href="http://about.17173.com/join-us.shtml" target="_blank">人才招聘</a> |
	<a href="http://about.17173.com/adv-service.shtml" target="_blank">广告服务</a> |
	<a href="http://about.17173.com/business-cooperate.shtml" target="_blank">商务洽谈</a> |
	<a href="http://about.17173.com/contact-us.shtml" target="_blank">联系方式</a> |
	<a href="http://help.17173.com/" target="_blank">客服中心</a> |
	<a href="http://about.17173.com/site-map.shtml" target="_blank">网站导航</a> <br>
	<span class="copyright">Copyright © 2001-2013 17173. All rights reserved.</span>
</div>
<div class="mobile-footer">
	<span class="copyright">Copyright © 2001-2013 17173. All rights reserved.</span>
</div>

<style type="text/css">
body{
	background-color:#f7f7f7
}
.nav-func li {
	height: 120px;
	width: 25%;
	float: left;
}
.content-login .border-passport .input-empty {
	position: absolute;
	top: 50%;
	margin-top: -8px;
	right: 10px;
	display:none;
}

.content-login .border-passport .input-empty .empty {
    background: url(/home/images/phone-reg-empty.png) no-repeat scroll 0 0 transparent;
    display: block;
    height: 15px;
    width: 15px;
}
.content-login .border-passport .input-empty .empty:hover {
cursor:pointer;
}
</style>    </div>
  </div>
</div>
<!-- START 17173 Site Census -->
<script type="text/javascript" src="/home/js/ping_1.js"></script>
<noscript>
  <img src="/home/picture/ping_1.gif" height="0" width="0" />
</noscript>
<!-- END 17173 Site Census -->
</body>
</html>