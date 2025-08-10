<?php
include_once "components/component.inc.php";
require_once('app-dashboard/user/connection.inc.php');
?>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- spop  -->
  <link rel="stylesheet" href="spop-gh-pages/dist/spop.min.css">
  <script src="spop-gh-pages/dist/spop.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!-- meta charsets -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta name="Author" content="bitcoin, ethereum, usdt" />
  <meta name="description" content="investments, investment sites, investment companies" />
  <meta name="keywords" content="best sites to invest, bitcoin investment sites, bitcoin investment companies" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- page icon -->
  <link rel="icon" type="image/x-icon" href="images/logo.PNG">
  <link rel="stylesheet" href="css/style.css">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <title>Whiteskyventures | Home</title>     
</head>
<body class="body">
  <!-- nav -->
  <nav>
    <div class="nav-brand">
      <a href="index.php"><img src="images/logo.PNG" alt="website-logo"></a>
    </div>
    <ul class="nav-links">
      <li><a href="index.php" class="active-link">Home</a></li>
      <li><a href="about.php">About Us</a></li>
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
  <!-- Header - carousel -->
  <header>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <?php carousel(); ?>
    </div>
  </header>
  <!-- body first section -->
  <div class="container">
    <div class="wrapper">
      <!-- pop up message display -->
      <div class="spop-container spop--bottom-right" id="spop--bottom-center"></div>
      <div class="email_box">
        <a href="mailto:support@whiteskyventures.com" id="email_image"><img src="images/29.PNG" alt="Send message"><span>Message us</span></a>
      </div>
      <div class="guide text-center">
        <div class="guidelines">
          <h3 id="how_to">How to use whiteskyventures</h3>
          <h2 id="steps">simple steps to get started</h2>
        </div>
        <div class="row" id="steps_box">
          <div class="col-md-4">
            <div id="account">
              <i class="fa fa-users"></i>
              <h3>Create an account</h3>
              <p>Simply click on the register button to create your free account</p>
            </div>
          </div>
          <div class="col-md-4">
            <div id="deposit">
              <i class="fa fa-dollar"></i>
              <h3>Make deposit</h3>
              <p>Choose a plan that best suits you from our investment plans and make a deposit to your personal wallet.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div id="growth">
              <i class="fa fa-bank"></i>
              <h3>Financial growth</h3>
              <p>Watch your investment growth live and experience easy withdrawal at all times.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- body second section -->
  <div class="end_wrapper" id="second_section">
    <div class="container">
      <div class="row">
        <div class="col-md-7 py-5">
          <div class="image"><img src="images/12.PNG" alt="Fine image on the left"></div>
        </div>
        <div class="col-md-5 py-5">
          <div class="feature_contents">
            <h3>our best features</h3>
            <hr>
            <div class="privacy">
              <h5>privacy</h5>
              <p>With database decentralization, no single entity has control over your private information. Third parties are excluded and the information is owned by everyone in the network, but can only be accessed by private keys controlled by you.</p>
            </div>
            <div class="affordability">
              <h5>affordability</h5>
              <p>All data is compressed into text files. Compression of the data significantly reduces the amount of storage that files can take up, as well as speeds up file transfer and lowers storage costs.</p>
            </div>
            <div class="security">
              <h5>security</h5>
              <p>In addition to decentralization, cryptography adds additional layers of protection to the system, making all information on the Blockchain encrypted and more secure.</p>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
  <!-- body third section -->
  <div class="reasons_company text-center">
    <div class="container">
      <h4>why choose whiteskyventures</h4>
      <p>Our goal is to provide our investors with a reliable source of high income, while minimizing any possible risks and offering a high-quality service.</p>
      <div class="row" id="first_row">
        <div class="col-lg-4">
          <div class="first_column">
            <img src="images/15.PNG" alt="Legal company">
            <h5>legal company</h5>
            <p>Our company conducts absolutely legal activities in the legal field. We are certified to operate investment business, we are legal and safe.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="first_column">
            <img src="images/14.PNG" alt="High reliability">
            <h5>high reliability</h5>
            <p>We are trusted by a huge number of people. We are working hard constantly to improve the level of our security system and minimize possible risks.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="first_column">
            <img src="images/16.PNG" alt="Anonymity">
            <h5>anonymity</h5>
            <p>Anonymity and using cryptocurrency as a payment instrument. In the era of electronic money - this is one of the most convenient ways of cooperation.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="second_row">
      <div class="col-lg-4">
        <div class="second_column">
          <img src="images/20.PNG" alt="Transparency">
          <h5>transparency</h5>
          <p>Greatest transaparency helps you keep check of all your investments.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="second_column">
          <img src="images/17.PNG" alt="Quick withdrawal">
          <h5>quick withdrawal</h5>
          <p>Our retreats are treated spontaneously once requested. There is a fair maximum limits. The minimum withdrawal amount is as per package plan .</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="second_column">
          <img src="images/19.PNG" alt="24/7 support">
          <h5>24/7 support</h5>
          <p>We provide 24/7 customer support through e-mail and telegram. Our support representatives are periodically available to elucidate any difficulty.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- body fourth section -->
  <div class="investment_box">
    <div class="container text-center">
      <div class="row investments d-flex justify-content-center">
        <div class="first_package">
          <h3>our investment plans</h3>
          <p>Investment plans tailored to suit everyone irrespective of their income earnings</p>
        </div>
        <div class="col-md-3">
          <div class="regular">
            <h5>Regular trade</h5>
            <img src="images/21.PNG" style="width: 50px; height: 50px; border-radius: 50%;" alt="20% ROI">
            <h5>10% in 2 Days</h5>
            <p>Minimum: $2000.00</p>
            <p>Maximum: $50,000.00</p>
            <a href="app-dashboard/user/login.php" class="btn btn-success btn-sm">Invest Now</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="regular">
            <h5>Gold trade</h5>
            <img src="images/21.PNG" style="width: 50px; height: 50px; border-radius: 50%;" alt="45% ROI">
            <h5>15% in 3 Days</h5>
            <p>Minimum: $5,000.00</p>
            <p>Maximum: $150,000.00</p>
            <a href="app-dashboard/user/login.php" class="btn btn-success btn-sm">Invest Now</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="regular">
            <h5>Premium trade</h5>
            <img src="images/21.PNG" style="width: 50px; height: 50px; border-radius: 50%;" alt="65% ROI">
            <h5>25% in 4 Days</h5>
            <p>Minimum: $10,000.00</p>
            <p>Maximum: $200,000.00</p>
            <a href="app-dashboard/user/login.php" class="btn btn-success btn-sm">Invest Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- body fifth section -->
  <div class="container">
    <div class="questions_answers text-center">
      <h3>We help you manage your investment portfolios </h3>
      <p>whiteskyventures has clearly distinguished itself in the cryptocurrency industry through superior service quality, unique customer experience, and sound financial indices. </p>
      <div class="questions">
        <div class="card shadow">
          <a href="#whiteskyventuresf&q/frequently-asked-questions/1" class="first text-start">What is digital currency?<span><i class="fa fa-caret-right" id="caret"></i></span></a>
          <p class="first-answer" style="display: none;">Digital currency is a form of currency that is available only in digital or electronic form. It is also called digital money, electronic money, electronic currency, or cybercash.</p>
        </div>
        <div class="card shadow">
          <a href="#whiteskyventuresf&q/frequently-asked-questions/2" class="second text-start">Is whiteskyventures a registered company?<span><i class="fa fa-caret-right" id="caret"></i></span></a>
          <p class="second-answer" style="display: none;">Yes, whiteskyventures is a registered company in USA.</p>
        </div>
        <div class="card shadow">
          <a href="#whiteskyventuresf&q/frequently-asked-questions/3" class="third text-start">Who can invest in whiteskyventures?<span><i class="fa fa-caret-right" id="caret"></i></span></a>
          <p class="third-answer" style="display: none;">whiteskyventures is for everyone, and so anyone can invest as long as your funds is free from theft and or any criminal records.</p>
        </div>
        <div class="card shadow">
          <a href="#whiteskyventuresf&q/frequently-asked-questions/4" class="fourth text-start">How can I register a new account?<span><i class="fa fa-caret-right" id="caret"></i></span></a>
          <p class="fourth-answer" style="display: none;">Simply click on the register button to register.</p>
        </div>
        <div class="card shadow">
          <a href="#whiteskyventuresf&q/frequently-asked-questions/5" class="fifth text-start">Do you have customer service? <span><i class="fa fa-caret-right" id="caret"></i></span></a>
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
          <h3>whiteskyventures</h3>
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
          <p>whiteskyventures &copy <span id="year_update"></span> | All Rights Reserved</p>
        </div>
        <div class="social_media">
          <a href="#"><i class="fa-brands fa fa-facebook-square"></i></a>
          <a href="#"><i class="fa-brands fa fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

  </footer>
  <!-- site scripts -->
  <script src="page.js"></script>
  <script src="popUp.js" type="module"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>