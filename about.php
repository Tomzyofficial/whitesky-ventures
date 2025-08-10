<?php
require_once('app-dashboard/user/connection.inc.php');
?>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta name="Author" content="bitcoin, ethereum, usdt" />
  <meta name="description" content="investments, investment sites, investment companies" />
  <meta name="keywords" content="best sites to invest, bitcoin investment sites, bitcoin investment companies" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="images/logo.PNG">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/about.css">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <title>Whiteskyventures | About</title>  
</head>
<body class="body">
  <!-- nav -->
  <nav>
    <div class="nav-brand">
      <a href="index.php"><img src="images/logo.PNG" alt="website-logo"></a>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php" class="active-link">About Us</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="faq.php">FAQs</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      <!-- logout button -->
      <li>
        <?php
          if (isset($_SESSION['u_id'])) {
              echo '<form action="app-dashboard/user/logout.inc.php" method="POST">
            <button type="submit" name="logout" id="logout_button"><span><i class="fa fa-right-from-bracket fa-sm"></i></span>Logout</button>
            </form>';
          }
        ?>
      </li>
    </ul>
    <div class="menu-btn-burger">
      <div class="menu-icon"></div>
    </div>
  </nav>
  <!-- body first section -->
  <section>
    <div class="container" id="about_us">
      <div class="row wrapper_contents">
        <div class="col-lg-7" id="write_up">
          <h3>get to know us more deep to help your need</h3>
          <p>Meeting the highest expectations of our elite clients, our excellent customer care is readily available to all and yonder. 
          Our Company provides unprecedented levels of service and outstanding benefits for all our esteemed customers.</p>
          <P>Our goal is to provide our investors with a reliable source of high income, while minimizing any possible risks and offering a high-quality service, allowing us to automate and simplify the relations between the investors and the trustees.</P>
        </div>
        <div class="col-lg-5" id="side_image">
          <img src="images/5.PNG">
        </div>
      </div>
      <div class="row flex_wrapper pt-5">
        <div class="col-lg-5 counter_box">
          <p class="count"><span class="counter">98</span>%</p>
          <p class="entail">Satisfaction Rate</p>
          <p class="count"><span class="counter">100</span>%</p>
          <p class="entail">Return Rate</p>
          <p class="count"><span class="counter">5</span>+</p>
          <p class="entail">Years</p>
        </div>
        <div class="col-lg-7 meet">
          <img src="images/1.PNG">
        </div>
      </div>
    </div>
  </section>
  <!-- article -->
  <article>
    <div class="container">
      <div class="grid">
        <div class="text-center my-5"  id="motivation">
          <p>"For me, becoming isn't about arriving somewhere or achieving a certain aim. I see it instead as forward motion, a means of evolving, a way to reach continuously towards a better self. The journey doesn't end."</p>
          <div class="author_ceo mt-5">
            <h5>Brandon Robinson</h5>
            <p>General Manage of Whiteskyventures</p>
          </div>
        </div>
      </div>
    </div>
  </article>
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
  </footer>
    <!-- site function js -->
    <script src="page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>