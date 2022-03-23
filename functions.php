<?php


require_once './config/dbconnection.php';
session_start();
//$_SESSION['itemsadded'];
if (isset($_POST['itemsvalues'])) {
$_SESSION['itemsvalues']=$_POST['itemsvalues'];

}

 if (isset($_POST["dsearch"])) {
   $searchname=$_POST["dsearch"];
    $sql="SELECT * FROM clothescollection WHERE name LIKE '$searchname%'";
    $output="";
   $result=mysqli_query($conn, $sql);
   if (mysqli_num_rows($result)>0) {
       $output.='
       <table >
         <tr>
           <th>Item(s)</th>
           <th>Name(s)</th>
           <th>Price(s)</th>
           <th>#</th>
         </tr>';
      while ( $row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $output.='<tr>
      <td> <img src="'. $row["image"].'"></td>
      <td>'. $row["name"].'</td>
       <td>'. $row["price"].'</td>
      <td ><a href="reviewitems.php?id='. $row["id"].' "  style="background-color:#111111; padding:5px;text-decoration:none;color:white;font-weight:bold width:1rem;" >Add to cart</a></td>

        </tr>';

   }
   $output.='</table>';
   echo $output;
    }
    else {
      echo "No result found";
    }

 }

if (isset($_GET['id'])) {
if (isset($_SESSION['itemsadded'])) {
  // code...
  $item_array_id=array_column($_SESSION['itemsadded'], 'productid');
  if (!in_array($_GET['id'], $item_array_id)) {
    // code...
    $count=count($_SESSION['itemsadded']);

    $array_items=array(
    'productid'=>$_GET['id'],
  );
   $_SESSION['itemsadded'][$count]=$array_items;
  }
  else{


 $_SESSION['alreadyadded']="item already added";
  }
}
else{
  $array_items=array(
    'productid'=>$_GET['id'],
  );
$_SESSION['itemsadded'][0]=$array_items;

}

//$_SESSION['itemsnumber']=sizeof($_SESSION['itemsadded']);
header("Location:index.php");

}

if (isset($_GET['delete'])) {
// code...
$delete=$_GET['delete'];
foreach ( $_SESSION['itemsadded'] as $key => $value) {
  // code...
  if ($value['productid']== $delete) {
    // code...
    unset($_SESSION['itemsadded'][$key] );
    echo '<script>item deleted</script>';

  }

}
header("Location:reviewitems.php");
}
function countitems()
{

if (isset($_SESSION['itemsadded'])){ if (!empty($_SESSION['itemsadded'])) {
  $sizeofitems=sizeof($_SESSION['itemsadded']);
   $_SESSION['sizeofitems']=$sizeofitems;
   echo $_SESSION['sizeofitems'];
   //print_r($_SESSION['itemsadded']);
  // code...
}
else {
  echo 0;
}
}
}


if (isset($_POST["order"])) {

  $_SESSION['order-errors']="";
  $msg=array();
  // code...
  $name=mysqli_real_escape_string($conn,$_POST["name"]);
    $name=preg_replace('/\s+/','',$name);
  $phone=mysqli_real_escape_string($conn,$_POST["phone"]);
  $address=mysqli_real_escape_string($conn,$_POST["location"]);
    $address=preg_replace('/\s+/','',$address);
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
  $_SESSION['name']=$name;
  $_SESSION['phone']=$phone;
  $_SESSION['address']=$address;
  $_SESSION['email']=$email;
if (!is_numeric($phone) or sizeof(str_split($phone))>10 or sizeof(str_split($phone)) <10 ){
  array_push($msg, "phone number must be 10 digits");
  //$_SESSION['phone']="";

}

if (!ctype_alpha($name) ){
  // code...
  array_push($msg,"name should be in letters");
   //$_SESSION['name']="";
}

if (!ctype_alpha($address)) {
  // code...
  array_push($msg,"location should be in letters");
   //$_SESSION['address']="";

}
$_SESSION['order-errors']=$msg;
if (!empty($_SESSION['order-errors'])) {
//  header("Location:reviewitems.php");
  print_r($_SESSION['order-errors']);
}
else {
   $random=mt_rand();
   $sql="SELECT *FROM clientsinfos WHERE name='$name'";
   $rq=mysqli_query($conn, $sql);
   while(mysqli_num_rows($rq)>0){
     // code...
     $name=$name.$random;
     $sql="SELECT *FROM clientsinfos WHERE name='$name'";
     $rq=mysqli_query($conn, $sql);
   }
  $sql="INSERT INTO clientsinfos VALUES ( '0','$name','$phone','$address','$email')";
  $rq=mysqli_query($conn, $sql);
  if ($rq) {
    // code...
    echo "successfully sent";

  }
  else {
    // code...
    echo "the error is".mysqli_error($conn);

  }

     $sql="SELECT id FROM clientsinfos WHERE name='$name'";
     $result=mysqli_query($conn, $sql);

     if(mysqli_num_rows($result)>0) {


     while ( $row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
       $id=$row['id'];
       $_SESSION['ordereditemid']=$id;
         }
          }
         else {
           // code...
           echo "the error is".mysqli_error($conn);
         }

         //print_r($_SESSION['items']);
 foreach ( $_SESSION['items'] as $key => $value) {
    $itemname=$value['name'];
      $itemimage=$value['image'];
      $itemprice=$value['price'];

   $sql="INSERT INTO orders VALUES ( '0','$itemimage','$itemprice','0','$itemname','$id')";
      if (mysqli_query($conn, $sql)) {
        // code...

        echo "your order was placed successfully";


      }
      else {
        echo "error when ordering items".mysqli_error($conn);
      }
 }
 if (isset($_SESSION['itemsvalues'])) {
   foreach ($_SESSION['itemsvalues'] as $key => $value) {
     $artivalue=$value['1'];
    $artiid=$value['0'];
     // code...
     //$itemid=$_SESSION['ordereditemid'];
     $sql="UPDATE `orders` SET `quantity`='$artivalue' WHERE  `orders`.`image`='$artiid' AND `orders`.`articlerefnumber`='$id'";

     $result=mysqli_query($conn, $sql);
     if ($result) {


      $_SESSION['name']="";
      $_SESSION['phone']="";
      $_SESSION['address']="";
        $_SESSION['email']="";
      $_SESSION['items']="";
      $_SESSION['itemsadded']="";
      $_SESSION['succesmsg']="Your order has been placed successfully!";
      header("Location:reviewitems.php");
     }
     else {
       echo "failed, while updating the quantities";
     }
   }


 }


}



}




 ?>
