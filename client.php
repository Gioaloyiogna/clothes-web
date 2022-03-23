
<?php
include './login form/taskspages/connection.php';
session_start();
$obj=new DB;
$conn=$obj->DbConnection();

if ($_SESSION['Log_Email']) {
  $LoginEmail=$_SESSION['Log_Email'];
  $query="SELECT  *FROM clients WHERE Email='$LoginEmail'";
   $result=$conn->query($query);
   $row=$result->fetch_assoc();
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>userprofile</title>
    <link rel="stylesheet" href="clientcss.css">
  </head>
  <body>
<div class="profile-header">
   <div class="userdetails">
      <div class="userpic">

      <img src="<?php echo $row['ProfilePic']; ?>" alt="">
    </div>
      <div class="userinfo">

      <h3><?php echo $row['UserName'];?></h3>



      </div>
   </div>

</div>
<div class="userinfo2">
  <div class="editprofile">
    <button type="submit" name="button" id="btn">Edit Profile</button>
  </div>
  <div class="userinfo3">
    <div class="photos">
      <span>0</span><br>
      <small>Orders</small>
    </div>

    <div class="photos">
      <span>0</span><br>
      <small>Notifications</small>
    </div>
  </div>
</div>
<div class="Aboutme">

  <div class="Aboutmeinfo">
    <h2>About</h2>
    <span>CEO</span><br>
    <span>Lives in Accra,ghana</span><br>
    <span> <small>Email:</small><?php echo $row['Email'];?></span>
  </div>
</div>
<div class="pictures">
  <h2>Recent Orders</h2>
  <div class="picsdiv">
  <div class="">

      <table>
        <tr>
          <th>item</th>
           <th>clothes</th>
           <th>quantity</th>
           <th>price</th>
           <th>#</th>
         </tr>

      <?php
      if ($_SESSION['Log_Email']) {
        $LoginEmail=$_SESSION['Log_Email'];
        $query="SELECT  id FROM clientsinfos WHERE email='$LoginEmail'";
         $result=$conn->query($query);
         $row=$result->fetch_assoc();
         $id=$row['id'];

         $query="SELECT  *FROM orders WHERE articlerefnumber='$id'";
          $result=$conn->query($query);
        while ($row=$result->fetch_assoc()) {
          ?>

      <tr>
        <td> <img src="<?php echo $row["image"]; ?>" alt="" style="width:5rem; height:5rem;">   </td>
        <td><?php echo $row["clothname"]; ?></td>
        <td><?php echo $row["quantity"]; ?></td>
        <td><?php echo $row["price"]; ?></td>


        <td ><a href="<?php echo $_SERVER["PHP_SELF"]; ?>?delete=<?php  ?>"> <button class="btn" style="background-color:#111111; color:white;font-weight:bold;" >Delete</button></a></td>

          </tr>
<?php

        }

      }

      ?>
    </table>
    </div>
    <div class="">
    online assistance
    </div>
  </div>
</div>
  </body>
</html>
