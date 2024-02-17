<?php
session_start();
require "../../config/app.php";
$apps= new App;
$sql="SELECT * FROM service  LEFT JOIN hotel on hotel.id=service.id_hotel where 1;";
$result= $apps->SelectionnerTout($sql);
require '../../admin/header.php';
?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">chambre</h5>
             <a  href="creerService.php" class="btn btn-primary mb-4 text-center float-right">Ajouter un service</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tire</th>
                    <th scope="col">Hotel concerné</th>
                    <th scope="col">Contact Hotel</th>
                    <th scope="col">nombre d'étoiles</th>
                   
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($result)&&($result!=null)):
                    $i=0;
                    foreach($result as $res):
                      $i+=1;
                  ?>
                  <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $res->titre;?></td>
                    <td><?php echo $res->nom_hotel;?></td>
                    <td> <?php echo $res->contact_hotel;?></td>
                    <td><?php echo $res->nbEtoile_Hotel;?></td>
                    <td><a href="delete.php?id_sup=<?php echo $res->id_chambre;?>" class="btn btn-danger  text-center ">Supprimer</a></td>
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
require '../../admin/footer.php';
?>