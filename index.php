<?php
  session_start();
  //include the php files that will be needed.
  include("connection.php");
  include("functions.php");

  //If the user's user_id is not set or is not in session, then the user will be redirected
  //to the login page and will terminated the user from the index or home page

  if(!isset($_SESSION['user_id'])){
      header('location:login.php');
      die();
  }

  //The block of code will still fetch the username even if the user did not check the remember me check-box
  //We will store the user's username in the user_name variable that initially has an empty string.

  $user_name = "";

  //If the user's cookies is setted or if the user checked the remember me checkbox, 
  //then we will store the user's username in the user_name variable

  if(isset($_COOKIE["user_name"])){
      $user_name = $_COOKIE["user_name"];
  }
  
  //Else if the user did not checked the remember me checkbox, then we will call the function, get_user_name, 
  //and get the user's username by fetching the user_id and obtaining its user_name, in which we will store it in  
  //the user_name variable.

  elseif (isset($_SESSION["user_id"])) {
      $user_id = $_SESSION["user_id"];
      $user_name = get_user_name($con, $user_id);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MatiCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">maticare@example.com</a>
        <i class="bi bi-phone"></i> +12 345 678 9101
      </div>
      
      <!-- ======= Top Bar Socials ======= -->
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://twitter.com" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://facebook.com" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="#medicalfiles">Medical Files</a></li>
          <li> <a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#doctors" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>

    </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>
          Welcome to MatiCare, <br>
          <?php echo $user_name; ?>
      </h1>
      <h2>Instant Medical Care, Found Anywhere</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why MatiCare Was Created Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose MatiCare?</h3>
              <p>
                Falling in line for an appointment takes an average of <b>26 days</b> annually, MatiCare will be able to help you with this.
                With MatiCare, booking a visit with your appropriate practitioner has never been simple.
              </p>
              <div class="text-center">
                <a href="https://www.healthleadersmedia.com/clinical-care/physician-appointment-wait-times-have-increased-significantly-survey-finds" target="_blank" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-calendar"></i>
                    <h4>Scheduling</h4>
                    <p>
                      We offer flexible scheduling for clinical appointments. Our system utilizes an email and google calendar 
                      based appointment setting powered by Calendly. Say no more to complex appointment settings. With MatiCare, 
                      patient-doctor communication has never been easier.
                    </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-time"></i>
                    <h4>No more waiting time</h4>
                      <p>
                        Long appointment lines may cause patients to feel discouraged in seeking for medical care. Maticare provides 
                        an open appointment setting platform. All you have to do is find a doctor who is available for your available 
                        schedule, and immediately set an appointment.  
                      </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bxs-band-aid"></i>
                    <h4>Aid</h4>
                    <p>
                    MatiCare ensures that we present certified specialists in a variety of medical fields. Our doctors go through strict 
                    screening processes to ensure that they are legitimate, efficient, and reliable healthcare workers. Taking care of your 
                    well-being is the top priority of MatiCare. We make sure that we offer efficient and quality healthcare for our patients.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why MatiCare is Created Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
              <a href="https://mymailmapuaedu-my.sharepoint.com/:v:/g/personal/djbjuacalla_mymail_mapua_edu_ph/EVjEWMH9TiFGvUhHl5oqqBoBreoKQFwnE5FE06r-T3mP7w?e=EzTumJ" class="glightbox play-btn mb-4"></a>
          </div>
          

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Why MatiCare was Created</h3>
            <p>An individual's physical health, mental health, and overall well-being are priorities when it comes to having a productive and efficient workflow.
                A fully-functioning body is needed for one to also function. Medication schedules can be hard and frustrating when done physically (face-to-face). 
                Although health is an important factor for us to function well, numerous challenges are still experienced by people, especially in access to healthcare.
            </p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-receipt"></i></div>
              <h4 class="title"><a href="https://patientengagementhit.com/news/top-challenges-impacting-patient-access-to-healthcare" target="_blank">Current State of Healthcare</a></h4>
              <p class="description">Heath (2022), states that limitations due to appointment availability and office hours are recurring problems that hinder access to healthcare.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-heart"></i></div>
              <h4 class="title"><a href="https://www.benefitspro.com/2021/01/15/health-and-well-being-of-employees-become-a-top-priority-of-companies/?slreturn=20221010054805" target="_blank">Health and Well-being Priority</a></h4>
              <p class="description">According to a recent Artemis Health survey, almost 80% of benefits specialists and HR leaders said they would give employees' health and well-being top priority in 2020.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-brain"></i></div>
              <h4 class="title"><a href="https://www.edenhealth.com/blog/promote-employee-health/" target="_blank">Mental Health is Part of One's Well-being</a></h4>
              <p class="description">Research by the Eden Health team (2021) has found that 1 of 5 adults sufferers from a mental health disorder and affects someone's wellness drastically. </p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter"></span>
              <p>Doctors</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
              <p>Departments</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
              <p>Research Labs</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
              <p>Awards</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
          <p>Currently, MatiCare is able to proudly provide five medical departments that surely aids the needs of the majority.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cardiology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Neurology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pediatrics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Psychiatry</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Eye Care</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cardiology</h3>
                    <p class="fst-italic">Take Care of Your Heart</p>
                    <p>Cardiology is the study and treatment of disorders of the heart and the blood vessels. A person with heart disease or cardiovascular disease may be referred to a cardiologist.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/cardiology.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Neurology</h3>
                    <p class="fst-italic">Take Care of Your Brain</p>
                    <p>Neurology is the branch of medicine concerned with the study and treatment of disorders of the nervous system. The nervous system is a complex, sophisticated system that regulates and coordinates body activities.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/neurology.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pediatrics</h3>
                    <p class="fst-italic">Take Care of the Youth</p>
                    <p>Pediatrics is the branch of medicine dealing with the health and medical care of infants, children, and adolescents from birth up to the age of 18. A paediatrician is a child's physician who provides not only medical care for children who are acutely or chronically ill but also preventive health services for healthy children.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/pediatrics.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Psychiatry</h3>
                    <p class="fst-italic">Take Care of Your Mind</p>
                    <p>Psychiatry is the branch of medicine focused on the diagnosis, treatment and prevention of mental, emotional and behavioral disorders. People seek psychiatric help for many reasons. The problems can be sudden, such as a panic attack, frightening hallucinations, thoughts of suicide, or hearing "voices."</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/psychiatry.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ophthalmology</h3>
                    <p class="fst-italic">Take Care of Your Eyes</p>
                    <p>An ophthalmologist is a medical or osteopathic doctor who specializes in eye and vision care. An ophthalmologist diagnoses and treats all eye diseases, performs eye surgery and prescribes and fits eyeglasses and contact lenses to correct vision problems.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/ophthalmology.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>
            The medical practitioners or doctors are selected carefully. We ensure that these medical practitioners 
            are liscensed health professionals who maintain and reinstate one's health conditions through the practice
            of medicine. We are confident that these doctors thorougly examine and review each and every patient's 
            medical history, illnesses, and manage the patient's treatment.
          </p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Andrew Gupta</h4>
                <span>Chief Medical Officer</span>
                <p>Credentials:</p>
                <ul>
                  <li>Master of heath administration(MHA)</li>
                  <li>15 years of clinical experience</li>
                  <li>Doctor of Osteopathic Medicine(D.O.)</li>
                </ul>
                <br>

                <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                  <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
                  <a style= "color: white; text-align: center; text-decoration: none;"
                  href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/joshongmd'});return false;">
                  <button class="sched">Schedule an Appointment</button>
                </a>

                <div class="social">
                  <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/" target="_blank"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Roberta Oz</h4>
                <span>Anesthesiologist</span>
                <p>Credentials:</p>
                <ul>
                  <li>Doctor of Medicine(MD)</li>
                  <li>8 years of clinical experience</li>
                  <li>6-years residency in anesthesiology</li>
                </ul>
                <br>

                <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                  <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
                  <a style= "color: white; text-align: center; text-decoration: none;"
                  href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/joshongmd'});return false;">
                    <button class="sched">Schedule an Appointment</button>
                  </a>

                <div class="social">
                  <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/" target="_blank"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Josh Ong</h4>
                <span>Cardiology</span>
                <p>Credentials:</p>
                <ul>
                  <li>Doctor of Medicine(MD)</li>
                  <li>BS Biology</li>
                  <li>6-years residency in Cardiology</li>
                </ul>
                <br>

                <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                  <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
                  <a style= "color: white; text-align: center; text-decoration: none;"
                  href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/joshongmd'});return false;">
                    <button class="sched">Schedule an Appointment</button>
                </a>

                <div class="social">
                  <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/" target="_blank"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Cruz</h4>
                <span>Neurosurgeon</span>
                <p>Credentials:</p>
                <ul>
                  <li>Doctor of Medicine(MD)</li>
                  <li>Certified Neurosurgery practitioner</li>
                  <li>10-years residency in Neurosurgery</li>
                </ul>
                <br>

                <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                  <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
                  <a style= "color: white; text-align: center; text-decoration: none;"
                  href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/joshongmd'});return false;">
                    <button class="sched">Schedule an Appointment</button>
                </a>

                <div class="social">
                  <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/" target="_blank"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        <!-- </div> -->

      </div>
    </section><!-- End Doctors Section -->

    <!-- Medical Files Section -->
    <section id="medicalfiles" class="medicalfiles">
      <div class="container">
        <div class="section-title">
          <h2>Medical Files</h2>
            <p>Access files provided by your medical practitioner here.</p>
        </div>
      </div>
      <div class="section-">
        <!-- https://drive.google.com/drive/folders/1pSa-cB7rTYJAGqpQtADbpTY3fPUNghWG?usp=share_link -->
        <center>
          <iframe src="https://drive.google.com/embeddedfolderview?id=1pSa-cB7rTYJAGqpQtADbpTY3fPUNghWG#list" style="width:75%; height:600px; border:0;"></iframe>
        </center>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>MatiCare</h3>
            <p>
              1191 Pablo Ocampo Sr. Ext, <br>
              Makati, Metro Manila<br>
              United States <br><br>
              <strong>Phone:</strong> +12 345 678 9101<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#doctors">Doctors</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Sign up to stay updated.</p>
            <p>Any Feedbacks? Comments? Suggestions?</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>MatiCare</span></strong>. All Rights Reserved 2023
        </div>
        <div class="credits">
          Designed and Developed Eleccion, Franz Gabriel, Juacalla, Daryl Josh B., and Yabut, John Armand V.
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://twitter.com" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://facebook.com" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>