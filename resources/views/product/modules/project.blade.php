<section class="post-area section-gap">
				@if($run != null) 
				<div class="container" style="margin-bottom:24px; padding:12px;">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-12 post-list">
							<div class="single-post job-experience" >
								<h4 style="display:inline-block;" class="single-title">Bạn <a href="/user/{{$run->staff->id}}">{{$run->staff->name}}</a> đang thực hiện dự án</h4>
								<div style="display:inline-block;float:right;">
									<button class="genric-btn danger clickRefuse"  v-on:click="clickCancel('{{$run->id}}')">
										Hủy
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				<div class="container" style="margin-bottom:24px; padding:12px;">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-12 post-list">
						@if(count($requests) != 0)
							<div class="single-post job-experience" id="section-1-uv">
								<h4 class="single-title">Ứng cử viên</h4>
								<ul id="list-uv">
									@foreach($requests as $req)
										<li id="request-{{$req->id}}">
											<div style="margin: 24px 0;font-size:16px;">
												Thành viên <a href="">{{$req->staff->name}}</a> muốn nhận dự án của bạn
												<div style="display:inline-block;float:right;">
													<button class="genric-btn success clickAccept"  v-on:click="clickAccept('{{$req->id}}')">
														Xác nhận
													</button>
													<button class="genric-btn danger clickRefuse"  v-on:click="clickRefuse('{{$req->id}}')">
														Từ chối
													</button>
												</div>
											</div>
										</li>	
									@endforeach											
								</ul>
							</div>
						@endif
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
                            <div class="single-post d-flex flex-row">
								<div class="thumb" style="margin-right: 4em;">
                                    
                                    @if(!$project->showFile)
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
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
                                            <a href="/project/{{$project->id}}"><h4>{{$project->name}}</h4></a>
										</div>
										<ul class="btns" style="position:absolute;right:26px;">
											@if(Auth::check())
											<li><a href="javascript:void(0);" v-on:click="clickApply({{$project->id}})">Apply</a></li>
											@else
											<li><a href="/login">Apply</a></li>
											@endif
										</ul>
									</div>
									<p>
                                        {{$project->content}}
									</p>
									<h5>{{$project->nameCategory}}</h5>
									<p class="address"><span class="lnr lnr-database"></span> {{number_format($project->price)}} VNĐ</p>
								</div>
							</div>
                            <!-- php -->
							<div class="single-post job-details">
								<h4 class="single-title">Nội dung dự án</h4>
								<p>
									{{$project->content}}
								</p>
							</div>
							<div class="single-post job-experience">
								<h4 class="single-title">Các kỹ năng cần có</h4>
								<ul>	
                                    @foreach($project->skills as $skill)
                                        <li>
                                            <img src="img/pages/list.jpg" alt="">
                                            <span>{{$skill}}</span>
                                        </li>
									@endforeach																						
								</ul>
							</div>												
						</div>

						<div class="col-lg-4 sidebar">
                            <div class="single-slidebar">
								<h4>Công việc theo thể loại</h4>
								<ul class="cat-list">
									@foreach($categorys as $category)
									<li><a class="justify-content-between d-flex" href="category/{{$category->id}}"><p>{{$category->name}}</p><span>{{$category->quantily}}</span></a></li>
									@endforeach
								</ul>
							</div>

							<!-- <div class="single-slidebar">
								<h4>Top rated job posts</h4>
								<div class="active-relatedjob-carusel">
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<a href="single.html"><h4>Creative Art Designer</h4></a>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<a href="single.html"><h4>Creative Art Designer</h4></a>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<a href="single.html"><h4>Creative Art Designer</h4></a>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>																		
								</div>
							</div>							

							<div class="single-slidebar">
								<h4>Jobs by Category</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="category.html"><p>Technology</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Media & News</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Goverment</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Medical</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Restaurants</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Developer</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Accounting</p><span>17</span></a></li>
								</ul>
							</div>

							<div class="single-slidebar">
								<h4>Carrer Advice Blog</h4>
								<div class="blog-list">
									<div class="single-blog " style="background:#000 url(img/blog1.jpg);">
										<a href="single.html"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>
									<div class="single-blog " style="background:#000 url(img/blog2.jpg);">
										<a href="single.html"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>
									<div class="single-blog " style="background:#000 url(img/blog1.jpg);">
										<a href="single.html"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>																		
								</div>
							</div>							 -->
						</div>
					</div>
				</div>	
			</section>
			<section class="comment-sec-area pt-60 pb-60">
				<div class="container">
					<div class="row flex-column">
						<h5 class="text-uppercase pb-20"><span v-text="commentLength"></span> Binh luận</h5>
						<div class="container" style="margin: 20px 0;padding:0;">
							<textarea class="single-textarea" v-model="message" placeholder="Bình luận" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
							@if(Auth::check())
							<div class="reply-btn" style="width:132px;margin: 10px 0;cursor: pointer;" v-on:click="postMessage('{{$project->id}}')">
								<span class="btn-reply text-uppercase">Bình luận</span> 
							</div>
							@else
							<div class="reply-btn" style="width:132px;margin: 10px 0;cursor: pointer;">
								<a href="/login" class="btn-reply text-uppercase">Bình luận</a> 
							</div>
							@endif
						</div>
						
						<div class="comment-list" v-for="cm in comments">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="/" alt="">
									</div>
									<div class="desc">
										<h5><a href="/" v-text="cm.name">
											<!-- name -->
										</a></h5>
										<p class="date" v-text="cm.updated_at"></p>
										<p class="comment" v-text="cm.content">
											<!-- Never say goodbye till the end comes! -->
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="comment-list left-padding">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="img/blog/c2.jpg" alt="">
									</div>
									<div class="desc">
										<h5><a href="#">Emilly Blunt</a></h5>
										<p class="date">December 4, 2017 at 3:12 pm </p>
										<p class="comment">
											Never say goodbye till the end comes!
										</p>
									</div>
								</div>
								<div class="reply-btn">
										<a href="" class="btn-reply text-uppercase">reply</a> 
								</div>
							</div>
						</div> -->	                                                                                                                                                                
					</div>
				</div>    
			</section>