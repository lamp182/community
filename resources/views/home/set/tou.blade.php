@extends('home.layout.personal')
@section('contents')
<!-- <div style="position:relative;">
       <ul class="tb cl" style="padding-left: 75px;"> 
        <li ><a href="{{ url('/home/personal/personal') }}">个人资料</a></li> 
        <li class="a"> <a href="{{ url('home/set/zhuti') }}">主题</a></li> 
        <li><a href="{{ url('home/set/huifu') }}">回复</a></li> 
       </ul> 
      </div> -->
             <style type="text/css">
#ct{padding-right:230px; padding-left:150px;}
#ct .mn{ width: 99%;}
#ct .appl{ margin-left: -150px;}
</style>
<div id="wp" class="wp"><div id="pt" class="bm cl">
<!-- <div class="z">
<a href="./" class="nvhm" title="首页">17173有料社区</a> <em>›</em>
<a href="http://bbs.17173.com/home.php?mod=spacecp">设置</a> <em>›</em>修改头像 -->
<!-- </div>
    <div class="y chart-bar" style="padding:4px 0 0;">
    <a href="javascript:;" id="qmenu" onmouseover="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});">快捷导航</a>
            <a href="#" onclick="widthauto(this);return false;" class="y widthauto-btn" id="widthauto-btn">切换到窄版</a>
    </div> -->
<!-- </div> -->
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">修改头像
</h1>
<!--don't close the div here--><script type="text/javascript">
function updateavatar() {
window.location.href = document.location.href.replace('&reload=1', '') + '&reload=1';
}
saveUserdata('avatar_redirect', document.referrer);
</script>
<form method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=avatar&amp;ref">
<table cellspacing="0" cellpadding="0" class="tfm">
<!-- <caption>
<span id="retpre" class="y xi2"><a href="http://www.lege182.com/home/set/set">返回上一页</a></span>
<h2 class="xs2">当前我的头像</h2>
<p>如果您还没有设置自己的头像，系统会显示为默认头像，您需要自己上传一张新照片来作为自己的个人头像 </p>
</caption>
<tbody> -->
<tr>
<td><img src="http://bbs.17173.com/uc/avatar.php?uid=136130969&amp;size=big"></td>
</tr>
<!--  </tbody>
</table>

<table cellspacing="0" cellpadding="0" class="tfm">
<caption>
<h2 class="xs2">设置我的新头像</h2>
<p>请选择一个新照片进行上传编辑。<br>头像保存后，您可能需要刷新一下本页面(按Ctrl+F5键)，才能查看最新的头像效果 </p>
</caption> -->
<tbody>
<tr>
<!-- <td>
<script type="text/javascript">
document.write(AC_FL_RunContent('width','450','height','253','scale','exactfit','src','http://bbs.17173.com/uc/images/camera.swf?inajax=1&appid=2&input=8670fb9NJ0FF%2FdPthaWH1FyTtc74bGAg7sWfv%2FaMmlJYHQyGPkCHFsyOfhm1PJVKlYw5G9IniQaqHZ7B3GIWVtRT5YV1ci8hrpxYlhucRdmmL1QVtQRyf2id543Rho3cGg&agent=ba081c70c62b1a73f7586809b37ba98f&ucapi=bbs.17173.com%2Fuc&avatartype=virtual&uploadSize=2048','id','mycamera','name','mycamera','quality','high','bgcolor','#ffffff','menu','false','swLiveConnect','true','allowScriptAccess','always'));</script>
<embed width="450" height="253" scale="exactfit" src="http://bbs.17173.com/uc/images/camera.swf?inajax=1&amp;appid=2&amp;input=8670fb9NJ0FF%2FdPthaWH1FyTtc74bGAg7sWfv%2FaMmlJYHQyGPkCHFsyOfhm1PJVKlYw5G9IniQaqHZ7B3GIWVtRT5YV1ci8hrpxYlhucRdmmL1QVtQRyf2id543Rho3cGg&amp;agent=ba081c70c62b1a73f7586809b37ba98f&amp;ucapi=bbs.17173.com%2Fuc&amp;avatartype=virtual&amp;uploadSize=2048" name="mycamera" quality="high" bgcolor="#ffffff" menu="false" swliveconnect="true" allowscriptaccess="always" type="application/x-shockwave-flash">
</td> -->
<td>

<input id="file0" type="file" multiple="" value="">
<div>
<button type="button" class="am-btn am-btn-danger am-btn-sm ">
                        <i class="am-icon-cloud-upload">
                        </i>
                        修改
                    </button>
                    </div>
</td>
</tr>
</tbody>
</table>
<input type="hidden" name="formhash" value="98c1a666">
</form>
</div>
</div>
<div>
<script type="text/javascript">
var redirecturl = loadUserdata('avatar_redirect');
if(redirecturl) {
$('retpre').innerHTML = '<a href="' + redirecturl + '">返回上一页</a>';
}
</script>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li class="a"><a href="{{ url('home/set/tou') }}">修改头像</a></li>
<li><a href="{{ url('/home/set/set') }}">个人资料</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=verify">认证</a></li> -->
<li><a href="{{ url('home/set/jifen') }}">积分</a></li>
<li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=usergroup">用户组</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=privacy">隐私筛选</a></li> -->

<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=password">密码安全</a></li> -->

</ul>
</div></div>
</div></div>
@endsection