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
  <meta name="robots" content="index, nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="images/logo.PNG">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/services.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
   <!-- font awesome -->
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <title>Whiteskyventures | Services</title>  
</head>
<body class="body">
  <!-- nav -->
  <nav>
    <div class="nav-brand">
      <a href="index.php"><img src="images/logo.PNG" alt="website-logo"></a>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="services.php" class="active-link">Services</a></li>
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
    <div class="grid">
      <div class="container">
        <div class="text-center boost">
          <h3>the only cryptocurrency investment platform you will ever need</h3>
        </div>
      </div>
    </div>
  </section>
  <!-- body sec section -->
  <section>
    <div class="grid">
      <div class="counter-section">
        <div class="container">
          <div class="row">
            <div class="col counter-box">
              <div class="counter-icon"><i class="fa fa-briefcase"></i></div>
                <p><span class="counter">50</span>M</p>
                <p class="entail">TRANSACTIONS in a Month</p>
              </div>
              <div class="col counter-box">
                <div class="counter-icon"><i class="fa-regular fa fa-handshake"></i></div>
                <div class="d-flex"><p><span class="counter">100</span>%</p></div>
                <p class="entail">SUPPORT</p>
              </div>
              <div class="col counter-box">
                <div class="counter-icon"><i class="fa-regular fa fa-smile"></i></div>
                <div class="d-flex"><p><span class="counter">99</span>%</p></div>
                <p class="entail">Customer Retention</p>
              </div>
              <div class="col counter-box">
                <div class="counter-icon"><i class="fa fa-globe"></i></div>
                  <p><span class="counter">98</span>%</p>
                  <p class="entail">Positive Feedback</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- body first article -->
  <article>
    <div class="container">
      <div class="flex-box">
        <div class="our_mission text-center ">
          <h3 class="py-5">our mission</h3>
          <p>To build a brand into a reputable international cryptocurrency institution recognized for innovation, legal, and transparent value for all stakeholders.</p>
        </div>
      </div>
    </div>
  </article>
  <!-- body sec article -->
  <div class="container">
    <div class="row" id="box">
      <div class="col-sm-4 advance">
        <img src="images/24.PNG" alt="Advance platform">
        <h4>advanced platforms</h4>
        <p>Whiteskyventures will continue to offer specialised cryptocurrency financial services</p>
      </div>
      <div class="col-sm-4 seamless">
        <img src="images/25.PNG" alt="Seamless integration">
        <h4>seamless integration</h4>
        <p>Whiteskyventures will continue to offer specialised seamless integration</p>
      </div>
      <div class="col-sm-4 revenue">
        <img src="images/26.PNG" alt="Revenue multiplier">
        <h4>revenue multiplier</h4>
        <p>Whiteskyventures will continue to offer specialised revenue multiplier</p>
      </div>
    </div>
  </div>
  <!-- body third article -->
  <div class="wrapper">
    <div class="container text-center usage">
      <h3 class="py-4">ready to get started?</h3>
      <p>Whiteskyventures remains the best crypto investment platform all around the globe. We offer you a Swift crypto transactions, you can invet with us and be rest assured of Swift dealings.</p>
      <a href="./app-dashboard/user/register.php" class="btn btn-dark btn-lg">Register now</a>
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
              <li><a href="faq.php">FAQs</a></li>
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