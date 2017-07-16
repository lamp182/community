   @extends('home.layout.index')
@section('content')

<div id="content" class="clearfix content-comm content-mmgl">
        	<div class="con-in pw-management pw-find" id="reg-page">   
				<!--nav-step-->
				<div class="crumbs-box"><span class="crumbs-box-c">密码管理</span><span class="crumbs-box-f">&gt;</span><span class="crumbs-box-this">找回密码</span></div>
<ul class="nav-step nav-step-3">
	<li class="step-1 step-1-on">1. 填写找回帐号</li>
	<li class="step-2 step-2-on">2. 密码找回</li>
	<li class="step-3 step-3-on">3. 完成</li>
</ul>
				<script type="text/javascript">
					$('.nav-step-3 li:eq(0)').addClass('step-1-on');
					$('.nav-step-3 li:eq(1)').addClass('step-2-on');
					$('.nav-step-3 li:eq(2)').addClass('step-3-on');
				</script>         	
                <!--nav-way-->
                <div class="box-nav-way js-nav-way">
	<ul>
	{{ csrf_field() }}
		<!-- <li class="way-1 available" data-way="quest"><a href="javascript:;" title="通过密保问题找回" class="way-1-con"><span>通过密保问题找回</span></a></li> -->
		<li class="way-2 available" data-way="mobile"><a href="javascript:;" title="通过手机号找回" class="way-2-con"><span>通过手机号找回</span></a></li>
		<li class="way-3 available way-on bound" data-way="email"><a href="javascript:;" title="通过邮箱找回" class="way-3-con"><span>通过邮箱找回</span></a></li>
		<!-- <li class="way-4 available" data-way="qq"><a href="javascript:;" title="通过QQ号找回" class="way-4-con"><span>通过QQ号找回</span></a></li> -->
	</ul>
	<div class="line"></div>
</div>
<script type="text/javascript">
// 	(function(){
// 		var elNavWay= $('.js-nav-way');
// 		elNavWay.on('click', 'li', function(e){
// 			e.preventDefault();
// 			if($(this).hasClass('bound')){
// 				window.location.href= '/password/find?by='+ $(this).data('way');
// 			}else{
// 				art.alert('未绑定相关信息，该找回方式不可用。');
// 			}
// 		});
// 		window.gInitNavWay= function(methods){
// 			for(var i in methods){
// 				elNavWay.find('li[data-way="'+ methods[i]+ '"]').addClass('bound'); 
// 			}
// 		}
// 	})();
// </script>
               <script type="text/javascript">
// 					$('.box-nav-way > ul > li:eq(2)').addClass('way-on');
					// gInitNavWay(["email"]);
        		</script>
                <!--/nav-way-->
                <!--main-->
                <div class="main">
                	<!--box-attention-->
                    <div class="box-attention box-attention-1">
                    	<h2>注意事项：</h2>
                        <h3>点击邮件中的验证链接</h3>
                        <p class="hl-gray">点击邮件中的验证链接，即可完成邮箱验证，根据链接进行密码找回。</p>
                        <h3>如果没有收到任何邮件</h3>
                        <p class="hl-gray">若收件箱未查收到，请尝试进入垃圾箱查看。</p>
                        <p class="hl-gray">可能因为网络原因，您需要等待2至3分钟才能收到，请耐心等待。</p>
                    </div>
                    <!--/box-attention-->
                	<!--box-result-->
                    <p class="result result-right-small">
                    	<!-- <span class="result-right">验证邮件已发出，请48小时内登录邮箱验证。</span> -->
                        <span>登录邮箱 <span class="focus">{{$em}}</span> 并按邮件指示操作即可</span>
                        <button class="btn btn-submit" onclick="location.href='http://mail.163.com';"><span>马上登录邮箱验证</span></button>
                    </p>
                    <!--/box-result-->
                </div>
                <!--/main-->
            </div>
            
        </div>

            @endsection