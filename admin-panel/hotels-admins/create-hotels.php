<?php
session_start();
require "../../config/app.php";
$apps= new App;
// INSERT INTO `hotel`(`id`, `nom_hotel`, `localisation_hotel`, `description_hotel`, `contact_hotel`, `images_hotel`, `nbEtoile_Hotel`, `id_admin`, `date_ajout`)
//  VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]')

if(isset($_POST["submit"]))
{
  $nom = $_POST['name'];
  $description=$_POST['description'];
  $location=$_POST['location'];
  $contact=$_POST['contact'];
  $nbetoile=$_POST['nbetoile'];
  $images = $_FILES["images"];
  $id_admin = $_SESSION["id_admin"];
  $uploadDirectory ="../../images/";
  $urlsImages = [];

    // Vérifier s'il y a des erreurs lors du téléchargement des images
    if (!empty($_FILES["images"]["name"][0])) {
        foreach ($_FILES["images"]["name"] as $key => $imageName) {
            $imageTmpName = $_FILES["images"]["tmp_name"][$key];
            $urlsImages[]=$imageName;
            $imagePath = $uploadDirectory . $imageName;
            move_uploaded_file($imageTmpName,$imagePath);
    }

    $sql="INSERT INTO hotel(nom_hotel, localisation_hotel,description_hotel, contact_hotel, images_hotel, nbEtoile_Hotel, id_admin) VALUES(:nom_hotel, :localisation_hotel,:description_hotel, :contact_hotel, :images_hotel, :nbEtoile_Hotel, :id_admin)";
    $tab=[
      ":nom_hotel"=>$nom,
      ":localisation_hotel"=>$location,
      ":description_hotel"=>$description,
       ":contact_hotel"=>$contact,
        ":images_hotel"=>implode(',',$urlsImages), 
        ":nbEtoile_Hotel"=>$nbetoile,
         ":id_admin"=>$id_admin
    ];
    $dest="./show-hotels.php";
    $apps->inserer($sql, $tab,$dest);
    }
}
require '../../admin/header.php';
?>
    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Hotels</h5>
          <form method="POST" action="./create-hotels.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Nom Hotel" />
                 
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="images[]"  id="form2Example1" class="form-control"/>
                 
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="description"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Localisation</label>

                  <input type="text" name="location" id="form2Example1" class="form-control"/>
                 
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Contact Hotel</label>

                  <input type="text" name="contact" id="form2Example1" class="form-control"/>
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Nombre d'Etoiles</label>

                  <input type="number" name="nbetoile" id="form2Example1" class="form-control"/>
                 
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">AJouter Hotel</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php
require '../../admin/footer.php';
?>