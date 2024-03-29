<?php 
    if(isset($_POST["dregister"]))
    {
                $con=mysqli_connect("localhost","root","","healthycare");
                 if(!$con)
                 {
                      die("sorry we are facing a techincal issue");
                 }
        
                $fname=$_POST["fname"];
                $lname=$_POST["lname"];
                $name = $fname . ' ' . $lname;
                $dob=$_POST["dob"];
                $telephone=$_POST["telephone"];
                $dln=$_POST["dln"];
                $email=$_POST["email"];
                $password=$_POST["password"];
                $address=$_POST["address"];
                $town=$_POST["town"];
                $cemail=$_POST["cemail"];
                $cpassword=$_POST["cpassword"];
        
                if($password==$cpassword)
                {
                    if($email==$cemail)
                    {
                        $sql="INSERT INTO `delivery` (`d_name`, `d_email`, `d_password`, `d_dob`, `d_address`, `d_town`, `d_telephone`, `d_lcence`) VALUES ('".$name."', '".$email."', PASSWORD('".$password."'), '".$dob."', '".$address."', '".$town."', '".$telephone."', '".$dln."');";
                        
                        mysqli_query($con,$sql);
                        mysqli_close($con);
                        header('Location:dlogin.php');

                    }else{
                        echo 'Email Do not match';
                    }
                }else{
                    echo 'Password Do not match';
                }
                
    }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Delivery | Resgister</title>
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

    <link href="assets/css/style.css" rel="stylesheet">
    <style>
    @import "bourbon";

body {
	background: #eee !important;	
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}
    </style>
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
<br><br><br><br>
  <div class="wrapper">
    <form class="form-signin" action="dregister.php" method="post">          
      <h2 class="form-signin-heading">Delivery Register</h2><br>
   
                <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required><br>
                <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required><br>
                <input type="text" id="dob" name="dob" class="form-control" placeholder="DOB" required><br>
                <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Telephone" required><br>
                <input type="text" id="dln" name="dln" class="form-control" placeholder="Licence" required><br>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required><br>
                <input type="email" id="cemail" name="cemail" class="form-control" placeholder="Re-Email" required><br>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required><br>
                <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Re-Password" required><br>
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required><br>
                <label for="town">Town*</label>
                <select name="town" id="town" class="form-control">
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Wariyapola">Wariyapola</option>
                    <option value="Polgahawela">Polgahawela</option>
                    <option value="Maho">Maho</option>
                    <option value="Melsiripura">Melsiripura</option>
                    <option value="Narammala">Narammala</option>
                    <option value="Pannala">Pannala</option>
                    <option value="Ibbagamuwa">Ibbagamuwa</option>
                    <option value="Alawwa">Alawwa</option>
                    <option value="Kuliyapitiya">Kuliyapitiya</option>
                    <option value="Hettipola">Hettipola</option>
                    <option value="Galgamuwa">Galgamuwa</option>
                    <option value="Mawathagama">Mawathagama</option>
                    <option value="Pothuheara">Pothuheara</option>
                </select>    
        <br>
      <button class="btn btn-lg btn-block" type="submit" id="dregister" name="dregister" style="background-color: #BB9CC0; color: white;">Register</button> <br><br>
                <p>if you alredy have an account <a href="dlogin.php" style="color: #BB9CC0;"> Click Here</a></p>
    </form>
  </div>
  
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