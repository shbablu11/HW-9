<?php
session_start();
include './env.php';

$id= $_REQUEST['id'];
$query = "SELECT * FROM addresses WHERE id= '$id'";
$response= mysqli_query($dbconnect, $query);
$address= mysqli_fetch_assoc($response);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>submit form</title>
    <!-- bootstrap css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">

   
</head>
<body>
  <div class="container col-lg-6 mx-auto mt-2 bg-dark text-light text-center w=100">
    <h3>Home work submission</h3>
  </div>


  <nav class="navbar navbar-expand-lg navbar" style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand" href="#">Address Book</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0 w=100">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./submitform.php">Add new</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allmembers.php">All members</a>
        </li>
      </div>
    </div>
  </nav>

  <div class="card col-lg-5 mx-auto mt-5">
    <div class="card-header bg-dark text-warning">Edit details</div>
    <div class="card-body">
      <form action="./controller/update.php" method="POST">
      <input value="<?=$address['name']?>" name="name" class="form-control mt-2 mb-1" type="text" placeholder="Type your name">
      <?php
      if(isset($_SESSION['form_error']['name_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['name_error']?></span> 

      <?php
      }

      ?>
      <input value="<?=$address['address']?>" name="address" class="form-control mt-2 mb-1" type="text" placeholder="Your full address">
      <?php
      if(isset($_SESSION['form_error']['address_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['address_error']?></span> 

      <?php
      }

      ?>
      <input type="hidden" name="id" value="<?= $address['id']?>">
      <input value="<?=$address['phone']?>" name="phone" class="form-control mt-2 mb-1" type="text" placeholder="Your phone number">
      <?php
      if(isset($_SESSION['form_error']['phone_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['phone_error']?></span> 

      <?php
      }

      ?>
      <input value="<?=$address['email']?>" name="email" class="form-control mt-2 mb-1" type="email" placeholder="Your email address">
      <?php
      if(isset($_SESSION['form_error']['email_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['email_error']?></span> 

      <?php
      }

      ?>
      <textarea name="review" class="form-control mt-2 mb-1" placeholder="Write a review  (what you think.......)"><?=$address['review']?></textarea>
      <?php
      if(isset($_SESSION['form_error']['review_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['review_error']?></span> 

      <?php
      }

      ?>
      
      <button class="btn btn-success mt-3 w-100">Update details</button>
      </form>

    </div>
  </div>

</div>
</body>
</html>

<?php
session_unset();
?>