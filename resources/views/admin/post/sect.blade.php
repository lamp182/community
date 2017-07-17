@extends('admin.layout.index')
@section('content')


	<div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">帖子列表</div>
                            </div>
                            <div class="widget-body  am-fr">
                             <form action="{{url('admin/posts/create')}}" method="get">
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-3" style="margin:0px 0px 0px 570px">
                                    <div class="am-form-group tpl-table-list-select">
							            <select name="section" data-am-selected="{btnSize: 'sm'}" style="display: none;">
							            		<option value="0">所有分类</option>
							              	@foreach($section as $k=>$v)
							              		<option  @if($id == $v->id )  selected @endif  value="{{ $v->id }}">{{ $v->name }}</option>
							       			@endforeach  
							            </select>
                                    </div>
                                </div>
                           
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3" style="float:right" >
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        <input type="text" name="zkey" class="am-form-field " value="">
                                        <span class="am-input-group-btn">
							           		<button type="submit" class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"></button>
							          	</span>
                                    </div>
                                </div>
							</form>
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>帖子ID</th>
                                                <th>帖子标题</th>
                                                <th>作者</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                    @foreach($post as $k=>$v)	    
                                        <tbody>
                                            <tr class="gradeX">
                                                <td>{{ $v->id }}</td>
                                                <td><a href="">{{ $v->title }}</a></td>
                                                <td>{{ $v->vname }}</td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
													@if($v->status == 1)
                                                        <a href="{{url('admin/posts/'.$v->id).'/edit'}}">
                                                            <i class="am-icon-pencil"></i> 显示
                                                        </a>
													@else
                                                        <a href="{{url('admin/posts/'.$v->id).'/edit'}}"  class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 屏蔽
                                                        </a>
													@endif
                                                        <a href="{{url('admin/posts/'.$v->id)}}">
                                                            <i class="am-icon-pencil"></i> 查看详情
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- more data -->
                                        </tbody>
                                    @endforeach
                                    </table>
                                </div>
							

                                <div class="am-u-lg-12 am-cf">

                                   <div class="am-fr">
                						<ul class="am-pagination tpl-pagination">
                  
                    						{!! $post->render() !!}
                    
                						</ul>
            						</div>
	            						<style>
											.am-pagination ul li{
											float: left;
											font-size: 15px;
						                    padding: 0px 5px;
											}
							            </style>
        							</div>
                                </div>
                            </div>
                        </div>








@endsection