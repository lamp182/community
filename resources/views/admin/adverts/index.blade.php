@extends('admin.layout.index')

@section('content')

<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">广告申请</div>
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

                                <form class="am-form tpl-form-line-form" enctype="multipart/form-data" action="{{url('admin/adverts')}}" id="art_form" methid="art_form" method="post">
                                {{ csrf_field() }}
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">URL地址 <span class="tpl-form-line-small-title">url</span></label>
                                        <div class="am-u-sm-9">
                                            <input name="url" value="" type="text" class="tpl-form-input" id="user-name" placeholder="请输入URL地址">
                                            <small>请输入URL地址。</small>
                                        </div>
                                    </div>

                                    <input type="hidden" name="ctime" value="{{ time() }}">

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">广告名 <span class="tpl-form-line-small-title">url</span></label>
                                        <div class="am-u-sm-9">
                                            <input name="name" value="" type="text" class="tpl-form-input" id="user-name" placeholder="请输入广告名">
                                            <small>请输入广告名。</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group" style="margin-left:135px">
                                        <label for="user-weibo" class="am-u-sm-12 am-form-label  am-text-left">picture <span class="tpl-form-line-small-title">Images</span></label>
                                        <div class="am-u-sm-12 am-margin-top-xs">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                    <img id="pic" src="" width="100px" height="100px" style="display:none" alt="">
                                                </div>
                                                <button type="button" class="am-btn am-btn-danger am-btn-sm ">
                                                <i class="am-icon-cloud-upload"></i> 添加picture</button>
                                                <input type="hidden" name="picture" id="art_thumb" style="width:120px;height:60px" value="">
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