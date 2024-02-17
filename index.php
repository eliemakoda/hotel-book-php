<?php
session_start();
require "./config/app.php";
$apps  = new App;
$sql_hotel = "SELECT * FROM hotel WHERE 1";
$hotels = $apps->SelectionnerTout($sql_hotel);
$sql_chambre = "SELECT * FROM chambre WHERE 1";
$chambres = $apps->SelectionnerTout($sql_chambre);
require "client/header.php";
?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
			<div class="col-md-7 ftco-animate">
				<h2 class="subheading">Welcome to Vacation Rental</h2>
				<h1 class="mb-4">Rent an appartment for your vacation</h1>
				<p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p>
			</div>
		</div>
	</div>
</div>

<!-- hotel  -->
<section class="ftco-section ftco-services">
	<div class="container">
		<div class="row">
			<?php
			if (isset($hotels) && ($hotels != null)) :
				foreach ($hotels as $hotel) :
			?>
					<div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
						<div class="d-block services-wrap text-center">
							<div class="img" style="background-image: url(images/services-1.jpg);"></div>
							<div class="media-body py-4 px-3">
								<h3 class="heading">Sheraton <?php echo $hotel->nom_hotel ?></h3>
								<p><?php echo $hotel->description_hotel ?></p>
								<p>Lieu: <?php echo $hotel->localisation_hotel ?></p>
								<p><a href="roomHotel.php?id=<?php echo $hotel->id ?>" class="btn btn-primary">Voir les chambres</a></p>
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
<!-- fin hotel  -->
<!-- chambre  -->
<section class="ftco-section bg-light">
	<div class="container-fluid px-md-0">
		<div class="row no-gutters justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2>

					Chambres d'hotels</h2>
			</div>
		</div>
		<div class="row no-gutters">
			<!-- debut chambre -->
			<?php
			if (isset($chambres) && ($chambres != null)) :
				foreach ($chambres as $chambre) :
					$img = explode(',', $chambre->images);

			?>
					<div class="col-lg-6">
						<div class="room-wrap d-md-flex">
							<a href="#" class="img" style="background-image: url(<?php echo $img[array_rand($img)] ?>);"></a>
							<div class="half left-arrow d-flex align-items-center">
								<div class="text p-4 p-xl-5 text-center">
									<p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
									<p class="mb-0"><span class="price mr-1"> <?php echo $chambre->prix_nuit; ?> FCFA </span> <span class="per">Par Nuit</span></p>
									<h3 class="mb-3"><a href="room-single.php?id=<?php echo $chambre->id_chambre; ?>"><?php echo $chambre->type_chambre; ?></a></h3>
									<ul class="list-accomodation">
										<li><span>Max:</span> <?php echo $chambre->type_chambre; ?>3 Personnes</li>
										<li><span>Taille:</span> <?php echo $chambre->taille_chambre; ?> m2</li>
										<li><span>Heure:</span><?php echo $chambre->prix_heure; ?> FCFA</li>
										<li><span>Nombre de Lit:</span> <?php echo $chambre->nb_lits; ?></li>
									</ul>
									<p class="pt-1"><a href="room-single.php?id=<?php echo $chambre->id_chambre; ?>" class="btn-custom px-3 py-2">Voir les Details <span class="icon-long-arrow-right"></span></a></p>
								</div>
							</div>
						</div>
					</div>
			<?php
				endforeach;
			endif;
			?>
			<!-- fin chambre  -->

		</div>
	</div>
</section>

<!-- fin chambre -->

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-6 wrap-about">
				<div class="img img-2 mb-4" style="background-image: url(images/image_2.jpg);">
				</div>
				<h2>The most recommended vacation rental</h2>
				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
			</div>
			<div class="col-md-6 wrap-about ftco-animate">
				<div class="heading-section">
					<div class="pl-md-5">
						<h2 class="mb-2">What we offer</h2>
					</div>
				</div>
				<div class="pl-md-5">
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<div class="row">
						<div class="services-2 col-lg-6 d-flex w-100">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-diet"></span>
							</div>
							<div class="media-body pl-3">
								<h3 class="heading">Tea Coffee</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
						<div class="services-2 col-lg-6 d-flex w-100">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-workout"></span>
							</div>
							<div class="media-body pl-3">
								<h3 class="heading">Hot Showers</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
						<div class="services-2 col-lg-6 d-flex w-100">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-diet-1"></span>
							</div>
							<div class="media-body pl-3">
								<h3 class="heading">Laundry</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
						<div class="services-2 col-lg-6 d-flex w-100">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-first"></span>
							</div>
							<div class="media-body pl-3">
								<h3 class="heading">Air Conditioning</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
						<div class="services-2 col-lg-6 d-flex w-100">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-first"></span>
							</div>
							<div class="media-body pl-3">
								<h3 class="heading">Free Wifi</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
						<div class="services-2 col-lg-6 d-flex w-100">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-first"></span>
							</div>
							<div class="media-body pl-3">
								<h3 class="heading">Kitchen</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
						<div class="services-2 col-lg-6 d-flex w-100">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-first"></span>
							</div>
							<div class="media-body pl-3">
								<h3 class="heading">Ironing</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
						<div class="services-2 col-lg-6 d-flex w-100">
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
			</div>
		</div>
	</div>
</section>

<section class="ftco-intro" style="background-image: url(images/image_2.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-9 text-center">
				<h2>Ready to get started</h2>
				<p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
				<p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#" class="btn btn-white px-4 py-3">Contact us</a></p>
			</div>
		</div>
	</div>
</section>
<?php
require 'client/footer.php';
?>