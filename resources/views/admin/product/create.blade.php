@extends('layouts.admin')
@section('content')


	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Add New Products</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="{{route ('home.index') }}">Dashboard</a></li>
	              <li class="breadcrumb-item active">Add New Products</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
    <!-- /.content-header -->

		  <section class="content">
		  <div class="container-fluid">
         <form method='post'  enctype='multipart/form-data' action='{{route("product.index")}}'>
    @csrf
		 	<div class="form-group">
		 		<div class="row">
		 			<label class="col-md-3">Title</label>
		 			<div class="col-md-6"><input type="text" name="title" class="form-control"></div>
		 			<div class="clearfix"></div>
		 		</div>
		 	</div>

		 		
             <div class="form-group ">
             <div class="row">
                        <label class="col-lg-3 col-form-label">Category </label>
                        <div class="col-lg-6">
                            <select class="form-control" name='category_id' id='category_id'>
                                <option selected>Choose Category</option>
                                @foreach($categories as $category)
                                <option {{old('category_id')==$category->id?'selected':''}} value='{{$category->id}}'>
                                    {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
<p></p>
		 	<div class="form-group">
		 		<div class="row">
                        <label class="col-lg-3 col-form-label" for="details"> Deatils</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" id="details" name="details" rows="3">{{ old("details") }}</textarea>
                    
                        
                        </div>
                    </div>
                    <p></p>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Regular price </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="Enter The Price "
                                name="regular_price" value='{{ old("regular_price") }}'>
                        </div>
                    </div>
                    <p></p>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> Sale price </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="Enter The Sale Price  "
                                name="sale_price" value='{{ old("sale_price") }}'>
                        </div>
                    </div>
                    <p></p>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Quantity </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                placeholder="Enter the number of available quantity of this product " name="quantity"
                                value='{{ old("quantity") }}'>
                        </div>
                    </div>
                    <div class="m-form__group form-group row">
                        <label class=" col-lg-3 col-form-label">Status</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{old('active')=='1'?"checked":""}} type="radio" name="active" checked=""
                                    value="1" aria-describedby="account_group-error"> Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{old('active')=='0'?"checked":""}} type="radio" name="active" value="0"> 
                                InActive
                                <span></span>
                            </label>
                        </div>
                        <span class="m-form__help"></span>
                    </div>

            <div class="m-form__group form-group row">
                            <label class="col-lg-3 col-form-label" for="details">Image </label>
                            <input class="col-lg-6" type='file' name="image" id="image" />
                    </div>

                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href='{{route("product.index")}}' class="btn btn-secondary"> Cancle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
		