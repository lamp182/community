@extends('admin.layout.index')
@section('content')

<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">文章列表</div>


                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-3" style="float:right">
                                    <div class="am-form-group tpl-table-list-select">
                                        <select id="option" data-am-selected="{btnSize: 'sm'}" style="display: none;">
              <option value="0">所有类别</option>
			@foreach($data as $k=>$v)
              <option  value="{{ $v->id }}">{{ $v->name }}</option>

          	@endforeach
            </select><div class="am-selected am-dropdown " id="am-selected-a4e3m" data-am-dropdown="">   <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li class="am-checked" data-index="0" data-group="0" data-value="option1">         <span class="am-selected-text">所有类别</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="1" data-group="0" data-value="option2">         <span class="am-selected-text">IT业界</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="2" data-group="0" data-value="option3">         <span class="am-selected-text">数码产品</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="3" data-group="0" data-value="option3">         <span class="am-selected-text">笔记本电脑</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="4" data-group="0" data-value="option3">         <span class="am-selected-text">平板电脑</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="5" data-group="0" data-value="option3">         <span class="am-selected-text">只能手机</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="6" data-group="0" data-value="option3">         <span class="am-selected-text">超极本</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                              
                                </div>
							
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                            	<th>板块缩略图</th>
                                                <th>所属栏目</th>
                                                <th>板块ID</th>
                                                <th>板块名称</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach($section as $kk=>$vv)
                                            <tr class="even gradeC">
                                                <td>
                                                    <img src="/{{ $vv->icon }}" class="tpl-table-line-img" alt="">
                                                </td>
                                                <td class="am-text-middle">{{ $vv->cname }}</td>
                                                <td class="am-text-middle">{{ $vv->id }}</td>
                                                <td class="am-text-middle">{{ $vv->name }}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="javascript:;">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                        <a href="javascript:;" class="am-btn am-btn-secondary">
                                                            <i class="am-icon-trash"></i> 查看板块详情
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                         
                                       

                                            <!-- more data -->
                                        </tbody>
                                    </table>
                                </div>
                          
                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">
                                            {!! $section->render() !!}
                                        </ul>
                                    </div>
                                     <style>
										.am-pagination ul li{
											float: left;
											font-size: 15px;
						                    padding: 0px 5px;
										}
           							</style>
                                    <script>
                                        $(function(){
                                            $('#option').change(function(){
                                                var value = $('#option').val();
                                                $.get("{{url('admin/select')}}",{'value':value},function(msg){
                                                    alert(msg);
                                                })
                                            })
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>








@endsection