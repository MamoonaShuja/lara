@extends('layouts.app')

@extends('layouts.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        {{ __('Brand') }}
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{route('admin.brand.index')}}"><button class="float-right btn btn-primary"><i class="fa fa-arrow"></i> Back </button></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.brand.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('name')
                            <small id="emailHelp" class="text-danger form-text">
                                {{$message}}      
                            </small>                        
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    
@endsection