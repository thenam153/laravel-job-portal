<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-12 post-list">
                            <div action="" style="display:flex;" style="font-size:18px;">
                            @if($user->id == Auth::id())
                            <div v-show="!showEdit" style="position: absolute;right: 10px;">
                                <button class="genric-btn primary circle" @click="editInfo()">
                                    Sửa
                                </button>
                            </div>
                            <div v-show="showEdit" style="position: absolute;right: 10px;">
                                <button class="genric-btn primary circle" @click="saveInfo()">
                                    Lưu
                                </button>
                            </div>
                            @endif
                                <div style="flex:2;font-weight:600;" >
                                    <div style="height:30px">
                                        Tên
                                    </div>
                                    <div style="height:30px">
                                        Email
                                    </div>
                                    <div style="height:30px">
                                        Số điện thoại
                                    </div>
                                    <div style="height:30px">
                                        Dự án đã đăng
                                    </div>
                                    <div style="height:30px">
                                        Dự án hoàn thành / Dự án đã nhận
                                    </div>
                                </div>
                                <div style="flex:3;">
                                    <div style="height:30px">
                                        <span v-show="!showEdit" v-text="user.name">{{$user->name}}</span>
                                        <input v-show="showEdit" type="text" v-model="user.name">
                                    </div>
                                    <div style="height:30px">
                                        {{$user->email}}
                                    </div>
                                    <div style="height:30px">
                                        <span v-show="!showEdit" v-text="user.phone">{{$user->phone}}</span>
                                        <input v-show="showEdit" type="text" v-model="user.phone">
                                    </div>
                                    <div style="height:30px">
                                        {{$user->quantity}}
                                    </div>
                                    <div style="height:30px">
                                        {{$user->quantityDone}} / {{$user->quantityAccepted}}
                                    </div>
                                </div>
                            </div>

						</div>
					</div>
				</div>	
			</section>