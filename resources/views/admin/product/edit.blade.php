<div id="errors"></div>
<form id="form" action="{{ route('admin.product.update' , $item->id) }}" method="POST">
    @csrf  
    @method("put")
    <div class="row">
					<div class="col-md-6 mb-3">
						<label for="cat_id">Category Name</label>
						<input type="text" class="form-control" name="cat_id" placeholder="Category Name" value="{{$item->cat_id}}" >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="scat_id">Subcategory</label>
						<input type="text" class="form-control" name="scat_id" placeholder="Subcategory Name" value="{{$item->scat_id}}" >
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
						<input type="text" class="form-control" name="name" placeholder="Product Name" value="{{$item->name}}" >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="slug">Slug</label>
						<input type="text" class="form-control" name="slug" placeholder="slug Name" value="{{$item->slug}}" >
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
						<input type="text" class="form-control" name="price" placeholder="Price" value="{{$item->price}}" >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="discount">Discounted Price</label>
						<input type="text" class="form-control" name="discount" placeholder="Discounted Price" value="{{$item->discount}}"  >
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
						<input type="text" class="form-control" name="whole_sale_price" placeholder="Whole Sale Price "  value="{{$item->whole_sale_price}}" >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="sales_price">Sale Price</label>
						<input type="text" class="form-control" name="sales_price" placeholder="Sale Price" value="{{$item->sales_price}}"  >
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
						<input type="text" class="form-control" name="min_whole_sale_quan" placeholder="Minimum Quantity" value="{{$item->min_whole_sale_quan}}" >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="image">Image</label>
						<input type="text" class="form-control" name="image" placeholder="image" value="{{$item->image}}" >
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
						<input type="text" class="form-control" name="description" placeholder="Description" value="{{$item->description}}" >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="size"> size</label>
						<input type="text" class="form-control" name="size" placeholder="size" value="{{$item->size}}" >
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
						<input type="text" class="form-control" name="color" placeholder="color" value="{{$item->color}}" >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="brand_id">Brand Name</label>
						<input type="text" class="form-control" name="brand_id" placeholder="Brand Name" value="{{$item->brand_id}}" >
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
					</div>
					</div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
