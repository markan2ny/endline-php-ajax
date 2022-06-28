<?php include_once 'views/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card mt-5">
                <div class="card-header bg-secondary text-white">
                    <span>Login</span>
                </div>
                <div class="card-body">
                    <form id="form">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once 'views/footer.php'; ?>

<script>
    $(document).ready(function() {


        $('form#form').submit(function(e){
            e.preventDefault();


            $.ajax({
                url: 'core/login.php',
                method: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
                beforeSend: function() {
                    alert('Please wait...');
                },
                success: function(res){
                    if(res.success) {
                        console.log(res.data);
                        if(res.data.role_id == "1") {
                            window.location.href ='admin/';
                        } else if(res.data.role_id == "2") {
                            window.location.href = 'manager/';
                        } else {
                            window.location.href = 'endline/';
                        }
                    } else {
                        alert(res.error);
                    }

                }
            });
        });


    })
</script>