<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
    .input100 {
        padding: 0 5px 0 5px;
    }
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="{{ route('register') }}">
                    @csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
                        Đăng ký
                    </span>
                    @if($errors->has('email'))
                    <p style="color: red"><b>{{$errors->first('email')}}</b></p>
                    @endif
                    @if($errors->has('errorComfirmEmail'))
                    <p style="color: red"><b>{{$errors->first('errorComfirmEmail')}}</b></p>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Enter name">
						<input class="input100" type="text" name="name" placeholder="Tên">
						<!-- <span class="focus-input100" data-placeholder="&#xf191;"></span> -->
                    </div>
                    @if($errors->has('name'))
                    <p style="color: red"><b>{{$errors->first('name')}}</b></p>
                    @endif
					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100 " type="email" name="email" placeholder="Email">
						<!-- <span class="focus-input100" data-placeholder="&#xf1fa;"></span> -->
					</div>
                    @if($errors->has('phone'))
                    <p style="color: red"><b>{{$errors->first('phone')}}</b></p>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Enter number phone">
						<input class="input100" type="text" name="phone" placeholder="Phone">
						<!-- <span class="focus-input100" data-placeholder="&#xf191;"></span> -->
                    </div>
                    @if($errors->has('password'))
                    <p style="color: red"><b>{{$errors->first('password')}}</b></p>
                    @endif
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<!-- <span class="focus-input100" data-placeholder="&#xf191;"></span> -->
					</div>
                    @if($errors->has('repassword'))
                    <p style="color: red"><b>{{$errors->first('repassword')}}</b></p>
                    @endif
                    @if($errors->has('errorPassword'))
                    <p style="color: red"><b>{{$errors->first('errorPassword')}}</b></p>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
						<!-- <span class="focus-input100" data-placeholder="&#xf203;"></span> -->
                    </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
                            Đăng ký
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>