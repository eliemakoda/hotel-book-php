<?php
session_start();
require "../../config/app.php";
$apps= new App;
if(isset($_POST["login"]))
{
  $email= $_POST["email"];
  $password=$_POST['password'];
  $sql= "SELECT * FROM admin WHERE email_admin=:email";
  $tab=[
    "email"=>$email,
    "password"=>$password
  ];
  $dest= "./admins.php";
  $apps->se_connecter_admin($sql,$tab,$dest);
}
require '../../admin/header.php';
?>
<div class="container-fluid"> 
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="./login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="login" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    </div>
</div>