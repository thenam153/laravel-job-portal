<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-12 post-list">
                            @if(count($projects) ==0) 
							<div style="font-size:25px;">
								Dự án của bạn hiện đang trống, click vào <a href="/index">đây</a> để đăng tìm bài mới
							</div>
							@endif
							@foreach($projects as $project)
							<div class="single-post d-flex flex-row">
								<div class="thumb" style="margin-right: 4em;">
									@if($project->file  == null)
									<img src="img/post.png" width="160" height="200" alt="{{$project->name}}" title="{{$project->name}}">
									@else
									<img src="{{$project->file}}" width="160" height="200" alt="{{$project->name}}" title="{{$project->name}}">
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
											<a href="/project/{{$project->id}}"><h4>{{$project->name}}</h4></a>
											<!-- <h6>Premium Labels Limited</h6>					 -->
										</div>
                                        @if($project->status == "accepted")
										<div style="font-size:16px;" >
                                            Trạng thái: <span style="color: #39bd39;font-weight: bold;">Đã nhận</span>
                                        </div>
                                        @elseif($project->status == "refused")
                                        <div style="font-size:16px;;">
                                            Trạng thái: <span style="color: red;font-weight: bold">Từ chối</span>
                                        </div>
                                        @else
                                        <div style="font-size:16px;;">
                                            Trạng thái: <span style="color: #e0a00e;font-weight: bold">Đang xử lý</span>
                                        </div>
                                        @endif
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
						</div>
					</div>
				</div>	
			</section>