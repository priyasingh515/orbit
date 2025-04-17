<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MAINS ORBIT :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('/assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('/assets/admin/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('/assets/admin/css/custom.css')}}">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<!-- /.login-logo -->
			@include('admin.message')
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<a href="#" class="h3">Administrative Panel</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Sign in to start your session</p>
					<form action="{{route('admin.authenticate')}}" method="post">
						@csrf
				  		<div class="input-group mb-3">
							<input type="text" value="{{old('email')}}" name="email"@error('email') is_invalid @enderror id="email" class="form-control" placeholder="Email">
							
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
						</div>
						@error('email')
							<p class="is_invalid text-danger">{{$message}}</p>
						@enderror
				  		<div class="input-group mb-3">
							<input type="password" name="password" @error('password') is-invalid @enderror id="password" class="form-control" placeholder="Password">
							
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>
						</div>
				  		<div class="input-group mb-3">
							<label class="sr-only control-label" for="message">Captcha</label>
							<img src="{{ url('/captcha') }}" id="captcha-img" alt="Captcha Image">
							<button type="button" class="btn btn-secondary ml-2" onclick="refreshCaptcha()">
								<i class="fas fa-sync"></i> 
							</button>  
							<input type="text" name="captcha" class="form-control" placeholder="Captcha" required>   
							@if ($errors->has('captcha'))
								<div class="alert alert-danger">
									{{ $errors->first('captcha') }}
								</div>
							@endif
							
						</div>
						@error('password')
							<p class="is_invalid text-danger">{{$message}}</p>
						@enderror
				  		<div class="row">
							
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">Login</button>
							</div>
							<!-- /.col -->
				  		</div>
					</form>
		  		
			  	</div>
			</div>
			<!-- /.card -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('/assets/admin/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('/assets/admin/js/adminlte.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{asset('/assets/admin/js/demo.js')}}"></script>
		<script>
			function refreshCaptcha() {
				document.getElementById('captcha-img').src = "{{ url('/captcha') }}?rand=" + Math.random();
			}
		</script>
	</body>
</html>
