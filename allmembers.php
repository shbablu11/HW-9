<?php
session_start();


include './env.php';

$query= "SELECT * FROM addresses";
$response=mysqli_query($dbconnect,$query);
//mysqli_fetch_all($response);
$alladdresses=mysqli_fetch_all($response,1); //1=true, array convert to assciative array
// echo "<pre>";
// print_r($alladdresses);
// echo "</pre>";
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
  <div class="col-lg-8 mx-auto mt-5">
    <div>
      <table class="table table-responsive">
        <tr>
          <th>SL no</th>
          <th>name</th>
          <th>address</th>
          <th>phone</th>
          <th>email</th>
          <th>review</th>
          <th>actions</th>
        </tr>

        <?php //dynamic vabe sob data add hobe
        foreach($alladdresses as $index=> $address){
          ?>
          
          <tr>
            <!-- (++$index) serial start from Zero(0) -->
            <td><?= ++$index ?></td> 
            <td><?=!empty($address['name']) ? $address['name'] : 'USER'?></td> 
            <td><?= $address['address'] ?></td> 
            <td><?= $address['phone'] ?></td>
            <td><?= $address['email'] ?></td>
            <td><?= $address['review'] ?></td>
            <td>
              <a href="./view.php?id=<?= $address['id']?>" class="btn btn-sm btn-success">View</a>
              <a href="./editform.php?id=<?= $address['id']?>" class="btn btn-sm btn-primary">Edit</a>
              <a href="./controller/delete.php?id=<?= $address['id']?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>

        <?php
        }

        ?>
        
      </table>

    </div>

  </div>

  <div class="toast <?=isset($_SESSION['msg']) ? 'show' : ''?>" style="position: absolute; right:50px;bottom:100px" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">      
        <strong class="me-auto">Update notice</strong>
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