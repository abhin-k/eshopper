<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{url('css/admin-style.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>Admin-Home</title>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/dashboard')}}">Admin</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{url('dashboard/users')}}">User Management</a></li>
					<li><a href="{{url('logout')}}">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	@yield('content')

	<script src="js/admin.js"></script>
</body>
</html>
