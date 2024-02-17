<?php
session_start();
require "../../config/app.php";
$apps= new App;
$sql="SELECT * FROM chambre LEFT JOIN hotel on chambre.id_hotel= hotel.id  left JOIN admin on chambre.id_admin=admin.id_admin;";
$result= $apps->SelectionnerTout($sql);
require '../../admin/header.php';
?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">chambre</h5>
             <a  href="create-rooms.php" class="btn btn-primary mb-4 text-center float-right">Creer Une Chambre</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix/Nuit</th>
                    <th scope="col">Prix/Heure</th>
                    <th scope="col">nombre de lits</th>
                    <th scope="col">Taille</th>
                    <th scope="col">Type</th>
                    <th scope="col">Ajouté par</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">statut</th>
                    <th scope="col">changer statut</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($result)&&($result!=null)):
                    $i=0;
                    foreach($result as $res):
                  ?>
                  <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $res->num_chambre;?></td>
                    <td><?php echo $res->prix_nuit;?></td>
                    <td> <?php echo $res->prix_heure;?></td>
                    <td><?php echo $res->nb_lits;?></td>
                    <td><?php echo $res->taille_chambre;?> m²</td>
                    <td> <?php echo $res->type_chambre;?></td>
                    <td> <?php echo $res->nom_admin;?></td>
                    <td> <?php echo $res->nom_hotel;?></td>
                    <td><?php echo $res->statut_chambre;?></td>
                    <td><a href="status.php?id_statut=<?php echo $res->id_chambre;?>" class="btn btn-danger  text-center ">status</a></td>
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