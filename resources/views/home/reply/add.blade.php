@extends('home.layout.index')

@section('title', '回复留言--')
@section('contents')
<div id="wp" class="wp"> 
<!--    <link href="/home/css/showmessage.css" rel="stylesheet" type="text/css" />  -->
	<div id="pt" class="bm cl"> 
	   <div class="z">
	    <a href="{{ url() }}" class="nvhm" title="首页">17173有料社区</a> 
	    <em>›</em> 
	    <a href="{{ url('?column='.$column -> id) }}">{{ $column -> name }}</a> 
	    <em>›</em> 
	    <a href="{{ url('home/section?id='.$section -> id) }}">{{ $section -> name }}</a>
	    <em>›</em> 
	    <a href="{{ url('home/post/'.$post -> id) }}">{{ $post -> title }}</a> 
	    <em>›</em> 
	    <a href="{{ url('home/post/'.$post.'#reply_'.$reply -> id) }}">回复留言</a>
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
	
	<form method="post" id="form" action="{{ url('home/reply') }}" onsubmit=""> 
	   
	    <div class="bm bw0 cl" id="editorbox"> 
	     <ul> 
	      <li style="font-size: 16px; height: 32px; line-height: 32px; background: white; margin: 10px 0;">
	      	<h3>
	      		&nbsp;回复&nbsp;<a href="{{ url('home/user/'.$reply['user'] -> uid) }}">{{ $reply['user'] -> username }}</a>&nbsp;发表于&nbsp;{{ date('Y-m-d H:i:s', $reply -> ctime) }}&nbsp;的留言:
	      	</h3>
	      </li>
	      <li>
	      	<div style="width: 100%; background: white; margin: 10px 0;">{!! $reply -> content !!}</div>
	      </li>
	     </ul> 
	     <div id="postbox"> 
	      	<!-- 加载编辑器的容器 -->
		    <script id="container" name="content" style="width: 1220px; height:300px" type="text/plain"></script>
		    {{ csrf_field() }}
	    	<input type="hidden" name="ctime" value="{{ time() }}" /> 
	    	<input type="hidden" name="rid" value="{{ $reply -> id }}" /> 
	    	<input type="hidden" name='uid' value="{{ session('user')['id'] }}">
	    	<input type="hidden" name='pid' value="{{ $reply -> pid }}">
	    	<input type="hidden" name='fid' value="{{ $fid }}">
	      <div class="mtm mbm pnpost"> 
	       <button type="submit" id="button" class="pn pnc"> <span>回复</span> </button> 
	      </div> 
	     </div> 
	    </div> 
	  </form>
  </div>
  	<!-- 配置文件 -->
    <script type="text/javascript" src="/uediter/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/uediter/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {toolbars: [
        	 [
            	'fullscreen', 'source', 'undo', 'redo', 'bold', 'italic', 'underline',
           	 	'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 
           	 	'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 
           	 	'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc'
          	 ]
		]});
    </script>
    
@endsection