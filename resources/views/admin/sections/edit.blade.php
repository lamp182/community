@extends('admin.layout.index')
@section('content')

<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加模块</div>
                                @if(session('error'))
                                <div class="widget-title am-fl" style="margin:0px 0px 0pc 450px;color:red;">{{session('error')}}</div>
                                @endif
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">
                                <form action="{{url('admin/sections/'.$res['id'])}}" class="am-form tpl-form-border-form tpl-form-border-br" enctype="multipart/form-data"  id="art_form"  method="post">
                                    <input type="hidden" method="put" name="_method">
                                     <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">栏目 </label>
                                        <div class="am-u-sm-9">
                                            <select name="cid" data-am-selected="{searchBox: 1}" style="display: none;">
										@foreach($data as $k=>$v)
										
										  <option @if($v['id'] == $res['cid'])  selected  @endif value="{{ $v['id'] }}">{{ $v['name'] }}</option>
										
										@endforeach

										</select><div class="am-selected am-dropdown " id="am-selected-3dutl" data-am-dropdown=""> 

                                        </div>
                                    </div>
                                    </div>
									 {{ csrf_field() }}

                                  	   <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">板块名称 </label>
                                        <div class="am-u-sm-9">
                                            <input type="text" id="user-weibo" placeholder="请输入板块名" name="name" value="{{ $res['name'] }}">
                                           	<input type="hidden" name="_method" value="put">
                                            <div>

                                            </div>
                                        </div>
                                    </div>

                                       <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">板块描述 </label>
                                        <div class="am-u-sm-9">
                                            <input type="text" id="user-weibo" placeholder="请输入板块描述" name="characteristic" value="{{ $res['characteristic'] }}">
                                           
                                            <div>
											
                                            </div>
                                        </div>
                                    </div>
                                  
                              

                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">板块图片 </label>
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                    <img src="/{{ $res['icon'] }}" id="pic" alt="" style="width:240px;height:120px;">
                                                </div>
                                                <button type="button"  class="am-btn am-btn-danger am-btn-sm">
    											<i class="am-icon-cloud-upload"></i> 修改板块图片</button>
    											<input type="hidden" name="icon" id="art_thumb" style=style="width:120px;height:60px">
                                                <input type="file" name="file_upload" id="doc_form_file" value="">
                                                <!-- <input type="hidden" name="icon" id="icon" value=""> -->
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
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <!-- <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button> -->
                                            <input type="submit" id="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success" value="提交" >
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>





@endsection







