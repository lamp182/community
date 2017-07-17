@extends('admin.layout.index')

@section('content')

<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">友情链接</div>
                                <div class="widget-function am-fr">
                                    
                                </div>
                            </div>
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
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-line-form" action="{{url('admin/link/add')}}" method="post">
                                {{ csrf_field() }}
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                                        <div class="am-u-sm-9">
                                            <input name="title" value="" type="text" class="tpl-form-input" id="user-name" placeholder="请输入标题文字">
                                            <small>请填写标题文字10-20字左右。</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">URL <span class="tpl-form-line-small-title">url</span></label>
                                        <div class="am-u-sm-9">
                                            <input name="url" value="" type="text" class="tpl-form-input" id="user-name" placeholder="请输入网站网址">
                                            <small>请填写网站网址。</small>
                                        </div>
                                    </div>
		
		<input type="hidden" name="ctime" value="{{ time() }}">

		
									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">截止日期 <span class="tpl-form-line-small-title">etime</span></label>
                                        <div class="am-u-sm-9">
                                             
                                             <select name="etime">
                                             	<option value="{{ strtotime('+3 month') }}">三个月</option>
                                             	<option value="{{ strtotime('+6 month') }}">半年</option>
                                             	<option value="{{ strtotime('+1 year') }}">一年</option>
                                             	<i class="am-selected-icon am-icon-caret-down"></i>
                                             </select>
                                        </div>
                                    </div>


                                    
                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">确认添加</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection