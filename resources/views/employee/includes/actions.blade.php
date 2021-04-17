<x-utils.edit-button :href="route('admin.auth.certificates.edit', $model)" />

<!-- <button title="Delete" data-toggle="modal" data-target="#remove_modal_blog_{{ $model->id }}" class="btn btn-danger btn-table btn-icon">
    <i class="fa fa-trash" aria-hidden="true"></i>
</button> -->
    
<div id="remove_modal_blog_{{ $model->id }}" class="modal deletePopUpUnique" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm action</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.auth.certificates.destroy', $model->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-body">
                    Are you sure you want to delete this Certificate ?
                </div>
                <div class="modal-footer">
                    <div class="form_btn_row">
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>