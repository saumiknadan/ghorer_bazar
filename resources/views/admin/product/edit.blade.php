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
        
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/products/'.$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_name" value="{{$product->product_name}}">
                            </div>
                        </div>
                                
                        
                        <!-- Category -->

                         <div class="control-group">
                            <label class="control-label">Select Category</label>
                            <div class="control">
                            <select name="category">
                                <option value="" disabled>Choose a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->cat_name }}
                                        </option>
                                    @endforeach
                            </select>
                            </div>
                        </div>

                        <!-- Subcategory -->


                        <div class="control-group">
                            <label class="control-label">Select Sub Category</label>
                            <div class="control">
                                <select name="subcategory" >
                                <option value="" disabled>Choose a category</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" {{ old('subcategory') == $subcategory->id ? 'selected' : '' }}>
                                        {{$subcategory->sub_name}}
                                    </option>
                                   @endforeach
                                </select>
                            </div>
                        </div>

                    <!-- Description -->
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required>{{$product->description}}</textarea>
                            </div>
                        </div>

                           <!-- Slug -->
                        <div class="control-group">
                            <label class="control-label" for="date01">URL (Slug)</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="prod_slug" value="{{$product->prod_slug}}">
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="price" value="{{$product->price}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Discount</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="discount" value="{{$product->discount}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">File Upload</label>
                            <div class="controls">
                                <input type="file" name="image">
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection