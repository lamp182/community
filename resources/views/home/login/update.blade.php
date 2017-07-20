  @extends('home.layout.zhuce')
@section('content')
<style>
    .ul{
      list-style: none;
      margin:0;
      padding:0;
      margin-left: 140px;
    }
    
   .ul>li{
      list-style: none;
      margin:0;
      padding:0;
      background: #fff;
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
<div id="content" class="clearfix content-comm content-mmgl">
        	<div class="con-in pw-management" id="reg-page">            	
                <div class="box-pw-intro">
                    	<p>重设密码说明：</p>
                        <p>1、一旦您修改了通行证密码，请您以新密码登录17173。</p>
                        <p>2、温馨提示：为了您的帐号安全，密码最好不要设置成生日、电话号码、车牌和门牌号码。</p>
                    </div>
                <!--main-->
                <div class="main">
                	<!--form-->
                     <!-- js-validateMe -->                                                                             
                    <form class="form-pw-reset" data-showmsg="true" method="post"  action="{{url('/home/default/doupdate')}}" novalidate="novalidate">
                    {{ csrf_field() }}

                        <p class="account">
                        	<label for="account">帐号：</label>
                            <span class="account-txt">{{ session('res') }}</span>
                        </p>
<!--  -->
                      
                            <input type="hidden" name="id" value="{{ $re['id'] }}">
                           
                        <p class="pw">
                        	<label for="pw">新密码：</label>
                            <input type="password" autocomplete="off" class="input-txt input-pw" id="pw" name="password" maxlength="20" data-indicator="pwindicator">
                            <span class="errContainer" id="span1"></span>
                                     <ul  class="ul">
                                            <li class='li'>弱</li>
                                            <li class='li'>中</li>
                                            <li class='li'>强</li>
                                            <li class='li'>变态</li>
                                            <div style="float: clearboth"></div>
                                     </ul>
                            <br class="clear">
                            </p>
                            <!-- <span class="tip"> -->
                                <!-- <span>6~20个字符，区分大小写</span> -->
                                <!-- <span id="pwindicator">
                                    <span class="block block1"></span>
                                    <span class="block block2"></span>
                                    <span class="block block3"></span>
                                    <span class="words"></span>
                                </span>
                            </span> -->
                        
                        <p class="pw-re">
                        	<label for="pw-re">重复密码：</label>
                            <input type="password" autocomplete="off" class="input-txt input-pw-re" id="pw-re" name="repassword" maxlength="20">
                            <span class="errContainer"></span>
                            <span class="mark" style="color:red">
                               @if(session('error'))
                                     <span>{{ session('error') }}</span>
                                @else 
                                    <span></span>
                                 @endif
                            </span> 
                            <br class="clear">
                            <span class="tip"><span>填写的邮箱作为17173通行证</span></span>
                        </p>
                        <p class="box-btn"><button class="btn btn-submit" id="but" type="submit"><span>提交</span></button></p>
						<!-- <input type="hidden" name="_random_license" value="ea3f07ccb3f7150e70789fa57969695c8a8ab7ed"> -->
                    </form>
                    <script>
                                var  time = false;
                               //密码验证
                              $('#pw').blur(function(){
                                var arr = [];
                                param1 = $(this).val();
                                if(param1.length > '6' && param1 != ''){
                                      $('#span1').html("<font color='green'>恭喜!密码可用</font>");
                                       time=true; 
                                }else{
                                     $('#span1').html("<font color='red'>密码不可用或不可为空</font>");
                                      
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
                              $('#but').click(function(){
                               

                                return time;
                              });
                    </script>
                    <!--/form-->
                </div>
                <!--/main-->
            </div>
            
        </div>
        @endsection