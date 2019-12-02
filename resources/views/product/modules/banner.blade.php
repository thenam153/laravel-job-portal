<!-- start banner Area -->
<section class="banner-area relative" id="home" style="height:600px;">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								<span>1500+</span> Công việc được đăng				
							</h1>	
							<form action="/search" class="serach-form-area">
								<div class="row justify-content-center form-wrap">
									<div class="col-lg-7 form-cols">
										<input type="text" class="form-control" name="search" placeholder="Bạn đang tìm gì?">
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<select name="category">
												<option value="0">Tất cả danh mục</option>
												@foreach($categorys as $category)
													<option value="{{$category->id}}">{{$category->name}}</option>
												@endforeach
											</select>
										</div>										
									</div>
									<div class="col-lg-2 form-cols">
									    <button type="submit" class="btn btn-info">
									      <span class="lnr lnr-magnifier"></span> Tìm kiếm
									    </button>
									</div>								
								</div>
							</form>	
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	