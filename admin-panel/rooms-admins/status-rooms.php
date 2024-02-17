<?php
session_start();

require '../../admin/header.php';
?>
    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline" >Update Status</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <select style="margin-top: 15px;" class="form-control">
                    <option>Choose Status</option>
                    <option>1</option>
                    <option>0</option>
                </select>

      
                <!-- Submit button -->
                <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php
require '../../admin/footer.php';
?>