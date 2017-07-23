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

                                <form class="am-form tpl-form-border-form" enctype="multipart/form-data" id="art_form" method="post" action="{{url('admin/web')}}">
                                {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$data['id']}}">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">标题 <span class="tpl-form-line-small-title">title</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" name="title" value="{{$data['title']}}">
                                            <small>请填写描述</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">描述 <span class="tpl-form-line-small-title">description</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" name="description" value="{{$data['description']}}">
                                            <small>请填写描述</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">banner <span class="tpl-form-line-small-title">banner</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" name="banner" value="{{$data['banner']}}">
                                            <small>请填写banner</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-12 am-form-label  am-text-left">logo <span class="tpl-form-line-small-title">Images</span></label>
                                        <div class="am-u-sm-12 am-margin-top-xs">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                    <img id="pic" src="/{{ trim($data['logo'], '/') }}" width="239px" height="70px" alt="">
                                                </div>
                                                <button type="button" class="am-btn am-btn-danger am-btn-sm ">
                                                <i class="am-icon-cloud-upload"></i> 添加Logo</button>
                                                <input type="hidden" name="logo" id="art_thumb" style="width:120px;height:60px" value="">
                                                <input type="file" name="file_upload" id="doc_form_file" value="">
                                            </div>

                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        $(function () {
                                            $("#doc_form_file").change(function () {

                                                uploadImage();
                                            });
                                        });

                                        function uploadImage() {
        //                            判断是否有选择上传文件
                                            var imgPath = $("#doc_form_file").val();
                                            if (imgPath == "") {
                                                alert("请选择上传图片！");
                                                return;
                                            }
                                            //判断上传文件的后缀名
                                            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                            if (strExtension != 'jpg' && strExtension != 'gif'
                                                && strExtension != 'png' && strExtension != 'bmp') {
                                                alert("请选择图片文件");
                                                return;
                                            }

                                            var formData = new FormData($('#art_form')[0]);       

                                            

                                            $.ajax({
                                                type: "post",
                                                url: "/admin/upload",
                                                data: formData,
                                                async: true,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                // console.log(formData);
                                                success: function(res) {
                                           // console.log(data);
                                           // alert(res);
                                                    $('#pic').attr('src','/'+res);
                                                    $('#pic').show();
                                                    $("#art_thumb").val(res);
                                                    // $('#icon').val(data);

                                                },
                                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                    alert("上传失败，请检查网络后重试");
                                                    // alert(errorThrown);
                                                }
                                            });
                                        }

                        

                                    </script>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">关键字 <span class="tpl-form-line-small-title">keywords</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" name="keywords" value="{{$data['keywords']}}">
                                            <small>请填写</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">作者 <span class="tpl-form-line-small-title">auther</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" name="auther" value="{{$data['auther']}}">
                                            <small>请填写</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">备案 <span class="tpl-form-line-small-title">records</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" name="records" value="{{$data['records']}}">
                                            <small>请填写</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">rights<span class="tpl-form-line-small-title">rights</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" name="rights" value="{{$data['rights']}}">
                                            <small>请填写</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">联系方式<span class="tpl-form-line-small-title">information</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" name="information" value="{{$data['information']}}">
                                            <small>请填写</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <div class="am-u-sm-12 am-u-sm-push-12">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">更换</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


@endsection