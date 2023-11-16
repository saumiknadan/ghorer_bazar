@extends('frontend.master')

@section('body')


<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Sub Categories</h3>
							<div class="checkbox-filter">

							

								
								@foreach($subcategories as $subcategory)
										<ul>
										<li>
											<a href="{{url('/product-by-subcat/'.$subcategory->id)}}">{{$subcategory->sub_name}}</a>
											
										</li>
										</ul>
								@endforeach

							
								
							</div>
						</div>
						<!-- /aside Widget -->

						

						
						

						
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">

                            <!-- product -->
										@foreach($products as $product)
										<div class="col-sm-6 col-md-3 col-lg-3">
                                        <div class="box" style="padding-bottom: 25px;">
                                            <div class="product" style="opacity: 1; height: 440px; width: 200px; ">
                                                <div class="product-img">
													

														<figure style="text-align: center; margin: 0; width: 200px; height: 200px; background-color: #fff;">
															<img src="{{ asset('/storage/' . $product->image) }}" alt="Description of the image" style="width: 100%; height: 100%; object-fit: cover;">
														</figure>
												 </div>

                                                <div class="product-body">
                                                    <p class="product-category">{{ $product->category->cat_name }}</p>
                                                    <h3 class="product-name"><a href="{{ url('/view-details' . $product->id) }}">{{ $product->product_name }}</a></h3>
                                                    <h4 class="product-price">
                                                        @if ($product->discount != 0)
                                                            <del>${{ $product->price }}</del><br>
                                                            <strong>${{ $product->price - $product->discount }}</strong>
                                                        @else
                                                            <strong>Price: ${{ $product->price }}</strong>
                                                        @endif
                                                    </h4>
                                                    <div class="product-btns">
                                                        <button class="quick-view"><a href="{{ url('/view-details' . $product->id) }}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
										@endforeach
										<!-- /product -->
						

							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection