@extends('layouts.app')

@extends('layouts.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        {{ __('Category') }}
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{route('admin.category.create')}}"><button class="float-right btn btn-primary"><i class="fa fa-plus"></i> Add New </button></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    
@endsection