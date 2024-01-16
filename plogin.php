<?php
        if(isset($_POST["plogin"]))
           {
                        session_start();
                       $con=mysqli_connect("localhost","root","","healthycare");
                        if(!$con)
                        {
                            die("sorry we are facing a techincal issue");
                        }
                $email=$_POST["email"];
                $password=$_POST["password"];
        
            
            $sql="SELECT * FROM `pharmacy` WHERE p_email='".$email."' AND p_password=PASSWORD('".$password."');";
            $result=mysqli_query($con,$sql);
        	
            if(mysqli_num_rows($result)>0)
            {
				while($row = mysqli_fetch_assoc($result))
				{
					$_SESSION["p_id"]=$row['p_id'];
                    $_SESSION["p_town"]=$row['p_town'];
				}
			header('Location:pharmacy.php');
            }else{
                echo "Please Enter a correct email and password";
            }
            }
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pharmacy | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>


  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope" style="color: #BB9CC0;"></i> <a href="mailto:contact@example.com">klinikrbamira@ymail.com</a>
        <i class="bi bi-phone" style="color: #BB9CC0;"></i>  +62 831 4077 1221
      </div>
    </div>
  </div>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html"><img src="assets/img/Healthy%20Care-logos_black.png"></a></h1>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.html" style="color: #BB9CC0; border-color: #BB9CC0;">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          
          <li class="dropdown"><a href="#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="ordermedicine.php">Order Medicine</a></li>
              <li><a href="channeldoctor.php">Doctor Appointment</a></li>
              <li><a href="emergencyservice.php">Emergency Service</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#department"><span>Departments</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="delivery.php">Delivery Department</a></li>
              <li><a href="pharmacy.php">Pharmacy Department</a></li>
              <li><a href="channelcenter.php">Channel Center Department</a></li>
            </ul>
          </li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

      <a href="clogin.php" class="appointment-btn scrollto" style="background-color: #BB9CC0;">Log In</a>

    </div>
  </header>
  <br><br><br><br><br>


  <h1 style="text-align: center">Pharmacy Login</h1>      
<table width="100%">
  <tr>
    <td width="42.5%"></td>
    <td class="center-form" width="15%">
        <form style="text-align: left" action="plogin.php" method="post">
            <label for="fname">Email*</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="lname">Password*</label><br>
            <input type="text" id="password" name="password"><br><br>
            <input class="button" type="submit" id="plogin" name="plogin">
        </form> 
        <p>if you don't have an account <a href="pregister.php"> Click Here</a></p>
      </td>
    <td width="42.5%"></td>
  </tr>
</table>  
    <br><br><br>  <br><br><br>

  <footer id="footer" style="background-color: #edcee7;">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Healthy Care</h3>
            <p>
              Main Street <br>
              Kurunegala, 60000<br>
              Sri Lanka <br><br>
              <strong>Phone:</strong> +94 77 764 789<br>
              <strong>Email:</strong> info@healthycare.com<br>
            </p>
          </div>

         <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right" style="color: #BB9CC0"></i> <a href="http://healthycare.teamcodeit.com">Home</a></li>
              <li><i class="bx bx-chevron-right" style="color: #BB9CC0"></i> <a href="http://healthycare.teamcodeit.com/#about">About us</a></li>
              <li><i class="bx bx-chevron-right" style="color: #BB9CC0"></i> <a href="http://healthycare.teamcodeit.com/#services">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right" style="color: #BB9CC0"></i> <a href="ordermedicine.php">Order Medicine</a></li>
              <li><i class="bx bx-chevron-right" style="color: #BB9CC0"></i> <a href="channeldoctor.php">Make Appointment</a></li>
              <li><i class="bx bx-chevron-right" style="color: #BB9CC0"></i> <a href="emergency.php">Request Emergency</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Healthy Care</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
         
          Designed by <a href="index.html">Team Alpha</a>
        </div>
      </div>
    </div>
  </footer>
  

  <div id="preloader"></div>
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: #E7BCDE;"><i class="bi bi-arrow-up-short" style="color: #BB9CC0;"></i></a>

 
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>