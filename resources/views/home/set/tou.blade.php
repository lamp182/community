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
<form method="post" id="form" action="{{url('home/set/doface')}}">
<table cellspacing="0" cellpadding="0" class="tfm">

<tr>
<td><img id="pic" style="width: 200px; height: 200px;" src="/{{ trim(session('user')['detail']['faceico'], '/') }}"></td>
</tr>
<tbody>
<tr>

<td>

<input id="addface" type="file" multiple="" value="">
<input type="hidden" name="faceico" id="art_thumb" style="width:120px;height:60px" value="">
<script type="text/javascript">
    $(function() {
                $("#addface").change(function() {
                    uploadImage();
                });
            });

            function uploadImage() {
                //                            判断是否有选择上传文件
                var imgPath = $("#addface").val();
                // alert(imgPath);
                if (imgPath == "") {
                    alert("请选择上传图片！");
                    return;
                }
                //判断上传文件的后缀名
                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                if (strExtension != 'jpg' && strExtension != 'gif' && strExtension != 'png' && strExtension != 'bmp') {
                    alert("请选择图片文件");
                    return;
                }

                var formData = new FormData($('#form')[0]);
                console.log(formData);
                $.ajax({
                    type: "post",
                    url: "/home/set/upload",
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                     success: function(res) {
                       // console.log(data);
                       // alert(res);
                                $('#pic').attr('src','/'+res);
//                                 $('#pic').show();
                                $("#art_thumb").val(res);
                                // $('#icon').val(data);

                            },
                    // alert('2345');
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest);
                        console.log(textStatus);
                        console.log(errorThrown);
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }
    </script>
<div>
<br>
<button type="button" class="am-btn am-btn-danger am-btn-sm " style="width: 200px; height: 30px; border: 0; background: #aaa;">
                        修改
</button>
                    </div>
</td>
</tr>
</tbody>
</table>
<input type="hidden" name="" value="">
</form>
</div>
</div>
<div>

<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li class="a"><a href="{{ url('home/set/tou') }}">修改头像</a></li>
<li><a href="{{ url('/home/set/set') }}">个人资料</a></li>
</ul>
</div></div>
</div></div>
@endsection