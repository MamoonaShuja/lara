@extends('layouts.main')
@section('styles')
    <style>
        div.dataTables_wrapper {
width:100% !important;
}
    </style>
@endsection
@section('content')
<div class="row justify-content-center">
    <div id="success"></div>
    <div class="col-md-12 mt-3">
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
                    <table id="table" class="table table-hover table-bordered w-100 mycontainer" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
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
                    <button type="submit" class="btn btn-danger ">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

    <script>
        var table = $('#table').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               autoWidth: false,
               ajax: '{{ route('admin.category.index') }}',
               columns: [
               			{ data: 'name', name: 'name',
                         
                    
                    },
            			{ data: 'action', searchable: false, orderable: false }
                     ],
            }).columns.adjust();
            
            table.columns.adjust().draw();

        $(document).on("click" ,".edit" , function(){
            var href = $(this).data("href");
            var name = "Edit "+$(this).data("header");
            $("#my-modal-title").html(name);
            $(".modal-body").load(href);
            $("#my-modal").modal("show");
        })
        $(document).on("click" ,".delete" ,function(){
            var href = $(this).data("href");
            var name = $(this).data("header");
            $("#delForm").attr("action" ,href);
            $("#name").html(name);
            $("#del").modal("show");
        })
        $(document).on("submit" , "#form", function(e){
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(res){
                    var out = "<ul>";
                    if(res.errors){
                        for (var error in res.errors) {
                            var er = res.errors[error];
                         for(i=0 ; i< er.length ; i++){
                             out += "<li class='text-danger'>"+er[i]+"</li>";
                         }   
                        }
                        out += "</ul>";
                        $("#errors").html(out);
                    }else{
                        $("#my-modal").modal("hide");
                        table.ajax.reload();
                        $("#success").html("<div class='alert alert-success'><p class='text-success'>"+res+"</p></div>")
                    }
                },error: function(res) {
                    console.log(res.message);
                }

            });
        });
        $(document).on("submit" , "#delForm", function(e){
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(res){
                    $("#del").modal("hide");
                    table.ajax.reload();
                    $("#success").html("<div class='alert alert-success'><p class='text-success'>"+res+"</p></div>")
                },error: function(res) {
                    console.log(res.message);
                }

            });
        })
    </script>
    
@endsection