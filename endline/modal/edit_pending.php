<div class="modal fade" id="edit_pending" tabindex="-1" role="dialog" aria-labelledby="edit_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="edit_title"><i class="fa-solid fa-clipboard"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pending_form">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <input type="hidden" id="get_bad_qty">
                    <div class="form-group mb-3">
                        <label>FIXED QUANTITY</label>
                        <input type="number" name="fixed_qty" id="fixed_qty" min="0" oninput="this.value =
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                <button type="button" class="btn btn-primary btn-flat update_btn" id="update_pending"><i class="fa-solid fa-floppy-disk"></i> Update </button>
            </div>
        </div>
    </div>
</div>