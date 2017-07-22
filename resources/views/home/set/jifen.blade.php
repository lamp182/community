@extends('home.layout.personal')
@section('contents')
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">积分
</h1>
<!--don't close the div here--><ul class="tb cl">
<li class="a"><a href="{{url('home/set/jifen')}}">我的积分</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=credit&amp;op=log">积分记录</a></li> -->
<li><a href="{{url('home/set/guize')}}">积分规则</a></li>
</ul><ul class="creditl mtm bbda cl"><li class="xi1 cl"><em> 板砖: </em>0  &nbsp; </li>
<li><em> 经验: </em>16 </li>
<li><em> 小伙伴: </em>0 </li>
<li><em> 崇高石: </em>0 </li>
<li><em> 水晶: </em>0 </li>
<li><em> 零食: </em>0 </li>
<li><em> 悬赏币: </em>0 </li>
<li><em> VR币: </em>0 </li>
<li class="cl"><em>积分: </em>16 <span class="xg1">( <u>总积分</u>= <u>主题数</u>  X 2 +  <u>发帖数</u>  +  <u>精华帖数</u>  X 5 + <u>经验</u> )</span></li>
</ul>
<table summary="转账与兑换" cellspacing="0" cellpadding="0" class="dt mtm">
<caption>
<h2 class="mbm xs2">
<a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=credit&amp;op=log" class="xi2 xs1 xw0 y">查看更多»</a>积分记录
</h2>
</caption>
<tbody><tr>
<th width="150">操作</th>
<th width="80">积分变更</th>
<th>详情</th>
<th width="100">变更时间</th>
</tr>
<tr><td colspan="4"><p class="emp">目前没有积分交易记录</p></td></tr>
</tbody></table>

</div>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li><a href="{{url('home/set/tou')}}">修改头像</a></li>
<li><a href="{{url('home/set/set')}}">个人资料</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=verify">认证</a></li> -->
<li class="a"><a href="{{url('home/set/jifen')}}">积分</a></li>
<li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=usergroup">用户组</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=privacy">隐私筛选</a></li> -->

<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=password">密码安全</a></li> -->

</ul>
</div></div>
</div>
@endsection