<?php
include '../../dbconnection.php';
 $sql="SELECT clientsinfos.name AS clientname , clientsinfos.phonenumber AS  clientphone ,clientsinfos.location AS clientlocation,
  orders.quantity AS quantity, orders.clothname AS clothname
  FROM clientsinfos
  LEFT JOIN orders
  ON clientsinfos.id=orders.articlerefnumber";
  $result=mysqli_query($conn, $sql);
  ?> <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Admin</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">


  <style>
  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  }

  td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  }

  tr:nth-child(even) {
  background-color: #ffe707;
  }
  @media screen and (max-width: 1030px) {
    td, th{
      font-size: 1.5rem;
      font-weight: bold;
    }
     }
  </style>
      </head>
      <body>
        <h1 class="text-center " style="margin-bottom:4rem; text-align:center;">Orders</h1>
<?php
?>
<table>
  <tr>
     <th>cloth names</th>
     <th>quantity</th>
     <th>client name</th>
       <th>client location</th>
       <th>client number</th>
     <th>#</th>
   </tr>
  <?php
  if (mysqli_num_rows($result)>0) {

     while ( $row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {

      ?>

  <tr>
    <td><?php echo $row["clothname"]; ?></td>
    <td><?php echo $row["quantity"]; ?></td>
    <td rowspan="<?php  ?>"><?php echo $row["clientname"]; ?></td>
    <td><?php echo $row["clientlocation"]; ?></td>
    <td><?php echo $row["clientphone"]; ?></td>
    <td ><a href="<?php echo $_SERVER["PHP_SELF"]; ?>?delete=<?php  ?>"> <button class="btn" style="background-color:#111111; color:white;font-weight:bold;" >Delete</button></a></td>

      </tr>



<?php

}
}

?>
</table>
<?php


 ?>
