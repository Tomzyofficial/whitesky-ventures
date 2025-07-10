<?php
  require_once('app-dashboard/user/connection.inc.php');
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
  <link rel="stylesheet" href="css/faq.css">
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
  <!-- <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script> -->
  <title>Whiteskyventures | FAQ</title>  
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
      <li><a href="faq.php" class="active-link">FAQs</a></li>
      <li><a href="contact.php">Contact Us</a></li>
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
    <div class="container">
      <div class="wrapper text-center">
        <div class="image_top mt-5">
          <img src="image/27.png">
        </div>
        <div class="text-center mt-5 faq_writes">
          <p>Everyone wants to be heard and understood. At Whiteskyventures, our core goal is to easily connect with people and understand their preferences.</p>
          <p><a href="about.php" class="about_link">Learn more about us</a></p>
        </div>
      </div>
    </div>
  </section>
  <!-- body sec section -->
  <div class="container">
    <div class="row" id="supports">
      <div class="col-sm-4">
        <div class="support text-center">
          <img src="image/30.png">
          <h4 class="py-3"><a href="#">social media</a></h4>
          <p>You can also contact and follow us on our social media platforms.</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="support text-center">
          <img src="image/29.png" alt="">
          <h4 class="py-3"><a href="contact.php">contact us</a></h4>
          <p>Whiteskyventures is here to help with any issue</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="support text-center">
          <img src="image/28.png">
          <h4 class="py-3"><a href="mailto:support@whiteskyventures.com">get support</a></h4>
          <p>Kindly open a support ticket on our help center</p>
        </div>
      </div>
    </div>
  </div>
  <!-- article(faq) -->
  <div class="container text-center questions_answers">
    <h3>Frequently Asked Questions</h3>
    <div class="questions">
      <div class="card shadow">
        <a href="#Whiteskyventuresf&q/frequently-asked-questions/1" class="first text-start">What is digital currency?<span><i class="fa fa-caret-right" id="caret"></i></span></a>
        <p class="first-answer" style="display: none;">Digital currency is a form of currency that is available only in digital or electronic form. It is also called digital money, electronic money, electronic currency, or cybercash.</p>
      </div>
      <div class="card shadow">
        <a href="#Whiteskyventuresf&q/frequently-asked-questions/2" class="second text-start">Is Whiteskyventures a registered company?<span><i class="fa fa-caret-right" id="caret"></i></span></a>
        <p class="second-answer" style="display: none;">Yes, Whiteskyventures is a registered company in USA.</p>
      </div>
      <div class="card shadow">
        <a href="#Whiteskyventuresf&q/frequently-asked-questions/3" class="third text-start">Who can invest in Whiteskyventures?<span><i class="fa fa-caret-right" id="caret"></i></span></a>
        <p class="third-answer" style="display: none;">Whiteskyventures is for everyone, and so anyone can invest as long as your funds is free from theft and or any criminal records.</p>
        </div>
        <div class="card shadow">
          <a href="#Whiteskyventuresf&q/frequently-asked-questions/4" class="fourth text-start">How can I register a new account?<span><i class="fa fa-caret-right" id="caret"></i></span></a>
          <p class="fourth-answer" style="display: none;">Simply click on the register button to register.</p>
        </div>
        <div class="card shadow">
          <a href="#michaelf&q/frequently-asked-questions/5" class="fifth text-start">Do you have customer service? <span><i class="fa fa-caret-right" id="caret"></i></span></a>
          <p class="fifth-answer" style="display: none;">Yes, 24/7 customer service always available to assist you.</p>
        </div>
      </div>
    </div>
  </div>
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