<?php
session_start();
require "./config/app.php";
$apps  = new App;
$services = $apps->SelectionnerTout("SELECT * FROM service WHERE 1");
require 'client/header.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Services <i class="fa fa-chevron-right"></i></span></p>
        <h1 class="mb-0 bread">Services</h1>
      </div>
    </div>
  </div>
</section>
<!-- service -->
<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      <!-- service -->
      <?php
      if (isset($services) && ($services != null)) :
        foreach ($services as $serv) :
          $img = explode(',', $serv->images_service);

      ?>
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(images/<?php echo $img[array_rand($img)] ?>);"></div>
              <div class="media-body py-4 px-3">
                <h3 class="heading"><?php echo $serv->titre ?></h3>
                <p><?php echo $serv->description_service ?></p>
                <p><a href="#" class="btn btn-primary"></a></p>
              </div>
            </div>
          </div>
      <?php
        endforeach;
      endif;
      ?>
    
    </div>
  </div>
</section>

<section class="ftco-section bg-light ftco-no-pt">
  <div class="container">
    <div class="row no-gutters justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Amenities</h2>
      </div>
    </div>
    <div class="row">
      <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
          <span class="flaticon-diet"></span>
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Tea Coffee</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary</p>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
          <span class="flaticon-workout"></span>
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Hot Showers</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary</p>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
          <span class="flaticon-diet-1"></span>
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Laundry</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary</p>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
          <span class="flaticon-first"></span>
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Air Conditioning</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary</p>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
          <span class="flaticon-first"></span>
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Free Wifi</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary</p>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
          <span class="flaticon-first"></span>
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Kitchen</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary</p>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
          <span class="flaticon-first"></span>
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Ironing</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary</p>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
          <span class="flaticon-first"></span>
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Lovkers</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require 'client/footer.php';
?>