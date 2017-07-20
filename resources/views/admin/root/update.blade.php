@extends('admin.layout.index')

@section('content')


 
<form class="am-form tpl-form-border-form" action="{{url('admin/root/doupdate')}}"  method="post" id="root_form">
{{csrf_field()}}
    <input type="hidden" name="id" value="{{ $data->id }}">
  <div class="am-u-sm-12">
            @if(session('errors'))
              <p>  {{session('errors')}}</p>
            @endif
  </div>
    <div class="am-form-group">
        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
            管理员名
            <span class="tpl-form-line-small-title">
                Name
            </span>
        </label>
        <div class="am-u-sm-12">
            <input type="text" class="tpl-form-input am-margin-top-xs" name="name" value="{{$data->name}}" 
            placeholder="请输入用户名">
            
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
            <input type="text" class="tpl-form-input am-margin-top-xs" name="realname" value="{{$data->realname}}" 
            placeholder="请输入真实姓名">
           
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
            <input type="text" class="tpl-form-input am-margin-top-xs" name="cid" id="root_cid"  value="{{$data->cid}}" 
            placeholder="请输入身份证号码">
           
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
            <input type="text" class="tpl-form-input am-margin-top-xs" name="phone" value="{{$data->phone}}" 
            placeholder="请输入手机号码">
           
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
            <input type="text" class="tpl-form-input am-margin-top-xs" name="email" value="{{$data->email}}" 
            placeholder="请输入邮箱">
           
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
                    <img src="/{{$data->faceico}}"  name="pic" id="pic" width="100px" height="100px" alt="">
                </div>
                <button type="button" class="am-btn am-btn-danger am-btn-sm ">
                    <i class="am-icon-cloud-upload">
                    </i>
                    修改
                </button>
                <input type="hidden" name="faceico" id="art_thumb" style="width:120px;height:60px" value="">
                <input type="file" name="file_upload" id="doc_form_file" value="">
            </div>
        </div>
    </div>

    <!-- <tr>
        <th></th>
         <td>
            <img src="" alt="" name="pic" id="pic" style="width:100px;display:none;" >
         </td>
    </tr>
     -->
    <div class="am-form-group">
        <div class="am-u-sm-12 am-u-sm-push-12">
            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success " id="button">
                提交
            </button>
        </div>
    </div>


    <script type="text/javascript">
    $(function() {
                $("#doc_form_file").change(function() {
                    uploadImage();
                });
            });

            function uploadImage() {
                //                            判断是否有选择上传文件
                var imgPath = $("#doc_form_file").val();
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
                    type: "post",
                    url: "/admin/root/upload",
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                     success: function(res) {
                       // console.log(data);
                       // alert(res);
                                $('#pic').attr('src','/'+res);
                                $('#pic').show();
                                $("#art_thumb").val(res);
                                // $('#icon').val(data);

                            },
                    // alert('2345');
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }
    </script>


</form>





    @endsection