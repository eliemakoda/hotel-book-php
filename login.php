<?php
session_start();
require 'config/app.php';
$apps= new App;
if(isset($_POST["login"]))
{
  $email=$_POST["email"];
  $password=$_POST["password"];
  $sql="SELECT * FROM client WHERE email_client=:email";
  //tableau de donnee 
  $tab= [
      "email"=>$email,
      "password"=>$password
  ];
  $destination="./index.php";
  $apps->se_connecter_client($sql,$tab,$destination);
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
        <form action="./login.php" class="appointment-form" style="margin-top: -568px;" method="POST">
          <h3 class="mb-3">Se connecter</h3>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" name="email">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Entrez votre mot de passe" name="password">
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary py-3 px-4" name="login">
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