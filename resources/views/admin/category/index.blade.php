@extends('admin.admin_master')

@section('admin_body')

<!-- Add Product Button -->
<a href="{{url('/categories/create/')}}" class="btn btn-danger">
			Add Category 
		</a>


<!-- Table Start -->
<div class="container">
<p class="alert-success">
          <?php
            $message = Session::get('message');
            if($message)
            {
                echo $message;
                Session::put('message', null);
            }
        ?>
          </p>
</div>

<div class="row-fluid sortable">	
	
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>  Category</h2>
						
					</div>
					<div class="box-content text-center">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th style="width=5%">ID</th>
								  <th style="width=15%">Category Name</th>
								  <th style="width=30%">Description</th>
                                  <th style="width=15%">Image</th>
								  <th style="width=15%">Status</th>
								  <th style="width=20%">Actions</th>
							  </tr>
						  </thead>   
                          @foreach($categories as $category)
						  <tbody>
							<tr>
								<td class="center">{{$category->id}}</td>
								<td class="center">{{$category->cat_name}}</td>
								<td class="center">{{$category->description}}</td>
                                <td class="center">
                                    <img src="{{asset('/storage/'.$category->image)}}" alt="category image" style="height:100px; width:80px;">
                                </td>
								<td class="center">
								@if($category->status==1)
									<span class="label label-success">Active</span>
								@else
									<span class="label label-danger">Deactive</span>
									@endif
								</td>

								<!-- Action section -->
								<td class="center">
									<div class="span2">
										@if($category->status==1)
											<a href="{{url('/cat-status'.$category->id)}}" class="btn btn-success">
												<i class="halflings-icon white thumbs-down"></i>  
											</a>

										@else
											<a href="{{url('/cat-status'.$category->id)}}" class="btn btn-danger" >
												<i class="halflings-icon white thumbs-up"></i>  
											</a>
											@endif
									</div>

									<div class="span2">
									<a href="{{url('/categories/'.$category->id.'/edit/')}}" class="btn btn-info" >
										<i class="halflings-icon white edit"></i>  
									</a>
									</div>

									<div class="span2">
									<form action="{{url('/categories/'.$category->id)}}" method="post">
									@csrf
									@method('DELETE')
										<button type="submit" class="btn btn-danger">
											<i class="halflings-icon white trash"></i> 
										</button>
									</form>	
									</div>
								</td>
							</tr>
							
						  </tbody>
                        @endforeach
                          
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


<!-- Table Ends -->
@endsection