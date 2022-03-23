<?php
include 'connection.php';
$obj=new DB;
$conn=$obj->DbConnection();
$query="DELETE FROM Employee
WHERE id= 1";
$conn->query($query);
if (isset($_POST['signin'])) {

  // code...
session_start();
$LoginEmail=filter_var($_POST['Log_Email'], FILTER_SANITIZE_EMAIL);
$_SESSION['Log_Email']=$LoginEmail;

$LoginPassword=md5($_POST['Log_password']);
 $query="SELECT  *FROM Employee WHERE Email='$LoginEmail' AND Password='$LoginPassword' ";
 $result=$conn->query($query);
 if($result->num_rows==1){
    while ($row=$result->fetch_assoc()) {
     $username=$row['UserName'] ;
     $_SESSION['UserName']= $username;
     $query="SELECT  *FROM Employee WHERE Email='$LoginEmail' AND AccountClosed='YES' ";
     $result=$conn->query($query);
     if($result->num_rows==1){
    $query="UPDATE Employee SET  AccountClosed='NO' WHERE Email='$LoginEmail' ";
    $result=$conn->query($query);
     }
     header("Location:dash.php");
     exit();
 }
}
else{
    echo "no";
}
}


 ?>
