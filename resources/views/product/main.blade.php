<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<base href="{{asset('')}}">
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<meta name="csrf-token" content="{{csrf_token()}}">
		<title>@yield('title')</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main-product.css">
		</head>
		<body>
			<div id="app">
				@yield('header')

				@yield('banner')

				@yield('popular')

				@yield('content')
				
				@yield('area')
					
				@yield('calltoaction')
			</div>	
				@yield('footer')
			

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
            <script src="js/main-product.js"></script>	
            <script src="js/app.js"></script>	
            @yield('js')
			@yield('script')
			<script>
			(function($) {
				'use strict';
				var app = new Vue({
					el: '#app',
					data: {
						project: {},
						user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!},
					},
					mounted() {
						this.getRequest();
						this.listen();
					},
					methods: {
						clickApply: function(id) {
							console.log(id);
							axios.post(`/api/apply`, {
								idProject: id,
								idUser: {!! Auth::check() ? Auth::id() : 'null' !!}
							})
							.then((res) => {
								if(res.data.error) {
									console.log("Error");
								}
								if(res.data.success) {
									console.log('success');
								}
							})
							.catch((err) => {
								console.log(err);
							})
						},
						clickHeart: function(id) {
							console.log(id);
						},
						listen: function() {
							Echo.channel('apply.project.{!! Auth::check() ? Auth::id() : 'null' !!}')
							.listen('ApplyProject', function(res) {
								console.log(res);
							});
							Echo.channel('request.{!! Auth::check() ? Auth::id() : 'null' !!}')
							.listen('NewRequest', function(res) {
								$('#amountRequest').text(res.amount);
							});
						},
						getRequest: function() {
							axios.post(`/get-request`)
							.then((res) => {
								$('#amountRequest').text(res.data.amount);
							})
							.catch((err) => {
								console.log(err);
							})
						},
						clickAccept: function(id, el) {
							console.log(id);
							console.log($("#list-uv").children());
							axios.post(`/response-request`, {
								id: id,
								status: "accepted"
							})
							.then((res) => {
								console.log(res.data);
							})
							.catch((err) => {
								console.log(err);
							})
							$('#request-' + id).remove();
							if($("#list-uv").children().length == 0) {
								$("#section-1-uv").remove();
							}
						},
						clickRefuse: function(id) {
							console.log(id);
							console.log($("#list-uv").children());
							axios.post(`/response-request`, {
								id: id,
								status: "refused"
							})
							.then((res) => {
								console.log(res.data);
							})
							.catch((err) => {
								console.log(err);
							})
							$('#request-' + id).remove();
							if($("#list-uv").children().length == 0) {
								$("#section-1-uv").remove();
							}
						}
					}
				});
			})(jQuery);
			</script>
		</body>
	</html>



