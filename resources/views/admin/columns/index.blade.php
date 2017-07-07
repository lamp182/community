@extends('admin.layout.index')
@section('content')


	<div class="widget-body  widget-body-lg am-fr">
		<table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
			<thead>
				<tr>
					<th>栏目ID</th>
					<th>栏目名称</th>
					<th>创建时间</th>
					<th>最后一次修改时间</th>
					<th>操作</th>
				</tr>
			</thead>
		<tbody>
			@foreach($data as $k=>$v)
				<tr class="gradeX">
					<td>{{ $v->id }}</td>
					<td>{{ $v->name }}</td>
					<td>{{ date('Y-m-d H:i:s',$v->ctime) }}</td>
					<td>{{ date('Y-m-d H:i:s',$v->ltime) }}</td>
					<td>
						<div class="tpl-table-black-operation">
						<a href="edit/{{ $v->id }}/{{ $v->name }}">
						<i class="am-icon-pencil"></i> 编辑
						</a>
						<a  href="javascript:;" onclick="shan({{$v->id}})" class="tpl-table-black-operation-del">
						<i class="am-icon-trash"></i> 删除
						</a>
						</div>
					</td>
				</tr>
			@endforeach
		<!-- more data -->
		</tbody>
			
		</table>
		<div class="am-u-lg-12 am-cf">
            <div class="am-fr">
                <ul class="am-pagination tpl-pagination">
                  
                    {!! $data->render() !!}
                    
                </ul>
            </div>
            <style>
				.am-pagination ul li{
					float: left;
					font-size: 15px;
                    padding: 0px 5px;
				}
            </style>
        </div>
			
	</div>

	<script>
		
			function shan(id){
				$.get("{{url('admin/columns/del')}}",{'id':id},function(msg){
					if(msg == 1){
						alert('删除成功');
						location.href = "{{url('admin/columns/index')}}"
					}
				});
			}

			// shan();
	</script>



    @endsection