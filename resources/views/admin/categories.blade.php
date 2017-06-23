@extends('layouts.admin_template')

@section('content')
<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				<h4>Create a product Category</h4>
				<form class="form-inline" method="POST" action="{{url('/dashboard/category/store')}}">
					<div class="form-group">
						<input type="text" class="form-control input-sm" placeholder="Category Name" name="category_name" value = {{old('category_name')}}>
						{{ csrf_field() }}
						{{ method_field('PUT') }}
					</div>
					<button type="submit" class="btn btn-primary btn-sm">Add</button>
				</form>
				@if (count($errors) > 0)
				<p class="text-danger">{{$errors->first()}}</p>
				@endif
				
			</div>
		</div>
	</div>
</div>

@endsection

