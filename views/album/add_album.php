<?php include('views/partials/header.php');   ?>
<link rel="stylesheet" type="text/css" href="/views/assets/styles.css">

<body>


    <div class="container" style="margin-top: 50px;">
        <div class="card card-default " style="margin:0 auto; width: 600px;">
            <div class="card-header">
                Create new album
            </div>
            <div class="card-body">
                <form action="/store" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name='name' type="text" class="form-control" placeholder="Enter album name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" placeholder="Album description" name="description" rows="4" cols="50" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Select album thumbnail:</label>
                        <input class="form-control-file" type="file" name="thumbnail" accept="image/*">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add album">

                </form>
            </div>
        </div>
    </div>



    <?php include('views/partials/footer.php');   ?>