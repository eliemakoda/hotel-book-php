<?php
session_start();
require "../../config/app.php";
$apps= new App;
$sql="SELECT * FROM reservation LEFT JOIN chambre on reservation.id_chambre= chambre.id_chambre left join hotel on chambre.id_hotel=hotel.id  left join client on reservation.id_client=client.id_client where 1;";
$result= $apps->SelectionnerTout($sql);
require '../../admin/header.php';
?>
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Reservation</h5>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date Resv</th>
                <th scope="col">email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Nom</th>
                <th scope="col">Hotel</th>
                <th scope="col">Chambre</th>
                <th scope="col">Statut</th>
                <th scope="col">Montant</th>
                <th scope="col">Reservé le </th>
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
                <td><?php echo $res->date_reservation;?></td>
                <td> <?php echo $res->email_client;?></td>
                <td> <?php echo $res->telephone;?></td>
                <td> <?php echo $res->nom_client;?></td>
                <td> <?php echo $res->nom_hotel;?></td>
                <td> <?php echo $res->num_chambre;?></td>
                <td><?php echo $res->statut_chambre;?></td>
                <td><?php echo $res->prix_nuit;?>  FCFA</td>
                <td><?php echo $res->date_ajout;?></td>

                <td><a href="delete-posts.html" class="btn btn-danger  text-center ">delete</a></td>
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