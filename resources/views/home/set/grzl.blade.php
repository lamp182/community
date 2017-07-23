@extends('home.layout.personal')
@section('contents')

 <style type="text/css">
#ct{padding-right:230px; padding-left:150px;}
#ct .mn{ width: 99%;}
#ct .appl{ margin-left: -150px;}
</style>
<!-- <div id="wp" class="wp"><div id="pt" class="bm cl"> -->
<!-- <div class="z"> -->
<!-- <a href="./" class="nvhm" title="首页">17173有料社区</a> <em>›</em> -->
<!-- <a href="http://bbs.17173.com/home.php?mod=spacecp">设置</a> <em>›</em>个人资料 -->
<!-- </div> -->
    <!-- <div class="y chart-bar" style="padding:4px 0 0;">
    <a href="javascript:;" id="qmenu" onmouseover="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});">快捷导航</a>
            <a href="#" onclick="widthauto(this);return false;" class="y widthauto-btn" id="widthauto-btn">切换到窄版</a>
    </div> -->
<!-- </div> -->
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">个人资料
</h1>
<!--don't close the div here--><ul class="tb cl">
<li class="a"><a>基本资料</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=contact">联系方式</a></li>
<li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=edu">教育情况</a></li>
<li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=work">工作情况</a></li>
<li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=info">个人信息</a></li> -->
</ul><iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
<!-- onsubmit="clearErrorInfo(); -->
<!-- autocomplete="off"  -->
<!-- target="frame_profile" -->


<form action="{{ url('home/set/doset') }}" method="post" enctype="multipart/form-data" >
 {{ csrf_field() }}
<!-- <input type="hidden" value="204de2fc" name="formhash"> -->
  <table cellspacing="0" cellpadding="0" class="tfm" id="profilelist"><tbody>

<tr id="tr_username">
<th id="th_username">昵称/用户名</th>
<td id="td_username">
<input type="text" name="username" id="username" class="px" value="{{ $user['username'] }}" tabindex="1">
<div class="rq mtn" id="showerror_realname"></div><p class="d"></p></td>
</tr>
</tr>
<!-- <tr id="tr_realname"> -->
<!-- <th id="th_realname">真实姓名</th> -->
<!-- <td id="td_realname"> -->
<!-- <input type="text" name="realname" id="realname" class="px" value="{{ $user['realname'] }}" tabindex="1"><div class="rq mtn" id="showerror_realname"></div><p class="d"></p></td> -->
<!-- </tr> -->
<tr id="tr_age">
<th id="age">年龄</th>
<td id="td_age">
<input type="text" style="width:110px;" name="age" id="age" class="px" value="{{ $user['age'] }}" tabindex="1"><div class="rq mtn" id="showerror_realname"></div><p class="d"></p></td>
</tr>
<?php
	$arr = [
		'm'=> '男','w'=>'女','x'=>'保密',

	];
?>

<tr id="tr_gender">
<th id="th_gender">性别</th>
<td id="td_gender">
<select name="sex" id="sex" class="ps" tabindex="1">
<option value="x" @if($user['sex'] == 'x') selected="selected" @endif>保密</option>
<option value="m" @if($user['sex'] == 'm') selected="selected" @endif>男</option>
<option value="w" @if($user['sex'] == 'w') selected="selected" @endif>女</option>
</select>

</tr>
<tr id="tr_residecity">
<th id="th_residecity">居住地</th>
<td id="td_residecity">
<p id="residedistrictbox">
	
	<select name="address" id="address" class="ps" onchange="showdistrict('residedistrictbox', ['resideprovince', 'residecity', 'residedist', 'residecommunity'], 1, 1, 'reside')" tabindex="1">
		<option value="">-省份-</option>
		<option did="1" value="北京市">北京市</option><option did="2" value="天津市">天津市</option><option did="3" value="河北省">河北省</option><option did="4" value="山西省">山西省</option><option did="5" value="内蒙古自治区">内蒙古自治区</option><option did="6" value="辽宁省">辽宁省</option><option did="7" value="吉林省">吉林省</option><option did="8" value="黑龙江省">黑龙江省</option><option did="9" value="上海市">上海市</option><option did="10" value="江苏省">江苏省</option><option did="11" value="浙江省">浙江省</option><option did="12" value="安徽省">安徽省</option><option did="13" value="福建省">福建省</option><option did="14" value="江西省">江西省</option><option did="15" value="山东省">山东省</option><option did="16" value="河南省">河南省</option><option did="17" value="湖北省">湖北省</option><option did="18" value="湖南省">湖南省</option><option did="19" value="广东省">广东省</option><option did="20" value="广西壮族自治区">广西壮族自治区</option><option did="21" value="海南省">海南省</option><option did="22" value="重庆市">重庆市</option><option did="23" value="四川省">四川省</option><option did="24" value="贵州省">贵州省</option><option did="25" value="云南省">云南省</option><option did="26" value="西藏自治区">西藏自治区</option><option did="27" value="陕西省">陕西省</option><option did="28" value="甘肃省">甘肃省</option><option did="29" value="青海省">青海省</option><option did="30" value="宁夏回族自治区">宁夏回族自治区</option><option did="31" value="新疆维吾尔自治区">新疆维吾尔自治区</option><option did="32" value="台湾省">台湾省</option><option did="33" value="香港特别行政区">香港特别行政区</option><option did="34" value="澳门特别行政区">澳门特别行政区</option><option did="35" value="海外">海外</option><option did="36" value="其他">其他</option></select>&nbsp;&nbsp;</p><div class="rq mtn" id="showerror_residecity"></div><p class="d"></p></td>
</tr>
<script>
	$(function () {
		$('option').each(function (i) {
			if($(this).val() == $('#addr').val())
				$(this).attr('selected', 'true');
		});
	});
</script>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<!-- <input type="hidden" name="profilesubmit" value="true"> -->
<!-- name="profilesubmitbtn"  value="true" -->
<button type="submit"  id="profilesubmitbtn"   class="pn pnc"><strong>保存</strong></button>

<span id="submit_result" class="rq"></span>
</td>
</tr>
</tbody></table>
</form>
<input id="addr" type="hidden" name="address" value="{{ $user['address'] }}">
</div>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<!-- <li><a href="{{ url('home/set/tou') }}">修改头像</a></li> -->
<li class="a"><a href="{{ url('/home/set/set') }}">个人资料</a></li>
</ul>
</div></div>
</div></div>
   @endsection