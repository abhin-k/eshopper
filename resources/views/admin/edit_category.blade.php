@extends('layouts.admin_template');

@section('content')
<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				<h4>Edit Category</h4>
				<form class="form-inline" method="POST" action="{{url('/dashboard/category/'.$category->id)}}">
					<div class="form-group">
						<input type="text" class="form-control input-sm" placeholder="Category Name" name="category_name" value = "{{$category->name}}">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
					</div>
					<button type="submit" class="btn btn-primary btn-sm">Update</button>
				</form>
				@if (count($errors) > 0)
				<p class="text-danger">{{$errors->first()}}</p>
				@endif
				
				
				@if($category->products->isEmpty())
					<p>No products under this category</p>
				@else
					<h4>Products under this category</h4>
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
								<th>Delete</th>
							</tr>
						</thead>	
						<tbody>
							@foreach ($category->products as $product)
								
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$product->name}}</td>
										<td>{{$product->description}}</td>
										<td>{{$product->productCategory->name}}</td>
										<td>{{$product->brand}}</td>
										<td>{{$product->price}}</td>
										<td>{{$product->discount}}</td>
										<td>{{$product->price-$product->discount}}</td>
										<td><a href="{{url('dashboard/products/delete/'.$product->id)}}">delete<a/></td>
									</tr>
							@endforeach
						</tbody>
					</table>
					@endif
			</div>
		</div>
	</div>
</div>


@endsection



