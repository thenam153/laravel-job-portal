<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<div class="container" style="width: 60%; display: block; margin: 50px 20%;	position: absolute;	border: 3px solid #2f3542; font-family: 'Source Sans Pro', sans-serif;">
	<div class="header" style="position: relative; widows: 80%; text-align: center; color: #fff; font-size: 32px; background-color: #16a085; border-bottom: 3px solid #2f3542; padding: 10px;">
		Thư xác nhận từ Phone Sale
	</div>
	<div class="content" style="padding: 30px; background-color: #ecf0f1; text-align: justify; font-size: 16px;">
		
		<p>Chào bạn, đây là thư xác nhận lấy lại mật khẩu từ Phone Sale <a href="{{URL::to('confirmuser')}}/{{$code}}">click vào đây để lấy lại mật khẩu</a></p>
		<p>Nếu không phải bạn, vui lòng không click vào đường dẫn trên và phản hồi lại với chúng tối qua Email.</p>
		<p>Rất cảm ơn quý khách!</p>
		<table width="50%">
			<tr style="width: 40%">
				<td style="color: red; font-weight: bold;">Tên khách truy cập: </td>
				<td>{{$name}}</td>
			</tr>
		</table>
	</div>
</div>