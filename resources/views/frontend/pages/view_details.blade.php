@extends('frontend.master')

@section('body')


<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					
                        <!-- Product main img -->
					<div class="col-md-5 col-md-push-2 ">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{ asset('storage/'.$products->image) }}" alt="">
							</div>

			
						</div>
					</div>
					<!-- /Product main img -->

				<div class="col-md-2"></div>

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$products->product_name}}</h2>
							
							<div>
								<h3 class="product-price">
                                @if ($products->discount != 0)
									<del> ${{ $products->price }}</del> <t>
									<strong> ${{ $products->price - $products->discount }}</strong>
									@else
									<strong>Price:  ${{ $products->price }} </strong> 
								@endif
                            
                            </h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>{{$products->description}}</p>

							<div class="product-options">
								<label>
									Size
									<select class="input-select">
										<option value="0">X</option>
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
                                
								<li><a href="#">{{$products->category->cat_name}}</a></li>
								
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->


                    
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection