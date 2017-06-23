@extends('layouts.admin_template')

@section('content')

<div class="page-content">
	<div class="container">
		<div class="user-content">
			<div class="panel panel-default">
				<div class="panel-heading">Users</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8">

							<table class="table table-bordered table-striped">
							<body>
								<tr>
									<th>Name</th>
									<td>{{$user->name}}</td>
								</tr>

								<tr>
									<th>Email Address</th>
									<td>{{$user->email}}</td>
								</tr>
								<tr>
									<th>Role</th>
									<td>
									@if($user->admin == 1)
										Admin
									@else
										User
									@endif
									</td>
								</tr>
								<a class="dt-button" href="{{url('dashboard/users')}}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
							</tbody>
							</table>
						</div>
					</div>


				<div>
			</div>
		</div>
	</div>
<div>
@endsection
