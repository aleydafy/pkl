<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- page title -->
      <title>Kontak | Animals</title>
      <!--[if lt IE 9]>
      <script src="js/respond.js"></script>
      <![endif]-->
      <!-- Font files -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CQuicksand:400,500,700" rel="stylesheet">
      <link href="assets/fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
      <link href="assets/fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
      <!-- Fav icons -->
      <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
      <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <!-- Bootstrap core CSS -->
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- style CSS -->
      <link href="assets/css/style.css" rel="stylesheet">
      <!-- plugins CSS -->
      <link href="assets/css/plugins.css" rel="stylesheet">
      <!-- Colors CSS -->
      <link href="assets/styles/maincolors.css" rel="stylesheet">
   </head>
   <!-- ==== body starts ==== -->
   <body id="top">
      <!-- Preloader -->
      <div id="preloader">
         <div class="spinner">
            <div class="bounce1"></div>
         </div>
         <!-- /spinner -->
      </div>
      <!-- /Preloader ends -->
      <nav id="main-nav" class="navbar-expand-xl fixed-top">
         <div class="row">
            <!-- Navbar Starts -->
            <div class="navbar container-fluid">
               <div class="container ">
                  <!-- logo -->
                  <a class="navbar-brand" href="index.html">
                  <i class="flaticon-dog-20"></i><span>Animals!</span>
                  </a>
                  <!-- Navbartoggler -->
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggle-icon">
                  <i class="fas fa-bars"></i>
                  </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive">
                     <ul class="navbar-nav ml-auto">
                        <!-- menu item -->
                        <li class="nav-item">
                           <a class="nav-link" href="/">Home
                           </a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item">
                           <a class="nav-link" href="/profile">Profile
                           </a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item">
                           <a class="nav-link" href="/berita">Berita
                           </a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item">
                           <a class="nav-link" href="/galeri">Galeri
                           </a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item active">
                           <a class="nav-link" href="/kontak">Kontak
                           </a>
                        </li>
                     </ul>
                     <!--/ul -->
                  </div>
                  <!--collapse -->
               </div>
               <!-- /container -->
            </div>
            <!-- /navbar -->
         </div>
         <!--/row -->
      </nav>
      <!-- /nav --><!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid overlay">
         <div class="jumbo-heading">
            <!-- section-heading -->
            <div class="section-heading" data-aos="zoom-in">
               <h1>Contact Us</h1>
            </div>
            <!-- /section-heading -->
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact Us 2</li>
               </ol>
            </nav>
         </div>
         <!-- /jumbo-heading -->
      </div>
      <!-- /jumbotron -->
      <!-- ==== Page Content ==== -->
      <div class="page">
         <div class="container">
            <div class="row">
               <!-- contact info -->
               <div class="contact-info col-lg-5 card bg-light-custom">
                  <h4>Send us a message!</h4>
                  <!-- Form Starts -->
                  <div id="contact_form">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
                              <label>Name<span class="required">*</span></label>
                              <input type="text" name="name" class="form-control input-field" required=""> 
                           </div>
                           <div class="col-md-6">
                              <label>Email Adress <span class="required">*</span></label>
                              <input type="email" name="email" class="form-control input-field" required=""> 
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <label>Subject</label>
                              <input type="text" name="subject" class="form-control input-field"> 
                           </div>
                           <div class="col-md-12">
                              <label>Message<span class="required">*</span></label>
                              <textarea name="message" id="message" class="textarea-field form-control" rows="3"  required=""></textarea>
                           </div>
                        </div>
                        <button type="submit" id="submit_btn" value="Submit" class="btn btn-primary">Send message</button>
                     </div>
                     <!-- Contact results -->
                     <div id="contact_results"></div>
                  </div>
               </div>
               <div class="col-lg-7">
                  <!-- map-->
                  <div id="map-canvas" class="mt-3 border-irregular1"></div>
               </div>
               <!-- /col-lg-->
            </div>
            <!-- /row-->
            <div class="row res-margin mt-5">
               <div class="col-lg-6 mt-5">
                  <div class="contact-icon">
                     <!---icon-->
                     <i class="fa fa-envelope top-icon"></i>
                     <!-- contact-icon info-->
                     <div class="contact-icon-info">
                        <h5>Send us a Message</h5>
                        <p class="h7"><a href="mailto:email@yoursite.com">email@yoursite.com</a></p>
                     </div>
                  </div>
               </div>
               <!-- /contact-icon-->
               <div class="col-lg-6 mt-5">
                  <div class="contact-icon">
                     <!---icon-->
                     <i class="fa fa-map-marker top-icon"></i>
                     <!-- contact-icon info-->
                     <div class="contact-icon-info">
                        <h5>Visit our Location</h5>
                        <p class="h7">Pet Street 123 - New York</p>
                     </div>
                  </div>
               </div>
               <!-- /contact-icon-->
               <div class="col-lg-6 mt-5">
                  <div class="contact-icon">
                     <!---icon-->
                     <i class="fa fa-phone top-icon"></i>
                     <!-- contact-icon info-->
                     <div class="contact-icon-info">
                        <h5>Call us today</h5>
                        <p class="h7">(123) 456-789</p>
                     </div>
                  </div>
               </div>
               <!-- /contact-icon-->
               <div class="col-lg-6 mt-5">
                  <div class="contact-icon">
                     <!---icon-->
                     <i class="fa fa-heart top-icon"></i>
                     <!-- contact-icon info-->
                     <div class="contact-icon-info">
                        <h5>Follow us on Social Media</h5>
                        <ul class="social-media">
                           <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                           <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- /contact-icon-->
            </div>
            <!-- /row -->
         </div>
         <!-- /container --> 
      </div>
      <!-- /page -->
      <!-- ==== footer ==== -->
      <footer class="text-light">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <a class="navbar-brand" href="index.html"><i class="flaticon-dog-20"></i><span>Woof!</span></a>
                  <p class="mt-3">Cras enim wisi elit aenean, amet eros curabitur. Wisi ad eget ipsum metus sociis Cras enim wisi elit aenean.</p>
               </div>
               <!--/ col-lg -->
               <div class="col-lg-3">
                  <h6><i class="fas fa-envelope margin-icon"></i>Contact Us</h6>
                  <ul class="list-unstyled">
                     <li>(123) 456-789</li>
                     <li><a href="mailto:email@yoursite.com">email@yoursite.com</a></li>
                     <li>Pet Street 123 - New York </li>
                  </ul>
                  <!--/ul -->
               </div>
               <!--/ col-lg -->
               <div class="col-lg-3">
                  <h6><i class="far fa-clock margin-icon"></i>Working Hours</h6>
                  <ul class="list-unstyled">
                     <li>Open 9am - 10pm</li>
                     <li>Holidays - Closed</li>
                     <li>Weekends - Closed</li>
                  </ul>
                  <!--/ul -->
               </div>
               <!--/ col-lg -->
            </div>
            <!--/ row-->
            <div class="row">
               <div class="credits col-sm-12">
                  <p>Copyright 2018 / Designed by <a href="http://www.ingridkuhn.com">Ingrid Kuhn</a></p>
               </div>
            </div>
            <!--/ row -->
         </div>
         <!--/ container -->
         <!-- Go To Top Link -->
         <div class="page-scroll hidden-sm hidden-xs">
            <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
         </div>
         <!--/page-scroll-->
      </footer>
      <!--/ footer-->
      <!-- Bootstrap core & Jquery -->
      <script src="assets/vendor/jquery/jquery.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Custom Js -->
      <script src="assets/js/custom.js"></script>
      <script src="assets/js/plugins.js"></script>
      <!-- maps -->
      <script src="assets/js/map.js"></script>
      <!-- Contact Form script -->
      <script src="assets/js/contact.js"></script>
	  <!-- Prefix free -->
      <script src="assets/js/prefixfree.min.js"></script>
   </body>
</html>