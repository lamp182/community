   @extends('home.layout.zhuce')
@section('content')

        <!--/box-nav-->
        <!--div#content-->
        <div id="content" class="clearfix content-comm content-mmgl">
            <div class="con-in pw-management pw-find" id="reg-page">                
                <!--<div class="tit"><h2>密保问题找回密码</h2></div>-->
                <!--main-->
                <div class="main">
                    <!--nav-step-->
                    <div class="crumbs-box"><span class="crumbs-box-c">密码管理</span><span class="crumbs-box-f">&gt;</span><span class="crumbs-box-this">找回密码</span></div>
<ul class="nav-step nav-step-3">
    <li class="step-1">1. 填写找回帐号</li>
    <li class="step-2">2. 密码找回</li>
    <li class="step-3">3. 完成</li>
</ul>
                    <script type="text/javascript">
                        $('.nav-step-3 li:eq(0)').addClass('step-1-on');
                    </script>
                    <div class="main-con">
                        <div class="form-pw-question-wrap">
                        <!--form-->
                        <!-- js-validateMe  {{ csrf_field() }} -->
                        <form class="form-pw-question " action="{{url('/home/default/dodefault')}}" method="post">
                               
                                <p class="account">
                                <label for="account"><span class="red">*</span>通行证：</label>
                                <input type="text" class="input-txt input-account" placeholder="手机/邮箱" id="name" value="{{ old('name') }}" name="name" data-maillist='["qq.com","sina.com","163.com","126.com","vip.sina.com","sina.cn","hotmail.com","gmail.com","sohu.com","139.com"]'/>
                                <span  id="span1"  style="font-size:12px;" class="errContainer"></span>
                            </p>
                            <p class="safe-code">
                                <label for="safe-code"><span class="red">*</span>验证码：</label>
                                <input type="text" class="input-txt input-safe-code" id="code" name="email_code" placeholder="验证码"/>
                                 <img id="img" src="{{url('/code')}}" alt="验证码" onclick="this.src='{{url('/code')}}?'+Math.random()">
                                <!-- <span class="box-safe-code js-validcode-container">
                                    <img src="" data-src="/password/captcha" alt="验证码" class="js-validcode" /> -->
                                    
                                    <!-- <span class="txt"> --><!--看不清图片？--><!-- <a href="javascript:;" class="js-validcode-change"></a></span>
                                </span> -->
                                <span id="span2" style="font-size:12px;" class="errContainer"></span> 
                                 <span class="mark"  style="color:red; font-size:12px;">
                                   @if(session('error'))
                                <span>{{ session('error') }}</span>
                                @else 
                                <span></span>
                                @endif
                                </span>        
                            </p>

                            <p class="box-btn"><button id="but" class="btn btn-submit" type="submit"><span>下一步</span></button></p>
                            <!-- <p class="box-btn"><span></span><input type="submit" class="btn btn-submit" value="下一步" /></span></p> -->
                            <!-- <input type="hidden" name="_random_license" value="acf8cc3166d27e2cdb532a018795b985b33fbc35"/> -->
                              {{ csrf_field() }}
                        </form>
                        <script>
                        var time = false;
                             $('#name').blur(function(){
                                 var name = $('#name').val();
                                   
                               $.post("{{url('/home/default/email')}}",{'name':name,'_token':"{{ csrf_token()}}"},function(msg){
                                
                                    if(msg==1){
                                              $('#span1').html("<font color='green';>用户已存在</font>"); 
                                                   time = true; 
                                    }else{
                                             
                                             
                                               $('#span1').html("<font color='red';>用户不存在</font>");
                                          
                                    }

                             });
                              
                             });
                            $('#but').click(function(){
                                return time;
                            
                             // return false;
                            });
                                
                        </script>
                        <!--/form-->
                        </div>
                        <div class="operate-intro">
                            <div class="con">
                                <p class="intro-tip">请正确填写您要找回的通行证帐号</p>
                                <p class="intro-tip">按操作提示依次完成找回</p>
                                <!-- <p class="intro-tip">如您所有的找回方式均不可用，请使用<a href="http://passport.17173.com/appeal" target="_blank" title="">帐号申诉</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/main-->
            </div>
            
        </div>
        <!--/div#content-->

        @endsection