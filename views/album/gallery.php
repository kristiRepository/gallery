<?php include('views/partials/header.php');   ?>
<?php include('views/partials/nav.php');   ?>
<?php session_start(); ?>

<link rel="stylesheet" type="text/css" href="/views/assets/styles.css">

<body>

    <section class="album gallery-block cards-gallery">
        <div class="container">
            <div>
                <img class="rounded mx-auto d-block" id="title" style="padding-top:30px; padding-bottom:30px;" src="/views/storage/banner.png">
            </div>
            <?php 
            if (isset($_SESSION['success'])) {
            ?><div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
            <?php }
            unset($_SESSION['success']); ?>

            <?php $i = 0;
            foreach ($albums as $album) {
                if ($i % 3 == 0) {
                    echo '<div class="row">';
                } ?>
                <div class="col-lg-4" style="padding-bottom:20px;">
                    <div class="card border-primary transform-on-hover">
                        <a  href=<?php echo "/Gallery/album/?id=" . $album['id']; ?>> <img src=<?php echo "/views/storage/albums/" . $album['thumbnail']; ?> class="card-img-top img-thumbnail border" style="height:250px;"></a>
                        <div class="card-body">
                            <h6><?php echo $album['name']; ?></h6>
                            <p class="text-muted card-text"><?php
                                                            if (strlen($album['description']) > 25) {
                                                                echo substr($album['description'], 0, 26) . " .....";
                                                            } else {
                                                                echo $album['description'];
                                                            } ?> <span><img src="/views/storage/asset/delete.png" onclick="handleDelete(<?php echo $album['id']; ?>)" class="float-right delete" style="height:40px;"></span></p>

                        </div>
                    </div>
                </div>
            <?php if ($i % 3 == 2) {
                    echo '</div>';
                }
                $i++;
            } ?>

            <div class="col-lg-4" style="padding-bottom:20px;">
                <a class="lightbox" href="/Gallery/create"> <img src="/views/storage/asset/add2.png" class="img-thumbnail" id="add" style=" margin:80px; width:150px; height:150px; border:1px solid black "></a>
            </div>

        </div>
    </section>




    </div>

    <!-- Delete Modal -->
    <form action="/Gallery/delete" method='POST' id='deleteAlbum'>

        <div class="modal" id='deleteModal' tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id='deleteModalLabel'>Delete Album </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this album?</p>
                    </div>
                    <input type="hidden" id="id" name="id" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No,go back</button>
                        <button type="submit" class="btn btn-danger">Yes,delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    



    <script src="/views/assets/js/scripts.js">  </script>





    <?php include('views/partials/footer.php');  ?>