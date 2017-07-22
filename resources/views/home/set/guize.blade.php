@extends('home.layout.personal')
@section('contents')
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">积分
</h1>
<!--don't close the div here--><ul class="tb cl">
<li><a href="{{url('home/set/jifen')}}">我的积分</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=credit&amp;op=log">积分记录</a></li> -->
<li class="a"><a href="{{url('home/set/guize')}}">积分规则</a></li>
<li class="y">
<select onchange="location.href='home.php?mod=spacecp&amp;ac=credit&amp;op=rule&amp;fid='+this.value"><option value="">全局规则</option><optgroup label="--热门游戏"><option value="8706">地下城与勇士</option><option value="1797">&nbsp; &nbsp; &nbsp; DNF补丁模型区</option><option value="9764">&nbsp; &nbsp; &nbsp; DNF板砖兑换区</option><option value="9460">&nbsp; &nbsp; &nbsp; DNF同人漫画</option><option value="2787">&nbsp; &nbsp; &nbsp; DNF手游</option><option value="10057">&nbsp; &nbsp; &nbsp; DNF视频团专区</option><option value="9758">&nbsp; &nbsp; &nbsp; DNF版主小村</option><option value="9987">流放之路</option><option value="10014">&nbsp; &nbsp; &nbsp; POE图书馆</option><option value="10010">&nbsp; &nbsp; &nbsp; POE永恒实验室</option><option value="10009">&nbsp; &nbsp; &nbsp; POE元帅殿堂</option><option value="10008">&nbsp; &nbsp; &nbsp; POE热门活动</option><option value="10023">&nbsp; &nbsp; &nbsp; POE模型补丁MOD</option><option value="10033">&nbsp; &nbsp; &nbsp; 2.6天赋模拟器</option><option value="10051">&nbsp; &nbsp; &nbsp; POE大佬讲堂</option><option value="10050">&nbsp; &nbsp; &nbsp; BD库</option><option value="9943">火影忍者</option><option value="9907">冒险岛2</option><option value="9915">&nbsp; &nbsp; &nbsp; 冒险岛2图片模型区</option><option value="10032">&nbsp; &nbsp; &nbsp; 冒险岛2活动专版</option><option value="8707">英雄联盟</option><option value="10026">王者荣耀</option><option value="8711">剑灵</option><option value="2468">&nbsp; &nbsp; &nbsp; 剑灵综合讨论区</option><option value="2545">&nbsp; &nbsp; &nbsp; 剑灵福利领取版</option><option value="2719">&nbsp; &nbsp; &nbsp; 剑灵捏人数据版</option><option value="2818">&nbsp; &nbsp; &nbsp; 剑灵MMGG自曝版</option><option value="9974">&nbsp; &nbsp; &nbsp; 剑灵新模型板块</option><option value="9665">&nbsp; &nbsp; &nbsp; 剑灵模型替换</option><option value="9853">&nbsp; &nbsp; &nbsp; 剑灵活动版</option><option value="9887">&nbsp; &nbsp; &nbsp; 剑灵台服</option><option value="9414">炉石传说</option><option value="10055">&nbsp; &nbsp; &nbsp; 冰封王座卡牌汇总</option><option value="8713">DOTA2&amp;DOTA</option><option value="9990">&nbsp; &nbsp; &nbsp; DOTA2 RPG</option></optgroup><optgroup label="--推荐游戏"><option value="549">新倩女幽魂</option><option value="9929">守望先锋</option><option value="10044">&nbsp; &nbsp; &nbsp; 图片分享</option><option value="8732">剑网3</option><option value="2075">&nbsp; &nbsp; &nbsp; 剑网3综合讨论区</option><option value="2077">&nbsp; &nbsp; &nbsp; 剑网3图片视频交流区</option><option value="10042">&nbsp; &nbsp; &nbsp; 剑网3交易中心</option><option value="10043">&nbsp; &nbsp; &nbsp; 剑网3捏脸数据</option><option value="8710">穿越火线</option><option value="1939">&nbsp; &nbsp; &nbsp; CF佣兵营地</option><option value="2721">&nbsp; &nbsp; &nbsp; CF女兵宿舍</option><option value="9912">&nbsp; &nbsp; &nbsp; 外设讨论区</option><option value="1940">&nbsp; &nbsp; &nbsp; CF战队比赛</option><option value="9859">&nbsp; &nbsp; &nbsp; CF水晶兑换</option><option value="9938">&nbsp; &nbsp; &nbsp; CF手游</option><option value="107">魔域</option><option value="9944">我的世界</option><option value="8733">天堂Ⅱ</option><option value="1570">&nbsp; &nbsp; &nbsp; 天堂Ⅱ主版</option><option value="1571">&nbsp; &nbsp; &nbsp; 天堂II资料版</option><option value="2639">&nbsp; &nbsp; &nbsp; 天堂II图文交流区</option><option value="2699">&nbsp; &nbsp; &nbsp; 天堂Ⅱ版务处理区</option><option value="10041">古剑奇谭网络版</option><option value="10052">&nbsp; &nbsp; &nbsp; 古剑奇谭捏脸版</option><option value="8708">梦幻西游</option><option value="1546">&nbsp; &nbsp; &nbsp; 梦幻西游综合讨论</option><option value="1547">&nbsp; &nbsp; &nbsp; 梦幻西游记者站</option><option value="1548">&nbsp; &nbsp; &nbsp; 梦幻西游图文平台</option><option value="1549">&nbsp; &nbsp; &nbsp; 梦幻西游孩子养育</option><option value="1551">&nbsp; &nbsp; &nbsp; 梦幻西游服战交流</option><option value="2874">&nbsp; &nbsp; &nbsp; 梦幻西游交易平台</option><option value="9890">&nbsp; &nbsp; &nbsp; 梦幻西游手游版综合讨论区</option><option value="10049">装甲战争</option><option value="10056">灵山奇缘</option><option value="8838">天涯明月刀</option><option value="8840">&nbsp; &nbsp; &nbsp; 综合讨论区</option><option value="8883">&nbsp; &nbsp; &nbsp; 八卦秘闻区</option><option value="8858">&nbsp; &nbsp; &nbsp; 公会区</option><option value="9808">&nbsp; &nbsp; &nbsp; 创意工坊</option><option value="9918">&nbsp; &nbsp; &nbsp; 捏脸数据库</option><option value="9919">&nbsp; &nbsp; &nbsp; 投诉建议</option><option value="8714">魔兽世界</option><option value="1537">&nbsp; &nbsp; &nbsp; UI插件交流版</option><option value="1534">&nbsp; &nbsp; &nbsp; 魔兽世界综合讨论区</option><option value="1535">&nbsp; &nbsp; &nbsp; 魔兽MM区</option><option value="2455">&nbsp; &nbsp; &nbsp; 台服玩家交流区</option><option value="9410">问道</option><option value="1723">&nbsp; &nbsp; &nbsp; 问道综合讨论区</option><option value="1724">&nbsp; &nbsp; &nbsp; 问道记者站</option><option value="9954">&nbsp; &nbsp; &nbsp; 问道手游讨论区</option><option value="10000">阴阳师</option></optgroup><optgroup label="--VR社区"><option value="9940">VR世界_VR玩家论坛</option><option value="9984">&nbsp; &nbsp; &nbsp; 综合讨论</option><option value="9986">&nbsp; &nbsp; &nbsp; 新手上路</option><option value="9996">&nbsp; &nbsp; &nbsp; PSVR专区</option><option value="9997">&nbsp; &nbsp; &nbsp; VIVE专区</option><option value="9998">&nbsp; &nbsp; &nbsp; VR体验</option><option value="9999">&nbsp; &nbsp; &nbsp; 游戏商城</option><option value="10015">&nbsp; &nbsp; &nbsp; 游戏资源</option></optgroup><optgroup label="--论坛福利"><option value="9982">论坛商城</option><option value="9619">论坛活动</option><option value="10022">二次元世界</option></optgroup><optgroup label="--其他版块"><option value="8705">趣味世界</option><option value="10018">&nbsp; &nbsp; &nbsp; 趣味社区</option><option value="8739">新网游</option><option value="5771">&nbsp; &nbsp; &nbsp; 外服远征团</option><option value="2241">&nbsp; &nbsp; &nbsp; 新游活动</option><option value="1500">&nbsp; &nbsp; &nbsp; 新游综合讨论区</option><option value="9534">17173视频&amp;直播</option><option value="8748">17173反馈中心</option><option value="10029">&nbsp; &nbsp; &nbsp; 论坛投诉建议区</option><option value="9592">&nbsp; &nbsp; &nbsp; 竞猜中心</option><option value="9850">&nbsp; &nbsp; &nbsp; 图个好游戏-天天高清</option><option value="9595">&nbsp; &nbsp; &nbsp; 手机客户端反馈区</option><option value="2750">&nbsp; &nbsp; &nbsp; 活动频道获奖公告</option><option value="2012">&nbsp; &nbsp; &nbsp; 百科申诉区</option><option value="1615">&nbsp; &nbsp; &nbsp; 17173游戏动漫嘉年华</option><option value="2407">&nbsp; &nbsp; &nbsp; 玩家商城反馈区</option><option value="9581">&nbsp; &nbsp; &nbsp; 发号平台反馈</option><option value="8749">论坛站务</option><option value="1484">&nbsp; &nbsp; &nbsp; 论坛投诉建议区</option><option value="1496">&nbsp; &nbsp; &nbsp; 版主申请区</option><option value="8791">&nbsp; &nbsp; &nbsp; 社区公告版</option><option value="9062">公会频道</option></optgroup><optgroup label="--17173员工内部论坛"></optgroup></select>
</li>
</ul><div class="tbmu bw0">
<p>进行以下事件动作，会得到积分奖励。不过，在一个周期内，您最多得到的奖励次数有限制 </p>
</div>
<table cellspacing="0" cellpadding="0" class="dt valt">
<tbody><tr>
<th class="xw1">动作名称</th>
<th class="xw1">周期范围</th>
<th class="xw1">周期内最多奖励次数</th><th class="xw1">经验</th>
<th class="xw1">小伙伴</th>
<th class="xw1">崇高石</th>
<th class="xw1">水晶</th>
<th class="xw1">板砖</th>
<th class="xw1">零食</th>
<th class="xw1">悬赏币</th>
<th class="xw1">VR币</th>
</tr><tr>
<td>每天登录</td>
<td>每天</td>
<td>1</td><td>+2</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr class="alt">
<td>设置头像</td>
<td>一次性</td>
<td>1</td><td>+10</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>加精华</td>
<td>不限周期</td>
<td>不限次数</td><td>+10</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr class="alt">
<td>发表回复</td>
<td>不限周期</td>
<td>不限次数</td><td>+1</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>发表主题</td>
<td>不限周期</td>
<td>不限次数</td><td>+2</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
</tbody></table>
</div>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li><a href="{{url('home/set/tou')}}">修改头像</a></li>
<li><a href="{{url('home/set/grzl')}}">个人资料</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=verify">认证</a></li> -->
<li class="a"><a href="{{url('home/set/jifen')}}">积分</a></li>
<li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=usergroup">用户组</a></li>
<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=privacy">隐私筛选</a></li> -->

<!-- <li><a href="http://bbs.17173.com/home.php?mod=spacecp&amp;ac=profile&amp;op=password">密码安全</a></li> -->

</ul>
</div></div>
</div>
@endsection