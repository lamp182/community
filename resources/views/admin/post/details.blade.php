@extends('admin.layout.index')
@section('content')

	<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">{{$post['id']}}号帖子详细信息</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">
                                <form class="am-form tpl-form-line-form">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">帖子标题</label>
                                        <div class="am-u-sm-9">
                                            <a href="">{{$post['title']}}</a>                  
                                        </div>
                                    </div>


	                                 <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">所属栏目名称</label>
                                        <div class="am-u-sm-9">
                                            {{ $post['cname'] }}                  
                                        </div>
                                    </div>

                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">所属板块名称</label>
                                        <div class="am-u-sm-9">
                                            {{ $post['sname'] }}                  
                                        </div>
                                    </div>

                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">所属分类名称</label>
                                        <div class="am-u-sm-9">
                                           {{ $post['tname'] }}                  
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">创建时间</label>
                                        <div class="am-u-sm-9">
                                            {{ date('Y-m-d H:i:s',$post['ctime']) }}                  
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">最后一次修改时间</label>
                                        <div class="am-u-sm-9">
                                            {{ date('Y-m-d H:i:s',$post['ltime']) }}                         
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">浏览量</label>
                                        <div class="am-u-sm-9">
                                            {{ $post['pvs'] }}                      
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">回复数量</label>
                                        <div class="am-u-sm-9">
                                            {{ $post['count'] }}                      
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">发帖人</label>
                                        <div class="am-u-sm-9">
                                            {{ $post['vname'] }}                      
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <a href="{{url('admin/posts')}}" class="am-btn am-btn-primary tpl-btn-bg-color-success ">返回上一页</a>
                                           
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


@endsection