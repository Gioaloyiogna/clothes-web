<?php
include 'connection.php';
$obj=new DB;
$conn=$obj->DbConnection();
if (isset($_POST['signup'])) {
  session_start();
  $error_array=array();


 $Fname=strip_tags($_POST['Fname']);
  $Fname=str_replace(' ', '', $Fname);
 $Fname=ucfirst(strtolower($_POST['Fname']));
  $_SESSION['Fname']=$Fname;
 $Sname=strip_tags($_POST['Sname']);
  $Sname=str_replace(' ', '', $Sname);
 $Sname=ucfirst(strtolower($_POST['Sname']));
 $_SESSION['Sname']=$Sname;
 $Email=strip_tags($_POST['Email']);
 $Email=ucfirst(strtolower($_POST['Email']));
  $_SESSION['Email']=$Email;
 $Password=strip_tags($_POST['password']);
 $Password2=strip_tags($_POST['password2']);
 $SinUpDate=date("y/m/d");
 if(filter_var($Email, FILTER_VALIDATE_EMAIL)){
    $Email=filter_var($Email, FILTER_VALIDATE_EMAIL);

    $query="SELECT Email FROM Employee WHERE Email='$Email' ";
    $result=$conn->query($query);

    if($result->num_rows>0){
        array_push($error_array," Email Already taken") ;

    }
 }
 else{
     array_push($error_array,"Invalid Email") ;
 }
 //header("location:AdminiPortal/admin.php");
 if(strlen($Fname)>25 || strlen($Fname)<2){
     array_push($error_array,"your First Name is too long or short");
 }
 if(strlen($Sname)>25 || strlen($Sname)<2){
      array_push($error_array,"your  SurName is too long or short");
 }
 if($Password!=$Password2){
      array_push($error_array,"password does not match");
 }
 if(strlen($Password)>20 || strlen($Password)<4){
      array_push($error_array,"password too weak or too long");

 }
 /*else{
     if(!preg_match('/[^A-Za-z0-9]/', $Password)){
      array_push($error_array,"password should contain English characters or numbers");

 }
 }*/
 if(empty($error_array)){
     $Password=md5($Password);
     $username=strtolower($Fname.'_'.$Sname);
     $query="SELECT UserName FROM Employee WHERE UserName='$username' ";
    $result=$conn->query($query);
    $counter=0;
    while($result->num_row!=0){
        $counter++;
     $username=$username.'_'.$counter;
     $query="SELECT UserName FROM Employee WHERE UserName='$username' ";
    $result=$conn->query($query);
    }
      $rand=rand(1,2);

     if($rand==1){
         $profilepic="../../../images/user.jpg" ;

     }
      if($rand==2){
         $profilepic="../../../images/user1.jpg" ;

     }
     $query="INSERT INTO  Employee (SurName,FirstName,Email,Password, ProfilePic,UserName, AccountClosed) VALUES('$Sname','$Fname','$Email','$Password','$profilepic','$username','YES') ";
    $result=$conn->query($query);
    if(!$result){
       echo "error".$conn -> connect_error;
   }
   else{
        $_SESSION['Fname']=" ";
        $_SESSION['Sname']=" ";
        $_SESSION['Email']=" ";
      header("Location:../index.php");
        exit();

     //array_push($error_array," <span style='color:#14c800;'>you are successfully registered!</span>");
   }

 }


}

 ?>
