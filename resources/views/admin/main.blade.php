<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/lib/vector-map/jqvmap.min.css" >
    
    <link rel="stylesheet" href="assets/css/appme.css">
    <link rel="stylesheet" href="assets/css/angular-material.min.css">
   
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/ng-table.min.css">

    <style>
    .dropdown-menu a {
        margin-left: 15px;
        color: black;
        cursor: pointer;
        font-weight: 700;
    }

/** Editable table
------------------------- */

.editable-table > tbody > tr > td {
  padding: 4px
}
.editable-text {
  padding-left: 4px;
  padding-top: 4px;
  padding-bottom: 4px;
  display: inline-block;
}
.editable-table tbody > tr > td > .controls {
  //width: 100%
}
.editable-input {
  padding-left: 3px;
}
.editable-input.input-sm {
  height: 30px;
  font-size: 14px;
  padding-top: 4px;
  padding-bottom: 4px;
}
</style>
        
    
</head>
<body>
    

        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style=" ">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"> {{ Auth::user()->name }}</a>
                <a class="navbar-brand hidden" href="./"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" >
                    <li class="active">
                        <a href="{{URL::to('admin/index')}}"> <i class="menu-icon fa fa-dashboard"></i>Trang chủ </a>
                    </li>
                    <h3 class="menu-title">Dự án</h3><!-- /.menu-title -->
                    <li>
                        <a href="{{URL::to('admin/project')}}"> <i class="menu-icon ti-menu-alt"></i>Dự án </a>
                    </li>
                     <li>
                        <a href="{{URL::to('admin/category')}}"> <i class="menu-icon ti-list"></i>Danh mục </a>
                    </li>
                    <h3 class="menu-title">Quản lý người dùng</h3><!-- /.menu-title -->
                     <li>
                        <a href="{{URL::to('admin/user')}}"> <i class="menu-icon ti-envelope"></i>Người dùng </a>
                    </li>
                     <li>
                        <a href="{{URL::to('admin/comment')}}"> <i class="menu-icon ti-envelope"></i>Bình luận </a>
                    </li>

                     <h3 class="menu-title">Quản lý website</h3><!-- /.menu-title -->
                     <li>
                        <a href="{{URL::to('admin/extension')}}"> <i class="menu-icon ti-layout"></i>Quản lý tiện ích </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="/user"><i class="fa fa- user"></i>Trang cá nhân</a>

                                <!-- <a class="nav-link" href="/"><i class="fa fa -cog"></i>Cài đặt</a> -->

                                <a class="nav-link" href="/logout"><i class="fa fa-power -off"></i>Đăng xuất</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title" style="font-size:30px">
                        <h1>@yield('title_content')</h1>
                    </div>
                </div>
            </div>
        </div>
        
       <style>
.dataTables_filter{
  float: right;
}
.pull-right {
    float: right!important;
}
.btn-group{
    position: relative;
    display: inline-block;
    vertical-align: middle;
}
.pagination {
    /*display: inline-block;*/
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
}
.pagination>li {
    display: inline;
}

.pagination>li>a{
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.428571429;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}

.pagination>li:last-child>a{
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
}
.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.btn-group>.btn:first-child {
    margin-left: 0;
}
.btn:not([disabled]):not(.disabled).active, .btn:not([disabled]):not(.disabled):active {
    background-image: none;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
}
.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.btn:not([disabled]):not(.disabled) {
    cursor: pointer;
}
.btn-group>.btn, .btn-group-vertical>.btn {
    position: relative;
    float: left;
}
.btn-group .btn+.btn, .btn-group .btn+.btn-group, .btn-group .btn-group+.btn, .btn-group .btn-group+.btn-group {
    margin-left: -1px;
}
.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #428bca;
    border-color: #428bca;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.428571429;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
a {
    color: #428bca;
    text-decoration: none;
}
.btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
    color: #333;
    background-color: #ebebeb;
    border-color: #adadad;
}
.btn:active, .btn.active {
    background-image: none;
    outline: 0;
    -webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,0.125);
    box-shadow: inset 0 3px 5px rgba(0,0,0,0.125);
}
</style>
    
        <div class="content mt-3">
                 @yield('content')
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/angular.js"></script> 
    <script src="assets/js/ng-table.min.js"></script>
    <script src="assets/js/angular-animate.min.js"></script>
    <script src="assets/js/angular-aria.min.js"></script>
    <script src="assets/js/angular-messages.min.js"></script>
    <script src="assets/js/angular-route.min.js"></script>
    <script src="assets/js/angularjs-dropdown-multiselect.js"></script>
    <script src="assets/js/angular-material.min.js"></script>
    @yield('script')
    


</body>
</html>
