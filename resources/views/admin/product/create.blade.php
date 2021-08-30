@extends('layouts.app')

@extends('layouts.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        {{ __('Product') }}
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{route('admin.product.index')}}"><button class="float-right btn btn-primary"><i class="fa fa-arrow"></i> Back </button></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.product.store')}}" method="POST">
                    @csrf
               
                    <div class="row">
					<div class="col-md-6 mb-3">
						<label for="cat_id">Category Name</label>
                        <select class="form-control" name="cat_id" id="pid">
						<option>Select Category</option>
						@foreach ($categories as $item)
                            <option value="{{route('admin.getchild' , $item->id)}}">{{ucfirst($item->name)}}</option>
                        @endforeach
			
						</select>
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="scat_id">Subcategory</label>
                        <select class="form-control" name="scat_id">
						<option>Select Subcategory</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						
			
						</select>
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					</div>
                    <div class="row">
					<div class="col-md-6 mb-3">
						<label for="name">name</label>
						<input type="text" class="form-control" name="name" placeholder="Product Name"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="slug">Slug</label>
						<input type="text" class="form-control" name="slug" placeholder="slug Name"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					</div>
                    <div class="row">
					<div class="col-md-6 mb-3">
						<label for="price">Price</label>
						<input type="text" class="form-control" name="price" placeholder="Price"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="discount">Discounted Price</label>
						<input type="text" class="form-control" name="discount" placeholder="Discounted Price"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					</div>
                    <div class="row">
					<div class="col-md-6 mb-3">
						<label for="whole_sale_price">Whole Sale Price</label>
						<input type="text" class="form-control" name="whole_sale_price" placeholder="Whole Sale Price "  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="sales_price">Sale Price</label>
						<input type="text" class="form-control" name="sales_price" placeholder="Sale Price"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					</div>
                    <div class="row">
					<div class="col-md-6 mb-3">
						<label for="min_whole_sale_quan">Minimum Quantity</label>
						<input type="text" class="form-control" name="min_whole_sale_quan" placeholder="Minimum Quantity"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="image">Image</label>
						<input type="text" class="form-control" name="image" placeholder="image"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					</div>
                    <div class="row">
					<div class="col-md-6 mb-3">
						<label for="description">Description</label>
						<input type="text" class="form-control" name="description" placeholder="Description"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="size"> size</label>
						<input type="text" class="form-control" name="size" placeholder="size"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					</div>
                    <div class="row">
					<div class="col-md-6 mb-3">
						<label for="color">Color</label>
						<input type="text" class="form-control" name="color" placeholder="color"  >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="brand_id">Brand Name</label>
                        <select class="form-control" name="brand_id">
						<option>Select Brand</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						
			
						</select>
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					</div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).on('change' , "#pid" , function(){
                var id = $(this).val();
            $.ajax({
                method: "GET",
                url: id,         
                dataType: 'JSON',
                success: function(res){
                },error: function(res) {
                    console.log(res.message);
                }

            });
 
        })
    </script>
@endsection