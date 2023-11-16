<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="{{url('/dashboard/')}}">Dashboard</a></li>
						<li class="active"><a href="{{url('/')}}">Home</a></li>
						@foreach($categories as $category)
						<li><a href="{{url('/product-by-cat/'.$category->id)}}">{{$category->cat_name}}</a></li>
						@endforeach

						<li class=""><a href="{{url('/all-products')}}">All Products</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>