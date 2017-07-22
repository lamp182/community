@extends('home.layout.index')

@section('title', '发表帖子--'.$data['section'])
@section('contents')
<div id="wp" class="wp"> 
<!--    <link href="/home/css/showmessage.css" rel="stylesheet" type="text/css" />  -->
	<div id="pt" class="bm cl"> 
	   <div class="z">
	    <a href="./" class="nvhm" title="首页">17173有料社区</a> 
	    <em>›</em> 
	    <a href="">论坛</a> 
	    <em>›</em> 
	    <a href="">热门游戏</a> 
	    <em>›</em> 
	    <a href="">{{ $data['section'] }}</a> 
	    <em>›</em> 发表帖子 
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
	
	<form method="post" id="form" action="{{ url('home/post') }}" onsubmit=""> 
<!-- 	   <div id="ct" class="ct2_a ct2_a_r wp cl">  -->
	   {{ csrf_field() }}
	    <input type="hidden" name="ctime" id="posttime" value="{{ time() }}" /> 
	    <input type="hidden" name='sid' value="{{ $data['sid'] }}">
	    <input type="hidden" name='uid' value="{{ session('user')['id'] }}">
	    <div class="bm bw0 cl" id="editorbox"> 
	     <ul class="tb cl mbw"> 
	      <li class="a"><a href="javascript:;" onclick="switchpost('forum.php?mod=post&amp;action=newthread')">发表帖子</a></li>
	     </ul> 
	     <div id="draftlist_menu" style="display:none"> 
	      <ul class="xl xl1"> 
	       <li class="xi2"><a href="http://bbs.17173.com/forum.php?mod=guide&amp;view=my&amp;type=thread&amp;filter=save&amp;fid=0" target="_blank">查看所有草稿</a></li> 
	      </ul> 
	     </div> 
	     <div id="postbox"> 
	      <div class="pbt cl"> 
	       <div class="ftid"> 
	        <select name="tid" id="theme" style="width: 100px" selecti="0" >
	        	<option value="0">选择主题分类</option>
	        	@foreach($data['themes'] as $theme)
	        		<option value="{{ $theme['id'] }}">{{ $theme['name'] }}</option>
	        	@endforeach
	        </select>
	       </div> 
	       <div class="z"> 
	       
	        <span><input type="text" name="title" id="subject" class="px" value="" onblur="if($('tags')){relatekw('-1','-1');doane();}" onkeyup="strLenCalcBbs(this, 'checklen', 80);" style="width: 25em" tabindex="1" /></span> 
	        <span id="subjectchk">还可输入 <strong id="checklen">80</strong> 个字符</span> 
	        <script type="text/javascript">strLenCalc($('subject'), 'checklen', 80)</script> 
	       </div> 
	      </div> 
	      <!-- 加载编辑器的容器 -->
		    <script id="container" name="content" style="height:300px" type="text/plain"></script>
		    

	      <div class="mtm mbm pnpost"> 
	       <button type="submit" id="button" class="pn pnc"> <span>发表帖子</span> </button> 
	      </div> 
	     </div> 
	    </div> 
<!-- 	   </div>  -->
	  </form>
  </div>
  	<!-- 配置文件 -->
    <script type="text/javascript" src="/uediter/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/uediter/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
    
@endsection