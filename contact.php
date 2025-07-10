<?php
require_once "app-dashboard/user/session.inc.php";
require_once "app-dashboard/user/connection.inc.php";
?>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta name="Author" content="bitcoin, ethereum, usdt" />
  <meta name="description" content="investments, investment sites, investment companies" />
  <meta name="keywords" content="best sites to invest, bitcoin investment sites, bitcoin investment companies" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="image/logo.png">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- font awesome -->
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/regular.css">
  <!-- <script src="https://use.fontawesome.com/104bd42fc3.js"></script> -->
  <title>Whiteskyventures | Contact</title>  
</head>
<body class="body">
  <!-- nav -->
  <nav>
    <div class="nav-brand">
      <a href="index.php"><img src="image/logo.png" alt="website-logo"></a>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="faq.php">FAQs</a></li>
      <li><a href="contact.php" class="active-link">Contact Us</a></li>
      <!-- logout button -->
      <div>
        <?php
          if (isset($_SESSION['u_id'])) {
            echo '<form action="app-dashboard/user/logout.inc.php" method="POST">
            <button type="submit" name="logout" id="logout_button"><span><i class="fa fa-right-from-bracket fa-sm"></i></span>Logout</button>
            </form>';
          }
        ?>
      </div>
    </ul>
    <div class="menu-btn-burger">
      <div class="menu-icon"></div>
    </div>
  </nav>
  <!-- body first section -->
  <section>
    <div class="grid">
      <div class="container">
        <div class="text-center contact">
          <h3>Get in touch with us</h3>
          <P>Our goal is to provide our investors with a reliable source of high income, while minimizing any possible risks and offering a high-quality service, allowing us to automate and simplify the relations between the investors and the trustees.</P>
        </div>
      </div>
    </div>
  </section>
  <!-- body sec section -->
  <section>
    <div class="wrapper_box">
      <div class="container message_box">
        <?php
          echo errorMessage();
          echo successMessage();
        ?>
        <div class="row">
          <div class="col-sm-6 py-3">
            <form action="app-dashboard/user/message.inc.php" method="POST">
              <p>FULL NAME*</p>
              <input type="text" name="name" class="form-control">
              <p>EMAIL ADDRESS*</p>
              <input type="text" name="email" class="form-control">
              <p>MESSAGE*</p>
              <textarea name="message" cols="50" class="form-control" rows="5"></textarea>
              <button class="btn btn-success btn-lg mt-4" name="submit">Submit</button>
            </form>
          </div>
          <div class="col-sm-6 contact_info py-3">
            <h3>Contact Information</h3>
            <p>Everyone wants to be heard and understood. At Whiteskyventures, our core goal is to easily connect with people and understand their preferences.</p>
            <div class="end_contact_info">
              <p><i class="fa fa-envelope"></i> support@whiteskyventures.com</p>
              <p><i class="fa fa-phone"></i> +1 (352) 575 - 9978</p>
              <p><i class="fa fa-map-marker"></i> East Washington St., Phoenix, AZ 82024, USA</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6" id="company_write">
          <h3>Whiteskyventures</h3>
          <p>Flexible and secure companies are the cornerstone of our community investment philosophy. With our numerous experts, be sure your money is well looked after. Get started today and never look back.</p>
        </div>
        <div class="col-lg-3">
          <div class="resources">
            <h3>resources</h3>
            <ul>
              <li><a href="index.php">home</a></li>
              <li><a href="faq.php">faq</a></li>
              <li><a href="services.php">services</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="company">
            <h3>company</h3>
              <ul>
                <li><a href="about.php">about us</a></li>
                <li><a href="contact.php">contact us</a></li>
              </ul>
          </div>
        </div>
      </div>
      <div class="site_year">
        <div class="year_update">
          <p>Whiteskyventures &copy <span id="year_update"></span> | All Rights Reserved</p>
        </div>
        <div class="social_media">
          <a href="#"><i class="fa-brands fa fa-facebook-square"></i></a>
          <a href="#"><i class="fa-brands fa fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa fa-instagram"></i></a>    
        </div>
      </div>
    </div>
    <!-- back to top -->
    <!-- <div class="back-to-top">
        <button onclick="topFunction()" id="mybtn"><i class="fa fa-chevron-up"></i></button>
    </div> -->
  </footer>
  <script src="page.js"></script>
</body>
</html>