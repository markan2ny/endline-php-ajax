<?php include_once 'views/header.php'; ?>
<script>
    $('.remove').click(function(res){
        alert('ss');
    })
</script>
<?php
include_once '../db/database.php';

$init = new database;

$styles = $init->connect()->query("SELECT * FROM styles WHERE is_active = 1");


// if(isset($_POST['delete_me'])) {

//     header('location: mo.php');

//  }

?>

<div class="content">

    <div class="container-fluid">
        <div class="card card-outline card-secondary collapsed-card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-screwdriver-wrench"></i> CREATE NEW M.O</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form id="form_mo">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label>M.O NAME</label>
                                <input type="text" class="form-control" name="mo_name" required placeholder="M.O NAME">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label>DESCRIPTION</label>
                                <input type="text" class="form-control" name="description" required placeholder="DESCRIPTION">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label>ORDER QUANTITY</label>
                                <input type="number" min="0" max="9999999999999" class="form-control" name="order_qty" required placeholder="QUOTA QUANTITY">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label>QUOTA PER/DAY</label>
                                <input type="number" min="0" max="9999999999999" class="form-control" name="quota_per_day" required placeholder="QUOTA PER/DAY">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label>STYLE NAME</label>
                                <select name="style_id" id="style_id" class="form-control">
                                    <option selected disabled>-SELECT-</option>
                                    <?php while ($sn = $styles->fetch_object()) : ?>
                                        <option value="<?php echo $sn->id ?>">
                                            <?php echo $sn->name ?>
                                        </option>
                                    <?php endwhile; ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label>ORDER DATE</label>
                                <input type="date" name="order_date" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label>SHIPMENT DATE</label>
                                <input type="date" name="order_shipment_date" required class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-flat float-right mt-2"><i class="fa-solid fa-file-export"></i> CREATE M.O</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>



        <div class="card">
            <div class="card-header">
                <form id="form">
                    <?php
                    $ss = $init->connect()->query("SELECT * FROM styles WHERE is_active = 1");
                    ?>

                    <select name="select_style" id="select_style" class="form-control">
                        <option disabled selected>-SELECT STYLE NAME-</option>
                        <?php while ($style = $ss->fetch_object()) : ?>
                            <option data-id="<?php echo $style->id; ?>" id="selected_opt"><?php echo $style->name; ?></option>
                        <?php endwhile; ?>
                    </select>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>M.O NAME</th>
                            <th>DESCRIPTION</th>
                            <th>ORDER QTY.</th>
                            <th>QUOTA PER DAY</th>
                            <th>ORDER DATE</th>
                            <th>SHIPMENT DATE</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_mo">
                        <!-- HERE -->
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<?php include_once 'modal/mo_modal.php'; ?>
<!-- Footer -->
<?php include_once 'views/footer.php'; ?>


<script>
    $(document).ready(function() {

        $('tbody#tbl_mo').html('<tr><td colspan="7"><h1 class="text-muted text-center">NO DATA</h1></td></tr>');
        fetch_mo();
        add_mo();


        $('.delete_me').click(function() {
            alert('aa');
        });

        function fetch_mo() {
            $('#selected_mo_name').text("NO SELECTED STYLE");

            $('select#select_style').change(function(e) {
                e.preventDefault();
                var id = $(this).children(':selected').data('id');

                // alert(id);

                $.ajax({
                    url: 'core/fetch_mo.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        $('tbody#tbl_mo').html(res);
                    }
                });

            });
        }

        function add_mo() {

            $('form#form_mo').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'core/insert_mo.php',
                    method: 'POST',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(res) {
                        if (res.success) {
                            alert(res.success);
                            $('form#form_mo')[0].reset();
                        } else {
                            alert(res.error);
                        }
                    }
                });
            });
        }


    });
</script>