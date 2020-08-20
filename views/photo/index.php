<?php include('views/partials/header.php');   ?>
<?php include('views/partials/nav.php');   ?>
<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="/views/assets/photos.css">

<body>



<section class="album gallery-block cards-gallery">
<span><a href=<?php echo "/Gallery/photo/create/?album=".$main[0]['id']; ?> class="btn btn-primary mt-2 mr-2" style="float:right; width:195px; "  >Add Photo</a></span>
        <div class="container" id="container">



            <div style="text-align: center; padding-bottom:20px;">
           
            <h1 id="header"><?php echo $main[0]['name']; ?></h1>
                
            </div>
            <div >
                <?php
                if (isset($_SESSION['success'])) {
                ?><div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                <?php }
                unset($_SESSION['success']); ?>

                <?php if (!empty($photos)) {
                    $i = 0;
                    foreach ($photos as $photo) {
                        if ($i % 3 == 0) {
                            echo '<div class="row">';
                        } ?>
                        <div class="col-lg-4" style="padding-bottom:20px;">
                            <div class="card border-primary transform-on-hover">
                                <a target="_blank" href=<?php echo "/Gallery/slider/?photo=".$photo['id']."&album=".$main[0]['id']; ?>> <img  src=<?php echo "/views/storage/photos/" . $photo['path']; ?> class="card-img-top img-thumbnail border" style="height:250px;"></a>
                                <div class="card-body">
                                    <h6><?php echo $photo['caption']; ?><span><img src="/views/storage/asset/delete.png" onclick=<?php echo "d(".$photo['id'].",".$main[0]['id'].")"; ?>  class="float-right delete" style="height:40px;"></span></h6>
                                     
        
                                </div>
                            </div>
                        </div>
                    <?php if ($i % 3 == 2) {
                            echo '</div>';
                        }
                        $i++;
                    } } else { ?>
                    <div>
                        <h3 style="color:#b35900 ">No photos in this album</h3>
                    </div>
                <?php } ?> 
               



            </div>


        </div>
    </section>



    <script src="/views/assets/js/scripts.js">  </script>


    <?php include('views/partials/footer.php');   ?>