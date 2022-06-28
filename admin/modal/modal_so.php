<div class="modal fade" id="show_so_modal" tabindex="-1" role="dialog " aria-labelledby="so_title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="so_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form id="form">
                    <div class="form-group mb-3">
                        <label for="so_name">S.O NAME</label>
                        <input type="text" class="form-control" name="so_name" id="so_name" aria-describedby="emailHelp" required placeholder="S.O Name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="so_name">DESCRIPTION</label>
                        <input type="text" class="form-control" name="so_name" id="so_name" aria-describedby="emailHelp" required placeholder="Description">
                    </div>
                    <button class="btn btn-secondary float-right"> <i class="fa-solid fa-floppy-disk"></i> Save</button>
                </form> -->
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.O NAME</th>
                            <th>DESCRIPTION</th>
                            <th>PROGRESS</th>
                            <th style="width: 40px">LABEL</th>
                        </tr>
                    </thead>
                    <tbody id="so_tbody">
                        <!--  Fetch data goes here!-->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
            </div>
        </div>
    </div>
</div>