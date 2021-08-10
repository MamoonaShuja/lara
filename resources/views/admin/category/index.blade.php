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
                                <td>
                                    <i class="btn btn-primary fa fa-pencil edit" data-header="{{$item->name}}" data-href="{{route('admin.category.edit' , $item->id)}}"></i>
                                    <i class="btn btn-danger fa fa-trash delete" data-header="{{$item->name}}" data-href="{{route('admin.category.destroy' , $item->id)}}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Title</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Content</p>
            </div>
        </div>
    </div>
</div>
<div id="del" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Title</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <span id="name"></span>?
            </div>
            <div class="modal-footer">
                <form id="delForm" action="" method="POST">
                    @method("delete")
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

    <script>
        $('.edit').on("click" , function(){
            var href = $(this).data("href");
            var name = "Edit "+$(this).data("header");
            $("#my-modal-title").html(name);
            $(".modal-body").load(href);
            $("#my-modal").modal("show");
        })
        $('.delete').on("click" , function(){
            var href = $(this).data("href");
            var name = $(this).data("header");
            $("#delForm").attr("action" ,href);
            $("#name").html(name);
            $("#del").modal("show");
        })
    </script>
    
@endsection