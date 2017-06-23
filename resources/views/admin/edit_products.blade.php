@extends('layouts.admin_template')

@section('content')
<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				<h4>Edit Product</h4>
				<form method="POST" action="{{url('/dashboard/products/'.$data['product']->id)}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<!-- Product Name -->
					<div class="form-group">
						<label for="productName">Name</label>
						<input type="text" name="name" value="{{$data['product']->name}}" class="form-control" id="productName" >
						@if($errors->has('name'))
							<p class="text-danger">{{$errors->first('name')}}</p>
						@endif
					</div>
					<!-- Product Description-->
					<div class="form-group">
						<label for="productDescription">Description</label>
						<textarea name="description" class="form-control" rows="3" id="productDescription">{{$data['product']->description}}</textarea>
						@if($errors->has('description'))
							<p class="text-danger">{{$errors->first('description')}}</p>
						@endif
					</div>
					<!-- Product Category -->
					<div class="form-group">
						<label for="productCategory">Category</label>
						<select name="category"  class="form-control" id="productCategory"> 
							@foreach( $data['categories'] as $products_category )
								@if($data['product']->category == $products_category->id)
									<option selected value="{{$products_category->id}}">{{$products_category->name}}</option>
								@else
									<option value="{{$products_category->id}}">{{$products_category->name}}</option>
								@endif
							@endforeach
						</select>
						@if($errors->has('category'))
							<p class="text-danger">{{$errors->first('category')}}</p>
						@endif
					</div>
					<!-- Product Brand-->
					<div class="form-group">
						<label for="productBrand">Brand</label>
						<input type="text" name="brand" value="{{$data['product']->brand}}"  class="form-control" id="productBrand" >
						@if($errors->has('brand'))
							<p class="text-danger">{{$errors->first('brand')}}</p>
						@endif
					</div>
					<!-- Product Price-->
					<div class="form-group">
						<label for="productPrice">Price</label>
						<input type="text" name="price" value="{{$data['product']->price}}" class="form-control" id="productPrice" >
						@if($errors->has('price'))
							<p class="text-danger">{{$errors->first('price')}}</p>
						@endif
					</div>
					<!-- Product Discount-->
					<div class="form-group">
						<label for="productDiscount">Discount</label>
						<input type="text" name="discount" value="{{$data['product']->discount}}" class="form-control" id="productDiscount" >
						@if($errors->has('discount'))
							<p class="text-danger">{{$errors->first('discount')}}</p>
						@endif
					</div>
					<!--Product Image
					<div class="form-group">
						<label for="productImage">Product Image</label>
						<input type="file" id="productImage" style="display: none;" /><br>
						<input type="button" value="Browse..." onclick="document.getElementById('productImage').click();" class="btn btn-sm" />
						
						<p class="help-block">Image size must be less than 2Mb.</p>
						@if($errors->has('image'))
							<p class="text-danger">{{$errors->first('image')}}</p>
						@endif
					</div>
					
					-->
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
