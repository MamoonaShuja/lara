<div id="errors"></div>
<form id="form" action="{{ route('admin.brand.update' , $item->id) }}" method="POST">
    @csrf
    @method("put")
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" value="{{$item->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('name')
            <small id="emailHelp" class="text-danger form-text">
                {{ $message }}
            </small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
