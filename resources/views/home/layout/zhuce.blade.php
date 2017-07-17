<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>17173通行证_中国游戏第一门户站</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><!--fix：多核浏览器兼容模式下jQuery误判导致表单检测插件bug-->
<!-- buildX:css https://s.ue.17173cdn.com/a/passport/v1//home/css/dist/site.css -->
<link href="/home/css/reset-and-utils-1.0.css" rel="stylesheet" type="text/css" />
<link href="/home/css/n-style.css" rel="stylesheet" type="text/css" />
<link href="/home/css/passport-artdialog.css" rel="stylesheet" type="text/css" />
<link href="/home/css/global-topbar.css" rel="stylesheet">
<!-- endbuild -->
<script type="text/javascript" src="/home/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="/home/js/passport.js"></script>
<!-- build:js https://s.ue.17173cdn.com/a/passport/v1//home/js/dist/plugins.js -->
<script type="text/javascript" src="/home/js/placeholder.js"></script>
<script type="text/javascript" src="/home/js/artdialog.min.js"></script>
<script type="text/javascript" src="/home/js/artdialog.plugins.js"></script>
<script type="text/javascript" src="/home/js/jquery.validate.js"></script>
<script type="text/javascript" src="/home/js/jquery.pwstrength.js"></script>
<script type="text/javascript" src="/home/js/jquery.emailmatch.js"></script>
<script type="text/javascript" src="/home/js/jquery.mask.js"></script>
<script type="text/javascript" src="/home/js/hideshowpassword.js"></script>
<script type="text/javascript" src="/home/js/md5.js"></script>
<script type="text/javascript" src="/home/js/retina-1.1.0.min.js"></script>
<!-- endbuild -->
<!-- build:js https://s.ue.17173cdn.com/a/passport/v1//home/js/dist/script.js -->
<script type="text/javascript" src="/home/js/passport-script.js"></script>
<script type="text/javascript" src="/home/js/n-script.js"></script>
<script type="text/javascript" src="/home/js/ppcontrol.js"></script>
<!-- endbuild -->
<link type="image/x-icon" rel="shortcut icon" href="/favicon.ico" />
<link type="image/x-icon" rel="icon" href="/favicon-hd.ico" />
<!--[if IE 6]>
    <script type="text/javascript" src="/home/js/ddpng-0.0.8a.min.js"></script>
    <script type="text/javascript">
    jQuery(function($){
        DD_belatedPNG.fix('.logo-17173');
        DD_belatedPNG.fix('#reg-page .btn-login');
        DD_belatedPNG.fix('#reg-page.reg-form-page .btn-submit span');
        DD_belatedPNG.fix('.box-nav-way ul li a');
    }); 
    </script>
<![endif]-->
<style>
    
    #img{height: 30px;}
</style>
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

                    <!--box-nav-->
        <div class="box-nav nav-member">
    <div class="con-in">
        <ul class="nav nav-1">
            <li><a href="/main" class="main">首页</a></li>
            <li class="has-nav">
                <a href="/safe/mobile/index" class="safe">帐号保护</a>
                <ul class="sub-nav nav-account">
                    <li><a href="/safe/mobile/index">手机管理</a></li>
                    <li><a href="/safe/email/index">安全邮箱</a></li>
                    <li><a href="/safe/question/index">密保问题</a></li>
                    <li><a href="/safe/qq/index">绑定QQ帐号</a></li>
                    <li><a href="/safe/userInfo/index">身份认证</a></li>
                    <li style="display: none"><a href="/safe/loginNotice/index">帐号登录通知</a></li>
                </ul>
            </li>
            <li class="has-nav">
                <a href="/password/update" class="password">密码管理</a>
                <ul class="sub-nav nav-account">
                    <li><a href="/password/update">修改密码</a></li>
                    <li style="display: none"><a href="/password/forget">找回密码</a></li>
                </ul>
            </li>
            <!-- <li><a href="/appeal" class="appeal">帐号申诉</a></li> -->
            <!-- <li class="has-nav">
                <a href="/records" class="record">消息中心</a>
                <ul class="sub-nav nav-account">
                    <li><a href="/records">登录记录</a></li>
                    <li><a href="/records/email">安全邮箱更换</a></li>
                    <li><a href="/records/mobile">手机管理更换</a></li>
                    <li><a href="/records/question">密保问题更换</a></li>
                    <li><a href="/records/password">密码修改</a></li>
                    <li><a href="/records/appeal">申诉记录</a></li>
                </ul>
            </li> -->
        </ul>
    </div>
</div>
<div class="box-nav nav-guest">
    <div class="con-in">
        <ul class="nav nav-2">
            <li><a href="{{ url('home/login/login') }}" class="main" title="首页">首页</a></li>
            <li><a href="{{ url('home/default/default') }}" class="password"  title="找回密码">找回密码</a></li>
            <!-- <li><a href="/appeal" class="appeal" title="帐号申诉">帐号申诉</a></li> -->
        </ul>
    </div>
</div>
        <script type="text/javascript">
            $('.nav > li > a.password').addClass('on');
        </script>

@section('content')

    @show










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
  {{ csrf_field() }}
 <script type="text/javascript">
//  //$('body').addClass('pw-management pw-find').attr('id', 'reg-page');
// $(document).ready(function(){

//  $('input[name="username"]').rules('add', {
//      startWithLetter: false,
//      rangelengthCNChar: [3, 20]
//  });
    
// })
 </script>
<style>
.pw-find .form-pw-question .box-btn {
    padding-left: 0;
}
.content-comm .main .btn-submit{
    width:250px
}
</style>

    </div>
  </div>
</div>
<!-- START 17173 Site Census -->
<script type="text/javascript" src="/home/js/ping.js"></script>
<noscript>
  <img src="picture/ping.gif" height="0" width="0" />
</noscript>
<!-- END 17173 Site Census -->
</body>
</html>
