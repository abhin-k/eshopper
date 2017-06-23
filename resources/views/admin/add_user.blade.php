@extends('layouts.admin_template')

@section('content')

<div class="page-content">
	<div class="container">
		<div class="user-content-new">
			<div class="panel panel-default">
				<div class="panel-heading">Add New User</div>
				<div class="panel-body">
            <form method="post" action="{{url('/dashboard/users/add')}}">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="userName">Name</label>
                  <input name="name" value="{{old('name')}}" type="text" class="form-control" id="userName" placeholder="Name">
                  @if($errors->has('name'))
      							<p class="text-danger">{{$errors->first('name')}}</p>
      						@endif
                </div>
                <div class="form-group">
                  <label for="userEmail">Email Address</label>
                  <input name="email" type="email" value="{{old('email')}}" class="form-control" id="userEmail" placeholder="Email">
                  @if($errors->has('email'))
      							<p class="text-danger">{{$errors->first('email')}}</p>
      						@endif
                </div>
                <div class="form-group">
                  <label for="userPassword">Password</label>
                  <input name="password" type="password" class="form-control" id="userPassword" placeholder="Password">
                  @if($errors->has('password'))
      							<p class="text-danger">{{$errors->first('password')}}</p>
      						@endif
                </div>
                <div class="form-group">
                  <label for="userConfirmPassword">Confirm Password</label>
                  <input name="password_confirmation"   type="password" class="form-control" id="userConfirmPassword" placeholder="Confirm Password">
                  @if($errors->has('password_confirmation'))
      							<p class="text-danger">{{$errors->first('password_confirmation')}}</p>
      						@endif
                </div>
                <div class="form-group">
                    <label for="userRole">Role</label>
                  <select class="form-control" id="userRole" name="role">
                    <option value="1">Admin</option>
                    <option value="0" selected="">User</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <a class="dt-button pull-right" href="{{url('dashboard/users')}}">Back</a>
              </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
