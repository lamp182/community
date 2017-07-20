@extends('home.layout.index')

@section('contents')
				<div style="width: 98%; margin:0px auto;">
					<div id="chart" class="bw0 cl">
					    <p class="chart z">&nbsp;&nbsp;&nbsp;帖子: <em>{{ $postCount }}</em><span class="pipe">|</span>会员: <em>{{ $user['count'] }}</em><span class="pipe">|</span>欢迎新会员: <em><a href="{{ url('home/user/'.$user['new']['uid']) }}" target="_blank" class="xi2">{{ $user['new']['username'] }}</a></em></p>
                        <div class="y" style="display:none;">
                            <a href="http://bbs.17173.com/forum.php?mod=guide&amp;view=new" title="最新回复" class="xi2">最新回复</a></div>

                    </div>
					<div class="screen-hot" id="screen-hot">
                        <div class="icon"></div>
                        <div class="sch-co01">
                            <div class="temp-flash02"> <a href="#" target="_blank" class="more" title="鏇村"></a>
                                <div class="panes">
                                    @foreach($carouels as $carouel)
                                    <div class="con">        
                                    	<a href="{{ $carouel['url'] }}" target="_blank">
                                    		<img style="width: 300px; height: 200px;" src="{{ $carouel['picture'] }}" alt="{{ $carouel['alt'] }}"/>
                                    	</a>                 
                                    </div>
                                    @endforeach
                                </div><!--end .panes-->
                                <ul class="tab js-hover">
                                	@for($i = 1; $i <= count($carouels); $i++)
                                    <li><span>{{ $i }}</span></li>
                                    @endfor
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
                            @foreach($tops as $post)
                                <li>
                                	<span class="time">
                                		<a href="{{ url('home/section?id='.$post['section']['id']) }}" target="_blank">[{{ $post['section']['name'] }}]</a>
                                	</span>
                                	<a href="{{ url('home/post/'.$post['id']) }}" target="_blank" title="{{ $post['title'] }}" class="title">&nbsp;{{ $post['title'] }}</a>
                                </li>
                             @endforeach
                            </ul>
                            <!--update in 20130523 star-->
                            <div class="hot-discuss">
                                <ul class="hot-discuss-list">

                                    <li class="item">
                                        <div class="hot-discuss-c1">
                                        	<a href="{{ $adverts[0]['url'] }}" target="_blank" class="avatar-box">
                                        		<img style="width: 150px; height: 90px;" src="{{ $adverts[0]['picture'] }}" alt="{{ $adverts[0]['name'] }}" />
                                        	</a>
                                        </div>
                                        <div class="hot-discuss-c2">
                                            <p class="txt">
                                            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            	{{ $adverts[0]['name'] }}
                                            </p>
                                            <span class="to-look">
                                            <a href="{{ $adverts[0]['url'] }}" target="_blank">点击进入</a>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="hot-discuss-c1">
                                        	<a href="{{ $adverts[1]['url'] }}" target="_blank" class="avatar-box">
                                        		<img style="width: 150px; height: 90px;" src="{{ $adverts[1]['picture'] }}" alt="{{ $adverts[1]['name'] }}" />
                                        	</a>
                                        </div>
                                        <div class="hot-discuss-c2">
                                            <p class="txt">
                                            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            	{{ $adverts[1]['name'] }}
                                            </p>
                                            <span class="to-look">
                                            <a href="{{ $adverts[1]['url'] }}" target="_blank">点击进入</a>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--update in 20130523 end-->

                        </div>
                        <!--end sch-co02-->


                        <div class="sch-co03">
                            <div class="user-info clearfix">
                                <div class="img-area">
                                	<a href="{{ url('home/user/'.$topUser['detail']['uid']) }}" target="_blank">
                                		<img src="{{ $topUser['detail']['faceico'] }}" alt="{{ $topUser['detail']['username'] }}" />
                                	</a>
                                </div>
                                <div class="txt-area">
                                    <div style="font-size: 16px;" class="ui-attr-list">
                                    	<strong class="vwmy">
                                    		<a href="{{ url('home/user/'.$topUser['detail']['uid']) }}">{{ $topUser['detail']['username'] }}</a>
                                    	</strong>
                                    	<br />发回帖：{{ $topUser['replies'] }}
                                    	<br />用户组：vip{{ $topUser['operate']['vip'] }}
                                    	<br />积分：{{ $topUser['operate']['score'] }}
                                    </div>
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
@foreach($columns as $column)
    
    <div class="bm bmw  flg cl con0{{ $column['id'] }}" style="background: white;">
    	<div class="bm_h cl">
        	<h2><i class="jg"></i>
<!--        	<a href="{{ url('home/column?id='.$column['id']) }}" style="">{{ $column['name'] }}</a></h2> --> 
        	<a href="{{ url('?id='.$column['id']) }}" style="">{{ $column['name'] }}</a></h2>
        </div>
        <div id="column_{{ $column['id'] }}" class="bm_c" style="">
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
                                                <a href="{{ url('home/section?id='.$section['id']) }}">
                                                <img src="/{{ trim($section['icon'],'/') }}" align="left" alt="{{ $section['name'] }}" /></a></div>
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
                         
@endforeach
</div>
<script>
	function fun(param) {
		$("#" + param).hide();
	}
</script>

@endsection

