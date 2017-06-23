@extends('layouts.admin_template')

@section('content')
<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="products-area">

					<h4>Product Categories</h4>
					@if($data['categories']->isEmpty())
						No Categories
					@else
						<table class="table table-bordered" style="width:50%;">
						<thead>
							<tr>
								<th>#</th>
								<th>Category Name</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['categories'] as $category)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$category->name}}</td>
								<td><a href="{{url('dashboard/category/'.$category->id)}}" class="btn btn-sm btn-link">Edit</a></td>
							</tr>
							@endforeach
						</tbody>

						</table>
					@endif
					<form class="form-inline" method="POST" action="{{url('/dashboard/category/store')}}">
						<div class="form-group">
							<input type="text" style="width:200px;" class="form-control input-sm" placeholder="Category Name" name="category_name" value = "{{old('category_name')}}">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
						</div>
						<button type="submit" class="btn btn-primary btn-sm">Add new Product Category</button>
					</form>
						@if (count($errors) > 0)
				<p class="text-danger">{{$errors->first()}}</p>
				@endif

					<h4>Products</h4>
					@if($data['products']->isEmpty())
					Nothing to Show
					@else
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Description</th>
								<th>Category</th>
								<th>Brand</th>
								<th>Actual Price</th>
								<th>Discount</th>
								<th>Price</th>
								<th>Image</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data['products'] as $product)

									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$product->name}}</td>
										<td>{{$product->description}}</td>
										<td>{{$product->productCategory->name}}</td>
										<td>{{$product->brand}}</td>
										<td>{{$product->price}}</td>
										<td>{{$product->discount}}</td>
										<td>{{$product->price-$product->discount}}</td>
										<td><img class="admin-products" src = "{{url('images/uploads/'.$product->image)}}" /></td>
										<td><a class="btn btn-primary btn-sm" href="{{url('dashboard/products/edit/'.$product->id)}}">Edit</a></td>
										<td><a class="btn btn-danger btn-sm" href="{{url('dashboard/products/delete/'.$product->id)}}" onclick="return confirm('Are you sure ?')">delete<a/></td>
									</tr>
							@endforeach
						</tbody>
					</table>
					@endif

					<a class="btn btn-sm btn-primary" href="{{url('dashboard/products/new')}}">Add new Product</a>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
