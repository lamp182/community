@extends('home.layout.personal')
@section('contents')
<!-- <ul class="tb cl" style="padding-left: 75px;"> 
        <li class="a"><a href="{{url('home/personal/personal')}}">个人资料</a></li> 
        <li><a href="{{ url('home/set/zhuti') }}">主题</a></li> 
        <li><a href="{{ url('home/set/huifu') }}">回复</a></li> 
       </ul> -->
       <div style="position:relative;">
       <ul class="tb cl" style="padding-left: 75px;"> 
        <li><a href="{{ url('/home/personal/personal') }}">个人资料</a></li> 
        <li> <a href="{{ url('home/set/zhuti') }}">主题</a></li> 
        <li class="a"><a href="{{ url('home/set/huifu') }}">回复</a></li> 
       </ul> 
      </div>
<style type="text/css">
#ct{padding-right:230px; padding-left:150px;}
#ct .mn{ width: 99%;}
#ct .appl{ margin-left: -150px;}
</style>
<div id="ct" class="ct1 wp cl bm nbwt" style="padding-left:0;">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<div class="bm_c">
<p class="tbmu">
<!-- <a href="{{ url('home/set/zhuti') }}">主题</a> -->
<!-- <span class="pipe">|</span> -->
<a href="{{ url('home/set/huifu') }}" class="a">回复</a>
</p>
<div class="tl">
<form method="post" autocomplete="off" name="delform" id="delform" action="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=dateline" onsubmit="showDialog('确定要删除选中的主题吗？', 'confirm', '', '$(\'delform\').submit();'); return false;">
<input type="hidden" name="formhash" value="98c1a666">
<input type="hidden" name="delthread" value="true">

<table cellspacing="0" cellpadding="0">
<tbody><tr class="th" style="">
<th style="width: 150px;">帖子</th>
<th class="frm">版块</th>
<th class="num">回复/查看</th>
<th class="by"><cite>最后发帖</cite></th>
</tr>
@if($replies == null)
<tr>
	<td class="icn">&nbsp;</td>
	<td colspan="3"><p class="emp">还没有相关的帖子</p></td>
</tr>
@else
	@foreach($replies as $reply)
		<tr>
			
			<td colspan=""><p class="emp"><a href="{{ asset('home/post/'.$reply['post']['id']) }}">{{ $reply['post']['title'] }}</a></p></td>
			<td colspan=""><p id="rcontent" style="width: 100px; overfollow: hidden;" class="emp"><a href="{{ asset('home/section/?id='.$reply['section']['id']) }}">{{ $reply['section']['name'] }}</a></p></td>
			<td colspan=""><p class="emp"><a href="{{ asset('home/post/'.$reply['post']['id'].'#reply_'.$reply['id']) }}">{!! str_replace('<img', '<img style="width: 100px;height:100px;"', $reply['content']) !!}</a></p></td>
			<td colspan=""><p class="emp">{{ date('Y-m-d H:i:s', $reply['last']['ctime']) }}</p></td>
		</tr>
	@endforeach
@endif
</tbody></table>

</form>

</div>
		

<script type="text/javascript">
// function fuidgoto(fuid) {
// window.location.href = 'home.php?mod=space&do=thread&view=we&fuid='+fuid;
// }
// function viewforumthread(fid) {
// window.location.href = 'home.php?mod=space&uid=135971237&do=thread&view=me&type=reply&order=dateline&from=space&fid='+fid;
// }
</script>

<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--></div>
</div>
</div>
</div>

@endsection