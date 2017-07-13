@extends('admin.layout.index')
@section('content')
<form class="am-form tpl-form-border-form" action="{{url('admin/user/doupdate')}}"  method="post" id="root_form">
{{csrf_field()}}
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="am-u-sm-12">
            @if(session('errors'))
              <p>  {{session('errors')}}</p>
            @endif
  </div>
    <div class="am-form-group">
        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
            用户id
            <span class="tpl-form-line-small-title">
                id
            </span>
        </label>
        <div class="am-u-sm-12">
            <input type="text" class="tpl-form-input am-margin-top-xs" name="id" value="{{$data->id}}" >
            
        </div>
    </div>

    <div class="am-form-group">
        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
            邮箱
            <span class="tpl-form-line-small-title">
                email
            </span>
        </label>
        <div class="am-u-sm-12">
            <input type="text" class="tpl-form-input am-margin-top-xs" name="email" value="{{$data->email}}" >
           
        </div>
    </div>

    <div class="am-form-group">
        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">
            手机
            <span class="tpl-form-line-small-title">
                phone
            </span>
        </label>
        <div class="am-u-sm-12">
            <input type="text" class="tpl-form-input am-margin-top-xs" name="phone" value="{{$data->phone}}" >
           
        </div>
    </div>
    <div class="am-form-group">
        <div class="am-u-sm-12 am-u-sm-push-12">
            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success " id="button">
                修改
            </button>
        </div>
    </div>
</form>
@endsection