   @extends('home.layout.index')
@section('content')

<div id="content" class="clearfix pw-find-mobile content-comm content-mmgl">
        	<div class="con-in pw-management pw-find" id="reg-page">
				<!--nav-step-->
				<div class="crumbs-box"><span class="crumbs-box-c">密码管理</span><span class="crumbs-box-f">&gt;</span><span class="crumbs-box-this">找回密码</span></div>
<ul class="nav-step nav-step-3">
	<li class="step-1 step-1-on">1. 填写找回帐号</li>
	<li class="step-2 step-2-on">2. 密码找回</li>
	<li class="step-3">3. 完成</li>
</ul>
				<script type="text/javascript">
					$('.nav-step-3 li:eq(0)').addClass('step-1-on');
					$('.nav-step-3 li:eq(1)').addClass('step-2-on');
				</script>
	                <!--nav-way-->
                <div class="box-nav-way js-nav-way">
	<ul>
		<li class="way-1 available" data-way="quest"><a href="javascript:;" title="通过密保问题找回" class="way-1-con"><span>通过密保问题找回</span></a></li>
		<li class="way-2 available way-on bound" data-way="mobile"><a href="javascript:;" title="通过手机号找回" class="way-2-con"><span>通过手机号找回</span></a></li>
		<li class="way-3 available" data-way="email"><a href="javascript:;" title="通过邮箱找回" class="way-3-con"><span>通过邮箱找回</span></a></li>
		<li class="way-4 available" data-way="qq"><a href="javascript:;" title="通过QQ号找回" class="way-4-con"><span>通过QQ号找回</span></a></li>
	</ul>
	<div class="line"></div>
</div>
<script type="text/javascript">
	// (function(){
	// 	var elNavWay= $('.js-nav-way');
	// 	elNavWay.on('click', 'li', function(e){
	// 		e.preventDefault();
	// 		if($(this).hasClass('bound')){
	// 			window.location.href= '/password/find?by='+ $(this).data('way');
	// 		}else{
	// 			art.alert('未绑定相关信息，该找回方式不可用。');
	// 		}
	// 	});
	// 	window.gInitNavWay= function(methods){
	// 		for(var i in methods){
	// 			elNavWay.find('li[data-way="'+ methods[i]+ '"]').addClass('bound'); 
	// 		}
	// 	}
	// })();

</script>
                <script type="text/javascript">
					// $('.box-nav-way > ul > li:eq(1)').addClass('way-on');
					// gInitNavWay(["mobile"]);
        		</script>
                <!--/nav-way-->
                <!--main-->
                <div class="main">
                	<!--box-attention-->
                    <div class="box-attention box-attention-2">
                        <p>编写短信<span class="bdfh">“</span>53#XGMM#通行证<span class="bdfh">”</span>至 1069013317173<br>
即可重置密码。<br> 
如：您的通行证是yonghu@17173.com,<br> 
请编辑短信<span class="bdfh">“</span>53#XGMM#yonghu@17173.com<span class="bdfh">”</span><br>    
发送至"1069013317173"</p>
                    </div>
                    <!--/box-attention-->
                	<!--form-->
                	<!-- js-validateMe -->
                	<!--  -->
                    <form class="form-pw-mobile " method="post" action="{{ url('/home/default/phyan') }}" novalidate="novalidate">
                     {{ csrf_field() }}
                        <p class="qq">
                        	<label for="pw"><span class="red">*</span>绑定的手机号：</label>
                        	<!-- readonly="readonly" -->
                            <input type="text" class="input-txt input-pw" id="pw" name="phone" value="{{$name}}"  readonly="readonly" data-indicator="pwindicator" data-cipher="6c2705ab">
							<span class="errContainer"></span>
                        </p>
                        <p class="safe-code">
                        	<label for="safe-code"><span class="red">*</span>验证码：</label>
                            <input type="text" class="input-txt input-safe-code" id="code" name="phone_code"  maxlength="6">
                            <style>

							/* button:disabled{
								background: #eee !important;
								cursor: default;
							} */
							.js-getCode{
								font-size: 12px;
							}
							</style>
							<!-- data-url="/password/mobileCaptcha" -->
							<!-- data-input="input[name='mobile']" -->
							<!--   -->
							<button type='button' id="xiugai" class="btn btn-get-code js-btn-countdown">免费获取验证码</button>
							<!-- <span id="yanzhan" class="zg-code-btn">点击获取验证码</span>   -->

							<span class="errContainer"></span>
                        </p>
                        <p class="box-btn"><button class="btn btn-submit" id="zhaohui" type="submit"><span>立即找回</span></button></p>
							 <script>
							 		var time = false;
								$('#xiugai').click(function(){
						             var phone = $('#pw').val();
						                // alert(phone);
						              //发送ajax 注册手机号
						              	time = true;
						              	$.post("{{url('home/default/shouji')}}",{'_token':'{{csrf_token()}}',phone:phone},function(msg){
						                // alert(msg);
						                  if(msg.code == 2){
						                    alert(msg.msg);
						                    return;
						                  	}else{
						                    alert(msg.msg);
						                    return;
						                  }
						                },'json');
          							 
              					});

								$('#zhaohui').click(function(){

									
									   return time;
								});	
							</script>

                    </form>
                    <!--/form-->
                </div>
                <!--/main-->

            </div>
            
        </div>
        @endsection