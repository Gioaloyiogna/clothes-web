<?php
class DB
{
  private $hostname;
  private $username;
  private  $servername;
  private $password;
  private $DbName;
  public  function DbConnection()
    {
      $this->hostname="localhost";
      $this->username="root";
      $this->password="";
      $this->DbName="clothes";
      //$this->$servername="root";
      $mysql= new mysqli($this->hostname,$this->username,$this->password,$this->DbName);
      if ($mysql->connect_error) {
        // code...
        die("connection error".$mysql->connect_error);
        unset($mysql);
            exit;
      }

      else {

        return $mysql;


      }
    }
  }




 ?>
