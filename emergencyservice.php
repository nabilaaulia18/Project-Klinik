<?php session_start();
if(!isset($_SESSION["c_id"]))
{
    header('Location:clogin.php');
}
  $con=mysqli_connect("localhost","root","","healthycare");
                 if(!$con)
                    {
                       die("sorry we are facing a techincal issue");
                    } 
if(isset($_POST["btnupload"])){
        $eme=$_POST["txtstatus"];
        $msg=$_POST["message"];
        $sql="INSERT INTO `emergency`(`c_id`, `er_type`, `msg`) VALUES ('".$_SESSION["c_id"]."', '".$eme."', '".$msg."');";
        mysqli_query($con,$sql);
        header('Location:emergencyservice.php');
        } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Emergency Request</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
   
    </style>
</head>

<body>


  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">klinikrbamira@ymail.com</a>
        <i class="bi bi-phone"></i> +62 831 4077 1221
      </div>
    </div>
  </div>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html"><img src="assets/img/Logo Klinik.png"></a></h1>


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

 <a href="caccount.php" class="appointment-btn scrollto">Account</a>

      
    </div>
  </header>
<br><br><br><br>
  
    
     <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Requests Emergency</h2>
          <p>Fill The Form To Make Emergency Requests</p>
        </div>

        <form action="emergencyservice.php" method="post" role="form">
        

         <div class="row">
           
             
             <div class="col-md-4 form-group mt-3">
            <label>Emergency Type:</label><br>
              <select class="form-control" id="txtstatus" name="txtstatus">
                                                                <option value="119">119</option>
                                                                <option value="Ambulance Service">Ambulance Service</option>
                                                                <option value="Doctor To Home">Doctor To Home</option>
                                                </select>
            </div>
             <div class="col-md-8 form-group mt-3">
                 <label>Messseage:</label><br>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            
          </div>
          </div>
         <br><br><br>
         <div class="text-center"><button type="submit" id="btnupload" name="btnupload" class="appointment-btn" style="border: 0px">Requests Emergency</button></div>
        </form><br><br>
<hr>
          <br><br>
          <div class="section-title">
          <h2>Your Emergency Requests</h2>
          <p>Your Emergency Requests Details will be shown here</p>
        </div>

          <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Emergency Type</th>
        <th scope="col">Message</th>
      <th scope="col">Date Time</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
        	<?php 
                            
								  $sql2 ="SELECT * FROM `emergency` WHERE emergency.c_id='".$_SESSION["c_id"]."' ORDER BY emergency.er_id DESC;";	
								  $result2 = mysqli_query($con,$sql2);
								  if(mysqli_num_rows($result2)> 0){
									while($row = mysqli_fetch_assoc($result2))
									{
										?>
										<tr class="tr">
										<td class="td"><?php echo $row['er_id']; ?></td>
										<td class="td"><?php echo $row['er_type']; ?></td>
                                            <td class="td"><?php echo $row['msg']; ?></td>
										<td class="td"><?php echo $row['er_datetime']; ?></td>
										<td class="td"><?php echo $row['er_status']; ?></td>
										
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Requests Found";
							  	  }
						    ?>
  </tbody>
</table>
      </div>
         
         
    </section>
    
    
    
<br><br> 
  
  <footer id="footer" style="background-color: #edcee7;">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Klinik Almira</h3>
            <p>
            Jl. Jend. Urip Sumoharjo No.78,  <br>
            Karangsari, Kec. Cikarang Tim.,<br>
            Kabupaten Bekasi, Jawa Barat<br><br>
              <strong>Phone:</strong> +62 831-4077-1221<br>
              <strong>Email:</strong> klinikrbamira@ymail.com<br>
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
          &copy; Copyright <strong><span>Klinik Almira</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
         
          Designed by <a href="index.html" style="color: #BB9CC0;">FrioTrio</a>
        </div>
      </div>
    </div>
  </footer>
  

  <div id="preloader"></div>
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: #E7BCDE;"><i class="bi bi-arrow-up-short" style="color: #BB9CC0;"></i></a>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>