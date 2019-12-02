<!-- Start popular-post Area -->
<section class="popular-post-area pt-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="active-popular-post-carusel">
					@foreach($populars as $project)
					<div class="single-popular-post d-flex flex-row">
						<div class="thumb">
						@if(count($project->files) == 0)
						<img style="display: block;width: 160px;height: 200px;" src="img/post.png" alt="{{$project->name}}" title="{{$project->name}}">
						@else
						<img style="display: block;width: 160px;height: 200px;" src="{{$project->files[0]}}" alt="{{$project->name}}" title="{{$project->name}}">
						@endif
							<a class="btns text-uppercase" style="position: absolute;right: 16px;" href="/project/{{$project->id}}">Xem ngay</a>
						</div>
						<div class="details">
							<a href="/project/{{$project->id}}"><h4>{{$project->name}}</h4></a>
							<p>
								{{$project->content}}
							</p>
						</div>
					</div>	
					@endforeach
				</div>
			</div>
		</div>	
	</section>
			<!-- End popular-post Area -->