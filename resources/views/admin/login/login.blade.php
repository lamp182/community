<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/assets/i/favicon.png">
    <link rel="icon" type="image/png" href="/assets/js/jquery-1.8.3.min.js">
    <link rel="apple-touch-icon-precomposed" href="/assets//i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/assets/css/app.css">
    <script src="/assets//js/jquery.min.js"></script>
    <style>
        .clear{clear:both; height: 0; line-height: 0; font-size: 0}
    </style>
</head>

<body data-type="login">
          
<script src="/assets//js/theme.js"></script>
<div class="am-g tpl-g">
   

    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <div class="tpl-login">
        <div class="tpl-login-content">
      <!--   <div class="tpl-login-logo"></div> -->

                 <h1>17173游戏论坛</h1>

          @if (count($errors) > 0)
                <div class="mark" style="color:red">
                    <ul>
                        @if(is_object($errors))
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        @else
                            <li>{{ $errors }}</li>
                        @endif
                    </ul>
                </div>
            @endif
            
            <form class="am-form tpl-form-line-form" action="{{url('admin/login/dologin')}}" method="post">
                {{ csrf_field() }}
                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" id="user" name="name" value="" placeholder="请输入用户名">
                    <span id="span"></span>    
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" id="pass" name="password" placeholder="请输入密码">
                     <span id="span1"></span>   
                </div>
                <div class="am-form-group">

                    <span><i class="fa fa-check-square-o"></i></span>
                    <img src="{{url('/code')}}" alt="" onclick="this.src='{{url('/code')}}?'+Math.random()">
                    <input type="text" class="code" name="code"  placeholder="验证码" style="width:80px;float: left;"/>
                    <div class="clear"></div><!--  @if(session('error'))
            <h2>{{ session('error') }}</h2>
            @else 
           
            @endif -->
                </div>
                    <script>
                           $('#user').blur(function(){
                           var user = $('#user').val();
                            $.post("{{url('admin/login/insert')}}",{'name':user,'_token':"{{ csrf_token() }}"},function(msg){
                                    if(msg==1){
                                        $('#span').html("<font style='color: green; font-size:12px;'>用户名已存在</font>");
                                    }else{
                                         $('#span').html("<font style='color: red; font-size:12px;'>用户名不存在</font>");    
                                    }
                            });
                           });

                    </script>
                    
                <br>
                <div class="am-form-group tpl-login-remember-me" >
                    <input id="remember-me" type="checkbox">
                    <label for="remember-me">

                        记住密码
                    </label>

                </div>

                <div class="am-form-group">

                   
                    <input type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn"  value="提交">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/assets//js/amazeui.min.js"></script>
<script src="/assets//js/app.js"></script>

</body>

</html>