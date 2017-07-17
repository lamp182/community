@extends('home.layout.index')

@section('title', $section['name'])
@section('contents')
            <div id="wp" class="wp"><style id="diy_style" type="text/css"></style>
                <!--[diy=diynavtop]--><div id="diynavtop" class="area"></div><!--[/diy]-->
                <script type="text/javascript">
                    var forumId = '8706';
                </script><div class="wp">
                    <!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
                </div>
                <div class="boardnav">
                    <div class="bnav-wrap">
                        <div id="bnav">
                            <a href="javascript:;" id="qmenu" onMouseOver="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});">快捷导航</a>
                            <a href="javascript:;" onClick="widthauto(this)" id="widthauto-btn" class="y widthauto-btn">切换到窄版</a>
                        </div>
                    </div>


                    <!-- CMS CACHE BEGIN --><div id="pt1" class="cl">
                        <div class="hd-r"><span></span></div>
                        <div class="z">
                            <a href="{{ url('home/index') }}" class="nvhm" title="首页" target="_blank" >17173有料社区</a>
                            <em>?</em>
                            <a href="forum.php?gid=8702" target="_blank">游戏周边</a>
                            <em>?</em>
                            <a href="http://bbs.17173.com/forum-8739-1.html" target="_blank">新网游</a>
                            <em>?</em>
                            <a href="http://bbs.17173.com/plugin.php?id=auction" target="_blank" >有料商城</a>
                            <em>?</em>
                            <a href="http://www.17173.com/" target="_blank" >17173首页</a>
                        </div>
                    </div>
                    <iframe width="100%" height="165" marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=no src="http://dnf.17173.com/bbs/dnf2013bbs.shtml"></iframe><!-- CMS CACHE END -->

                    <div id="ct" class="wp cl">


                        <div class="mn mn-main">
                            <div class="bml">
                                <div class="bm_h cl ftop">
                                    <span class="o">
                                        <img id="forum_rules_8706_img" src="/home/picture/collapsed_no.gif" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('forum_rules_8706')" />
                                    </span>
                                    <span class="y">
                                        <span class="xs1 xw0 i">今日: <strong class="xi1">508</strong><b class="ico_fall">&nbsp;</b>
                                            <span class="pipe">|</span>主题: <strong class="xi1">150344</strong>
                                            <span class="pipe">|</span>排名: <strong class="xi1" title="上次排名:3">6</strong><b class="ico_fall">&nbsp;</b>
                                        </span>
                                        <span class="pipe">|</span> <a href="javascript:;" id="a_favorite" class="fa_fav" onclick="lsSubmit()">收藏本版</a>
                                        <span id="attention_placeholder" style="display:none;"></span>
                                        <span class="pipe">|</span>
                                        <a href="http://bbs.17173.com/forum.php?mod=rss&amp;fid=8706&amp;auth=0" class="fa_rss" target="_blank" title="RSS">订阅</a>
                                    </span>
                                    <div class="xs2 forum-name">
                                        <img src="/home/picture/dnf.png" class="tit-img" />
                                        <h1> <a href="{{ url('home/index') }}" class="nvhm" title="首页">17173有料社区</a> <em>›</em> <a href="{{ url('home/section?id='.$section['id']) }}">{{ $section['name'] }}</a> </h1>
                                        <p>版主: <span>
                                                @foreach($moderators as $moderator)
                                                    <a href="{{ url('home/user？id='.$moderator['user']['id']) }}" class="notabs" c="1">{{ $moderator['user']['username'] }}</a>&nbsp;
                                                @endforeach
                                                </span>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="drag">
                                <!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
                            </div>



                            <div id="pgt" class="pgs cl pgt">
                                <span id="fd_page_top">
	                                <div class="pg">
	                                	{!! $posts -> appends(['id' => $section['id']]) -> render() !!}
	                                </div>
                                </span>
                                <style>
                              		.pagination li {
                              			float: left;
                              			font-size: 12px;
                              		}
                               </style>
                                <a href="javascript:;" class="newpost"  onclick="newpost()" title="发新帖"><img src="/home/picture/pn_post.png" alt="发新帖" /></a>
                                 <span id="sign_placeholder" style="display:none;"></span>
                            </div>

                            <ul id="thread_types" class="ttp bm cl thread_types">

                                <li id="ttp_all" class="xw1 a"><a href="http://bbs.17173.com/forum-8706-1.html">全部</a></li>
                                @foreach($themes as $key => $theme)
                                <li><a href="{{ url('home\section?theme='.$theme['id']) }}">{{ $theme['name'] }}<span class="xg1 num">{{ $theme['count'] }}</span></a></li>
                               @endforeach
                            </ul>
                            <script type="text/javascript">showTypes('thread_types');</script>
                            <div id="threadlist" class="tl bm bmw">
                                <div class="th">
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <th colspan="2">
                                                <div class="tf">
                                                    <span id="atarget" onclick="setatarget(-1)" class="y atarget_1" title="在新窗口中打开帖子">新窗</span>
                                                    <a id="filter_special" href="javascript:;" class="showmenu xi2" onclick="showMenu(this.id)">全部主题</a>&nbsp;
                                                    <a href="" class="xi2">最新</a>&nbsp;
                                                    <a href="" class="xi2">热门</a>&nbsp;
                                                    <a href="" class="xi2">热帖</a>&nbsp;
                                                    <a href="" class="xi2">有料</a>&nbsp;
                                                    <a id="filter_dateline" href="javascript:;" class="showmenu xi2" onclick="showMenu(this.id)">更多</a>&nbsp;
                                                    <span id="clearstickthread" style="display: none;">
                                                        <span class="pipe">|</span>
                                                        <a href="javascript:;" onclick="clearStickThread()" class="xi2" title="显示置顶">显示置顶</a>
                                                    </span>
                                                </div>
                                            </th>
                                            <td class="by">作者</td>
                                            <td class="num">回复/查看</td>
                                            <td class="by">最后发表</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="bm_c">
                                    <script type="text/javascript">var lasttime = 1498484544;var listcolspan= '5';</script>
                                    <div id="forumnew" style="display:none"></div>
                                    <form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=8706&amp;infloat=yes&amp;nopost=yes">
                                        <input type="hidden" name="formhash" value="2f70169e" />
                                        <input type="hidden" name="listextra" value="page%3D1" />
                                        <table summary="forum_8706" cellspacing="0" cellpadding="0" id="threadlisttableid">
                                            @foreach($posts as $post)

                                            <tbody id="stickthread_9844523">
                                            <tr>
                                                <td class="icn">
                                                    <a href="{{ url('home/post/'.$post['id']) }}" title="本版置顶主题 - 新窗口打开" target="_blank">
                                                        <img src="/home/picture/pin_1.gif" alt="本版置顶" />
                                                    </a>
                                                </td>
                                                <th class="common">
                                                    <a href="javascript:;" id="content_9844523" class="showcontent y" title="更多操作" onclick="CONTENT_TID='9844523';CONTENT_ID='stickthread_9844523';showMenu({'ctrlid':this.id,'menuid':'content_menu'})"></a>
                                                    <a href="javascript:void(0);" onclick="hideStickThread('9844523')" class="showhide y" title="隐藏置顶帖">隐藏置顶帖</a></em>
                                                    <em>[<a href="http://bbs.17173.com/forum.php?mod=forumdisplay&fid=8706&amp;filter=typeid&amp;typeid=1054">{{ $post['theme'] }}</a>]</em> 
                                                    <a href="{{ url('home/post/'.$post['id']) }}" style="color: #EE1B2E;" onclick="atarget(this)" class="s xst">{{ $post['title'] }}</a>
                                                    <img src="/home/picture/image_s.gif" alt="attach_img" title="图片附件" align="absmiddle" />
                                                    <span class="tps">&nbsp;...<a href="http://bbs.17173.com/thread-9844523-2-1.html">2</a>
                                                    <a href="http://bbs.17173.com/thread-9844523-3-1.html">3</a>
                                                    <a href="http://bbs.17173.com/thread-9844523-4-1.html">4</a>
                                                    <a href="http://bbs.17173.com/thread-9844523-5-1.html">5</a>
                                                    <a href="http://bbs.17173.com/thread-9844523-6-1.html">6</a>..<a href="http://bbs.17173.com/thread-9844523-184-1.html">184</a></span>
                                                </th>
                                                <td class="by">
                                                    <cite>
                                                        <a href="http://bbs.17173.com/space-uid-116454341.html" c="1" style="color: #FF0000;">{{ $post['auther']['username'] }}</a></cite>
                                                    <em><span>{{ date('Y-m-d H:i:s', $post['ctime']) }}</span></em>
                                                </td>
                                                <td class="num"><a href="http://bbs.17173.com/thread-9844523-1-1.html" class="xi2">{{ $post['count'] }}</a><em>{{ $post['pvs'] }}</em></td>
                                                <td class="by">
                                                    <cite><a href="http://bbs.17173.com/space-username-%E7%9B%9B%E5%A4%A7%E7%9B%9B%E5%A4%A7%E9%80%9F%E5%BA%A61.html" c="1">盛大盛大速度1</a></cite>
                                                    <em><a href="http://bbs.17173.com/forum.php?mod=redirect&tid=9844523&goto=lastpost#lastpost"><span title="2017-6-26 20:23">1&nbsp;小时前</span></a></em>
                                                </td>
                                            </tr>
                                            </tbody>
                                            @endforeach

                                            
                                        </table><!-- end of table "forum_G[fid]" branch 1/3 -->
                                    </form>
                                </div>
                            </div>

    
                           
                            <script src="/home/js/autoloadpage.js" type="text/javascript"></script>
                            
                            <div id="pgt" class="pgs cl pgt">
                                <span id="fd_page_top">
	                                <div class="pg">
	                                	{!! $posts -> appends(['id' => $section['id']]) -> render() !!}
	                                </div>
                                </span>
                                <style>
                              		.pagination li {
                              			float: left;
                              			font-size: 12px;
                              		}
                               </style>
                                <a href="javascript:;" class="newpost"  onclick="newpost()" title="发新帖"><img src="/home/picture/pn_post.png" alt="发新帖" /></a>
                                 <span id="sign_placeholder" style="display:none;"></span>
                            </div>
                            <script type="text/javascript">
								function newpost() {
									location.href = '{{ url('home/post/create?id='.$section['id']) }}';
								}
                            </script>

                            <!--[diy=diyfastposttop]--><div id="diyfastposttop" class="area"></div><!--[/diy]-->
                            <script type="text/javascript">
                                var postminchars = parseInt('6');
                                var postmaxchars = parseInt('100000');
                                var disablepostctrl = parseInt('0');
                                var fid = parseInt('8706');
                            </script>
                            <div id="f_pst" class="bm">
                                <div class="bm_h">
                                    <h2>快速发帖</h2>
                                </div>
                                <div class="bm_c">
                                     @if (count($errors) > 0)
										<div class="mark" style="color:red">
											<ul>
												@if(is_object($errors))
													@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
													@endforeach
												@else
													<li>{{ $errors }}</li>
												@endif
											</ul>
										</div>
										
									@endif
									<script type="text/javascript">
										$(function() {
											var time = setInterval(function() {
												console.log(1111111);
												clearInterval(time);
												}, 10);
										});
										</script>
									<form method="post" id="form" action="{{ url('home/post') }}" onsubmit=""> 
<!-- 									   <div id="ct" class="ct2_a ct2_a_r wp cl">  -->
									   {{ csrf_field() }}
									    <input type="hidden" name="ctime" id="posttime" value="{{ time() }}" /> 
									    <input type="hidden" name='sid' value="{{ $section['id'] }}">
									    <input type="hidden" name='uid' value="{{ session('user')['id'] }}">
									    <div class="bm bw0 cl" id="editorbox"> 
									     <div id="postbox"> 
									      <div class="pbt cl"> 
									       <div class="ftid"> 
									        <select name="tid" id="theme" style="width: 100px" selecti="0" >
									        	<option value="0">选择主题分类</option>
									        	@foreach($themes as $theme)
									        		<option value="{{ $theme['id'] }}">{{ $theme['name'] }}</option>
									        	@endforeach
									        </select>
									       </div> 
									       <div class="z"> 
									       
									        <span><input type="text" name="title" id="subject" class="px" value="" onblur="if($('tags')){relatekw('-1','-1');doane();}" onkeyup="strLenCalcBbs(this, 'checklen', 80);" style="width: 25em" tabindex="1" /></span> 
									        <span id="subjectchk">还可输入 <strong id="checklen">80</strong> 个字符</span> 
									        <script type="text/javascript">strLenCalc($('subject'), 'checklen', 80)</script> 
									       </div> 
									      </div> 
									      <!-- 加载编辑器的容器 -->
										    <script id="container" name="content" style="" type="text/plain"></script>
										    <!-- 配置文件 -->
										    <script type="text/javascript" src="/uediter/ueditor.config.js"></script>
										    <!-- 编辑器源码文件 -->
										    <script type="text/javascript" src="/uediter/ueditor.all.js"></script>
										    <!-- 实例化编辑器 -->
										    <script type="text/javascript">
										        var ue = UE.getEditor('container');
										    </script>
								
									      <div class="mtm mbm pnpost"> 
									       <button type="submit" id="button_submit" class="pn pnc"> <span>发表帖子</span> </button> 
									      </div> 
									     </div> 
									    </div> 
<!-- 									   </div>  -->
									  </form>
								     </div>
@endsection  