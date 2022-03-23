
<?php
include '../../dbconnection.php';
if (isset( $_GET["delete"])) {
$deleteditemid=$_GET["delete"];
$query="DELETE FROM clothescontact WHERE id=".$deleteditemid;
mysqli_query($conn, $query);
header("Location:contacts.php");
}
?>
<!doctype html>
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
    font-size: 2.5rem;
    font-weight: bold;
  }
   }
</style>
    </head>
    <body>
      <?php $query="SELECT *FROM clothescontact";
      $result =mysqli_query($conn, $query);
      $num =mysqli_num_rows($result); ?>
    <h1 class="text-center " style="margin-bottom:4rem; text-align:center;">Contact list<small class="" style=" color:white;border-radius:50%; background-color:#ffe707; font-weight:bold; padding:0.5rem; width:5px; height:5px"><?php
      echo $num;?></small> </h1>
      <?php
?>
<table>
  <?php

  function RetriveData($conn,$result,$num){
  if($num >0){

    $AppointmentNumber=1;
  ?>  <tr>
      <th>Name</th>
      <th>Phone</th>
      <th>Period</th>
      <th>Reason</th>
      <th>#</th>
    </tr>
<?php
    while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
      ?>

  <tr>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["phone"]; ?></td>
    <td><?php echo $row["period"]; ?></td>
    <td><?php echo $row["reason"]; ?></td>
    <td ><a href="<?php echo $_SERVER["PHP_SELF"]; ?>?delete=<?php echo $row["id"]; ?>"> <button class="btn" style="background-color:#111111; color:white;font-weight:bold;" >Delete</button></a></td>

      </tr>



<?php
$AppointmentNumber++;
}
?>
</table>
<?php

}


}


RetriveData($conn,$result,$num);

?>
