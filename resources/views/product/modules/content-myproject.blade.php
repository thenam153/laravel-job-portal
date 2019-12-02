<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-12 post-list">
							@foreach($myprojects as $project)
							<div class="single-post d-flex flex-row">
								<div class="thumb" style="margin-right: 4em;">
									@if(count($project->files) == 0)
									<img src="img/post.png" width="160" height="200" alt="{{$project->name}}" title="{{$project->name}}">
									@else
									<img src="{{$project->files[0]}}" width="160" height="200" alt="{{$project->name}}" title="{{$project->name}}">
									@endif
									<ul class="tags" style="width:160px;">
										@foreach($project->skills as $skill)
										<li>
											<a href="javascript:void(0)">{{$skill}}</a>
										</li>
										@endforeach
									</ul>
								</div>
								<div class="details" style="width: 100%;">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>{{$project->name}}</h4></a>
											<!-- <h6>Premium Labels Limited</h6>					 -->
										</div>
										<ul class="btns">
											<li style="position: absolute;right: 10px;padding: 0px;">
												<a style="padding: 10px 15px;display: block;background: #fff;border: 1px solid #eee;color: black;" onmouseover="this.style.background='#49e4fa'" onmouseout="this.style.background='#fff'" href="/myproject/delete/{{$project->id}}">
													<span class="fa fa-times-circle"></span>
												</a>
											</li>
										</ul>
									</div>
									<p>
										{{$project->content}}
									</p>
									<h5>{{$project->nameCategory}}</h5>
									<!-- <p class="address"><span class="lnr lnr-map"></span> </p> -->
									<p class="address"><span class="lnr lnr-database"></span> {{number_format($project->price)}} VNĐ</p>
								</div>
							</div>
							@endforeach
							<!-- <a class="text-uppercase loadmore-btn mx-auto d-block" href="category.html">Load More job Posts</a> -->

						</div>
					</div>
				</div>	
			</section>