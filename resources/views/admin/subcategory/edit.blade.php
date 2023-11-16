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
        
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Sub Category</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/sub-categories/'.$subCategory->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Sub Category Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="sub_name" value="{{$subCategory->sub_name}}">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Select Category</label>
                            <div class="control">
                                <select name="category" >
                                <option value="" disabled>Choose a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{$category->cat_name}}
                                        </option>
                                   @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required>{{$subCategory->description}}</textarea>
                            </div>

                        </div>

                       


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update SubCategory</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection