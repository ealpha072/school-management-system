<?php require "../shared/home.php";?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Add a stream</h5>
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php
                    echo showSuccessMessage();

                    if(isset($add_stream_error) && !empty($add_stream_error)){
                        displayErrors($add_stream_error);
                    }
                ?>
                <div class="form-row">
                    <div class="col">
                        <label for="stream-name">Name of stream</label>
                        <input type="text" class="form-control" placeholder="Insert name of new stream" name="stream-name">
                    </div>
                </div>
                <hr>
                <div class="button">
                    <button class="btn btn-primary" name="add-stream">Add Stream</button>
                </div>
            </form>
        </div>
    </div>
</div>
