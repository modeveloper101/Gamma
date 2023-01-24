<?php
require('dbconn.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./style2.css">
	<link href="https://api.fontshare.com/v2/css?f[]=erode@500,400,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<title>Home</title>
</head>
<body>
	<header class="nav center">
    <img class="logo" src="./img/logo-black.png" alt="">
    <input type="checkbox" name="" class="checkBtn">
    <ol class="center">
      <a href="./index2.html"><li>Home</li></a>
      <a href="./index2.html"><li>Our story</li></a>
      <a href="./404.html"><li>Exhibitions</li></a>
      <a href="./contat.html"><li>Contact </li></a>
    </ol>   
  </header>
  <br><br><br><br><br>
  <section class="contact-us">
    <div class="contact-caption">
      <h2>Contact us</h2>
      <p>Feel free to contact us by telephone, email or sending a message. We will be delighted to assist you with your inquiry.</p>
    </div>
    <img id="necklace" src="" />
    <div class="contact-container">
      <div class="contact-item-1">
        <div class="contact-item-1-sub">
          <h2>Call us</h2>
          <h6>Monday to Saturday: 9AM - 6PM</h6>
          <p>+66 (2) 212 4111</p>
        </div>
        <div class="contact-item-1-sub">
          <h2>Send an email</h2>
          <p>mail@gammacreations.com</p>
        </div>
        <div class="contact-item-1-sub">
          <h2>Visit us</h2>
        <div id="map" class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=150&amp;hl=en&amp;q=gamma creations&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.gachacute.com/">Gacha Cute</a></div><style>.mapouter{position:relative;text-align:right;width:90%;height:150px;}.gmap_canvas {overflow:hidden;background:none!important;width:90%;height:150px;}.gmap_iframe {height:150px!important;}</style></div>
        </div>
      </div>
      <div class="contact-item-2">
        <h2>Send us a message</h2>
        <form action="contact.php" method="post" class="form-container">
          <input type="text" name="customer-name" placeholder="Your full name *" required>
          <input type="email" name="customer-email" placeholder="Your email address *" required>
          <textarea maxlength="250" type="text" name="customer-message" placeholder="Enter your message here" style="padding-bottom: 120px;"></textarea>
          <button type="submit" class="form-submit" name="submitbtn">
          Send a message
          </button>
        </form>
        <?php if(isset($_SESSION['status'])) 
        { 
        ?>
        <div class="success_message">
          <h6><?php echo $_SESSION['status']; ?></h6>
        </div>
        <?php 
          unset($_SESSION['status']);
        }
        ?>
      </div>
    </div>
    <a name="here"></a>
</section>
</body>
</html>

<?php 
  if (isset($_POST['submitbtn'])) {

    $NAME = $_POST['customer-name'];
    $EMAIL = $_POST['customer-email'];
    $MESSAGE = $_POST['customer-message'];

    $query = "INSERT INTO inquiries (Name,Email,Message) VALUES ('$NAME','$EMAIL','$MESSAGE')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
      $_SESSION['status'] = "Thank you for writing to us. We will get back to you soon.";
      header('location: contact.php#here');
    } else {
      $_SESSION['status'] = "Something went wrong. Please contact us at +66 (2) 212 4111  ";
    }
  } 
?>