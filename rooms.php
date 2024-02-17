<?php
require "./config/app.php";
session_start();
$apps  = new App;
// $id=$_GET['id'];
$sql_chambre = "SELECT * FROM chambre WHERE 1";
$chambres = $apps->SelectionnerTout($sql_chambre);
require 'client/header.php';
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Accueil <i class="fa fa-chevron-right"></i></a></span> <span>Chambres <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Nos Chambres</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters"> 
          	<!-- debut chambre -->
			<?php
			if (isset($chambres) && ($chambres != null)) :
				foreach ($chambres as $chambre) :
					$img = explode(',', $chambre->images);

			?>
					<div class="col-lg-6">
						<div class="room-wrap d-md-flex">
							<a href="#" class="img" style="background-image: url(images/<?php echo $img[array_rand($img)] ?>);"></a>
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
<?php
require 'client/footer.php';
?>