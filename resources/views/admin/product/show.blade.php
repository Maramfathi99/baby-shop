@extends("layouts.admin")
@section("content")

<section class="content">
		  <div class="container-fluid">
		
		 	<div class="form-group">
		
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">  Product:  {{$product->title }}</h5>
                    <p class="card-text">
                        <ul> 
                                    <li>Category: {{ $product->category->name??'' }}</li>
                                    <li> Details : {{ $product->details }}</li>
                                    <li> Quantity: {{ $product->quantity }} </li>
                                    <li>Regular price: {{ $product->regular_price }} </li>   
                                    <li>  Sale price: {{ $product->sale_price }}</li>                                   
                                    <li> Status: {{$product->active=='1'?"active":"inactive"}} </li>  
                                    <li> <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="image">Image: </label>
                                        @if($product->image)         
                                        <hr> 
                                        <img height=200 width= 200 src='{{asset("storage/assets/img/{$product->image}")}}' alt="">
                                        @else   
                                            <span>There is no image</span>
                                        @endif
                                    </div>
                                </div>
     </li>
  
                        </ul>
                    </p>
                    
                </div>
            </div>
        </div>
    
    </div>
 
    <a href='{{ route("product.edit",$product->id) }}' class='btn btn-sm btn-primary'>Edit</a>
			 <a class='btn btn-light' href='{{route("product.index")}}'>Cancel</a>

             </div>
		 	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
		 </form>
		
		</section>

@endsection