<?php require "../shared/home.php";?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h6><i class="fa fa-plus fa-sm"></i> Add a stream</h6>
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php
                    echo showSuccessMessage();

                    if(isset($add_stream_error) && !empty($add_stream_error)){
                        displayErrors($add_stream_error);
                    }
                ?>

                <div class="form-group row">

                    <label for="stream-name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" placeholder="New stream name" name="stream-name">
                    </div>

                    <button class="btn btn-primary btn-sm" name="add-stream" type="submit">+ Add Stream</button>
                </div>
            </form>
        </div>
    </div>
</div>
