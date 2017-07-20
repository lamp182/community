@extends('home.layout.index')

@section('contents')
<div style="width: 98%; margin:0px auto;">
					<div id="chart" class="bw0 cl">
					    <p class="chart z">&nbsp;&nbsp;&nbsp;帖子: <em>{{ $postCount }}</em><span class="pipe">|</span>会员: <em>{{ $user['count'] }}</em><span class="pipe">|</span>欢迎新会员: <em><a href="{{ url('home/user/'.$user['new']['uid']) }}" target="_blank" class="xi2">{{ $user['new']['username'] }}</a></em></p>
                        <div class="y" style="display:none;">
                            <a href="http://bbs.17173.com/forum.php?mod=guide&amp;view=new" title="最新回复" class="xi2">最新回复</a></div>
<!--                         <div class="y chart-bar">
                            <a href="javascript:;" id="qmenu" onMouseOver="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});">快捷导航</a>
                            <a href="javascript:;" onclick="widthauto(this);return false;"  class="y widthauto-btn" id="widthauto-btn">切换到窄版</a>
                            <a href="http://a.17173.com/tg/channel/index.html?id=A0011502201" target="_blank" class="y app-download-btn">下载17173手机版</a>
                        </div> -->

                    </div>
					<div class="screen-hot" id="screen-hot">
                        <div class="icon"></div>
                        <div class="sch-co01">
                            <div class="temp-flash02"> <a href="#" target="_blank" class="more" title="鏇村"></a>
                                <div class="panes">
                                    <div class="con"><a href="http://bbs.17173.com/thread-10318180-1-1.html" target="_blank"><img
                                                    src="/home/picture/300-200.jpg" alt="17173游戏论坛活动"/></a></div>

                                    <div class="con"><a href="http://asktao.17173.com/zt/201706221546/index.shtml" target="_blank"><img
                                                    src="/home/picture/wd.jpg" alt="17173游戏论坛活动"/></a></div>

                                    <div class="con"><a href="http://bbs.17173.com/thread-10300546-1-1.html" target="_blank"><img
                                                    src="/home/picture/qadovxblthkhzvr.jpg" alt="17173游戏论坛活动"/></a></div>

                                    <div class="con"><a href="http://bbs.17173.com/thread-10321997-1-1.html" target="_blank"><img
                                                    src="/home/picture/321.png" alt="17173游戏论坛活动"/></a></div>


                                    <div class="con"><a href="http://bbs.17173.com/thread-10320858-1-1.html" target="_blank"><img src="/home/picture/ihfcelbltkvegvs.jpg" alt="17173游戏论坛活动"/></a></div>

                                    <div class="con"><a href="http://newgame.17173.com/game-info-1000027.html" target="_blank"><img
                                                    src="/home/picture/ft.jpg" alt="17173游戏论坛活动"/></a></div>


                                </div><!--end .panes-->
                                <ul class="tab js-hover">
                                    <li><span>1</span></li>
                                    <li><span>2</span></li>
                                    <li><span>3</span></li>
                                    <li><span>4</span></li>
                                    <li><span>5</span></li>
                                    <li><span>6</span></li>
                                </ul>
                            </div><!--end .temp-flash-->




                            <script>
                                jQuery.noConflict();
                                jQuery(function($){

                                    $('.temp-flash02 .panes > div').soChange({


                                        thumbObj:'.temp-flash02 .tab li',
                                        thumbNowClass:'current'
                                    });


                                })
                            </script>


                        </div><!--end sch-co01-->


                        <div class="sch-co02">

                            <ul class="mod-news bbs-news-list">
                                <li><span class="time"><a href="http://bbs.17173.com/forum-9414-1.html" target="_blank">[炉石传说]</a></span><a href="http://bbs.17173.com/thread-10321975-1-1.html" target="_blank" title=17173游戏论坛攻略 class="title">&nbsp;炉石你绝对想不到系列最厉害10个6费随从</a></li>
                                <li><span class="time"><a href="http://bbs.17173.com/forum-8706-1.html" target="_blank">[DNF话题]</a></span><a href="http://bbs.17173.com/thread-10322200-1-1.html" target="_blank" title=17173游戏论坛攻略 class="title">&nbsp;卢克Raid暗帝开荒视角附带一二阶段建议</a></li>
                                <li><span class="time"><a href="http://bbs.17173.com/forum-9987-1.html" target="_blank">[流放之路]</a></span><a href="http://bbs.17173.com/thread-10320309-1-1.html" target="_blank" title=17173游戏论坛攻略 class="title">&nbsp;流放之路我想拿刀阵开荒但是有几个问题</a></li>
                                <li><span class="time"><a href="http://bbs.17173.com/forum-10026-1.html" target="_blank">[王者荣耀]</a></span><a href="http://bbs.17173.com/thread-10320508-1-2.html" target="_blank" title=17173游戏论坛攻略 class="title">&nbsp;王者荣耀造富游戏代练勤快点可月入2万</a></li>
                                <li><span class="time"><a href="http://bbs.17173.com/forum-10041-1.html" target="_blank">[古剑奇谭]</a></span><a href="http://bbs.17173.com/thread-10317757-1-1.html" target="_blank" title=17173游戏论坛攻略 class="title">&nbsp;古剑奇谭OL预建角色界面各门派展示欣赏</a></li>
                                <li><span class="time"><a href="http://bbs.17173.com/forum-10049-1.html" target="_blank">[论坛活动]</a></span><a href="http://bbs.17173.com/thread-10318180-1-1.html" target="_blank" title=17173游戏论坛攻略 class="title">&nbsp;分享宝藏世界你最喜欢的角色赢周边好礼</a></li>
                                <li><span class="time"><a href="http://bbs.17173.com/forum-9619-1.html" target="_blank">[论坛活动]</a></span><a href="http://bbs.17173.com/thread-10321997-1-1.html" target="_blank" title=17173游戏论坛攻略 class="title">&nbsp;火源计划送大量QB激活资格根本领不完</a></li>
                                <li><span class="time"><a href="http://bbs.17173.com/forum-9619-1.html" target="_blank">[论坛活动]</a></span><a href="http://bbs.17173.com/thread-10314517-1-1.html" target="_blank" title=17173游戏论坛攻略 class="title">&nbsp;古剑OL6.23删档封测珍稀豪情大礼抢不完</a></li>


                            </ul>
                            <!--update in 20130523 star-->
                            <div class="hot-discuss">
                                <ul class="hot-discuss-list">

                                    <li class="item">
                                        <div class="hot-discuss-c1"><a href="http://bbs.17173.com/thread-10317641-1-1.html" target="_blank" class="avatar-box"><img src="/home/picture/6.jpg" alt="17173游戏论坛活动" /></a></div>
                                        <div class="hot-discuss-c2">
                                            <p class="txt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;火影忍者一招鲜·第二期：主播FJ教你玩四代波风水门</p>
                                            <span class="to-look"><a href="http://bbs.17173.com/thread-10317641-1-1.html" target="_blank">点击进入</a></span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="hot-discuss-c1"><a href="http://bbs.17173.com/thread-10312295-1-1.html" target="_blank" class="avatar-box"><img src="/home/picture/g1.png" alt="17173游戏论坛活动" /></a></div>
                                        <div class="hot-discuss-c2">
                                            <p class="txt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;寒娜《全职高手 沐雨橙风》</p>
                                            <span class="to-look"><a href="http://bbs.17173.com/thread-10312295-1-1.html" target="_blank">点击欣赏</a></span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <!--update in 20130523 end-->

                        </div>
                        <!--end sch-co02-->


                        <div class="sch-co03">
                            <div class="user-info clearfix">
                                <div class="img-area"><a href="http://bbs.17173.com/thread-10313032-1-1.html" target="_blank"><img src="/home/picture/327.png" alt="趣味月刊" /></a></div>
                                <div class="txt-area">
                                    <div class="ui-introduction">[趣味月刊]</br>2017年第6期</div>
                                    <ul class="ui-attr-list">
                                        <li><span class="ui-ico author-ico">作者：</span>胖胖胖砸</li>
                                        <li><span class="ui-ico source-ico">来源：</span>趣味社区</li>
                                    </ul>
                                </div>

                            </div><!--end user-info-->
                            <div class="user-op clearfix">
                                <ul class="uo-list clearfix">
                                    <li class="item01"><a href="http://bbs.17173.com/plugin.php?id=auction" target="_blank">有料商城</a></li>
                                    <li class="item02"><a href="http://bbs.17173.com/forum-9619-1.html" target="_blank">有料活动</a></li>
                                    <li class="item03"><a href="http://bbs.17173.com/thread-10049979-1-1.html" target="_blank">论坛规则</a></li>
                                    <li class="item04"><a href="http://bbs.17173.com/forum-1484-1.html" target="_blank">论坛站务</a></li>

                                </ul>
                            </div><!--end user-op-->

                        </div><!--end sch-co03-->

                    </div><!--end screen-hot-->
                </div>
	<div class="fl bm mn-main-in" style="width: 98%; margin:0px auto;">
    <div class="bm bmw  flg cl con0{{ $column['id'] }}" style="background: white;"><div class="bm_h cl">
            <h2><i class="jg"></i><a href="{{ url('home/column?id='.$column['id']) }}" style="">{{ $column['name'] }}</a></h2>
        </div>

        <div id="category_8704" class="bm_c" style="">
            <table cellspacing="0" cellpadding="0" class="fl_tb">
                <tbody class="js-hover">
                <?php $i = 0;  ?>
                @foreach($sections as $section)
                    @if($section['cid'] == $column['id'])
                        @if($i % 3 == 0)
                            <tr class="fl_row">
                                @endif

                                <td class="fl_g" width="32.9%">
                                    <div class="fl_icn_g" style="width: 120px;">
                                        <a href="{{ url('home/section?id='.$section['id']) }}"><img src="/home/picture/{{ $section['icon'] }}" align="left" alt="地下城与勇士" /></a></div>
                                    <dl style="margin-left: 120px;">
                                        <dt>
                                            <a href="{{ url('home/section?id='.$section['id']) }}"   class="game-title" >{{ $section['name'] }}</a>
                                            {{--使用Redis--}}
                                            <em class="game-todayposts" title="今日"> (2471)</em>
                                        </dt>
                                        <dd class="game-desc">{{ $section['characteristic'] }}<br />
                                            <a href="{{ url() }}" target="_blank">专区</a>|<a href="{{ url('home/section?id='.$section['id']) }}" target="_blank">论坛</a>|<a href="http://dnf.db.17173.com" target="_blank">数据库</a>|<a href="http://news.17173.com/game/dnf.shtml" target="_blank">新闻</a>|<a href="http://download.17173.com/20011/" target="_blank">下载</a>
                                        </dd>
                                        <dd style="display:none;">
                                            <em>主题: <span title="223631">22万</span></em>,
                                            <em>帖数: <span title="28157400">2815万</span></em>
                                        </dd>
                                        <dd style="display:none;">
                                            <a href="http://bbs.17173.com/forum.php?mod=redirect&amp;tid=8897007&amp;goto=lastpost#lastpost">最后发表: <span title="2017-6-26 21:16">17&nbsp;秒前</span></a>
                                        </dd>
                                    </dl>
                                </td>
                                <?php $i ++; ?>
                                @if($i % 3 == 0)
                            </tr>
                        @endif

                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection