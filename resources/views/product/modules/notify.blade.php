<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-12 post-list">
                            @if(count($requests) == 0)
                                <div style="font-size:25px;">
                                    Bạn không có thông báo nào cả!
                                </div>
                            @endif
                            @foreach($requests as $req)
                                <div style="font-size: 25px;margin: 32px 0;">
                                    Dự án <a href="/project/{{$req->project->id}}">{{$req->project->name}}</a> có thành viên <a href="/user/{{$req->staff->id}}">{{$req->staff->name}}</a> (<a href="/user/{{$req->staff->id}}">{{$req->staff->email}}</a>) muốn nhận!
                                </div>
                            @endforeach
						</div>
					</div>
				</div>	
			</section>