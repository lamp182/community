@extends('home.layout.index')

@section('content')
<div id="wp" class="wp">
<script type="text/javascript">var fid = parseInt('8706'), tid = parseInt('10312367');</script>

<script src="/home/js/forum_viewthread.js" type="text/javascript"></script>
<script type="text/javascript">zoomstatus = parseInt(1);var imagemaxwidth = '760';var aimgcount = new Array();</script>

<style id="diy_style" type="text/css"></style>

<div id="pt" style="background: url(/home/images/hd-bg01_1.jpg) no-repeat;" class="bm cl">
<div class="z">
<a href="{{ url('') }}" class="nvhm" title="首页">17173有料社区</a> <em>&rsaquo;</em> 
<a href="{{ url('home/section?id='.$section -> id) }}">{{ $section -> name }}</a> <em>&rsaquo;</em> 
<a href="{{ url('home/post/'.$post -> id) }}">{{ $post -> title }}</a>
</div>
    
</div>

<script type="text/javascript">
var forumId = "8706";
if(jQuery('#pt1').length){
jQuery('.sub-screen-hot, .hd-r span').remove();
jQuery('#pt1').next('iframe').remove();
jQuery('#pt').css('position','relative');
jQuery('.chart-bar').css({position:'absolute', top:'-32px', right:'10px'});
}
if(forumId == '2468'){
var host = 'http://cha.17173.com/bns';
var jljs = document.createElement('script');
jljs.setAttribute('type', 'text/javascript');
jljs.setAttribute('src', 'http://cha.17173.com/bns/js/tips.js');
document.body.appendChild(jljs);
}
</script>
</div>

<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<div id="ct" class="wp cl">

<div id="pgt" class="pgs mbm cl  AdBbsTujianLink">
<div class="pgt"><div class="pg">
	@if(!empty($uid))
		{!! $replies -> appends(['uid' => $uid]) -> render() !!}
	@else
		{!! $replies -> render() !!}
	@endif
	<style>
		.pgt>.pg li {
			float: left;
		}
	</style>
</div></div>
<span class="y pgb"><a href="{{ url('home/section?id='.$section['id']) }}">返回列表</a></span>
	<a href="javascript:;" class="newpost"  onclick="newpost()" title="发新帖"><img src="/home/picture/pn_post.png" alt="发新帖" /></a>
                                 <span id="sign_placeholder" style="display:none;"></span>
	<script type="text/javascript">
		function newpost() {
			location.href = '{{ url('home/post/create?id='.$section['id']) }}';
		}
	 </script>
</div>



<div id="postlist" class="pl bm">
<table cellspacing="0" cellpadding="0">
<tr>
<td class="pls ptn pbn">
<div class="hm ptn">
<span class="xg1">查看:</span> <span class="xi1">36584</span><span class="pipe">|</span><span class="xg1">回复:</span> <span class="xi1">{{ $post['count'] }}</span>
</div>
</td>
<td class="plc ptm pbn vwthd">
<div class="y">
<a href="" title="打印" target="_blank"><img src="/home/picture/print.png" alt="打印" class="vm" /></a>
<a href="" title="上一主题"><img src="/home/picture/thread-prev.png" alt="上一主题" class="vm" /></a>
<a href="" title="下一主题"><img src="/home/picture/thread-next.png" alt="下一主题" class="vm" /></a>
</div>
<h1 class="ts">
<a href="http://bbs.17173.com/forum.php?mod=forumdisplay&amp;fid=8706&amp;filter=typeid&amp;typeid=1058">[分享]</a>
<span id="thread_subject">{{ $post['title'] }}</span>
</h1>
<span class="xg1">
&nbsp;<img src="/home/picture/hot_3_1.gif" alt="" title="热度: 508" />
<a href="http://bbs.17173.com/thread-10312367-1-1.html" onclick="return copyThreadUrl(this, '17173有料社区')" >[复制链接]</a>
</span>
</td>
</tr>
</table>


<table cellspacing="0" cellpadding="0" class="ad">
<tr>
<td class="pls">
</td>
<td class="plc">
</td>
</tr>
</table>

@foreach($replies as $reply)
<div id="post_187510523" >
<table id="pid187510523" class="plhin" summary="pid187510523" cellspacing="0" cellpadding="0">
<tr>
<td class="pls" rowspan="2">
<div id="favatar187510523" class="pls favatar">
 <div class="pi">
<div class="authi">
	<a href="{{ url('home/user/'.$reply['user']['id']) }}" target="_blank" class="xw1" style="color: #FF0000">
		{{ $reply['user']['userdetail']['username'] }}
	</a>

<a href="" target="_blank">
<img src="/home/picture/{1aeced34-8254-418f-8374-13aad7b8f8e8}_1.png" class="vm" alt="个人认证" title="个人认证" /></a>


</div>
</div>

<div>
<div class="avatar" onmouseover="showauthor(this, 'userinfo187510523')">
	<a href="{{ url('home/user/'.$reply['user']['id']) }}" class="avtm" target="_blank">
		<img src="{{ $reply['user']['userdetail']['faceico'] }}" />
	</a>
</div>

</div>

<div class="tns xg2">
	<table cellspacing="0" cellpadding="0">
		<th>
			<p>
				<a href="" class="xi2">{{ $reply['user']['replies'] }}</a>
			</p>主题
		</th>
		<th>
			<p>
				<a href="" class="xi2"><span title="14113">{{ $reply['user']['replies'] }}</span></a>
			</p>帖子
		</th>
		<td>
			<p>
				<a href="" class="xi2"><span title="21750">{{ $reply['user']['operate']['score'] }}</span></a>
			</p>积分
		</td>
	</table>
</div>

<ul class="xl xl2 o cl">
<li class="pm2">
      <a href="javascript:;" onclick="lsSubmit()" title="发消息" class="xi2">发消息</a> 
</li>
</ul>
</div>
</td>
	<td class="plc">
		<div class="pi">
			<strong>
			<a href="http://bbs.17173.com/thread-10312367-1-1.html" id="postnum187510523" onclick="setCopy(this.href, '帖子地址复制成功');return false;">
				@if($reply['count'] == 1)
					楼主
				@elseif($reply['count'] == 2)
					沙发
				@elseif($reply['count'] == 3)
					板凳
				@else
					{{ $reply['count'] }}楼
				@endif
			</a>
			</strong>
			<div class="pti">
				<div class="pdbt">
				</div>
				<div class="authi">
					<img class="authicn vm" id="authicon187510523" src="/home/picture/online_member.gif" />
					<em id="authorposton187510523">发表于 {{ date('Y-m-d H:i:s', $reply['ctime']) }}</em>
					<span class="pipe">|</span>
					<a href="{{ url('home/post/'.$post['id'].'?uid='.$reply['user']['id']) }}" rel="nofollow">只看该作者</a>
				</div>
			</div>
		</div>

			<style type="text/css">.pcb{margin-right:0}</style>
			<div class="pcb">
				<div class="t_fsz">
					<table cellspacing="0" cellpadding="0">
						<tr>
							<td class="t_f" id="postmessage_187510523">
								{!! $reply['content'] !!}
							</td>
						</tr>
					</table>
				</div>
			</div>
	</td>
</tr>
<tr>
	<td class="plc plm">
		<div id="p_btn" class="mtw mbm hm cl">

		<a href="javascript:;" id="k_favorite" onclick="lsSubmit()" onmouseover="this.title = $('favoritenumber').innerHTML + ' 人收藏'" title="收藏本帖">
		
		<i><img src="/home/picture/fav.gif" alt="收藏" />收藏<span id="favoritenumber" style="display:none">0</span></i></a>
		<a id="recommend_add" href=""  onclick="showWindow('login', this.href)" onmouseover="this.title = $('recommendv_add').innerHTML + ' 人支持'" title="顶一下"><i><img src="/home/picture/rec_add.gif" alt="支持" />支持<span id="recommendv_add" style="display:none">0</span></i></a>
		<a id="recommend_subtract" href=""  onclick="showWindow('login', this.href)" onmouseover="this.title = $('recommendv_subtract').innerHTML + ' 人反对'" title="踩一下"><i><img src="/home/picture/rec_subtract.gif" alt="反对" />反对<span id="recommendv_subtract" style="display:none">0</span></i></a>
		</div>
	</td>
</tr>
<tr>
<td class="pls"></td>
<td class="plc" style="overflow:visible;">
	<div class="po hin">
	<div class="pob cl">
	<em>
		
<!-- 	<button type="button" style="border: 0px; background: #eee" onclick="reply(this)" >回复</button> -->
	<div id="reply_{{ $reply['id'] }}" class="fwinmask" style="display: none; width: 640px; position: fixed; z-index: 201; left: 312px; top: 161px;" initialized="true">
		<div style="width: 100%; height: 400px; box-shadow: 0 0 0px 10px #999; background: #eee; border-radius: 1%;">
			<div style="width: 100%; height: 40px; background: red; border-radius: 1%;"></div>
			<div>
				<h3>回复：<a href="">{{ $reply['user']['userdetail']['username'] }}</a></h3>
				
			</div>
		</div>
	</div>
	<script type="text/javascript">
// 		function reply(param) {
// 			$(param).next().css('display', 'block');
// 		}
	</script>
	</em>
	
	<p>
		<a href="javascript:;" onclick="lsSubmit()">举报</a>
	</p>
	
	<ul id="mgc_post_187510523_menu" class="p_pop mgcmn" style="display: none;">
	</ul>
	
	</div>
</div>
</td>
</tr>
<tr class="ad" style="display:none;">
<td class="pls"></td>
<td class="plc">
</td>
</tr>

<tr>
   <td colspan="2" class="first-post-ad AdBbs2Banner1">
   </td>
</tr>

</table>

<!-- END 声望 --></div>
@endforeach

<!-- BEGIN 声望 -->
<link rel="stylesheet" type="text/css" href="/home/css/prestige_1.css" />
<script type="text/javascript">
var popRankTimer = null;
jQuery('.user_prestige img').each(function(){
var prank = jQuery(this).attr('data-rank');
var pvalue = jQuery(this).attr('data-prestige');
    jQuery(this).hover(function() {

    jQuery('#pop-user-prank').text(prank);
    jQuery('#pop-user-pvalue').text(pvalue);
        var pos = jQuery(this).position();
        jQuery("#pop-rank").css({
            left: pos.left,
            top: pos.top + 38
        }).show();
    }, function() {
        clearTimeout(popRankTimer);

        popRankTimer = setTimeout(function() {
    jQuery('#pop-user-prank').text('');
    jQuery('#pop-user-pvalue').text('');
            jQuery("#pop-rank").hide();
        }, 400);
    });	
})

jQuery("#pop-rank").hover(function() {
    clearTimeout(popRankTimer);
}, function() {
    jQuery("#pop-rank").hide();
    jQuery('#pop-user-prank').text('');
    jQuery('#pop-user-pvalue').text('');
});
</script>
<div id="postlistreply" class="pl"><div id="post_new" class="viewthread_table" style="display: none"></div></div>
</div>


<div class="pgbtn"><a href="{{ $replies->nextPageUrl() }}" hidefocus="true" class="bm_h">下一页 &raquo;</a></div>

<div class="pgs mtm mbm cl">
<div class="pg">
		@if(!empty($uid))
			{!! $replies -> appends(['uid' => $uid]) -> render() !!}
		@else
			{!! $replies -> render() !!}
		@endif
		<style>
			.pgs>.pg li {
				float: left;
			}
		</style>
	</div>
	<span class="pgb y"><a href="{{ url('home/section?id='.$section['id']) }}">返回列表</a></span>
	<a href="javascript:;" class="newpost"  onclick="newpost()" title="发新帖"><img src="/home/picture/pn_post.png" alt="发新帖" /></a>
	<span id="sign_placeholder" style="display:none;"></span>
	<script type="text/javascript">
		function newpost() {
			location.href = '{{ url('home/post/create?id='.$section['id']) }}';
		}
	 </script>
</div>

<!--[diy=diyfastposttop]--><div id="diyfastposttop" class="area"></div><!--[/diy]-->
<script type="text/javascript">
var postminchars = parseInt('6');
var postmaxchars = parseInt('100000');
var disablepostctrl = parseInt('0');
</script>

<div id="f_pst" class="pl bm bmw">
<form method="post" autocomplete="off" id="fastpostform" action="{{ url('home/reply') }}" onSubmit="return fastpostvalidate(this)">
<table cellspacing="0" cellpadding="0">
<tr>
<td class="pls">
</td>
<td class="plc">

<span id="fastpostreturn"></span>
	<!-- 加载编辑器的容器 -->
    <script id="container" name="content" style="width: 93%" type="text/plain"></script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/uediter/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/uediter/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>

<p class="ptm pnpost">
	<button type="submit" id="fastpostsubmit" class="pn pnc vm"><strong>发表回复</strong></button>
	{{ csrf_field() }}
	<label for="fastpostrefresh"><input id="fastpostrefresh" type="checkbox" class="pc" name='page[]' value='{{ $replies -> lastPage() }}' />回帖后跳转到最后一页</label>
	<input type="hidden" name="ctime" value="{{ time() }}" />
	<input type="hidden" name="uid" value="{{ session('user')['uid'] }}" />
	<input type="hidden" name="pid" value="{{ $post['id'] }}" />
</p>
</td>
</tr>
</table>
</form>
</div>

<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>


<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

<script type="text/javascript">
    var topListConfig = {
        forum: [ // 列表页数据，最多4条
            {
                gamename: '魔域', //游戏名
                title: '《魔域》夏日希冀成长包', //标题
                url: 'http://hao.17173.com/gift-info-38628.html', // 链接
                date: '2017-06-02' //时间
            },
            {
                gamename: '魔域',
                title: '《魔域》夏日冀望回馈包',
                url: 'http://hao.17173.com/gift-info-38629.html',
                date: '2017-06-02'
            }
        ],
        all: 1,  // 是否全站通发， 1：是， 0： 否
        include: [], //如果需要在指定版块发布，可将上面的all设为0，在此处配置需要展示的版块ID，用英文逗号分隔
        exclude: [] //如果需要在全站通发但是需要排除掉某些特定版块，可将all设置为1，在此处配置需要排除的版块ID， 用英文逗号分隔
    }
</script>

<script type="text/javascript">
var floorConfig = {
        thread: {// 帖子详情页
            position: 1, //插入位置，从1开始，1就是插入沙发位置
            gamename: '魔域', //游戏名
            url: 'http://moyu.17173.com/',//链接，此处是左边作者信息的游戏名和头像，和右边第一行游戏名的链接，不包括下面的按钮
            avatar: 'http://i2.17173cdn.com/z0og4j/YWxqaGBf/newgame/20140820/oBqUuXbiFzmcnpe.jpg', //左侧头像地址
            desc: '2017-05-10 08:00 众神之巅 不需激活码（大陆）', //右边游戏名下方文字
            buttons: [ //按钮, 最多可配置4个
                {
                    background: '#ff6d55', //按钮背景色
                    text: '夏日希冀成长包', //按钮主文字
                    smallText: '53456人已领取', //按钮小文字
                    url: 'http://hao.17173.com/gift-info-38628.html' //按钮链接
                },
                {
                    background: '#63c245',
                    text: '夏日冀望回馈包',
                    smallText: '25638人已领取',
                    url: 'http://hao.17173.com/gift-info-38629.html'
                }      
            ]
        },
        all: 0,  // 是否全站通发， 1：是， 0： 否
        include: [107], //如果需要在指定版块发布，可将上面的all设为0，在此处配置需要展示的版块ID，用英文逗号分隔
        exclude: [] //如果需要在全站通发但是需要排除掉某些特定版块，可将all设置为1，在此处配置需要排除的版块ID， 用英文逗号分隔
}
</script>

<script type="text/javascript">
    var gameDownloadConfig = {
        actId: '', //活动平台的活动ID，参与人数读取此活动数据, 如果不需要参与人次此处可留空
        text: '《魔域》雷霆公测礼包', //顶部按钮大字
        smallText: '&nbsp;&nbsp;&nbsp;&nbsp;53456 人已领取', //顶部按钮小字 ,如果配置了actId,  读取到参与数据后会替换掉这里的文字
        urls:[ //以下链接不需要请留空，留空则不显示
            'http://act.17173.com/os/2017/05/my0505/?BillID=264337&act=111111', //顶部按钮链接
            'http://download.17173.com/1058/10/45990/', //面包屑下载链接
            'http://hao.17173.com/sche-info-1058.html', //面包屑礼包链接
            'http://download.17173.com/1058/10/45990/', //回复右边下载按钮链接
            'http://hao.17173.com/sche-info-1058.html' //悬浮按钮链接
        ],
        all: 0, // 是否全站通发， 1：是， 0： 否
        include: [107], //如果需要在指定版块发布，可将上面的all设为0，在此处配置需要展示的版块ID，用英文逗号分隔
        exclude: [] //如果需要在全站通发但是需要排除掉某些特定版块，可将all设置为0，在此处配置需要排除的版块ID， 用英文逗号分隔
    }
</script>

<script src="/home/js/business_1.js" type="text/javascript"></script></div>
@endsection