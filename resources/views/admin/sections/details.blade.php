@extends('admin.layout.index')
@section('content')


<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">{{$section['name']}}板块详细信息</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">
                                <form class="am-form tpl-form-line-form">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">板块名称</label>
                                        <div class="am-u-sm-9">
                                            {{ $section['name'] }}               
                                        </div>
                                    </div>

	                                <div class="am-form-group">
	                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图</label>
	                                        <div class="am-u-sm-9">
	                                            <div class="am-form-group am-form-file">
	                                                <div class="tpl-form-file-img">
	                                                    <img src="/{{ trim($section['icon'], '/') }}" alt="" style="width:240px;height:120px;">
	                                                </div>
	                  
	                                            </div>

	                                        </div>
	                                </div>

	                                 <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">所属栏目名称</label>
                                        <div class="am-u-sm-9">
                                            {{ $section['cname'] }}                  
                                        </div>
                                    </div>

                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">浏览量</label>
                                        <div class="am-u-sm-9">
                                            {{ $section['pvs'] }}                  
                                        </div>
                                    </div>

                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">板块描述</label>
                                        <div class="am-u-sm-9">
                                            {{ $section['characteristic'] }}                  
                                        </div>
                                    </div>

                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">
                                        	板块主题
                                        </label>
                                        <div class="am-u-sm-9">
                                            @foreach($themes as $theme)
                                            	<span><a href="#">{{ $theme['name'] }}</a></span>
                                            @endforeach                 
                                        </div>
                                    </div>
                                    
                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">
                                        	添加主题
                                        </label>
                                        <div class="am-u-sm-9">
                                        	<input id="section_id" type="hidden" value="{{ $section['id'] }}" />
                                            <input id="theme_id" style="float: left; border: solid 1px #aaa; width: 150px;" type='text' name='name' />
                                            <button style="border: 0; height: 32px; float: left; margin-left: 10px;" type="button" onclick="addTheme()">提交</button>
                                            <script type="text/javascript">
												function addTheme() {
													var sid = $('#section_id').val();
													var theme = $('#theme_id').val();

													//询问框
										            layer.confirm('是否确认添加？', {
										                btn: ['确定','取消'] //按钮
										            }, function(){
										                // '_method':'post'提交方式
										                $.get('/admin/theme/add?sid='+sid+'&name='+theme, function(data){
										                if(data.status == 0){
										                    location.href = location.href;
										                    layer.msg(data.msg, {icon: 6});
										                }else{
										                    location.href = location.href;
										                    layer.msg(data.msg, {icon: 5});
										                }
										                });


										            }, function(){

										            });
												}
                                            </script>               
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">创建时间</label>
                                        <div class="am-u-sm-9">
                                            {{ date('Y-m-d H:i:s',$section['ctime']) }}                  
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">最后一次修改时间</label>
                                        <div class="am-u-sm-9">
                                            {{ date('Y-m-d H:i:s',$section['ltime']) }}                         
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <a href="{{url('admin/sections')}}" class="am-btn am-btn-primary tpl-btn-bg-color-success ">返回上一页</a>
                                            <a href="{{url('admin/sections/'.$section['id']).'/edit'}}" class="am-btn am-btn-primary tpl-btn-bg-color-success ">修改板块信息</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>








@endsection