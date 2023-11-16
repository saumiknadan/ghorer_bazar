@extends('frontend.master')

@section('body')
<div class="container">
    		<!--New Category SECTION -->
		<div class="section">
			<div class="section-title">
			<h3 class="title">Category</h3>
			</div>
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					@foreach($categories as $category)
						<div class="col-md-4 col-xs-6">
							<div class="shop" style="height: 390px;"> <!-- Set the fixed height inline -->
								<div class="shop-img">
									<img src="{{ asset('/storage/'.$category->image) }}" alt="" style="max-height: 100%; width: auto;"> <!-- Set image styles inline -->
								</div>
								<div class="shop-body">
									<h3>{{$category->cat_name}}<br>Collection</h3>
									<a href="{{url('/product-by-cat/'.$category->id)}}" class="cta-btn">{{$category->cat_name}} <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						@endforeach

					<!-- /shop -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- New Product SECTION -->
		<div class="section">
			<!-- container -->
			<div class="section-title">
			<h3 class="title">Products</h3>
			</div>
			<div class="container">
				<!-- row -->
				<div class="row"><!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										
										<!-- product -->
										@foreach($products as $product)
										<div class="product" style="opacity: 1;  transform: translate3d(0px, 0px, 0px);">
											<!-- <div class="product-img">
												<img src="{{asset('/storage/'.$product->image)}}" alt="">
												
											</div> -->

											<div class="product-img">
													<!-- <figure>
														<img src="{{ asset('/storage/' . $product->image) }}" alt="">
													</figure> -->

													<figure style="text-align: center; margin: 0; width: 100%; height: 200px; background-color: #fff;">
                                <img src="{{ asset('/storage/' . $product->image) }}" alt="Description of the image" style="width: 100%; height: 100%; object-fit: cover;">
                            </figure>
												 </div>
											<div class="product-body">
												<p class="product-category">{{$product->category->cat_name}}</p>
												
												<h3 class="product-name"><a href="{{url('/view-details'.$product->id)}}">{{$product->product_name}}</a></h3>
												<h4 class="product-price">
														@if ($product->discount != null)
																<del> ${{ $product->price }}</del> <br>
																<strong> ${{ $product->price - $product->discount }}</strong>
															@else
															<strong>Price:  ${{ $product->price }} </strong> 
															@endif
											
												</h4>
												
												<div class="product-btns">
													
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endforeach
										<!-- /product -->

										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /New Product SECTION -->


</div>

@endsection('body')