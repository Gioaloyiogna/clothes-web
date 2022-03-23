<?php
require_once './config/dbconnection.php';
include 'functions.php';

if (isset($_SESSION['alreadyadded'] )) {
  echo '<script type="text/javascript">';
    echo 'alert("Item already added!")';
  echo '</script>';
  unset ($_SESSION['alreadyadded']);

}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <title>Clothes shop</title>
  </head>
  <body>

    <div class="shopping-cart">
      <div class="shopping-cart-header">
<span>item(s)</span><span>Quantity</span><span>price(Ghs)</span>
      </div>
      <div class="shopping">

        <form class="#" action="" method="post" id="form">
      <div class="client-info">
        <input type="text" name="YourName" placeholder="Your Name">
        <input type="address" name="address" placeholder="Your location">
        <input type="tel" name="PhoneNumber" placeholder="Your Phone Number">
      </div>
     <button id="order">order</button>
        </form>
      </div>

       <i class='bx bx-x'></i>

    </div>
    <div class="loader">
      <div class="loader-content">

      </div>
    </div>
    <div class="body-content">

    <!--header start-->
    <header>
      <div class="header1">
    <div class="hader1-content ">
        <div class="lang">
        <select class="" name="">
          <option value="" >ENG</option>
          <option value="">FRN</option>
        </select>
        </div>
        <div class="logo-img">
          <a href="https://www.facebook.com/MALYN-Fashion-107796170883686/"><img src="./images/logo.jpeg" alt="" class="logo"></a>

        </div>
        <div class="header1-links">
          <span id="search-box"><i class='bx bx-search-alt-2' id="searchicon"> </i> <input type="type" name="live-searach" onkeyup="LiveSearch()" value="" class="searchbar" id="search-bar" placeholder="search cloth"> </span>
          <i class='bx bx-heart' id="like"><span  id="like-number"></span></i>
          <span id="cart">
            <i class='bx bx-cart'> </i> <a href="reviewitems.php" ><?php
              // code...
              countitems();
             ?></a>
          </span>
        </div>

    </div>
    <div class="search-result">
        <i class='bx bxs-up-arrow' ></i>

        <div class="result-div">

        </div>
    </div>
      </div>

      <div class="header2">
          <div class="links">
            <a href="#" id="home">Home</a>
            <a href="#About-us">About</a>
            <a href="#shop">Shop</a>
            <a href="clientspace.php">Clients</a>
            <a href="#Contact">Contact</a>
          </div>
          <span class="menu-bar">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </span>
      </div>
    </header>
    <section id="hidden-menu-links">
      <div class="hidden-menu-links">
        <a href="#" id="home">Home</a>
        <a href="#About-us">About</a>
        <a href="#shop">Shop</a>
        <a href="#pages">Pages</a>
        <a href="#Contact">Contact</a>
      </div>
    </section>
    <!--header end-->
    <!--carousel start-->
    <section id="carousel">
       <div class="carousel-content">
          <h1>some text here some text here <bsome text here some text herer> some text here</h1>
          <a href="#products-featuring" ><button type="button" name="button" id="carousel-content-btn">Shop now</button></a>
       </div>
       <div class="controllers">
          <i class="fa fa-angle-left" aria-hidden="true"></i>
         <i class="fa fa-angle-right" aria-hidden="true"></i>

       </div>
    </section>
    <!--carousel end-->
    <!--about us start-->
    <section id="About-us">
      <div class="AboutUs">
      <h3>ABOUT Clothes SHOP</h3>

      <h1>adorable and affordable <br>clothes!</h1>
    <div class="About-us-text">
      <p>The "Malyn Shop" is a Jordanian Brand that started as a small family business. <br> The owners are Dr. Iyad Sultan and Dr. Sereen Sharabati, supported by<br> a staff of 80 employees.</p>
    </div>
      </div>
      <div class="statistics">
    <div class="stat">
      <h3>SKIRTS SELL</h3>
      <div class="stat-rate">

      </div>
    </div>
    <div class="stat">
      <h3>DRESSES SELL</h3>
      <div class="stat-rate">

      </div>
    </div>
    <div class="stat">
      <h3>JEANS SELL</h3>
      <div class="stat-rate">

      </div>
    </div>
      </div>
    </section>
    <!--about us end-->
    <hr>
    <!--products featuring start-->
    <section id="products-featuring" style="position:relative;">
      <div class="cloth-collection">


      <div class="products ">
        <?php  $sql=" SELECT *FROM clothescollection LIMIT 8"; $result=mysqli_query($conn, $sql); if (mysqli_num_rows($result)>0) {
         while ( $row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          ?>
           <div class="cloth">
        <img src="<?php echo $row["image"]; ?>" alt="">
        <button type="button" name="button">cloth</button>
        <div class="clothname">
          <h5><?php echo $row["name"] ; ?></h5>
          <br>
            <div class="cloth-price"> <span class="price"><?php echo $row["price"]; ?>Ghs</span> <a href="reviewitems.php?id=<?php echo $row["id"]  ?>" class="add-cart">Add to cart</a> </div>
        </div>
      </div>
          <?php
         }

        } ?>

      </div>
      <div class="all-items" style="position:relative;">
        <?php  $sql=" SELECT *FROM clothescollection "; $result=mysqli_query($conn, $sql); if (mysqli_num_rows($result)>0) {
         while ( $row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          ?>
           <div class="cloth ">

        <img src="<?php echo $row["image"]; ?>" alt="">
        <button type="button" name="button">view</button>

        <div class="clothname">
          <h5><?php echo $row["name"] ; ?></h5>
          <br>
            <div class="cloth-price"> <span class="price"><?php echo $row["price"]; ?>Ghs</span> <a href="reviewitems.php?id=<?php echo $row["id"]  ?>" class="add-cart">Add to cart</a> </div>
        </div>
      </div>
          <?php
         }

        } ?>
      </div>
      </div>
        <span id="viewallspan " class="view-all "> <button type="button" name="button" id="viewall-btn">View All</button>  </span>
    </section>
    <!--products featuring end-->
    <!--Contact start-->
    <section id="Contact">
    <div class="form">
      <div class=" form-header AboutUs">
      <h3>Get in touch with us</h3>

      <h1>Send us your details</h1>
      <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="Aname" value="<?php if (isset($_SESSION["Aname"])) {
          echo $_SESSION["Aname"] ;
        } ?>" placeholder="Name" required><br>
          <input type="tel" name="Aphone" value="<?php if (isset($_SESSION["Aphone"])) {
            echo $_SESSION["Aphone"] ;
          } ?>" placeholder="Phone" required><br>
          <select class="" name="Aperiod" id="period">
            <option value="">Morning</option>
            <option value="">Afternoon</option>
            <option value="">other</option>
          </select><br>
          <input type="text" name="Areason" value="<?php if (isset($_SESSION["Areason"])) {
            echo $_SESSION["Areason"] ;
          } ?>" placeholder="Appointment reason" required><br>
          <button type="submit" name="appointment">submit</button>
      </form>
      <div class="erros" style="background-color:#7f01a9;color:white; text-align:center;">
        <?php if (isset($_POST["appointment"])) {
          $_SESSION['appointment-errors']="";
          $appointmentmsg=array();

          $Aname=mysqli_real_escape_string($conn,$_POST["Aname"]);
            $Aname=preg_replace('/\s+/','',$Aname);
          $Aphone=mysqli_real_escape_string($conn,$_POST["Aphone"]);
          $Aperiod=mysqli_real_escape_string($conn,$_POST["Aperiod"]);
          $Areason=mysqli_real_escape_string($conn,$_POST["Areason"]);
          $_SESSION['Aname']=$Aname;
          $_SESSION['Aphone']=$Aphone;
          $_SESSION['Aperiod']=$Aperiod;
          $_SESSION['Areason']=$Areason;
        if (!is_numeric($Aphone) or sizeof(str_split($Aphone))>10 or sizeof(str_split($Aphone)) <10 ){
          array_push($appointmentmsg, "phone number must be 10 digits");
          //$_SESSION['phone']="";

        }

        if (!ctype_alpha($Aname)) {

          array_push($appointmentmsg,"name should be in letters");
           //$_SESSION['name']="";
        }


        $_SESSION['appointment-errors']=$appointmentmsg;
        if (!empty($_SESSION['appointment-errors'])) {

          foreach ( $_SESSION['appointment-errors'] as $key => $value) {
            // code...
            echo  $value;
          }
        }

        else {
        $sql="INSERT INTO clothescontact VALUES ( '0','$Aname','$Aperiod','$Areason','$Aphone')";
        $rq=mysqli_query($conn, $sql);
        if ($rq) {
          // code...
          $_SESSION['Aname']="";
          $_SESSION['Aphone']="";
          $_SESSION['Aperiod']="";
          $_SESSION['Areason']="";
          echo "successfully sent";


        }
        else {
          // code...
          echo "the error is".mysqli_error($conn);

        }


        }
         } ?>

      </div>

      </div>
    </div>
    <div class="contact-vd">
    <iframe width="620" height="750" src="https://www.youtube.com/embed/px41Yo5hlis" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    </section>

    -->
    <!--Fllow us start-->
    <section id="Follow-us">
       <div class="follow-us AboutUs">
    <h3>Promotion <i class="fa fa-bullhorn" aria-hidden="true" style="font-size:3rem; color:#ffe707; margin-top:0.5rem;"></i></h3>
    <h1>All these articles <br> are on promotion <br> save money now.</h1>
    <span> <i class='bx bxl-instagram' ></i> <p>@shop</p> </span>

       </div>
       <div class="follow-us-img">

         <?php
         $sql="SELECT *FROM promotion";
         $result=mysqli_query($conn, $sql);
         if (mysqli_num_rows($result)>0) {
          while ( $row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $itempic=$row["image"];
           ?>

            <div class="item">
              <img src="<?php echo $row["image"]; ?>" alt="" style="max-width: 100%; max-height:100%;">
              <div class="item-bg">
                  <div class="item-bg-promo">
         <small><?php echo $row["promoprice"]; ?><br>off   </small>
                   </div>
                   <a href="reviewitems.php?id=<?php   $sql1=" SELECT id FROM clothescollection WHERE image='$itempic'"; $result1=mysqli_query($conn, $sql1); if (mysqli_num_rows($result)>0) {
                     while ($row=mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                        echo $row['id'] ;
                     }

                   }  ?>">Add to cart</a>

          </div>
             </div>
           <?php
          }

         }
    else {
    echo mysqli_error($conn);
    }
         ?>

       </div>
    </section>
    <!--Follow us end-->
    <!--map section  start-->
    <section id="map">
      <div class="map">
        <iframe src="https://www.google.com/maps/d/embed?mid=1UZ4EDls-gkpGuBJ6mgV-lIKG7IM&hl=en" width="100%" height="320" frameborder="0"></iframe>
      </div>

    </section>
    <!--footer -->
    <footer>
      <div class="info">
        <div class="working-hours">
          <h4>working hours</h4>
          <div class="hours">
            <span>
              Monday - Friday: 08:00 am – 08:30 pm
            </span>
            <span>Saturday: 10:00 am – 16:30 pm</span>
          <span>Sunday: 10:00 am – 16:30 pm</span>
          </div>
        </div>
        <span class="info-divider">|</span>
        <div class="company-links">
          <img src="./images/logo.jpeg" class="logo">
          <div class="company-links-text">
            <p>Lorem ipsum dolor amet, consectetur adipiscing <br>elit, sed do eiusmod tempor incididunt ut <br> labore dolore magna aliqua.</p>
          </div>
          <div class="footer-links">
            <a href="https://www.facebook.com/MALYN-Fashion-107796170883686/"><i class='bx bxl-facebook'></i></a>
            <i class='bx bxl-instagram' ></i>
            <i class='bx bxl-twitter' ></i>
            <i class='bx bxl-youtube' ></i>
          </div>
        </div>
        <span class="info-divider">|</span>
        <div class="footer-suscribe working-hours ">
          <h4>Subscribe</h4>
          <span>Get latest updates and offers.</span><br>

         <input type="text" name="" value="" ><i class='bx bxl-telegram' id="telegram"></i>
        </div>
      </div>
      <div class="copy-right">
        <span>Copyright ©2021 All rights reserved  This website is made with  <i class='bx bxs-heart'></i> by <a href="#">G. Aloyiogna</a> </span>
        <div class="policies">
          <a href="">Policy Privacy</a> |
          <a href="">Terms & Conditions</a> |
          <a href="">Site Map</a>
        </div>
      </div>
    </footer>
    </div>
<!--footer section  end-->
<!--chatbot section  start-->
<section id="chatbot">
  <button type="button" name="button" id="chatus">Chat with us
    <i class='bx bx-message-rounded-dots'></i>

  </button>
  <div class="chat-content" >
    <div class="chatbox">
        <div class="chats">
       <h5 id="time"></h5>
       <p id="bottext"> <span></span>   </p>
        </div>
        <form class="" action="index.html" method="post">
          <div class="user">
            <div id="chat-input">
              <input type="text" name="" value="" placeholder="Send a message" id="textinput" class="input-box">
              <p></p>
            </div>
            <div class="chat-icons">
              <button type="submit" name="button" id="sendmsg"><i class='bx bxl-telegram'  onclick="sendmsg()"></i></button>
            </div>
          </div>
        </form>
        <div id="chat-bar">
          <p></p>
        </div>
      </div>

  </div>

</section>
<!--chatbot section  end-->
<script src="./js/javascript.js" charset="utf-8"></script>
<script src="./js/scroll.js" charset="utf-8"></script>
<script type="text/javascript">
  ScrollOut({
    targets:'.cloth'
  })
</script>
  </body>
</html>
