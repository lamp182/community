@extends('admin.layout.index')
@section('content')
	<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">用户详情</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body  widget-body-lg am-fr">

                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                        <tr>
                                            <th>用户id</th>
                                            <th>用户名</th>
                                            <th>年龄</th>
                                            <th>性别</th>
                                            <th>地址</th>
                                            <th>头像</th>
                                            <th>状态</th>
                                            <th>注册时间</th>
                                            <th>最后登录时间</th>
                                            <th>VIP</th>
                                            <th>积分</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr class="even gradeC">
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->username}}</td>
                                            <td>{{$data->age}}</td>
                                            <td>{{$data->sex}}</td>
                                            <td>{{$data->address}}</td>
                                            <td>{{$data->faceico}}</td>
                                            <td>{{$data->status}}</td>
                                            <td>{{$res->vip}}</td>
                                            <td>{{$res->score}}</td>
                                            <td>{{$data->ctime}}</td>
                                            <td>{{$data->ltime}}</td>
                                            
                                        </tr>
										
                                        <!-- more data -->
                                        
                                    </tbody>

                                </table>
									<div class="tpl-table-black-operation" style="float:right">
                                            <a href="{{url('admin/user/index')}}">
                                                <i class="am-icon-exchange am-btn-xl"></i> 返回
                                            </a>
                                    </div>
                            </div>
                        </div>
                    </div>
@endsection