@extends('admin.admin_master')
@section('admin_body')

<div class="container">
    <div class="col-7">
        <h2> Title:{{$product->product_name}}</h2>
        <td class="center">
             <img src="{{asset('/storage/'.$product->image)}}" alt="product image" width="400px" height="600">
        </td>
        <p>{{$product->description}}<p>
        
                <p>
            @if ($product->discount != null)
                <del>Regular Price: ${{ $product->price }}</del> <br>
                <strong>Discount Price: ${{ $product->price - $product->discount }}</strong>
            @else
               <strong>Price:  ${{ $product->price }} </strong> 
            @endif
            </p>



    </div>

    
</div>
@endsection