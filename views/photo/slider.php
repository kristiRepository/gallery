<?php include('views/partials/header.php');   ?>
<link rel="stylesheet" type="text/css" href="/views/assets/slider.css">

<div class="container">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img style="width:700px; height:600px;" class="d-block w-100" src=<?php echo "/views/storage/photos/" . $photoPath[0]['path']; ?>>
      </div>


      <?php foreach ($photos as $photo) {
        if ($photo['path'] == $photoPath[0]['path']) {
          continue;
        } ?>

        <div class="carousel-item">
          <img style="width:700px; height:600px;" class="d-block w-100" src=<?php echo "/views/storage/photos/" . $photo['path']; ?>>
        </div>

      <?php } ?>


    </div>

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>
</div>


<div class="row pt-5" style="margin:0 auto;">
  <?php foreach ($photos as $photo) { ?>
    <img class="ima" album=<?php echo $photo['album_id']; ?> id=<?php echo $photo['id']; ?> src=<?php echo "/views/storage/photos/" . $photo['path']; ?> style="width:130px; height:110px; padding-right:10px; padding-leftt:5px;">
  <?php } ?>






  <script src="/views/assets/js/scripts.js"> </script>























  <?php include('views/partials/footer.php');   ?>