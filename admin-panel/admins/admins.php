<?php
session_start();
require "../../config/app.php";
$apps= new App;
$results= $apps->SelectionnerTout("SELECT * FROM admin  WHERE 1");
require '../../admin/header.php';
?>
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Administrateur</h5>
          <a href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Ajouter un Administrateur</a>
          <table class="table">
            <thead>
              
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom d'utilisateur</th>
                <th scope="col">email</th>
                <th scope="col">Telephone</th>

              </tr>
            </thead>
            <tbody>
              <?php if(isset($results)&&($results!=null)):
              $i=0;
                foreach($results as $res):
                  $i+=1;
                ?>
              <tr>
                <th scope="row"><?php echo $i?></th>
                <td> <?php echo $res->nom_admin?></td>
                <td><?php echo $res->email_admin?></td>
                <td><?php echo $res->telephone?></td>
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