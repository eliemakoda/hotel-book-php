<?php

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
	$id_client = $_SESSION["id_client"]?$_SESSION["id_client"] :1;
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
	header("location: pay.php?amount=$prix");
}
?>