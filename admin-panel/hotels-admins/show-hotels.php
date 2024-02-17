<?php
session_start();
require "../../config/app.php";
$apps= new App;
$result=$apps->SelectionnerTout("SELECT * FROM hotel WHERE 1");//tout lire dans la base de donnée'
if(isset($_POST["id_sup"]))
{
  $id= $_GET["id_sup"];
  $sql="DELETE FROM hotel WHERE id=$id";
  $dest="./show-hotels.php";
  $apps->supprimer($sql,$dest);
}
require '../../admin/header.php';
?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Hotels</h5>
             <a  href="create-hotels.php" class="btn btn-primary mb-4 text-center float-right">Creer Hotels</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">localisation</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Mise à Jour</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($result)&& $result!=null):
                    $i=0;
                    foreach($result as $res):
                      $i+=1;
                  ?>

                  <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td> <?php echo $res->nom_hotel;?></td>
                    <td> <?php echo $res->localisation_hotel;?></td>
                    <td> <?php echo $res->contact_hotel;?></td>

                    <td><a  href="update-category.php?id_maj= <?php echo $res->id;?>" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="./show-hotels.php?id_sup=<?php echo $res->id;?>" class="btn btn-danger  text-center ">Supprimer </a></td>
                  </tr>
                  <?php
                  endforeach;
                endif;
                  ?>
               
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  </div>
  <?php
require '../../admin/header.php';
?>