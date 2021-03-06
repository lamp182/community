<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ Config::get('app.title') }}</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="{{asset('admin/assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('admin/assets/i/app-icon72x72@2x.png')}}">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script src="{{asset('admin/assets/js/echarts.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('admin/assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
    <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
    <!-- // <script src="{{asset('admin/assets/js/img123.js')}}"></script> -->


</head>

<body data-type="index">
<script src="{{asset('admin/assets/js/theme.js')}}"></script>
<div class="am-g tpl-g">
    <!-- 头部 -->
    <header>
        <!-- logo -->
        <div class="am-fl tpl-header-logo">
            <a href="javascript:;"><img src="{{asset('admin/assets/img/logo.png')}}" alt=""></a>
        </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">

                
                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <a href="javascript:;">欢迎你, <span>{{ session('admin')['name'] }}</span> </a>
                        </li>

                       

                        <!-- 退出 -->
                        <li class="am-text-sm">
                           <a href="{{ url('admin/login/quit') }}">
                                <span class="am-icon-sign-out">退出</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </header>
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>
        <!-- 侧边导航栏 -->
        <div class="left-sidebar">


       		  <div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable">
                    <div class="tpl-user-panel-profile-picture">
                        <img src="/{{ trim(session('admin')['faceico'], '/') }}" alt="">
                    </div>
                    <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              {{ session('admin')['name'] }}
          </span>
                    <!-- <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a> -->
                </div>
            </div>

            <!-- 菜单 -->
            <ul class="sidebar-nav">
                
                <li class="sidebar-nav-link">
                    <a href="{{url('admin/index')}}">
                        <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
                    </a>
                </li>
                
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 栏目管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/columns/add')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加栏目
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/columns/index')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 栏目列表
                            </a>
                        </li>
                    </ul>
                </li>
                
                 <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 板块管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/sections/create')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加板块
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/sections')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 板块列表
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="{{url('admin/posts')}}">
                        <i class="am-icon-bar-chart sidebar-nav-link-logo"></i> 帖子管理

                    </a>
                </li>
                 <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 后台用户管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/root/add')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 管理员添加
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/root/index')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 管理员列表
                            </a>
                        </li>
                    </ul>
                </li>
                
                 <li class="sidebar-nav-link">
                    <a href="{{url('admin/user/index')}}">
                        <i class="am-icon-bar-chart sidebar-nav-link-logo"></i> 前台用户管理

                    </a>
                </li>

               
                 <li class="sidebar-nav-link">
                    <a href="{{url('admin/web')}}">
                        <i class="am-icon-bar-chart sidebar-nav-link-logo"></i> 网站信息管理

                    </a>
                </li>

                 <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 申请信息管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/moderators')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 版主申请
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/adverts')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 广告申请
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/link')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 友情链接申请
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{url('admin/carousel')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 轮播图
                            </a>
                        </li>
                    </ul>
                </li>


             
            </ul>
        </div>


        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
		@section('content')


          

		@show
        </div>
    </div>
    </div>
<script src="{{asset('admin/assets/js/amazeui.min.js')}}"></script>
<script src="{{asset('admin/assets/js/amazeui.datatables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.js')}}"></script>


</body>

</html>
