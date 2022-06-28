<style>
    .datepicker {
      z-index: 99999 !important; /* has to be larger than 1050 */
    }
</style>

<div class="modal fade" id="add_mo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="exampleModalLabel">M.O</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="mo_modal">
                    <div class="form-group">
                        <label for="style_name">M.O #</label>
                        <input type="text" class="form-control" name="name" id="style_name" aria-describedby="emailHelp" required placeholder="M.O">
                        <small class="text-danger" id="err_msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="style_name">DESCRIPTION</label>
                        <input type="text" class="form-control" name="name" id="style_name" aria-describedby="emailHelp" required placeholder="DESCRIPTION">
                        <small class="text-danger" id="err_msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="style_name">ORDER QTY.</label>
                        <input type="text" class="form-control" name="name" id="style_name" aria-describedby="emailHelp" required placeholder="ORDER QUANTITY">
                        <small class="text-danger" id="err_msg"></small>
                    </div>
                    <div class="form-group">
                        <label>DATE ORDER</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>SHIPMENT DATE</label>
                        <input type="date" class="form-control"  >
                        <small class="text-danger" id="err_msg"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                <button type="button" class="btn btn-primary btn-flat" id="save_style"><i class="fa-solid fa-floppy-disk"></i> Save </button>
            </div>
        </div>
    </div>
</div>