<?php
require "./config/app.php";
session_start();
function calculateDaysBetweenDates($date1, $date2)
{
	$date1 = DateTime::createFromFormat('d/m/Y', $date1);
	$date2 = DateTime::createFromFormat('d/m/Y', $date2);
	$interval = $date1->diff($date2);
	return $interval->days;
}

// Example usage
// $date1 = '15/08/2022';
// $date2 = '25/08/2022';
// $daysBetweenDates = calculateDaysBetweenDates($date1, $date2);
if (isset($_POST["submit"])) {
	$email = $_POST["email"];
	$name = $_POST["name"];
	$contact = $_POST["contact"];
	$DateDebut = $_POST["startDate"];
	$EndDate = $_POST["EndDate"];
	$id_client = $_SESSION['id_client'] || 1;
	$id_chambre = $_POST['id_chambre'];
	$room_price = $_POST["room_price"];
	$nb_jours = calculateDaysBetweenDates($DateDebut, $EndDate);
	$prix = $nb_jours * $room_price;
	$SqlQuery = "INSERT INTO reservation(date_reservation, NombreJours, id_chambre, id_client) VALUES(:date_reservation, :NombreJours, :id_chambre, :id_client)";
	$DataArray = [
		":date_reservation" => $DateDebut,
		":NombreJours" => $nb_jours,
		":id_chambre" => $id_chambre,
		":id_client" => $id_client
	];
	header("location: pay.php?amount=<?php echo $prix ;?>");
}
$apps  = new App;
$id = $_GET["id"];
$sql = "SELECT * FROM chambre WHERE id_chambre=$id";
$res = $apps->SelectionnerUn($sql);
$img = explode(',', $res->images);

require 'client/header.php';
?>

<div class="hero-wrap js-fullheight" style="background-image: url(./images/<?php echo $img[array_rand($img)] ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
			<div class="col-md-7 ftco-animate">
				<h2 class="subheading">Bienvenue à WELL BEING</h2>
				<h1 class="mb-4">Chambre No <?php echo $res->num_chambre; ?></h1>
				<!-- <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-lg-4">
				<?php
				if (isset($_SESSION['nom_client']) && ($_SESSION['nom_client'])) :
				?>
					<form action="./traitement.php" class="appointment-form" method="POST" style="margin-top: -568px;">
						<h3 class="mb-3">Reserver cette chambre </h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input name="email" type="text" class="form-control" placeholder="Email" value=<?php echo $_SESSION['email_client']; ?> readonly>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input name="name" type="text" class="form-control" placeholder="Full Name" value=<?php echo $_SESSION['nom_client']; ?> readonly>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input name="contact" type="text" class="form-control" placeholder="Phone Number" value=<?php echo $_SESSION['tel_client']; ?> readonly>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input name="startDate" type="text" class="form-control appointment_date-check-in" placeholder="Date d'entrer">
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<div class="icon"><span class="ion-md-calendar"></span></div>
									<input name="EndDate" type="text" class="form-control appointment_date-check-out" placeholder="Date de Sortie">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input name="id_chambre" type="text" class="form-control appointment_date-check-in" placeholder="chambre" value=<?php echo $res->id_chambre; ?> hidden>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input name="room_price" type="text" class="form-control appointment_date-check-in" placeholder="chambre" value=<?php echo $res->prix_nuit; ?> hidden>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Reserver" class="btn btn-primary py-3 px-4" name="submit">
								</div>
							</div>
						</div>
					</form>
				<?php
				else :
				?>

					<form action="./traitement.php" method="POST" class="appointment-form" style="margin-top: -568px;">
						<h3 class="mb-3">Reserver cette chambre </h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input name="email" type="text" class="form-control" placeholder="Email">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input name="name" type="text" class="form-control" placeholder="Nom Complet">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input name="contact" type="text" class="form-control" placeholder="Numero de telephone ">
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input name="startDate" type="text" class="form-control appointment_date-check-in" placeholder="Date d'entrer">
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<div class="icon"><span class="ion-md-calendar"></span></div>
									<input name="EndDate" type="text" class="form-control appointment_date-check-out" placeholder="Date de Sortie">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input name="id_chambre" type="text" class="form-control appointment_date-check-in" placeholder="chambre" value=<?php echo $res->id_chambre; ?> hidden>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input name="room_price" type="text" class="form-control appointment_date-check-in" placeholder="chambre" value=<?php echo $res->prix_nuit; ?> hidden>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Reserver et payer" class="btn btn-primary py-3 px-4" name="submit">
								</div>
							</div>
						</div>
					</form>
				<?php
				endif;
				?>
			</div>
		</div>
	</div>
</section>






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