<?php
session_start();

require 'config/app.php';
$app= new App;
if(isset($_POST["submit"]))
{
  $nom=$_POST["nom"];
  $email=$_POST['email'];
  $sexe=$_POST["sexe"];
  $password= password_hash($_POST["password"],PASSWORD_DEFAULT);
  $tel=$_POST['tel'];
  $sql= "INSERT INTO client(nom_client, email_client, password, telephone, sexe) VALUES (:nom_client, :email_client, :password, :telephone, :sexe) ";
  $tableau_donnee=[
    ":nom_client"=>$nom,
     ":email_client"=>$email, 
     ":password"=>$password,
      ":telephone"=>$tel, 
      ":sexe"=>$sexe
  ];

$destination="./login.php";
$app->inserer($sql,$tableau_donnee,$destination);
}

require 'client/header.php';
?>

  <div class="hero-wrap js-fullheight" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
          <!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
      <div class="row justify-content-middle" style="margin-left: 397px;">
        <div class="col-md-6 mt-5">
          <form action="./register.php" class="appointment-form" style="margin-top: -568px;" method="POST">
            <h3 class="mb-3">Creer un compte</h3>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="entrez votre nom " name="nom" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Entrez votre Email" name="email" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <select name="sexe" id="sexe" class="form-control" required> 
                    
                        <option value="M">Masculin</option>
                        <option value="F">Feminin</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Mot de passe ici " name="password" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="tel" class="form-control" placeholder="Ex: +237 674349356 " name="tel" required>
                </div>
              </div>


              <div class="col-md-12">
                <div class="form-group">
                  <input type="submit" value="S'enregistrer" class="btn btn-primary py-3 px-4" name="submit" >
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php
require 'client/footer.php';
?>