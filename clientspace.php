<?php
include './login form/taskspages/connection.php';
session_start();
$obj=new DB;
$conn=$obj->DbConnection();
if (isset($_POST['signup'])) {

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

    $query="SELECT Email FROM clients WHERE Email='$Email' ";
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
     $query="SELECT UserName FROM clients WHERE UserName='$username' ";
    $result=$conn->query($query);

    $counter=0;
    while($result->num_rows!=0){
        $counter++;
     $username=$username.'_'.$counter;
     $query="SELECT UserName FROM clients WHERE UserName='$username' ";
    $result=$conn->query($query);
    }
      $rand=rand(1,2);

     if($rand==1){
         $profilepic="./images/user.png" ;

     }
      if($rand==2){
         $profilepic="./images/user1.png" ;

     }
     $query="INSERT INTO  clients (SirName,FirstName,Email, ProfilePic,UserName, AccountClosed ,Orders,Password) VALUES('$Sname','$Fname','$Email','$profilepic','$username','YES','0','$Password') ";
    $result=$conn->query($query);

    if(!$result){
       echo $conn->connect_error;
   }
   else{
        $_SESSION['Fname']=" ";
        $_SESSION['Sname']=" ";
        $_SESSION['Email']=" ";

     header("Location:clientspace.php");
        exit();

     //array_push($error_array," <span style='color:#14c800;'>you are successfully registered!</span>");
   }

 }


}

if (isset($_POST['signin'])) {


$LoginEmail=filter_var($_POST['Log_Email'], FILTER_SANITIZE_EMAIL);
$_SESSION['Log_Email']=$LoginEmail;

$LoginPassword=md5($_POST['Log_password']);
 $query="SELECT  *FROM clients WHERE Email='$LoginEmail' AND Password='$LoginPassword' ";
 $result=$conn->query($query);
 if($result->num_rows==1){
    while ($row=$result->fetch_assoc()) {
     $username=$row['UserName'] ;
     $_SESSION['UserName']= $username;
     $query="SELECT  *FROM clients WHERE Email='$LoginEmail' AND AccountClosed='YES' ";
     $result=$conn->query($query);
     if($result->num_rows==1){
    $query="UPDATE clients SET  AccountClosed='NO' WHERE Email='$LoginEmail' ";
    $result=$conn->query($query);
     }
     header("Location:client.php");
     exit();
 }
}
else{
    echo "no";
}
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CLIENTSPACE</title>
  </head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <style media="screen">

    #clientSpace{
      width: 100vw;
      height:100vh;
      display: flex;

      justify-content: space-around;
      align-items: center;
    }
    .clientSpaceImg,.sign-up,.sign-in{
      width:50%;
      height: auto;

    }
    .clientSpaceImg img{
      max-width: 100%;
      max-height: 100%;
    }
    .sign-up form input, .sign-in form input{
      width: 20rem;
      height: 2rem;
      margin-bottom: 0.3rem;
      font-weight: bold;
      padding-left:1rem;
    }
    .sign-up form button, .sign-in form button{
      width: 21.5rem;
      height: 2rem;
      margin-bottom: 0.3rem;
      background-color:black;
      border:none;
      font-weight: bold;
      color: white;
    }
    #sign-up, #sign-in{
  font-size: 1.2rem;
  text-decoration: none;
  color: #ffe707;
    }
    .sign-up{
      display: none;
    }
    .sign-up, .sign-up{
      padding-right: 1rem;

    }
    @media screen and (max-width: 1030px){
      #clientSpace{
        width: 100vw;
        height:100vh;
        display: flex;

        flex-direction: column;
        justify-content: center;
      }
      .sign-up form input, .sign-in form input{
        width: 20rem;
        height: 2rem;
        margin-bottom: 0.3rem;
        font-weight: bold;
        padding-left:1rem;
        font-size: 1.5rem;
      }
      .sign-up form button, .sign-in form button{
        width: 21.5rem;
        height: 2rem;
        margin-bottom: 0.3rem;
        background-color: #7f01aa;
        border:none;
        font-weight: bold;
        color: white;
          font-size: 1.5rem;
      }


    }
  </style>
  <body style="">
    <!--client section start-->
   <section id="clientSpace">
      <div class="clientSpaceImg">
      <img src="./images/login.jpg" alt="">
      </div>
      <div class="clientForm">
<div class="sign-up">
  <form class="" action="clientspace.php" method="post">
    <input type="text" name="Fname" value="" placeholder="Your firstname"><br>
    <input type="text" name="Sname" value="" placeholder="Your sirname"><br>
    <input type="email" name="Email" value="" placeholder="Your email"><br>
    <input type="password" name="password" value="" placeholder="Enter password"><br>
    <input type="password" name="password2" value="" placeholder="Confirm password"><br>
    <button type="submit" name="signup" id="signup">sign-up</button>
      <a href="#" id="sign-up">Login</a>
  </form>
</div>
<div class="sign-in">
  <form class="" action="clientspace.php" method="post">

    <input type="email" name="Log_Email" value="" placeholder="Your email"><br>
    <input type="password" name="Log_password" value="" placeholder="Enter password"><br>
    <button type="submit" name="signin" id="signin">sign-in</button>
    <a href="#" id="sign-in">Create account</a>
  </form>
</div>
      </div>
   </section>
   <!--client section end-->
   <script type="text/javascript">

   $(document).ready(function(){
       $("#sign-in").click(function(){
         $(".sign-in").slideUp("slow",function(){
           $(".sign-up").slideDown("slow");


         });

       });
       $("#sign-up").click(function(){
         $(".sign-up").slideUp("slow",function(){
           $(".sign-in").slideDown("slow");


         });

       });

   });
   </script>
  </body>
</html>
