<?php include_once 'views/header.php'; ?>
<?php
include_once '../db/database.php';
$init = new database;


$style = $init->connect()->query("SELECT s.name, s.id, s.is_active, GROUP_CONCAT(so.so_name SEPARATOR ' , ') as so_name FROM styles as s LEFT JOIN  sales_orders as so ON so.style_id = s.id GROUP BY s.id");
// $style = $init->connect()->query("SELECT s.is_active,s.name, so.so_name FROM styles as s LEFT JOIN sales_orders as so ON so.style_id = s.id");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>ACTIVE STYLES</span>
                        <button type="button" class="btn btn-flat btn-secondary float-right" data-toggle="modal" data-target="#add_style"><i class="fa-solid fa-plus"></i> New Style</button>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STYLE NAME</th>
                                    <th>MO</th>
                                    <th>STATUS</th>
                                    <th style="width: 10px;">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($style->num_rows > 0) : ?>
                                    <?php while ($s = $style->fetch_object()) : ?>
                                        <tr data-row="<?php echo $s->id; ?>" id="so_row">
                                            <td class="<?php echo $s->is_active ? '' : 'text-muted'; ?>">
                                                <?php if ($s->is_active) : ?>
                                                    <span>
                                                        <?php echo $s->name; ?>
                                                    </span>
                                                <?php else : ?>
                                                    <s><?php echo $s->name; ?></s>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="<?php echo $s->so_name ? 'text-primary' : 'text-muted'; ?>">
                                                    <?php echo $s->so_name ? $s->so_name : 'NO M.O FOUND' ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a style="cursor: pointer ;" id="status" data-status="<?php echo $s->is_active; ?>" class="badge <?php echo $s->is_active ? 'badge-success' : 'badge-danger' ?>">
                                                    <?php echo $s->is_active ? 'Active' : 'Inactive'; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php if ($s->is_active) : ?>
                                                    <button class="btn btn-danger btn-flat btn-sm delete" onclick="return confirm('Delete this style?')" title="DELETE" data-id="<?php echo $s->id; ?>">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                    <button class="btn btn-primary btn-flat btn-sm edit_style" title="EDIT" data-id="<?php echo $s->id; ?>">
                                                        <i class="fa-solid fa-file-pen"></i>
                                                    </button>
                                                <?php else : ?>
                                                    <button class="btn btn-danger btn-flat btn-sm delete" title="DELETE" data-id="<?php echo $s->id; ?>">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>STYLE NAME</th>
                                    <th>MO</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php include_once 'modal/style_modal.php'; ?>
<?php include_once 'modal/modal_so.php'; ?>
<?php include_once 'modal/edit_style.php'; ?>



<?php include_once 'views/footer.php'; ?>
<script>
    $(function() {

        //Call the functions
        fetch_so();

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // Edit Style
        $('.edit_style').click(function(res) {
            $('#edit_style').modal('show');
            var id = $(this).data('id');

            $.ajax({
                url: 'core/get_specific.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(res) {
                    $('#edit_hidden_id').val(res.id);
                    $('#edit_name').val(res.name);
                }
            })
        // Update Style
        $('.update_btn').click(function(e) {

            var name = $('#edit_name').val();

            if(name !== '') {
                $.ajax({
                    url: 'core/update_style.php',
                    method: 'POST',
                    dataType: 'json',
                    data: $('#update_form').serialize(),
                    success: function(res) {
                        if(res.success) {
                            alert(res.success);
                            location.reload();
                        } else {
                            alert(res.error);
                        }
                    }
                });
            } else {
                $('#err_msg').text('Style name field required!');
            }

        });

        });
        // Add Style
        $('#save_style').click(function(e) {
            e.preventDefault();

            var style_name = $('#style_name').val();

            if (style_name !== '') {
                $.ajax({
                    url: 'core/insert_style.php',
                    method: 'POST',
                    dataType: 'json',
                    data: $('form#form').serialize(),
                    success: function(res) {
                        if (res.success) {
                            location.reload();
                        } else {
                            alert(res.error);
                        }
                    }
                });
            } else {
                $('#err_msg').text('Style name field required!');
            }
        });

        // Change status by clicking
        $('a#status').click(function(e) {

            var status = $(this).data('status');

            // $.ajax({
            //     url: 'core/update_status.php',
            //     method: 'POST',
            //     data: {status: status},

            // });

        })

        // Show S.O Info when double click it.
        function fetch_so() {
            $('tr#so_row').dblclick(function(e) {
                e.preventDefault();
                $('#show_so_modal').modal('show');
                var id = $(this).data('row');
                var td_name = $(this).find('td:eq(0)').text();

                $('#so_title').text('O.B #: ' + td_name);

                $.ajax({
                    url: 'core/fetch_so.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // console.log(res);
                        $('#so_tbody').html(res);
                    }
                });
            });
        }

        $('tr#so_row').find('td').eq(2).click(function(e) {
            alert('aa');
        })

        // Delete
        $('.delete').click(function(e) {
            e.preventDefault();

            var tr = $(this).closest('tr').fadeOut();
            var id = $(this).data('id');

            $.ajax({
                url: 'core/delete_style.php',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        tr.fadeOut(1000, function() {
                            tr.remove();
                        });
                    } else {
                        alert(res.error);
                    }
                }
            })


        })
    });
</script>