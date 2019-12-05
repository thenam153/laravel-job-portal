<header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index">Trang chủ</a></li>
				          <li><a href="category">Danh mục</a></li>
				          <li><a href="postproject">Đăng bài</a></li>
				          <li><a href="myproject">Dự án của tôi</a></li>
						  <li class="menu-has-children"><a href="javascript:void(0)"><span class="fa fa-bell-o" v-text="requests"></span></a>
						  	<ul>
								<li><a id="change1" href="javascript:void(0)"> Người tuyển dụng </a></li>
				            </ul>
						</li>
						  @if(Auth::check())
						  <li><a class="ticker-btn" href="/user">{{Auth::user()->name}}</a></li>		          				          
				          <li><a class="ticker-btn" href="/logout">Đăng xuất</a></li>		          				          
						  @else
						  <li><a class="ticker-btn" href="/register">Đăng ký</a></li>
				          <li><a class="ticker-btn" href="/login">Đăng nhập</a></li>
						  @endif
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			</header>