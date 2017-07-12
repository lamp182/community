@extends('home.layout.body')

@section('contents')

@foreach($columns as $column)
    <div class="fl bm mn-main-in">
    <div class="bm bmw  flg cl con0{{ $column['id'] }}"><div class="bm_h cl">
<span class="o">
<img id="column_{{ $column['id'] }}_img" src="/home/picture/collapsed_no.gif" title="收起/展开" alt="收起/展开" onclick="fun('column_{{ $column['id'] }}');" />
</span>
                                <h2><i class="jg"></i><a href="{{ url('home/column?id='.$column['id']) }}" style="">{{ $column['name'] }}</a></h2>
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
                            <script>

                                   function fun(param) {
                                       $("#" + param).hide();
                                   }

                            </script>

@endforeach



@endsection

