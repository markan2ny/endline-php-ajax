<div class="modal fade" id="mo_delete" tabindex="-1" role="dialog" aria-labelledby="edit_title" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="edit_title">DELETE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_form">
                    <div class="form-group">
                        <label for="style_name">Style Name</label>
                        <input type="text" class="form-control" name="edit_name" id="style_name" aria-describedby="emailHelp" required placeholder="Enter new style">
                        <small class="text-danger" id="err_msg"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                <button type="button" class="btn btn-primary btn-flat" id="save_style"><i class="fa-solid fa-floppy-disk"></i> Update Style </button>
            </div>
        </div>
    </div>
</div>