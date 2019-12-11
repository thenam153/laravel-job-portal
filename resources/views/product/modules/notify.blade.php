<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-12 post-list">
                            @if(count($notifys) == 0)
                                <div style="font-size:25px;">
                                    Bạn không có thông báo nào cả!
                                </div>
                            @endif
                            @foreach($notifys as $req)
                                @switch($req->content)
                                @case(1)
                                    <div style="font-size: 25px;margin: 32px 0;">
                                        Dự án <a href="/project/{{$req->project->id}}">{{$req->project->name}}</a> có thành viên <a href="/user/{{$req->staff->id}}">{{$req->staff->name}}</a> (<a href="/user/{{$req->staff->id}}">{{$req->staff->email}}</a>) muốn nhận!
                                        @if(!$req->seen)
                                        <span style="color:red;">NEW</span>
                                        @endif
                                    </div> 
                                    @break
                                @case(2)
                                    <div style="font-size: 25px;margin: 32px 0;">
                                        Bạn đã ứng cử dự án <a href="/project/{{$req->project->id}}">{{$req->project->name}}</a> của <a href="/user/{{$req->staff->id}}">{{$req->staff->name}}</a> (<a href="/user/{{$req->staff->id}}">{{$req->staff->email}}</a>
                                        @if(!$req->seen)
                                        <span style="color:red;">NEW</span>
                                        @endif
                                    </div>
                                    @break
                                @case(3)
                                    <div style="font-size: 25px;margin: 32px 0;">
                                        Dự án <a href="/project/{{$req->project->id}}">{{$req->project->name}}</a> đã được xác nhận
                                        @if(!$req->seen)
                                        <span style="color:red;">NEW</span>
                                        @endif
                                    </div>
                                    @break
                                @case(4)
                                    <div style="font-size: 25px;margin: 32px 0;">
                                        Dự án <a href="/project/{{$req->project->id}}">{{$req->project->name}}</a> đã bị từ chối
                                        @if(!$req->seen)
                                        <span style="color:red;">NEW</span>
                                        @endif
                                    </div>
                                    @break
                                @case(5)
                                    <div style="font-size: 25px;margin: 32px 0;">
                                        Bạn đã chấp nhận <a href="/user/{{$req->staff->id}}">{{$req->staff->name}}</a> (<a href="/user/{{$req->staff->id}}">{{$req->staff->email}}</a>) phát triển dự án <a href="/project/{{$req->project->id}}">{{$req->project->name}}</a>
                                        @if(!$req->seen)
                                        <span style="color:red;">NEW</span>
                                        @endif
                                    </div>
                                    @break
                                @case(6)
                                    <div style="font-size: 25px;margin: 32px 0;">
                                        Bạn đã từ chối <a href="/user/{{$req->staff->id}}">{{$req->staff->name}}</a> (<a href="/user/{{$req->staff->id}}">{{$req->staff->email}}</a>) phát triển dự án <a href="/project/{{$req->project->id}}">{{$req->project->name}}</a>
                                        @if(!$req->seen)
                                        <span style="color:red;">NEW</span>
                                        @endif
                                    </div>
                                    @break
                                @case(7)
                                    <div style="font-size: 25px;margin: 32px 0;">
                                        Bạn đã thông báo hoàn thành dự án  <a href="/user/{{$req->staff->id}}">{{$req->staff->name}}</a> (<a href="/user/{{$req->staff->id}}">{{$req->staff->email}}</a>)
                                        @if(!$req->seen)
                                        <span style="color:red;">NEW</span>
                                        @endif
                                    </div>
                                    @break
                                @case(8)
                                    <div style="font-size: 25px;margin: 32px 0;">
                                        Dự án <a href="/user/{{$req->staff->id}}">{{$req->staff->name}}</a> (<a href="/user/{{$req->staff->id}}">{{$req->staff->email}}</a>) đã được hoàn thành
                                        @if(!$req->seen)
                                        <span style="color:red;">NEW</span>
                                        @endif
                                        <br>
                                        Click vào <a href="https://mail.google.com/mail/u/0/">đây</a> để sang bàn luận thanh toán tiền bạc nhận source code
                                        
                                    </div>
                                    @break
                                @default
                                    
                                @endswitch
                            @endforeach
						</div>
					</div>
				</div>	
			</section>