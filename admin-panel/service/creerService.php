<?php
// session_start();
session_start();
require "../../config/app.php";
$apps= new App;
$hotels= $apps->SelectionnerTout("SELECT * FROM hotel WHERE 1");
if(isset($_POST["submit"]))
{
  $type=$_POST["type"];
  $description=$_POST["description"];
  $titre=$_POST['titre'];
  $hotels=$_POST['hotels'];
  $id_admin = $_SESSION["id_admin"];
  $uploadDirectory ="../../images/";
  $urlsImages = [];
  $statut=0;
    // Vérifier s'il y a des erreurs lors du téléchargement des images
    if (!empty($_FILES["images"]["name"][0])) {
        foreach ($_FILES["images"]["name"] as $key => $imageName) {
            $imageTmpName = $_FILES["images"]["tmp_name"][$key];
            $urlsImages[]=$imageName;
            $imagePath = $uploadDirectory . $imageName;
            move_uploaded_file($imageTmpName,$imagePath);
    }
$sql="INSERT INTO service(type_service, images_service, description_service, titre, id_hotel, id_admin) VALUES(:type_service, :images_service, :description_service, :titre, :id_hotel, :id_admin)";
$tab=[
  ":type_service"=>$type,
   ":images_service"=>implode(',',$urlsImages),
    ":description_service"=>$description,
     ":titre"=>$titre,
      ":id_hotel"=>$hotels,
       ":id_admin"=>$id_admin
];
$dest="VoirService.php";
$apps->inserer($sql,$tab,$dest);
  }
}
require '../../admin/header.php';
?>
    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Creer Chambres</h5>
              <?php
              if(isset($hotels)&& ($hotels!=null)):
              ?>
              <!-- INSERT INTO `service`(`id_service`, `type_service`, `images_service`, `description_service`, `titre`, `id_hotel`, `id_admin`) 
              VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]') -->
          <form method="POST" action="./creerService.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="type" id="form2Example1" class="form-control" placeholder="Type du service (domicile, Pas" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file"  name="images[]" id="form2Example1" class="form-control" />
                 
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <label for="description">Description</label>
                  <!-- <input type="text" name="priceNight" id="form2Example1" class="form-control" placeholder="Prix par Nuitée" /> -->
                 <textarea name="description" id="description form2Example1" class="form2Example1" cols="30" rows="10"></textarea>
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="titre" id="form2Example1" class="form-control" placeholder="Titre Service" />
                 
                </div> 
             
               <select class="form-control" name="hotels">
                <?php 
                foreach($hotels as $hotel):
                ?>
                <option value=<?php echo $hotel->id?>><?php echo $hotel->nom_hotel?></option>
           <?php
           endforeach;
           ?>
               </select>
               <br>
   
             
               <br>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Creer</button>

          
              </form>
<?php
endif;
?>
            </div>
          </div>
        </div>
      </div>
  </div>
  <?php
require '../../admin/footer.php';
?>