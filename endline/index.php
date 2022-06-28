<?php include_once 'views/header.php'; ?>
<?php

include_once '../db/database.php';
$init = new database;

$styles = $init->connect()->query("SELECT * FROM styles ORDER BY is_active AND id DESC");

?>

<style>
    .mo_list_item {
        transition: .3s;
    }

    .mo_list_item:hover {
        color: crimson;
        padding-left: 5px;
    }
</style>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <?php if ($styles->num_rows > 0) : ?>

                <?php while ($style = $styles->fetch_object()) : ?>
                    <div class="col-lg-3">
                        <div class="card card-outline <?php echo $style->is_active ? 'card-success' : 'card-danger'; ?> collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $style->name; ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php

                                $mo = $init->connect()->query("SELECT * FROM sales_orders WHERE style_id = $style->id");
                                if ($mo->num_rows > 0) :
                                ?>
                                    <ul class="list-group list-group-flush">
                                        <?php while ($m = $mo->fetch_object()) : ?>
                                            <li class="list-group-item">
                                                <span style="cursor: pointer;" class="mo_list_item" id="<?php echo $m->id; ?>"><i class="fa-solid fa-arrow-right text-success"></i> <?php echo $m->so_name; ?></span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php else : ?>
                                    <h1 class="text-muted text-center">NO DATA</h1>
                                <?php endif; ?>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                <?php endwhile; ?>

        </div>
    <?php else : ?>

        <div class="col-lg-12">
            <h1 class="text-muted text-center mt-5">NO DATA</h1>
        </div>

    <?php endif; ?>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<?php include_once 'modal/evaluate.php'; ?>
<?php include_once 'views/footer.php'; ?>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>


<script>
    $(function() {
        var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;

        $('#eval_date').val(today);

        $('.mo_list_item').each(function() {
            $(this).click(function() {

                $('#evaluate').modal('show');

                var id = $(this).attr('id');
                var mo_name = $(this).text();
                $('#mo_name').val(mo_name);
            });
        });

        // Modal Evaluation
        $('#check_all').change(function() {
            $('#bad_1').prop('checked', true);
            $('#bad_2').prop('checked', true);
            $('#bad_3').prop('checked', true);
            $('#bad_4').prop('checked', true);
            $('#bad_5').prop('checked', true);
        });

        $('#radio_1').click(function() {
            $('#bad_qty').attr('disabled', true);
            $('#bad_qty').val('');
            $('#bad_1').attr('disabled', true);
            $('#bad_2').attr('disabled', true);
            $('#bad_3').attr('disabled', true);
            $('#bad_4').attr('disabled', true);
            $('#bad_5').attr('disabled', true);
            $('#check_all').attr('disabled', true);

            $('#bad_1').prop('checked', false);
            $('#bad_2').prop('checked', false);
            $('#bad_3').prop('checked', false);
            $('#bad_4').prop('checked', false);
            $('#bad_5').prop('checked', false);
            $('#check_all').prop('checked', false);
        })
        $('#radio_2').change(function() {
            if ($(this).is(':checked')) {
                $('#bad_qty').attr('disabled', false);
                $('#bad_1').attr('disabled', false);
                $('#bad_2').attr('disabled', false);
                $('#bad_3').attr('disabled', false);
                $('#bad_4').attr('disabled', false);
                $('#bad_5').attr('disabled', false);
                $('#check_all').attr('disabled', false);
            }
        });


        $('#save_evaluate').click(function(e) {
            e.preventDefault();


            var bundle_tag = $('#bundle_tag').val();
            var quantity = $('#quantity').val();
            var bad_qty = $('#bad_qty').val();
            var checkbox = $('input[type="checkbox"]:checked').length - 1;

            if (bundle_tag === '') {
                $('.bundle_error').text('Bundle tag cannot be empty!');
            } else {
                $('.bundle_error').text('');
            }

            if (quantity === '') {
                $('.quantity_error').text('Quantity cannot be empty!');
            } else {
                $('.quantity_error').text('');
            }

            if (!$('#bad_qty').is(':disabled')) {
                if (bad_qty === '') {
                    $('.bad_qty_error').text('Bad qty. cannot be empty!');
                    return false;
                } else {
                    $('.bad_qty_error').text('');
                }
            }

            if (!$('input[type="checkbox"]').is(':disabled')) {
                if (!checkbox > 0) {
                    $('.check_error').text('Please choose of bad label!');
                    return false;
                } else {
                    $('.check_error').text('');
                }
            }

            $.ajax({
                url: 'core/evaluate.php',
                method: 'POST',
                data: $('#eval_form').serialize(),
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        alert(res.success);
                        $('#eval_form')[0].reset();
                        $('#evaluate').modal('hide');
                    } else {
                        alert(res.error);
                    }
                }
            });
        });
    });
</script>