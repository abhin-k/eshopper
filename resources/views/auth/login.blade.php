@extends('layouts.master')

@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="{{ url('/login') }}">
							{{ csrf_field() }}
							<div class="{{ $errors->login->has('email') ? 'has-error' : '' }}">
								<input id="email" type="email" name="email" required autofocus placeholder="Email Address">
                                @if ($errors->login->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->login->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
							<div class="{{ $errors->login->has('password') ? 'has-error' : '' }}">
								<input id="password" type="password" class="form-control" name="password" required placeholder="password">
                                @if ($errors->login->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->login->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<p><a href="{{ url('/password/reset') }}" class="forgot-link">Forgot Your Password?</a></p>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="POST" action="{{ url('/register') }}">
							{{ csrf_field() }}
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<input type="text" placeholder="Name" name="name" autofocus required>
								@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" placeholder="Email" name="email" autofocus required>
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<input type="password" placeholder="Password" name="password" required>
								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<input type="password" placeholder="Confirm Password" name="password_confirmation" required>
								@if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
							</div>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
