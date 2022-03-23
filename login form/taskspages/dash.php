
<?php

session_start();
 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Hello, world!</title>
    <style media="screen">
      .nav-link:hover, .dropdown-item:hover{
        background-color: #7f01a9 !important;
      }
      .nav-link, .dropdown-item{
      font-weight: bold !important;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#ffe707 !important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../images/logo.jpeg" alt="" style=" position: relative; width:3rem; height:3rem; border-radius:50%;">   <?php if ($_SESSION['UserName']) {
       // code...
       echo $_SESSION['UserName'];
     } ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0  me-5 ">
        <li class="nav-item">
          <a class="nav-link fs-5 text-light active" aria-current="page" href="#">Dashboard</a>
        </li>

        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle fs-5 text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#ffe707 !important;">
            <li><a class="dropdown-item fs-5 text-light" href="orders.php">Orders</a></li>
            <li><a class="dropdown-item fs-5 text-light" href="contacts.php">Contacts</a></li>
            <li><a class="dropdown-item fs-5 text-light" href="../../index.php">View Website</a></li>
          </ul>
        </li>
        <li class="nav-item mt-2 fs-3">
        <i class='bx bx-bell text-light' ></i>
        </li>
      </ul>

    </div>
  </div>
</nav>

<footer>
  <div class="container-fluid " style="background-color:black !important; position:absolute; bottom:0; height:5rem;">
       <div class="row text-center">
         <p class="h4 mt-4 ">copyright©2021. All rights reserved</p>
       </div>
  </div>
</footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
