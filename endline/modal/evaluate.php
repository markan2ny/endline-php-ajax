<div class="modal fade" id="evaluate" tabindex="-1" role="dialog" aria-labelledby="edit_title" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="edit_title"><i class="fa-solid fa-clipboard"></i> EVALUATION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="eval_form">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-2">
                                <label><i class="fa-solid fa-box"></i> M.O</label>
                                <input type="text" name="mo_name" class="form-control" readonly id="mo_name">
                                <input type="hidden" name="evaluator" value="<?php echo $_SESSION['name'] ?>">
                                <input type="hidden" name="eval_id" value="<?php echo $_SESSION['login_id'] ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-2">
                                <label><i class="fa-solid fa-calendar"></i> DATE</label>
                                <input type="date" name="eval_date" id="eval_date" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-2">
                                <label><i class="fa-solid fa-book-open"></i> BUNDLE TAG</label>
                                <input type="number" min="0" name="bundle_tag" onKeyPress="if(this.value.length==8) return false;" class="form-control" id="bundle_tag" placeholder="BUNDLE TAG" required>
                                <small class="text-danger bundle_error"></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-2">
                                <label><i class="fa-solid fa-calculator"></i> QUANTITY</label>
                                <input type="number" min="0" id="quantity" name="quantity" class="form-control" placeholder="QUANTITY" required>
                                <small class="text-danger quantity_error"></small>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-2 mt-2">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <i class="fa-solid fa-magnifying-glass-chart"></i> <span class="text-bold">REMARK</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="good" name="radio_1" id="radio_1" checked>
                                                    <label class="form-check-label" for="radio_1" checked>
                                                        <i class="fa-solid fa-check text-success"></i> Good
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="wbad" name="radio_1" id="radio_2">
                                                    <label class="form-check-label" for="radio_2">
                                                        <i class="fa-solid fa-xmark text-danger"></i> with Bad
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-2 mt-2">
                                <div class="card card-outline card-danger">
                                    <div class="card-header"><i class="fa-solid fa-list-check"></i> <span class="text-bold">SPECIFY THE BAD</span></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="number" min="1" name="bad_qty" disabled id="bad_qty" class="form-control text-danger" placeholder="BAD QUANTITY">
                                                    <small class="text-danger bad_qty_error"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="BAD1" name="bad_1" disabled id="bad_1" type="checkbox">
                                                    <label class="form-check-label" for="bad_1">
                                                        BAD 1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="BAD2" name="bad_2" disabled id="bad_2" type="checkbox">
                                                    <label class="form-check-label" for="bad_2">
                                                        BAD 2
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="BAD3" name="bad_3" disabled id="bad_3" type="checkbox">
                                                    <label class="form-check-label" for="bad_3">
                                                        BAD 3
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="BAD4" name="bad_4" disabled id="bad_4" type="checkbox">
                                                    <label class="form-check-label" for="bad_4">
                                                        BAD 4
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="BAD5" name="bad_5" disabled id="bad_5" type="checkbox">
                                                    <label class="form-check-label" for="bad_5">
                                                        BAD 5
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" disabled id="check_all" type="checkbox" value="">
                                                    <label class="form-check-label" for="check_all">
                                                        CHECK ALL
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="text-danger check_error"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                <button type="button" class="btn btn-primary btn-flat update_btn" id="save_evaluate"><i class="fa-solid fa-floppy-disk"></i> Submit </button>
            </div>
        </div>
    </div>
</div>