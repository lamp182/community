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
            <h2 class="mbn">{{ session('user')['detail']['username'] }}
            <img src="/home/picture/ol.gif" alt="online" title="在线" class="vm" />&nbsp; <span class="xw0">(UID: YL17{{ session('user')['id'] }})</span> </h2> 
            <ul class="pf_l cl pbm mbm"> 
             <!-- <li><em>邮箱状态</em>未验证</li>  -->
             <!-- <li><em>视频认证</em>未认证</li>  -->
            </ul> 
            <ul> 
            </ul> 
            <ul class="cl bbda pbm mbm"> 
             <li> 
             	<em class="xg2">统计信息</em>
             	<a href="" target="_blank">好友数: {{ $friends }}</a>
             	<span class="pipe">|</span><a href="" target="_blank">回帖数: {{ $replies }}</a> 
             	<span class="pipe">|</span> <a href="" target="_blank">主题数 : {{ $posts }}</a> 
             </li> 
            </ul> 
            <ul class="pf_l cl">
             <li><em>性别</em>
             	{{ $sex[session('user')['detail']['sex']] }}
             </li> 
             <li><em>生日</em>{{ date('Y', time()) - date('Y', session('user')['detail']['age']) }}</li> 
            </ul> 
           </div> 
           <!-- <div class="pbm mbm bbda cl"> 
            <h2 class="mbn">用户认证</h2>
           </div> -->
           <div class="pbm mbm bbda cl"> 
            <h2 class="mbn">活跃概况</h2> 
            <ul> 
             <li><em class="xg1">用户组&nbsp;&nbsp;</em>vip{{ session('user')['operate']['vip'] }} </li> 
            </ul> 
            <ul id="pbbs" class="pf_l"> 
             <li><em>注册时间</em>{{ date('Y-m-d H:i:s', session('user')['detail']['ctime']) }}</li> 
             <li><em>所在时区</em>{{ date_default_timezone_get() }}</li> 
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