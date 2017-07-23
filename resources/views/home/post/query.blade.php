@extends('home.layout.index')

@section('contents')
<div style="width: 98%; margin:0px auto;">
	<div style='font-size: 16px; background: white; margin-top: 10px;'><h2>与<span style="color: red">{{ $query }}</span>相关的帖子共有：{{ count($posts) }}个</h2></div>
	<div>
		<ul>
			@if(count($posts) > 0)
			@foreach($posts as $post)
			<li class="pbw" style="background: #fff; margin: 10px 0;">
				<h3 class="xs3">
				<a href="{{ url('home/post/'.$post['id']) }}" target="_blank">{{ $post['title'] }}</a>
				</h3>
				<p class="xg1">&nbsp;&nbsp;{{ $post['replies'] }} 个回复 - {{ $post['pvs'] }} 次查看</p>
				<p><strong><font color="#ff0000"></p>
				<p>
				<span>{{ date('Y-m-d H:i:s',$post['last']['ctime']) }}</span>
				 -
				<span>
				<a href="{{ url('home/user/'.$post['user']['uid']) }}" target="_blank">{{ $post['user']['username'] }}</a>
				</span>
				 -
				<span><a href="{{ url('home/section?id='.$post['section']['id']) }}" target="_blank" class="xi1">{{ $post['section']['name'] }}</a></span>
				</p>
			</li>
			@endforeach
			@endif
			@if($posts -> appends(['query' => $query]) -> render() != null)
			<li class="pbw" style="background: #fff; margin: 10px 0;">
				<div class="pg" style="margin-bottom: 10px; background: white; height: 20px;">
					{!! $posts -> appends(['query' => $query]) -> render() !!}
					<style>
						.pagination li {
							float: left;
							font-size: 14px;
						}
					</style>
				</div>
			</li>
			@endif
		</ul>
	</div>
</div>
@endsection