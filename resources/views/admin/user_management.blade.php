@extends('layouts.admin_template')

@section('content')

<div class="page-content">
	<div class="container">
		<div class="user-content">
			<div class="panel panel-default">
				<div class="panel-heading">Users</div>
				<div class="panel-body">
					<div class="dt-buttons">
						<a class="dt-button" href="{{url('allusers')}}"><span>CSV</span></a>
						<a class="dt-button btn-sucess" href="{{url('dashboard/users/new')}}"><span><i class="fa fa-plus" aria-hidden="true"></i> Add New</span></a>
					</div>
					<table class="table table-bordered">
						<thead>
							<td>ID</td>
							<td>Name</td>
							<td>Email Address</td>
							<td>Role</td>
							<td>Options</td>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
								@if($user->admin == 1)
									Admin
								@else
									User
								@endif
								</td>
								<td>
									<a href="{{url('dashboard/users/'.$user->id)}}" class="btn btn-xs btn-primary">View</a>
									<a href="{{url('dashboard/users/'.$user->id)}}" class="btn btn-xs btn-info">Edit</a>
									<a href="{{url('dashboard/users/'.$user->id)}}" class="btn btn-xs btn-danger">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
