<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>17173通行证_中国游戏第一门户站</title> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--fix：多核浏览器兼容模式下jQuery误判导致表单检测插件bug--> 
  <!-- buildX:css https://s.ue.17173cdn.com/a/passport/v1//home/css/dist/site.css --> 
    <script type="text/javascript" src="/home/js/jquery-1.7.2.js"></script>
  <link href="/home/css/reset-and-utils-1.0.css" rel="stylesheet" type="text/css" /> 
  <link href="/home/css/n-style.css" rel="stylesheet" type="text/css" /> 
  <link href="/home/css/passport-artdialog.css" rel="stylesheet" type="text/css" /> 
  <link href="/home/css/global-topbar.css" rel="stylesheet" /> 
  <!-- endbuild --> 
 
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
    .ul{
      list-style: none;
      margin:0;
      padding:0;
    }
    
   .ul>li{
      list-style: none;
      margin:0;
      padding:0;
      background: #f7f7f7;
      width:65px;
      height:20px;
      float:left;
      margin-right:center;
      line-height: 20px;
      font-size: 14px;
      color: #fff;
      font-family:'仿宋';
    }
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
        <li class=""> <a class="a-nav" href="http://about.17173.com/site-map.shtml" target="_blank" title="站内导航">站内导航</a> </li> 
       </ul> 
      </div> 
     </div> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
     <!--div#content--> 
     <div id="content" class="content-reg clearfix"> 
      <div class="con-in reg-form-page" id="reg-page"> 
       <!--main--> 
       <div class="main"> 
        <!--2015年3月10号
<div class="reg-do-list">
<span class="reg-do-list-on"><strong>1</strong>账号信息</span>
<span><strong>2</strong>激活邮箱</span>
<span><strong>3</strong>完成注册</span>
</div>

<div class="reg-do-list none">
<span class="reg-do-list-on"><strong>1</strong>账号信息</span>
<span><strong>2</strong>完成注册</span>
</div>
--> 
        <ul class="reg-tab"> 
         <li class="reg-tab-nav no1 on">邮箱注册</li> 
         <li class="reg-tab-nav">手机注册</li> 
        </ul> 
        <!--login-form--> 
        <form class="login-form  content-reg-mail" id="form" action="{{ url('home/zhuce/dozhuce') }}" method="post"> 
        {{ csrf_field() }}

         <!--reg-tab-link 
        }
        <a href="javascript:;" class="reg-tab-link none">手机号注册</a> 
        //reg-tab-link--> 
      
      
         <div class="fbox passport"> 
          <div class="fbox-main"> 
           <div class="border-passport"> 
            <input type="text"  class="input-txt input-passport" id="email"; name="email" data-maillist="[&quot;qq.com&quot;,&quot;163.com&quot;,&quot;sina.com&quot;,&quot;126.com&quot;,&quot;sohu.com&quot;,&quot;gmail.com&quot;,&quot;hotmail.com&quot;]" placeholder="邮箱" autofocus="" /> <span id="span" style="color:#ccc; size:'2';">请输入163或qq的邮箱</span>
           </div> 
          </div> 
          <div class="fbox-tip"> 
           <span class="errContainer"></span> 
           <!--<span class="clear"></span>--> 
           <span class="tip">填写的邮箱可用于登录和找回密码</span> 
          </div> 
         </div> 
        
         <div class="fbox pw"> 
          <div class="fbox-main"> 
           <input type="password" autocomplete="off" class="input-txt input-pw" id="password" name="password" maxlength="20" data-indicator="pwindicator" placeholder="密码" /><span id="span1" style="color:#ccc;">请输入密码</span>
           <ul  class="ul">
             <li class='li'>弱</li>
             <li class='li'>中</li>
             <li class='li'>强</li>
             <li class='li'>变态</li>
           </ul>
           <span class="tip-block" style="display:none"> <span id="pwindicator"> <span class="block block3"></span> <span class="block block2"></span> <span class="block block1"></span> <span class="words"></span> </span> </span> 
          </div> 
          <div class="fbox-tip"> 
           <span class="errContainer"></span> 
           <span class="clear"></span> 
           <span class="tip">6~20个字符，区分大小写</span> 
          </div> 
         </div> 
         <div class="fbox safe-code" id="codeDo"> 
          <div class="fbox-main clearfix"> 
           <input type="text" class="input-txt input-safe-code" id="code" name="code" placeholder="验证码" />
           <!-- <span class="box-safe-code js-validcode-container"></span>  -->
           <img src="{{url('/code')}}" alt="" name="code" onclick="this.src='{{url('/code')}}?'+Math.random()"/></div> 
           <span class="mark" style="color:red">
               @if(session('error'))
            <span>{{ session('error') }}</span>
            @else 
            <span></span>
            @endif
            </span> 
          
          <!-- <div class="fbox-tip"> <span class="errContainer"></span> <span class="tip"><span></span></span> </div> --> 
          <em class="mobile-em-none none">X</em> 
          <strong class="mobile-strong-none none">确定</strong> 
         </div> <span></span>
         <div class="fbox agreement">
          <input type="checkbox" id="agreement" name="agreement" value="1" checked />
          <!-- <label for="agreement">同意<a href="/register/clause" title="《17173通行证服务条款》">《17173通行证服务条款》</a></label> -->
          <span class="errContainer"></span> 
          </div>
         <!--  <div class="fbox agreement">
          <input type="checkbox" id="agreement" name="agreement" value="1" checked />
          <label for="agreement">同意<a href="/register/clause" title="《17173通行证服务条款》">《17173通行证服务条款》</a></label>
          <span class="errContainer"></span> </div> --> 
         <div class="fbox box-btn"> 
          <input class="btn btn-submit" type="submit" value="注册" /> 
          <!-- <button class="btn btn-submit" type="submit" name="submit"><span>同意服务条款并注册</span></button> --> 
         </div> 
          
         <!-- <span class="mobile-agreement"><a href="/register/clause" title="《17173通行证服务条款》">《17173通行证服务条款》</a></span>  -->
        
        </form> 
          
           
        <script>
                var flag = false;
        //邮箱验证
              $('#email').blur(function(){
                 param = $(this).val();
               
               
                var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
              
                if(reg.test(param))
               {
                  $.post('{{url('home/zhuce/insert1')}}',{'email':param,'_token':"{{csrf_token()}}"},function(par){
                    // alert(par);
                     if(par==1){

                         $('#span').html("<font color='green';size='2';>已注册</font>");
                     }else{
                          $('#span').html("<font color='green';size='2';>恭喜!邮箱可用</font>");
                          flag = true;
                     }

                });
               }else{
                 $('#span').html("<font color='red' size='2'>邮箱不合法</font>");

              } 
               

               });

              $('#form').click(function(){
                
                return flag;
              });
              //密码验证
              $('#password').blur(function(){
                var arr = [];
                param1 = $(this).val();
                if(param1.length > '5'){
                      $('#span1').html("<font color='green'>恭喜!密码可用</font>");
                }else{
                     $('#span1').html("<font color='red'>密码不可用</font>");
                }
                 var preg1 = /[0-9]+/g; 
                 var preg2 = /[a-z]+/g;
                 var preg3 = /[A-Z]+/g;
                 var preg4 = /[\W_]+/g;
                 if(preg1.test( param1 )){
                    arr.push('数字');
                  }
                  if(preg2.test( param1 )){
                    arr.push('小写字母');
                  }
                  if(preg3.test( param1 )){
                    arr.push('大写字母');
                  }
                  if(preg4.test( param1 )){
                    arr.push('特殊字符');
                  } 
                  // 1.所有的li标签都变成灰色
                      for(var i = 0;i< $('.ul>li').length;i++){
                          // li[i].style.background = '';
                          $('.li').css('background','');
                        
                        }
                  // 2.然后让指定的li标签变色
                switch(arr.length){
                  case 1:
                    $('.li').eq(0).css('background','red');
                    break;
                  case 2:
                    $('.li').eq(1).css('background','orange');

                    break;
                  case 3:
                    $('.li').eq(2).css('background','yellowgreen');
                   
                    break;
                  case 4:
                    $('.li').eq(3).css('background','green');
                  
                    break;
                }        

              });
  
        </script>
        <!--//form--> 
       <!--form--> <!--  js-validateMe -->
       <style>
        .u{
          list-style: none;
          margin:0;
          padding:0;
        }
        
       .u>li{
          list-style: none;
          margin:0;
          padding:0;
          background: #f7f7f7;
          width:65px;
          height:20px;
          float:left;
          margin-right:center;
          line-height: 20px;
          font-size: 14px;
          color: #fff;
          font-family:'仿宋';
        }
</style>
        <form class="login-form  content-reg-mobile" action="{{ url('home/zhuce/insert2') }}" method="post" autocomplete="off"> 
          {{ csrf_field() }}
         <!--reg-tab-link
        <a href="javascript:;" class="reg-tab-link none">邮箱注册</a> 
        //reg-tab-link--> 
         <div class="fbox phone-reg"> 
          <div class="fbox-main"> 
           <div class="border-passport"> 
            <input type="text" class="input-txt input-passport" id="phone" name="phone" placeholder="中国大陆手机号" /><span id="span3" style="color:#ccc;">请输入手机号码</span> 
           </div> 
          </div> 
          <div class="fbox-tip"> 
           <span class="errContainer"></span> 
           <span class="tip">填写的手机号可用于登录和找回密码</span> 
          </div> 
         </div> 
         <div class="fbox pw"> 
          <div class="fbox-main"> 
           <input type="password" autocomplete="off" class="input-txt input-pw" id="password1" name="password" maxlength="20" data-indicator="pwindicator-mobile" placeholder="密码" /><span id="span5" style="color:#ccc;">请输入密码</span>  
            <ul  class="u">
             <li class='li1'>弱</li>
             <li class='li1'>中</li>
             <li class='li1'>强</li>
             <li class='li1'>变态</li>
           </ul>
           <span class="tip-block" style="display:none"> <span id="pwindicator-mobile"> <span class="block block3"></span> <span  class="block block2"></span> <span class="block block1"></span> <span class="words"></span> </span> </span> 
          </div> 
             <script>
              //密码验证
              $('#password1').blur(function(){
                  var arr = [];
                param1 = $(this).val();
                if(param1.length > '5'){
                      $('#span5').html("<font color='green'>恭喜!密码可用</font>");
                }else{
                     $('#span5').html("<font color='red'>密码不可用</font>");
                }

                var preg1 = /[0-9]+/g; 
                 var preg2 = /[a-z]+/g;
                 var preg3 = /[A-Z]+/g;
                 var preg4 = /[\W_]+/g;
                 if(preg1.test( param1 )){
                    arr.push('数字');
                  }
                  if(preg2.test( param1 )){
                    arr.push('小写字母');
                  }
                  if(preg3.test( param1 )){
                    arr.push('大写字母');
                  }
                  if(preg4.test( param1 )){
                    arr.push('特殊字符');
                  } 
                  // 1.所有的li标签都变成灰色
                      for(var i = 0;i< $('.u>li').length;i++){
                        
                          $('.li1').css('background','');
                        
                        }
                  // 2.然后让指定的li标签变色
                switch(arr.length){
                  case 1:
                    $('.li1').eq(0).css('background','red');
                    break;
                  case 2:
                    $('.li1').eq(1).css('background','orange');

                    break;
                  case 3:
                    $('.li1').eq(2).css('background','yellowgreen');
                   
                    break;
                  case 4:
                    $('.li1').eq(3).css('background','green');
                  
                    break;
                }        

              
              });
              
          </script>
          <div class="fbox-tip"> 
           <span class="errContainer"></span> 
           <span class="clear"></span> 
           <span class="tip">6~20个字符，区分大小写</span> 
          </div> 
         </div> 
         <div class="fbox safe-code"> 
          <div class="fbox-main clearfix zg-code-box"> 
          <!-- name="mobile_verify_code" id="safe-code-mobile" -->
           <input type="text" name="phone_code" id="code" maxlength="6" class="input-txt input-safe-code" placeholder="验证码" /> 
           <span  id="yanzhan" class="zg-code-btn">点击获取验证码</span> 
           <!--<button data-input="input[name='mobile']" data-url="</div>/?php echo $send_checkcode_url;?>" class="btn btn-get-code js-btn-countdown">获取短信验证码</button>--> 
          </div> 
          <script type="text/javascript">
            //手机验证
            var lege = false;
            $('#phone').blur(function(){
              var phone = $('#phone').val();
              var param2 = /^1[3|4|5|7|8][0-9]{9}$/;
               
              if(param2.test(phone) && phone.length == '11' && phone !=''){

                $.post("{{url('home/zhuce/insert')}}",{'phone':phone,'_token':'{{csrf_token()}}'},function(msg){
                     // alert(msg);
                      if(msg== 1){
                          $('#span3').html("<font color='green';size='2';>手机已注册</font>");
                           
                         }else{
                      
                          $('#span3').html("<font color='green';size='2';>手机号可以注册</font>"); 
                          lege=true;
                     }
                  });  
                 
              }else{
                      $('#span3').html("<font color='red'>手机号不合法</font>");  

              }

            });


          // alert('dsf');
              $('#yanzhan').click(function(){
                var phone = $('#phone').val();
               // alert('dfs');
              // 发送ajax 注册手机号
              if(!lege) return;
              $.post("{{url('home/zhuce/phone')}}",{'_token':'{{csrf_token()}}',phone:phone},function(msg){
                // alert(msg.msg);
                  if(msg.code == 2){
                    alert(msg.msg);
                    return;
                  }else{
                    alert(msg.msg);
                    return;
                  }
                },'json');
          
              });

            
            </script>

          <div class="fbox-tip"> 
           <span class="errContainer"></span> 
           <span class="tip"><span></span></span> 
          </div> 
         </div> 
        <!--  <div class="fbox idcard"> 
          <div class="fbox-main"> 
           <input type="text" class="input-txt input-idcard" id="idcard" name="idcard" maxlength="20" placeholder="身份证" /> 
          </div> 
          <div class="fbox-tip"> 
           <span class="errContainer"></span> 
           <span class="tip"></span> 
          </div> 
         </div>  -->
        <!--  <div class="fbox realname"> 
          <div class="fbox-main"> 
           <input type="text" class="input-txt input-realname" id="realname" name="realname" maxlength="20" placeholder="姓名" /> 
          </div> 
          <div class="fbox-tip"> 
           <span class="errContainer"></span> 
           <span class="tip"></span> 
          </div> 
         </div>  -->
         <div class="fbox agreement"> 
          <input type="checkbox" id="agreement" name="agreement" value="1" checked="" /> 
          <!-- <label for="agreement">同意<a href="/register/clause" title="《17173通行证服务条款》">《17173通行证服务条款》</a></label>  -->
          <span class="errContainer"></span> 
         </div> 
         <div class="fbox box-btn"> 
          <!-- <button class="btn btn-submit" type="submit" name="submit"><span>同意服务条款并注册</span></button>  -->
          <input type="submit" name="" value="注册" class="btn btn-submit" >
         </div> 
         <!-- <span class="mobile-agreement"><a href="/register/clause" title="《17173通行证服务条款》">《17173通行证服务条款》</a></span>  -->
         
         <div class="codeDoTip-bg"></div> 
        </form> 
       

        <!--/login-form--> 
       </div> 
       <!--/main--> 
       <!--side-login--> 
       <div class="side-login pprt-form-box" id="box"> 
        <h2></h2> 
        <!-- 已有通行证? -->
        <a class="btn btn-login ppcontrol" href="{{url('home/login/login')}}" title="立即登录" data-currevent="even2">立即登录</a> 
        <form class="pprt-form"> 

         <input type="hidden" name="email" /> 
         <input type="hidden" name="password" /> 
         <span style="display:none;"><span class="login-err alarm"></span></span> 
         <!--quick-login--> 
         <!-- <div class="quick-login">  -->
         <!--  <span>一键登录：</span> 
          <a class="a-3 open-platform-qq" href="#" title="可使用腾讯帐号登录"></a> 
          <a class="open-platform-weixin" style="background: url(/home/images/weixin.png)" href="#" title="可使用微信帐号登录"></a> 
          <a class="a-2 open-platform-weibo" href="#" title="可使用微博帐号登录"></a> 
          <a class="a-5 open-platform-baidu" href="#" title="可使用百度帐号登录"></a>  -->
          <!--<a class="a-1 open-platform-sohu" href="#" title="可使用搜狐帐号登录"></a>--> 
         <!--  <a class="a-6 open-platform-renren" href="#" title="可使用人人帐号登录"></a> 
          <a class="a-7 open-platform-douban" href="#" title="可使用豆瓣帐号登录"></a> 
          <a class="a-8 open-platform-cyou" href="#" title="可使用畅游帐号登录"></a>  -->
          <!--<a class="a-4 open-platform-ww37" href="#" title="可使用37玩玩帐号登录"></a>--> 
          <!-- <a href="javascript:" class="quickdo"></a>  -->
          <!-- <a class="a-2" href="#" title=""></a>
    <a class="a-3" href="#" title=""></a>
    <a class="a-4" href="#" title=""></a>
    <a class="a-5" href="#" title=""></a>
    <a class="a-6" href="#" title=""></a>
    <a class="a-7" href="#" title=""></a> --> 
         <!-- </div>  -->
         <!--/quick-login--> 
        </form> 
        <div class="box-passport-tool"> 
         <h3>使用通行证，可享受17173提供的以下服务:</h3> 
         <span class="box-icon"> <span class="line"> <a class="icon-60x60 a-1" href="http://shop.17173.com" target="_blank" title=""><span>游戏商城</span></a> <a class="icon-60x60 a-2" href="http://my.17173.com" target="_blank" title=""><span>玩家中心</span></a> <a class="icon-60x60 a-3" href="http://bbs.17173.com" target="_blank" title=""><span>游戏论坛</span></a> </span> <span class="line"> <a class="icon-60x60 a-4" href="http://hao.17173.com" target="_blank" title=""><span>发号中心</span></a> <a class="icon-60x60 a-5" href="http://act.17173.com" target="_blank" title=""><span>活动频道</span></a> <a class="icon-60x60 a-6" href="http://vlog.17173.com" target="_blank" title=""><span>视频中心</span></a> </span> </span> 
         <a class="more-service" href="http://about.17173.com/site-map.shtml" target="_blank">更多产品服务&gt;&gt;</a> 
        </div> 
       </div> 
       <!--/side-login--> 
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
      <a href="http://about.17173.com/site-map.shtml" target="_blank">网站导航</a> 
      <br /> 
      <span class="copyright">Copyright &copy; 2001-2013 17173. All rights reserved.</span> 
     </div> 
     <div class="mobile-footer"> 
      <span class="copyright">Copyright &copy; 2001-2013 17173. All rights reserved.</span> 
     </div> 

     <style>


body{
background-color:#f7f7f7
}
.content-reg form .safe-code .box-safe-code .txt a {
font-size:16px;
margin:7px 0 0 5px;
}
.content-reg form .safe-code .box-safe-code .txt a:hover {
color:#fda700;
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