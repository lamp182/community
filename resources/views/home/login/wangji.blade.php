   @extends('home.layout.zhuce')
@section('content')
  

<div id="content" class="clearfix content-comm content-zhmm">
			
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
		<!-- <li class="way-1 available" data-way="quest"><a href="javascript:;" title="通过密保问题找回" class="way-1-con"><span>通过密保问题找回</span></a></li> -->
		<li class="way-2 available" data-way="mobile"><a href="javascript:;" title="通过手机号找回" class="way-2-con"><span>通过手机号找回</span></a></li>
		<li class="way-3 available way-on bound" data-way="email"><a href="javascript:;" title="通过邮箱找回" class="way-3-con"><span>通过邮箱找回</span></a></li>
		<!-- <li class="way-4 available" data-way="qq"><a href="javascript:;" title="通过QQ号找回" class="way-4-con"><span>通过QQ号找回</span></a></li> -->
	</ul>
	<div class="line"></div>
</div>

                <script type="text/javascript">
					// $('.box-nav-way > ul > li:eq(2)').addClass('way-on');
					// gInitNavWay(["email"]);
        		</script>
                <!--/nav-way-->
                <!--main-->
                <div class="main">
					
                	<!--box-attention
                    <div class="box-attention box-attention-1">
                    	<h2>注意事项：</h2>
                        <h3>点击邮件中的验证链接</h3>
                        <p class="hl-gray">点击邮件中的验证链接，即可完成邮箱验证，根据链接进行密码找回。</p>
                        <h3>如果没有收到任何邮件</h3>
                        <p class="hl-gray">若收件箱未查收到，请尝试进入垃圾箱查看。</p>
                        <p class="hl-gray">可能因为网络原因，您需要等待2至3分钟才能收到，请耐心等待。</p>
                    </div>
                    /box-attention-->
					<div class="operate-intro">
						<div class="con">
							<p class="intro-tip">点击邮件中的验证链接,即可完成邮箱验证。</p>
							<p class="intro-tip">如果没有收到任何邮件<br>请尝试进入垃圾箱查看。<br>可能因为网络原因，请您耐心等待2-3分钟。</p>
							<p class="intro-tip">如您所有的找回方式均不可用，请使用<a href="/appeal" target="_blank" title="帐号申诉">帐号申诉</a></p>
						</div>
					</div>
                	<!--form-->
                    <!-- js-validateMe -->
                    <form class="form-pw-email " method="post" action="{{url('/home/default/insert')}}" novalidate="novalidate">
                        {{ csrf_field() }}
                        <p class="account">
                        	<label for="account"><span class="red">*</span>邮箱：</label>
                            <input type="readonly" class="input-txt input-account" id="name" name="email" value="{{ $name }}" readonly="readonly"  data-cipher="d0cc2275">
							<span id="span2" class="errContainer"></span>
                        </p>
                       <!--  <p class="safe-code">
                        	<label for="safe-code"><span class="red">*</span>验证码：</label> -->
                            <!-- <input type="text" class="input-txt input-safe-code placeholder" id="safe-code" name="validcode"> -->
                            <!-- <input type="text" class="input-txt input-safe-code" id="code" name="wj_code" placeholder="验证码"/>
                                 <img id="img" src="{{url('/code')}}" alt="验证码" onclick="this.src='{{url('/code')}}?'+Math.random()">
                            <span class="box-safe-code js-validcode-container" style="display: inline;">
                            <span class="mark"  style="color:red; font-size:12px;">
                                @if(session('error'))
                                <span>{{ session('error') }}</span>
                                @else 
                                <span></span>
                                @endif
                                </span>   -->
                            	<!-- <img src="/password/captcha?v=59673230b9eaa" data-src="/password/captcha" alt="验证码" class="js-validcode" width="100" height="40">
                                <span class="txt"><a href="javascript:;" class="js-validcode-change" title="刷新验证码"></a></span> -->
                                <!--看不清图片？-->
                          <!--   </span>
                            <span class="errContainer"></span>
                        </p>  -->
                        <p class="box-btn"><button class="btn btn-submit" id="but" type="submit"><span>立即找回</span></button></p>
                    </form>

                    <script>
                   $('#name').blur(function(){
                                time = false;
                                 var name = $('#name').val();
                                   
                               $.post("{{url('/home/default/insert1')}}",{'name':name,'_token':"{{ csrf_token()}}"},function(msg){
                                // alert(msg);
                                    if(msg==3){
                                            $('#span2').html("<font color='green';>用户正确</font>");
                                            time = true;     
                                    }else{
                                             $('#span2').html("<font color='red';>用户名错误</font>");   
                                    }
                             });
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







