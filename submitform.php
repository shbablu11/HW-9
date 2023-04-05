<?php
session_start();
//print_r($_SESSION['form_error']);

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
        </ul>
      </div>
    </div>
  </nav>

  <div class="card col-lg-5 mx-auto mt-5">
    <div class="card-header bg-dark text-warning">Your details</div>
    <div class="card-body">
      <form action="./controller/validation.php" method="POST">
      <input value="<?= isset($_SESSION['old']['name']) ? $_SESSION['old']['name'] : '' ?>" name="name" class="form-control mt-2 mb-1" type="text" placeholder="Type your name">
      <?php
      if(isset($_SESSION['form_error']['name_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['name_error']?></span> 

      <?php
      }

      ?>
      <input value="<?= isset($_SESSION['old']['address']) ? $_SESSION['old']['address'] : '' ?>" name="address" class="form-control mt-2 mb-1" type="text" placeholder="Your full address">
      <?php
      if(isset($_SESSION['form_error']['address_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['address_error']?></span> 

      <?php
      }

      ?>
      <input value="<?= isset($_SESSION['old']['phone']) ? $_SESSION['old']['phone'] : '' ?>" name="phone" class="form-control mt-2 mb-1" type="text" placeholder="Your phone number">
      <?php
      if(isset($_SESSION['form_error']['phone_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['phone_error']?></span> 

      <?php
      }

      ?>
      <input value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>" name="email" class="form-control mt-2 mb-1" type="email" placeholder="Your email address">
      <?php
      if(isset($_SESSION['form_error']['email_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['email_error']?></span> 

      <?php
      }

      ?>
      <textarea name="review" class="form-control mt-2 mb-1" placeholder="Write a review  (what you think.......)"><?= isset($_SESSION['old']['review']) ? $_SESSION['old']['review'] : '' ?></textarea>
      <?php
      if(isset($_SESSION['form_error']['review_error'])){ //kono error array[] te add hoice kina check kore
      ?>
      <!-- error input er niche show kore -->
     <span><?= $_SESSION['form_error']['review_error']?></span> 

      <?php
      }

      ?>
      <button class="btn btn-success mt-3 w-100">Submit</button>
      </form>

    </div>
  </div>

  <div class="toast <?=isset($_SESSION['msg']) ? 'show' : ''?>" style="position: absolute; right:50px;bottom:100px" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">      
        <strong class="me-auto">Your details</strong>
        <small>just now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <?=isset($_SESSION['msg']) ? $_SESSION['msg'] : ''?>    
    </div>
  </div>
</body>
</html>

<?php
session_unset();
?>