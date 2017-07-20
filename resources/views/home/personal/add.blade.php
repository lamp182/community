@extends('home.layout.personal')
@section('contents')
      <div style="position:relative;">
<ul class="tb cl" style="padding-left: 75px;"> 
        <li class="a"><a href="{{ url('/home/set/set') }}">个人资料</a></li> 
        <li > <a href="{{ url('home/set/zhuti') }}">主题</a></li> 
        <li><a href="{{ url('home/set/huifu') }}">回复</a></li> 
       </ul> 
      </div>
      <style type="text/css">
#ct{padding-right:230px; padding-left:150px;}
#ct .mn{ width: 99%;}
#ct .appl{ margin-left: -150px;}
</style> 
      <div id="ct" class="ct1 wp cl bm nbwt" style="padding-left:0;"> 
       <div class="mn"> 
        <!--[diy=diycontenttop]-->
        <div id="diycontenttop" class="area"></div>
        <!--[/diy]--> 
        <div class="bm bw0"> 
         <div class="bm_c"> 
          <div class="bm_c u_profile"> 
           <div class="pbm mbm bbda cl"> 
            <h2 class="mbn"> sunshine0121<img src="/home/picture/ol.gif" alt="online" title="在线" class="vm" />&nbsp; <span class="xw0">(UID: 135971237)</span> </h2> 
            <ul class="pf_l cl pbm mbm"> 
             <!-- <li><em>邮箱状态</em>未验证</li>  -->
             <!-- <li><em>视频认证</em>未认证</li>  -->
            </ul> 
            <ul> 
            </ul> 
            <ul class="cl bbda pbm mbm"> 
             <li> <em class="xg2">统计信息</em> <a href="http://bbs.17173.com/home.php?mod=space&amp;uid=135971237&amp;do=friend&amp;view=me&amp;from=space" target="_blank">好友数 0</a> <span class="pipe">|</span><a href="http://bbs.17173.com/home.php?mod=space&amp;uid=135971237&amp;do=thread&amp;view=me&amp;type=reply&amp;from=space" target="_blank">回帖数 0</a> <span class="pipe">|</span> <a href="http://bbs.17173.com/home.php?mod=space&amp;uid=135971237&amp;do=thread&amp;view=me&amp;type=thread&amp;from=space" target="_blank">主题数 0</a> </li> 
            </ul> 
            <ul class="pf_l cl">
             <li><em>性别</em>保密</li> 
             <li><em>生日</em>-</li> 
            </ul> 
           </div> 
           <!-- <div class="pbm mbm bbda cl"> 
            <h2 class="mbn">用户认证</h2>
           </div> -->
           <div class="pbm mbm bbda cl"> 
            <h2 class="mbn">活跃概况</h2> 
            <ul> 
             <li><em class="xg1">用户组&nbsp;&nbsp;</em><span style="color:" class="xi2" onmouseover="showTip(this)" tip="积分 2, 距离下一级还需 48 积分"><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=usergroup&amp;gid=10" target="_blank">Lv.1</a></span> </li> 
            </ul> 
            <ul id="pbbs" class="pf_l"> 
             <li><em>注册时间</em>2017-6-26 22:11</li> 
             <li><em>最后访问</em>2017-6-26 22:11</li> 
             <li><em>上次活动时间</em>2017-6-26 22:11</li>
             <li><em>所在时区</em>使用系统默认</li> 
            </ul> 
           </div> 
           <div id="psts" class="cl"> 
            <h2 class="mbn">统计信息</h2> 
            <ul class="pf_l"> 
             <li><em>已用空间</em> 0 B </li> 
             <li><em>积分</em>2</li>
             <li><em>经验</em>2 </li> 
             <li><em>小伙伴</em>0 </li> 
             <li><em>崇高石</em>0 </li> 
             <li><em>水晶</em>0 </li> 
             <li><em>板砖</em>0 </li> 
             <li><em>零食</em>0 </li> 
             <li><em>悬赏币</em>0 </li> 
             <li><em>VR币</em>0 </li> 
            </ul> 
           </div> 
          </div>
          <!--[diy=diycontentbottom]-->
          <div id="diycontentbottom" class="area"></div>
          <!--[/diy]-->
         </div> 
        </div> 
       </div> 
      </div> 
      <div class="wp mtn"> 
       <!--[diy=diy3]-->
       <div id="diy3" class="area"></div>
       <!--[/diy]--> 
      </div> 
     </div> 
    @endsection