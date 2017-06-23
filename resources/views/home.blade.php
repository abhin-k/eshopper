@extends('layouts.master')

@section('content')
@include('slides')
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="left-sidebar">
				<h2>Category</h2>
				<div class="panel-group category-products" id="accordian"><!--category-products-->
					@foreach($products_categories as $products_category)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">{{$products_category->name}}</a></h4>
							</div>
						</div>	
					@endforeach
				</div><!--/category-products-->
			</div>
		</div>
		<!-- Product Listing-->
		<div class="category-tab"><!--category-tab-->
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
					<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
					<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
					<li><a href="#kids" data-toggle="tab">Kids</a></li>
					<li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="tshirt" >
					@foreach($products_categories as $products_category)
						@foreach($products_category->products as $product)
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
										<img src = "{{url('images/uploads/'.$product->image)}}" class="product-image" />
											{{ csrf_field() }}
											<input type="hidden" name="product-id" value="{{$product->id}}" class="product-id">
											<h2>${{$product->price - $product->discount}}</h2>
											<p>{{$product->name}}</p>
											<button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>											
									</div>
								</div>
							</div>
						@endforeach
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
