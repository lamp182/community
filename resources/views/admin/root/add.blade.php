@extends('admin.layout.index')

@section('content')

<form class="am-form tpl-form-border-form" action="{{url('admin/root/doadd')}}"method="post" id="root_form">
    {{csrf_field()}}
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
        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                管理员名
                <span class="tpl-form-line-small-title">
                    Name
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="text" class="tpl-form-input am-margin-top-xs" name="name"
                value="" placeholder="请输入用户名">
                <small>
                    请填写用户名
                </small>
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                密码
                <span class="tpl-form-line-small-title">
                    Pass
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="text" class="tpl-form-input am-margin-top-xs" name="password"
                value="" placeholder="请输入密码">
                <small>
                    请输入密码
                </small>
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                真实姓名
                <span class="tpl-form-line-small-title">
                    Relname
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="text" class="tpl-form-input am-margin-top-xs" name="realname"
                value="" placeholder="请输入真实姓名">
                <small>
                    请输入真实姓名
                </small>
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                身份证号
                <span class="tpl-form-line-small-title">
                    Cid
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="text" class="tpl-form-input am-margin-top-xs" name="cid"
                id="root_cid" value="" placeholder="请输入身份证号码">
                <small>
                    请输入身份证号码
                </small>
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                手机号码
                <span class="tpl-form-line-small-title">
                    Phone
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="text" class="tpl-form-input am-margin-top-xs" name="phone"
                value="" placeholder="请输入手机号码">
                <small>
                    请输入手机号码
                </small>
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
                电子邮箱
                <span class="tpl-form-line-small-title">
                    Email
                </span>
            </label>
            <div class="am-u-sm-12">
                <input type="text" class="tpl-form-input am-margin-top-xs" name="email"
                value="" placeholder="请输入邮箱">
                <small>
                    请输入邮箱
                </small>
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-weibo" class="am-u-sm-12 am-form-label  am-text-left">
                头像
                <span class="tpl-form-line-small-title">
                    Faceico
                </span>
            </label>
            <div class="am-u-sm-12 am-margin-top-xs">
                <div class="am-form-group am-form-file">

                    <div class="tpl-form-file-img">
                        <img src="" id="img0">
                    </div>

                    <button type="button" class="am-btn am-btn-danger am-btn-sm ">
                        <i class="am-icon-cloud-upload">
                        </i>
                        添加
                    </button>
                    <input id="file0" type="file" multiple="" value="">
                </div>
            </div>
        </div>
        <tr>
            <th>
            </th>
            <td>
                <img src="" alt="" name="pic" id="pic" style="width:100px;display:none;">
            </td>
        </tr>
        <div class="am-form-group">
            <div class="am-u-sm-12 am-u-sm-push-12">
            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success id='button' ">
                提交
            </button>
            </div>
        </div>
        <!--
        <script type="text/javascript">
            $(function() {
                $("#file_upload").change(function() {
                    uploadImage();
                });
            });

            function uploadImage() {
                //                            判断是否有选择上传文件
                var imgPath = $("#file_upload").val();
                // alert(imgPath);
                if (imgPath == "") {
                    alert("请选择上传图片！");
                    return;
                }
                //判断上传文件的后缀名
                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                if (strExtension != 'jpg' && strExtension != 'gif' && strExtension != 'png' && strExtension != 'bmp') {
                    alert("请选择图片文件");
                    return;
                }

                var formData = new FormData($('#root_form')[0]);
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "/admin/root/upload",
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        //                                    console.log(data);
                        //                                    alert("上传成功");
                        $('#pic').attr('src', '{{env('QINIU_DOMAIN ')}}' + data);
                        $('#pic').show();
                        $('#doc-form-file').val(data);

                    },
                    // alert('2345');
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }
        </script>
        -->
</form>





    @endsection