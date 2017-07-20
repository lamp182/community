<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta name="renderer" content="webkit" />
    <meta name="generator" content="17173" />
    <meta name="author" content="lamp182" />
    <meta name="copyright" content="2001-2017 17173. All rights reserved." />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <meta http-equiv="MSThemeCompatible" content="Yes" />
    <meta name="baidu-site-verification" content="f5874a3f8e49646e5917517f21be2764"/>
    <link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" /><link rel="stylesheet" type="text/css" href="/home/css/style_6_forum_forumdisplay.css" /><script>var STYLEID = '6', STATICURL = 'static/', IMGDIR = 'static/image/common', VERHASH = 'Z88', charset = 'utf-8', discuz_uid = '0', cookiepre = 'bbsPro_2132_', cookiedomain = '', cookiepath = '/', showusercard = '1', attackevasive = '0', disallowfloat = 'newthread', creditnotice = '1|经验|,2|小伙伴|,3|崇高石|,4|水晶|,5|板砖|,6|零食|,7|悬赏币|,8|VR币|', defaultstyle = '', REPORTURL = 'aHR0cDovL2Jicy4xNzE3My5jb20vZm9ydW0tODcwNi0xLmh0bWw=', SITEURL = 'http://bbs.17173.com/', JSPATH = 'static/js/', CSSPATH = 'data/cache/style_', DYNAMICURL = '';</script>
    <script src="/home/js/common.js" type="text/javascript"></script>
    <!--globalHeadBegin-->


    <link rel="dns-prefetch" href="//ue.17173cdn.com/" />
    <link rel="dns-prefetch" href="//ue1.17173cdn.com/" />
    <link rel="dns-prefetch" href="//ue2.17173cdn.com/" />
    <link rel="dns-prefetch" href="//ue3.17173cdn.com/" />
    <link type="image/x-icon" rel="icon" href="//ue.17173cdn.com/images/lib/v1/favicon-hd.ico" />
    <link type="image/x-icon" rel="shortcut icon" href="//ue.17173cdn.com/images/lib/v1/favicon.ico" />



    <meta name="application-name" content="17173有料社区" />
    <meta name="msapplication-tooltip" content="17173有料社区" />


    <link rel="archives" title="17173有料社区" href="http://bbs.17173.com/archiver/" />
    <link rel="stylesheet" id="/home/css_widthauto" type="text/css" href='/home/css/style_6_widthauto.css' />
    <script>HTMLNODE.className += ' widthauto'</script>

<!--     <script src="/home/js/forum.js" type="text/javascript"></script> -->
    <link rel="stylesheet" type="text/css" href="/home/css/forum.css" />
    <script src="/home/js/jquery-1.8.3-min.js" type="text/javascript"></script>
    <script src="/home/js/libs.js" type="text/javascript"></script>
    <script src="/home/js/passport.js" type="text/javascript"></script>
    <script>
        var J = jQuery.noConflict();
        if(self != top){
            J('<style type="text/css">.bbs-global-bar, .boardnav #bnav, #hd, #pt1, .sub-screen-hot, .mn-main .bml, .mn-main .bm.bmw.fl, #ft, .a_f{ display:none;}.wrap-top, .wrap-bottom, .wrap{background:none;}</style>').appendTo('head');
        }
    </script>




</head>

<body id="nv_forum" class="pg_forumdisplay" onkeydown="if(event.keyCode==27) return false;">

<script type="text/javascript" src="/home/js/seed.js"></script>


<!--[if lte IE 6]>
<script src="/home/js/browser_update.min.js"></script>
<![endif]-->

<div id="append_parent"></div><div id="ajaxwaitid"></div>

<meta baidu-gxt-verify-token="1bbacc7dd885064ba6efec7a0a007614">
<div class="bbs-global-bar clearfix wp">
    <div class="bbs-bar-con">
        <div class="logo-box"> <a href="http://www.17173.com" target="_blank" class="simple-logo-17173"></a><a href="http://bbs.17173.com" target="_self" class="simple-logo-bbs"></a>
        </div>
        <div class="bgb-quick-menu">
            <a target="_blank" href="http://news.17173.com">看新闻</a>-
            <a target="_blank" href="http://www.17173.com/f/index.shtml">找游戏</a>-
            <a target="_blank" href="http://hao.17173.com/">抢礼包</a>-
            <a target="_blank" href="http://download.17173.com/">下载</a>-
            <a href="http://bk.17173.com/">问答</a>-
            <a target="_blank" href="http://media.17173.com/">视频</a>
        </div>
    </div>
</div>

</div><div class="wrap">
    <div class="wrap-bottom">
        <div class="wrap-top">
            <div id="hd">
                <div class="wp">
                    <div class="hdc cl" id="hdc"><h2><a href="{{ url() }}">
                    <img src="/home/picture/youliao-logo.png" alt="17173有料社区"></a></h2>
                        <div class="h-ad y">                    </div>
                    </div>

                    <div id="nv">

                        <ul></ul>
                    </div>
                   
                    <div id="mu" class="cl">
                    </div>
                    <div class="sc-quick-bar cl">
                        <div class="sc-quick-bar-c">
                            <div class="sc-quick-bar-l"></div>
                            <div class="scqb-co01">
                                <div class="z search-box">
                                    <div id="scbar" class="scbar_narrow cl">
                                        <form id="scbar_form" method="post" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="{{ url('home/query') }}">
                                            <table cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="scbar_icon_td">&nbsp;</td>
                                                    <td class="scbar_txt_td">
                                                    	{{ csrf_field() }}
                                                    	<input type="text" name="query" id="scbar_txt" placeholder="请输入搜索内容" value="@if(!empty($query)){{ $query }}@endif" onfocus="if(this.value == '请输入搜索内容'){this.value = '';}" onblur="if(this.value == ''){this.value = '请输入搜索内容';}" autocomplete="off" x-webkit-speech speech />
                                                    </td>
                                                    <td class="scbar_btn_td">
                                                    	<button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn" value="true">
                                                    		<strong class="">搜索</strong>
                                                    	</button>
                                                    </td>
                                                    <td class="scbar_hot_td">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </form>

                                        <div id="scbar_hot">
                                            <strong class="xw1">热搜: </strong>


                                            <a href='search.php?mod=forum&srchtxt=%E6%95%B0%E6%8D%AE%E5%BA%93&formhash=2f70169e&searchsubmit=true&source=hotsearch' target="_blank" class="xi2" sc="1">数据库</a>



                                            <a href='search.php?mod=forum&srchtxt=%E6%94%BB%E7%95%A5&formhash=2f70169e&searchsubmit=true&source=hotsearch' target="_blank" class="xi2" sc="1">攻略</a>



                                            <a href='search.php?mod=forum&srchtxt=%E6%BF%80%E6%B4%BB%E7%A0%81&formhash=2f70169e&searchsubmit=true&source=hotsearch' target="_blank" class="xi2" sc="1">激活码</a>



                                            <a href='search.php?mod=forum&srchtxt=%E7%82%89%E7%9F%B3%E4%BC%A0%E8%AF%B4&formhash=2f70169e&searchsubmit=true&source=hotsearch' target="_blank" class="xi2" sc="1">炉石传说</a>



                                            <a href='search.php?mod=forum&srchtxt=%E7%BE%8E%E5%9B%BE&formhash=2f70169e&searchsubmit=true&source=hotsearch' target="_blank" class="xi2" sc="1">美图</a>



                                            <a href='search.php?mod=forum&srchtxt=%E5%89%91%E7%81%B5&formhash=2f70169e&searchsubmit=true&source=hotsearch' target="_blank" class="xi2" sc="1">剑灵</a>

                                        </div>


                                    </div>
                                    <ul id="scbar_type_menu" class="p_pop" style="display: none;"><li><a href="javascript:;" rel="curforum" fid="8706" >本版</a></li><li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li><li><a href="javascript:;" rel="user">用户</a></li></ul>
                                    <script type="text/javascript">
//                                         initSearchmenu('scbar', '');
                                    </script>
                                </div>
                            </div>
                            <div class="scqb-co02">
                            @if(session('user'))
                            	<div id="psptR" class="y login-box  login-box-success ">
                                    <div id="um" class="login-flag">
		                                <div class="avt z">
		                                	<a href="{{ url('home/user/'.session('user')['id']) }}" class="js-login-avatar">
		                                		<img src="/{{ trim(session('user')['detail']['faceico'], '/') }}">
		                                	</a>
		                                </div>
			                                <div class="z">
				                                <p>
				                                    <strong class="vwmy"><a href="{{ url('home/user/'.session('user')['id']) }}" target="_blank" title="访问我的空间">{{ session('user')['detail']['username'] }}</a></strong>
				                                    <span class="pipe">|</span>
				                                    <a href="">设置</a>
				                                    <span class="pipe">|</span>
													<a href="" id="myprompt" class="a showmenu" onmouseover="showMenu({'ctrlid':'myprompt'});">提醒</a>
													
				                                    <span class="pipe">|</span>
				                                    <a href="{{ url('home/login/quit') }}" id="logout">退出</a>
				                                </p>
				                                <p>
				                                    用户组: <a href="" id="g_upmine" >vip{{ session('user')['operate']['vip'] }}</a>
				                                    <span class="pipe" style="margin:0;">|</span>
				                                    <a href="" id="extcreditmenu" onmouseover="delayShow(this, showCreditmenu);" class="showmenu">积分: {{ session('user')['operate']['vip'] }}</span></a>
				                                                                                                            
				                                </p>
			                                </div>

                            		</div>
                            	</div>
                            @else
                                <div class="pp-login pp-login2" style="">
                                    <div class="pp-login-in">
                                        <div class="pp-login-c1">
                                            <a href="{{ url('home/login/login') }}" class="pp-login-bt1">
                                            	<i class="ico-user"></i>安全登录
                                            </a>
                                        </div>
                                        <div class="pp-login-c2">
                                            <div class="item-1">
                                                <a href="{{ url('home/default/default') }}" target="_blank" class="pp-login-bt2">
                                                	<i class="ico-forget"></i>忘记密码
                                                </a>
                                            </div>
                                            <div class="item-2">
                                                <a href="{{ url('home/zhuce/zhuce') }}" target="_blank" class="pp-login-bt2">
                                                	<i class="ico-quick"></i>快速注册
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							@endif
                                <div id="psptR" class="y login-box ">

                                </div>
                            </div>
                            <div class="sc-quick-bar-r"></div>
                        </div>

                    </div>
                </div>
            </div>



@section('contents')
           
@show
@section('content')
           
@show


<div class="wp a_f">
	<a href="{{ $adverts[2]['url'] }}"><img alt="{{ $adverts[2]['name'] }}" src="{{ $adverts[2]['picture'] }}"></a>
</div>
<div class="wp a_f">
	<iframe align=center marginWidth=0 marginHeight=0 src="http://bbs.17173.com/x/bbsbottom96060.htm" frameBorder=0 width=960 scrolling=no height=60></iframe>
</div>
<div id="ft" class="wp cl">
    <div class="footer-follow">
	
        <div class="footer">
			<div class="footer-in">
				<div class="global-footer global-footer-full">
					<p class="global-footer-link">
						<a href="http://about.17173.com/" target="_blank">关于17173</a>
						<span class="sep">|</span>
						<a href="http://about.17173.com/join-us.shtml" target="_blank">人才招聘</a>
						<span class="sep">|</span>
						<a href="http://about.17173.com/adv-service.shtml" target="_blank">广告服务</a>
						<span class="sep">|</span>
						<a href="http://about.17173.com/business-cooperate.shtml" target="_blank">商务洽谈</a>
						<span class="sep">|</span>
						<a href="http://about.17173.com/contact-us.shtml" target="_blank">联系方式</a>
						<span class="sep">|</span>
						<a href="http://help.17173.com/" target="_blank">客服中心</a>
						<span class="sep">|</span>
						<a href="http://about.17173.com/site-map.shtml" target="_blank">网站导航</a>
						<span class="sep">|</span><a href="/sitemap.html" target="_blank">论坛地图</a></p>
					<p class="global-footer-copyright">Copyright <font>&copy;</font> 2001-2017 17173. All rights reserved.</p>
					<p class="global-footer-certificate">
						<a href="http://www.miibeian.gov.cn/" target="_blank">京ICP证030367号</a>
						<span class="sep">|</span>
						<a href="http://www.17173.com/cert/wenhua.html" target="_blank">文网文[2008]059号</a>
						<span class="sep">|</span>
						<a href="http://www.17173.com/cert/chuban.html" target="_blank">互联网出版许可证</a>
					</p>
					<p class="global-footer-safety">
						<a href="http://www.hd315.gov.cn/beian/view.asp?bianhao=021202001070200001" target="_blank"></br>
							<img alt="经营性网站备案信息" src="/home/picture/cert-beian_1.gif" width="50" height="50" />
						</a>
						<a href="http://www.fuzhou.cyberpolice.cn/alert_basic.asp" target="_blank">
							<img alt="福州网络警察报警平台" src="/home/picture/cert-cyberpolice_1.gif" width="50" height="50" />
						</a>
					</p>
				</div>
			</div>
					</div>
<script type="text/javascript">
	var forums={
		f1216f2388f2417:['最终幻想14','http://ff14.17173.com'],
		f2392f8844f8846:['激战2','	http://gw2.17173.com'],
		f8714f1534f1535f1537f2455:['魔兽世界','http://wow.17173.com'],
		f8719f2251f2395f2568:['龙之谷','http://dn.17173.com'],
		f8721f2549f2618f2653f2857f2799:['御龙在天','http://yl.17173.com'],
		f8726f2427f2676f2533f2534:['洛奇英雄传','	http://mh.17173.com'],
		f8730f2601f2684f2695f9438:['斗战神','http://dzs.17173.com'],
		f8733f1570f1571f2639f2699:['天堂Ⅱ','http://lineage2.17173.com'],
		f8734f1815f1816:['真三国无双OL','http://wsol.17173.com/'],
		f8735f1523f2352f2353:['大航海时代','	http://dol.17173.com'],
		f8873f8862f8997:['地城之光','http://dsol.17173.com'],
		f8912:['打酱游','http://djy.cy.com'],
		f8711f2468f2818f2846f8792f2545f2719f9665:['剑灵','	http://bns.17173.com'],
		f8838f8840f8883f8858:['天涯明月刀','	http://wuxia.17173.com'],
		f8724f2247f2379f2694:['九阴真经','http://9yin.17173.com'],
		f8732f2075f2076f2077f2078f2079:['剑网3','	http://jx3.17173.com'],
		f8921f8922:['黑金','http://hj.17173.com'],
		f358f2129f2335f2472:['征途2','http://zt2.17173.com'],
		f1891:['QQ飞车','http://speed.17173.com'],
		f1956f2102:['QQ炫舞','http://x5.17173.com'],
		f8718f2179f2501f9019f8876f2499:['笑傲江湖','http://xajh.17173.com'],
		f8725f2707f2825:['逆战','http://nz.17173.com'],
		f9414f9415:['炉石传说','http://hs.17173.com'],
		f8720f1739f2341f2598f1743f1742:['跑跑卡丁车','	http://popkart.17173.com'],
		f8933f8934f8935:['圣王','http://shengwang.17173.com'],
		f8708f1546f1547f1548f1549f1551f2874:['梦幻西游','http://xyq.17173.com'],
		f8709f1774f1777f2770f8895:['天龙八部','http://tl.17173.com'],
		f890:['大话西游3','http://xy3.17173.com'],
		f8729f2391f2749f2771:['上古世纪','http://age.17173.com'],
		f8727f2862:['龙剑','http://ds.17173.com'],
		f1403f2852f8820f8839:['斗破苍穹','http://dpol.17173.com'],
		f8723f2451f2746f2548f2592:['坦克世界','http://wot.17173.com'],
		f8707f2271f2609f2510f2518f2752f2509:['英雄联盟','http://lol.17173.com'],
		f8713f2597f2864f1770:['DOTA2&DOTA','http://dota2.17173.com'],
		f2766:['英雄三国综合版','http://yxsg.17173.com'],
		f8706f1795f1797f8877:['地下城与勇士','http://dnf.17173.com'],
		f8924f8925:['魂之猎手','http://mf.17173.com'],
		f8795f8796f8798f8799f8800f8801f9404:['疾风之刃','http://jf.17173.com'],
		f1341f2648:['超能战联','http://cyphers.17173.com'],
		f8790:['颓废之心交流区','http://rh.17173.com'],
		f2210:['Tera综合讨论区','	http://tera.17173.com'],
		f2643:['天下3综合讨论区','http://tx3.17173.com'],
		f2646:['天下3演武堂','http://tx3.17173.com'],
                f9771f9773f9782f9780f9781f9779:['幻想神域','http://hxsy.17173.com/'],
                f9748f9881f9879f9880f9750:['风暴英雄','http://fbyx.17173.com/'],
                f10056:['灵山奇缘', 'http://news.17173.com/z/lsqy']
	}
	if(typeof forumId != 'undefined'){
		for(var pp in forums){
			var id = 'f'+forumId;
			if(pp.indexOf(id)>-1){
				jQuery('<em>›</em><a target="_blank" href="' + forums[pp][1] + '">' + forums[pp][0] + '专区</a>').appendTo('#pt1 .z');
			}
		}
	}
</script>
</div>



    <div id="flk" class="y" style="display:none;">
        <p>
                                                                                                                        <strong><a href="http://bbs.17173.com/" target="_blank">17173.com</a></strong>
                                    &nbsp;&nbsp;<span id="tcss"></span><script type="text/javascript" src="/home/js/ping_1.js" charset="utf-8"></script>
                                    <script type="text/javascript" reload="1"></script><script type='text/javascript'>
      var _vds = _vds || [];
      window._vds = _vds;
      (function(){
        _vds.push(['setAccountId', 'ac495435db215df6']);
        (function() {
          var vds = document.createElement('script');
          vds.type='text/javascript';
          vds.async = true;
          vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'dn-growing.qbox.me/vds.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(vds, s);
        })();
      })();
  </script>                    </p>
        <p class="xs0">
            GMT+8, 2017-7-13 15:50            <span id="debuginfo">
</span>
        </p>
    </div>

        </div>


</div>
<!--/.wrap-top-->
</div>
<!--/.wrap-bottom-->
</div>
<!--/.wrap-->


<script src="/home/js/home_1.js" type="text/javascript"></script>

<div class="focus plugin" id="m_notice" style="z-index: 10001; top: 50%; margin-top: -150px; left: 50%; margin-left: -200px; bottom: inherit; box-shadow: rgba(0, 0, 0, 0.8) 0px 0px 5px; border-radius: 5px; width: 400px; display:none;">
    <div class="bm" style="border: 5px solid #dedede;  margin-bottom:0;">
        <div class="cl" style="border-color: #CDCDCD;color: #444;/* background: #F2F2F2; */line-height:28px;padding:0 10px;">
            <a href="javascript:;" onclick="$('ver_mask').style.display='none';$('m_notice').style.display='none';zsetCookie('17173bbs_m_notice', '1', 9999999);" class="y" title="关闭">关闭</a>

        </div>
        <div class="bm_c" style="padding: 0 30px 10px;">
            <dl class="xld cl bbda">
                <dd style="text-align: center;font-size: 24px;margin-bottom: 10px;margin-top: -10px;">公告</dd>
                <dd style="font-size: 18px;text-indent: 2em;padding-bottom:15px;line-height: 2;">17173论坛手机优化版正式上线，欢迎使用手机浏览器访问论坛并给我们提建议~</dd>
            </dl>
            <p class="ptn cl"><a href="http://bbs.17173.com/thread-9988229-1-1.html" onclick="$('ver_mask').style.display='none';$('m_notice').style.display='none';zsetCookie('17173bbs_m_notice', '1', 9999999);" class="xi2 y" target="_blank">查看详情 »</a></p>
        </div>
    </div>
</div>
<div id="ver_mask" style="z-index:10000; background: #000; opacity: .5; filter: alpha(opacity=50); width: 100%; height: 100%; top:0; left:0; position:fixed; display:none;"></div>
<script type="text/javascript">
    if (zgetCookie('17173bbs_m_notice') != 1) {
        jQuery('#m_notice,#ver_mask').show();
    }
    var _showApptip = false;
</script>

<script type="text/javascript">advConfigs.loadConfigFile('//s.17173cdn.com/global/global.js');</script>
<script type="text/javascript" src="/home/js/apptip_1.js"></script>





<script type="text/javascript" src="/home/js/shouyoushanwan_1.js"></script>


<!-- START 17173 Site Census -->
<script type="text/javascript" src="/home/js/ping_1.js"></script>
<!-- END 17173 Site Census -->

<script type="text/javascript" src="/home/js/lp.min_1.js"></script>

<script type="text/javascript">
	advConfigs.loadConfigFile('http://s.17173cdn.com/qiyu/index.js');
</script>
<script type="text/javascript">
	advConfigs.loadConfigFile('http://s.17173cdn.com/bbs/final.js');
</script>
<script type="text/javascript" src="/home/js/setlink.min_1.js"></script>
</body>

</html>