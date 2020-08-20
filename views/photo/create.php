<?php include('views/partials/header.php');   ?>

<link rel="stylesheet" type="text/css" href="/views/assets/photos.css">

<body>


    <div class="container" style="margin-top: 50px;">
        <div class="card card-default " style="margin:0 auto; width: 600px;">
            <div class="card-header">
                Add new photo
            </div>
            <div class="card-body">
                <form action="/Gallery/photo/store" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="album" value=<?php echo $_GET['album'] ?>>
                    <div class="form-group">
                        <label for="name">Caption</label>
                        <input name='caption' type="text" class="form-control" placeholder="Enter a caption for this photo" required>
                    </div>
                    <div class="form-group">
                        <label for="path">Select photo to add:</label>
                        <input class="form-control-file" type="file" name="path" accept="image/*" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add photo">

                </form>
            </div>
        </div>
    </div>


    <?php include('views/partials/footer.php');   ?>