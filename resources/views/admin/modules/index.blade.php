<div class="card col-lg-3 col-md-6 no-padding no-shadow">
	<div class="card-body bg-flat-color-3">
		<div class="h1 text-right mb-4">
			<i class="fa fa-cart-plus text-light"></i>
		</div>
		<div class="h4 mb-0 text-light">
			<span class="count">{{$project}}</span>
		</div>
		<small class="text-light text-uppercase font-weight-bold">Dự án</small>
		<div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
	</div>
</div>
<div class="card col-lg-3 col-md-6 no-padding no-shadow">
	<div class="card-body bg-flat-color-2">
		<div class="h1 text-muted text-right mb-4">
			<i class="fa fa-user-plus text-light"></i>
		</div>
		<div class="h4 mb-0 text-light">
			<span class="count">{{$user}}</span>
		</div>
		<small class="text-uppercase font-weight-bold text-light">Người dùng</small>
		<div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
	</div>
</div>
<div class="card col-lg-3 col-md-6 no-padding no-shadow">
	<div class="card-body bg-flat-color-2" style="    background: #606f73;">
		<div class="h1 text-muted text-right mb-4">
			<!-- <i class="fa fa-user-plus text-light"></i> -->
			<i class="fa fa-pie-chart"></i>
		</div>
		<div class="h4 mb-0 text-light">
			<span class="count">{{$email}}</span>
		</div>
		<small class="text-uppercase font-weight-bold text-light">Email đăng ký</small>
		<div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
	</div>
</div>
<div class="card col-lg-3 col-md-6 no-padding no-shadow">
	<div class="card-body bg-flat-color-1">
		<div class="h1 text-light text-right mb-4">
			<i class="fa fa-comments-o"></i>
		</div>
		<div class="h4 mb-0 text-light">
			<span class="count">{{$comment}}</span>
		</div>
		<small class="text-light text-uppercase font-weight-bold">Bình luận</small>
		<div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
	</div>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Dự án mới </h4>
            <canvas id="team-chart"></canvas>
        </div>
    </div>
</div>
<div class="col-lg-6">
	<div class="card">
	    <div class="card-body">
	        <h4 class="mb-3">Bình luận </h4>
	        <canvas id="lineChart"></canvas>
	    </div>
	</div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Người dùng </h4>
            <canvas id="singelBarChart"></canvas>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Dự án theo danh mục </h4>
            <canvas id="pieChart"></canvas>
        </div>
    </div>
</div>