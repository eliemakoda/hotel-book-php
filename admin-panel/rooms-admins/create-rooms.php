<?php
// session_start();
session_start();
require "../../config/app.php";
$apps= new App;
$hotels= $apps->SelectionnerTout("SELECT * FROM hotel WHERE 1");
if(isset($_POST["submit"]))
{
 
  $nom= $_POST['name'];
  $images = $_FILES["images"];
  $priceNight=$_POST["priceNight"];
  $priceHours=$_POST["priceHours"];
  $NbLits=$_POST["NbLits"];
  $taille=$_POST["taille"];
  $hotel=$_POST["hotels"];
  $type=$_POST["type"];
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
$sql="INSERT INTO chambre(num_chambre, type_chambre, images, prix_nuit,prix_heure,taille_chambre, nb_lits, statut_chambre, id_admin,id_hotel) VALUES(:num_chambre, :type_chambre, :images, :prix_nuit,:prix_heure,:taille_chambre, :nb_lits, :statut_chambre, :id_admin,:id_hotel)";
$tab= [
  ":num_chambre"=>$nom, 
  ":type_chambre"=>$type,
   ":images"=>implode(',',$urlsImages),
    ":prix_nuit"=>$priceNight,
    ":prix_heure"=>$priceHours,
    ":taille_chambre"=>$taille,
     ":nb_lits"=>$NbLits, 
     ":statut_chambre"=>$statut,
      ":id_admin"=>$id_admin,
      ":id_hotel"=>$hotel
];
$dest="./show-rooms.php";
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
          <form method="POST" action="./create-rooms.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Numero de la chambre" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file"  name="images[]" id="form2Example1" class="form-control" />
                 
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="priceNight" id="form2Example1" class="form-control" placeholder="Prix par Nuitée" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="priceHours" id="form2Example1" class="form-control" placeholder="Prix Par Heure" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="number" name="NbLits" id="form2Example1" class="form-control" placeholder="Nombre de Lit" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="number" name="taille" id="form2Example1" class="form-control" placeholder="Taille de La chambre " />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="type" id="form2Example1" class="form-control" placeholder="type: classique / VIP " />
                 
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
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
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