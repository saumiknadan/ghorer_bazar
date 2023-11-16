@extends('admin.admin_master')

@section('admin_body')

<!-- Add Product Button -->
<a href="{{url('/sub-categories/create')}}" class="btn btn-danger">
			Add Sub Category 
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
						<h2><i class="halflings-icon user"></i><span class="break"></span> Sub Category</h2>
						
					</div>
					<div class="box-content text-center">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th style="width=5%">ID</th>
								  <th style="width=15%">Sub Category</th>
                                  <th style="width=15%">Category</th>
								  <th style="width=35%">Description</th>
								  <th style="width=10%">Status</th>
								  <th style="width=20%">Actions</th>
							  </tr>
						  </thead>   
                          @foreach($subcategories as $subcategory)
						  <tbody>
							<tr>
								<td class="center">{{$subcategory->id}}</td>
								<td class="center">{{$subcategory->sub_name}}</td>
                                <td class="center">{{$subcategory->category->cat_name}}</td>
								<td class="center">{{$subcategory->description}}</td>
                              
								<td class="center">
								@if($subcategory->status==1)
									<span class="label label-success">Active</span>
								@else
									<span class="label label-danger">Deactive</span>
									@endif
								</td>

								<!-- Action section -->
								<td class="center">
									<div class="span2">
										@if($subcategory->status==1)
											<a href="{{url('/subcat-status'.$subcategory->id)}}" class="btn btn-success">
												<i class="halflings-icon white thumbs-down"></i>  
											</a>

										@else
											<a href="{{url('/subcat-status'.$subcategory->id)}}" class="btn btn-danger" >
												<i class="halflings-icon white thumbs-up"></i>  
											</a>
											@endif
									</div>

									<div class="span2">
									<a href="{{url('/sub-categories/'.$subcategory->id.'/edit/')}}" class="btn btn-info" >
										<i class="halflings-icon white edit"></i>  
									</a>
									</div>

									<div class="span2">
									<form action="{{url('/sub-categories/'.$subcategory->id)}}" method="post">
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