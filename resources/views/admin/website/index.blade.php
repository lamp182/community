@extends('admin.layout.index')
@section('content')
<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">网站配置</div>
                                <div class="widget-function am-fr">
                                    
                                </div>
                            </div>
                            <div class="widget-body am-fr">

                            <form class="am-form tpl-form-border-form" action="{{url('admin/web/create')}}" method="get">
                                   <input type="hidden" name="id" value="{{$data->id}}">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">标题 <span class="tpl-form-line-small-title">Title</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" name="title" class="tpl-form-input am-margin-top-xs" id="user-name" value="{{ $data->title }}" readonly="">
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">描述 <span class="tpl-form-line-small-title">description</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" name="description" class="tpl-form-input am-margin-top-xs" id="user-name" value="{{ $data->description }}" readonly="">
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">banner <span class="tpl-form-line-small-title">banner</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" name="banner" class="tpl-form-input am-margin-top-xs" id="user-name" value="{{ $data->banner }}" readonly="">
                                            
                                        </div>
                                    </div>
                                   <input type="hidden" name="logo" value="{{$data->logo}}">
                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-12 am-form-label  am-text-left">logo <span class="tpl-form-line-small-title">Images</span></label>
                                        <div class="am-u-sm-12 am-margin-top-xs">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                    <img src="/{{ trim($data->logo, '/') }}" width="239px" height="70px" alt="">
                                                </div>
                                               
                                                
                                            </div>

                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">关键字 <span class="tpl-form-line-small-title">keywords</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" name="keywords" class="tpl-form-input am-margin-top-xs" id="user-name" value="{{ $data->keywords }}" readonly="">
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">作者 <span class="tpl-form-line-small-title">auther</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" name="auther" class="tpl-form-input am-margin-top-xs" id="user-name" value="{{ $data->auther }}" readonly="">
                                           
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">备案 <span class="tpl-form-line-small-title">records</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" name="records" class="tpl-form-input am-margin-top-xs" id="user-name" value="{{ $data->records }}" readonly="">
                                        
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">rights<span class="tpl-form-line-small-title">rights</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" name="rights" class="tpl-form-input am-margin-top-xs" id="user-name" value="{{ $data->rights }}" readonly="">
                                         
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">联系方式<span class="tpl-form-line-small-title">information</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" name="information" class="tpl-form-input am-margin-top-xs" id="user-name" value="{{ $data->information }}" readonly="">
                                         
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <div class="am-u-sm-12 am-u-sm-push-12">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">修改配置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

   

@endsection