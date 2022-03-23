<?php 
session_start();
if (isset($_GET['id'])) {
  if (isset($_SESSION['itemsadded'])) {
    // code...
    $item_array_id=array_column($_SESSION['itemsadded'], 'productid');
    if (!in_array($_GET['id'], $item_array_id)) {
      // code...
      $count=count($_SESSION['itemsadded']);
      echo "count is".$count;
      $array_items=array(
      'productid'=>$_GET['id'],
    );
     $_SESSION['itemsadded'][$count]=$array_items;
    }
    else{
      echo '<script>item already added!</script>';
      echo '<script>window.location="index.php"</script>';
    }
  }
  else{
    $array_items=array(
      'productid'=>$_GET['id'],
    );
$_SESSION['itemsadded'][0]=$array_items;

  }

}
header("location:index.php");
print_r($_SESSION['itemsadded']);

 ?>