<?php include_once 'views/header.php'; ?>
<?php

include_once '../db/database.php';
$init = new database;

$id = $_SESSION['login_id'];

$q = $init->connect()->query("SELECT * FROM evaluations WHERE status = 0 AND evaluator_id = $id ORDER BY id DESC");

?>



<div class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header bg-secondary">
                <span>PENDING LIST</span>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="example2">
                    <thead>
                        <tr>
                            <th>M.O</th>
                            <th>BUNDLE TAG</th>
                            <th>BUNDLE QTY.</th>
                            <th>BAD QTY.</th>
                            <th>DATE TIME</th>
                            <th>BAD REMARKS</th>
                            <th>EVALUATOR</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($q->num_rows > 0) : ?>
                            <?php while ($list = $q->fetch_object()) : ?>
                                <tr id="pending_item" data-row="<?php echo $list->id; ?>">
                                    <td><?php echo $list->mo_name; ?></td>
                                    <td><?php echo $list->bundle_tag; ?></td>
                                    <td><?php echo $list->quantity; ?></td>
                                    <td>
                                        <?php if ($list->bad_qty == 0) : ?>
                                            <span class="badge badge-secondary">
                                                <?php echo $list->bad_qty; ?>
                                            </span>
                                        <?php else : ?>
                                            <span class="badge badge-danger">
                                                <?php echo $list->bad_qty; ?>
                                            </span>
                                        <?php endif; ?>

                                    </td>
                                    <td><?php echo $list->date; ?></td>
                                    <td>
                                        <span class="badge badge-secondary"><?php echo $list->bad1 ?></span>
                                        <span class="badge badge-secondary"><?php echo $list->bad2 ?></span>
                                        <span class="badge badge-secondary"><?php echo $list->bad3 ?></span>
                                        <span class="badge badge-secondary"><?php echo $list->bad4 ?></span>
                                        <span class="badge badge-secondary"><?php echo $list->bad5 ?></span>
                                    </td>
                                    <td>
                                        <span>
                                            <?php echo $list->evaluate_by; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($list->bad_qty == 0) : ?>
                                            <button class="btn btn-success btn-flat btn-sm submit_1" id="<?php echo $list->id?>">Submit</button>
                                        <?php else : ?>
                                            <span class="text-bold text-danger">FOR FIXING</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
<?php include_once 'modal/edit_pending.php'; ?>
<?php include_once 'views/footer.php'; ?>

<script>
    $(function() {


        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('tr#pending_item').dblclick(function(e) {
            var id = $(this).data('row');
            $('#edit_pending').modal('show');
            $.ajax({
                url: 'core/get_pending.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(res) {
                    console.log(res.data);
                    $('#hidden_id').val(res.data.id);
                    $('#get_bad_qty').val(res.data.bad_qty);
                    $('#edit_title').text('Bundle tag: ' + res.data.bundle_tag);
                }
            })
        });


        $('#update_pending').click(function(e) {
            e.preventDefault();

            var fixed_qty = parseInt($('#fixed_qty').val());
            var get_bad_qty = parseInt($('#get_bad_qty').val());

            if (fixed_qty === 0) {
                alert('Fix qty. must be 1 or equal to bad qty.');
                return false;
            }
            if (fixed_qty > get_bad_qty) {
                alert('Fix qty. must be less than or equal to bad qty.');
                return false;
            }

            $.ajax({
                url: 'core/update_pending.php',
                method: 'POST',
                data: $('form#pending_form').serialize(),
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        alert(res.success);
                        location.reload();
                    } else {
                        alert(res.error);
                    }
                }
            });
        });


        $('.submit_1').click(function(e) {
            e.preventDefault();

            var id = $(this).attr('id');
            var tr = $(this).closest('tr').fadeOut();
            $.ajax({
                url: 'core/submit_1.php',
                method: 'POST',
                data: {id: id},
                success: function(res) {
                    if(res.success) {
                        tr.fadeOut(1000, function() {
                            tr.remove();
                        });
                    }
                }
            });
        });
    });
</script>