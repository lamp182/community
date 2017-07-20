@extends('admin.layout.index')
@section('content')
             <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title  am-cf">浏览量前五的板块</div>
                </div>
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                            <thead>
                                <tr>
                                    <th>板块缩略图</th>
                                    <th>板块所属栏目</th>
                                    <th>板块名称</th>
                                    <th>板块下的帖子数量</th>
                                    <th>板块总浏览量</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($section as $k=>$v)
                                <tr class="gradeX">
                                    <td>
                                        <img src="/{{ trim($v->icon, '/') }}" class="tpl-table-line-img" alt="">
                                    </td>
                                    <td class="am-text-middle">{{ $v['cname'] }}</td>
                                    <td class="am-text-middle">{{ $v['name'] }}</td>
                                    <td class="am-text-middle">{{ $v['count'] }}</td>
                                    <td class="am-text-middle">{{ $v['pvs'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">浏览量前五的帖子</div>
                            </div>                
                            <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>帖子标题</th>
                                                <th>所属板块</th>
                                                <th>回复数量</th>
                                                <th>浏览数量</th>
                                                <th>作者</th>
                                            </tr>
                                        </thead>
                                        @foreach($post as $k=>$v)
                                        <tbody>
                                            <tr class="gradeX">
                                                <td><a href="">{{$v['title']}}</a></td>
                                                <td>{{ $v['sname'] }}</td>
                                                <td>{{ $v['count'] }}</td>
                                                <td>{{ $v['pvs'] }}</td>
                                                <td>{{ $v['uname'] }}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
            
@endsection