<?php
session_start();
require "../../config/app.php";
$apps= new App;
if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $nom= $_POST["username"];
  $password=password_hash($_POST['password'], PASSWORD_DEFAULT); //crypter le mot de passe
$tel= $_POST['tel'];
$sexe=$_POST['sexe'];
$sql="INSERT INTO admin(nom_admin, email_admin, password, telephone, sexe) VALUES(:nom_admin, :email_admin, :password, :telephone, :sexe)";
$tab= [
  ":nom_admin"=>$nom,
  ":email_admin"=>$email, 
  ":password"=>$password, 
  ":telephone"=>$tel, 
 ":sexe"=>$sexe
];
$dest="./admins.php";
$apps->inserer($sql,$tab,$dest);
}
require '../../admin/header.php';
?>
    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Ajouter un administrateur</h5>
          <form method="POST" action="./create-admins.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Entrez votre nom d'utilisateur" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>

                <div class="form-outline mb-4">
                  <input type="tel" name="tel" id="form2Example1" class="form-control" placeholder="Entrez votre numero de tél" />
                </div>
                <div class="form-outline mb-4">
                  <p class="form2Example1">sexe: </p>
                  <select name="sexe" id="" class="form2Example1">
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                  </select>
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">AJouter L'admin</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php
require '../../admin/footer.php';
?>