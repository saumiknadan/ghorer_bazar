@extends('admin.admin_master')

@section('admin_body')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row-fluid sortable">
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
        <div class="box span12">
            <div class="box-header" data-original-title>
        
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/products/')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_name" required>
                            </div>
                        </div>
                                <!-- Category -->
                        <div class="control-group">
                            <label class="control-label">Select Category</label>
                            <div class="control">
                                  <select name="category" >
                                    <option selected>Open this select menu</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                   @endforeach
                                </select>

                                  
                            </div>
                        </div>

                        <!-- Subcategory -->

                        <div class="control-group">
                            <label class="control-label">Select Sub Category</label>
                            <div class="control">
                             <!-- subcat select -->
                                <select name="subcategory" >
                                    <option selected>Open this select menu</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->sub_name}}</option>
                                   @endforeach
                                </select>
                             </div>
                        </div>
                        <!-- Description -->
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required></textarea>
                            </div>

                        </div>

                            <!-- Slug -->

                        <div class="control-group">
                            <label class="control-label" >URL (Slug)</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="prod_slug" required>
                            </div>
                        </div>

                        

                        <!-- Price -->
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="price" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Discount</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="discount" value="0">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">File Upload</label>
                            <div class="controls">
                                <input type="file" name="image">
                            </div>
                        </div>


                        <div class="form-actions d-flex justify-content-between">
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Submit</button>

                            <!-- Cancel Button -->
                            <a href="{{url('/products/')}}" class="btn btn-danger">Cancel</a>
                        </div>

                       
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->

   
@endsection