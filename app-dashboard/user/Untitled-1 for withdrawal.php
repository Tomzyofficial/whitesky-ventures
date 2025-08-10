<div class="row">
          <div class="col-sm-6 mt-5">
            <h5 class="text-light">Ask for withdrawal:</h5>
            <div class="d-flex text-success text-capitalize py-4">
              <h6 style="padding-right: 104px;">account balance</h6>
              <?php
                if ($planPayment != null) {
                    echo "$" . htmlentities($sum);
                } else {
                    echo '<div class="text-danger">$0.00</div>';
                }
              ?>      
            </div>
            <!-- bitcoin balance -->    
            <div class="d-flex">
              <img src="../../image/38.png" style="width: 80px; height: 40px; background-size: 100%;">
              <p style="padding-left: 5px;">Bitcoin</p>
            </div>
            <div class="d-flex pt-3">
              <img src="../../image/39.png" style="width: 80px; height: 40px; background-size: 100%;">
              <p style="padding-left: 5px;">Ethereum(ERC20)</p>
            </div>
            <div class="d-flex pt-3">
              <img src="../../image/40.png" style="width: 80px; height: 40px; background-size: 100%;">
              <p style="padding-left: 5px;">USDT(TRC20)</p>
            </div>   
            <!-- check availability of funds -->
            <div class="text-danger">
                <?php
                  $sql = "SELECT * FROM plan_in_take WHERE status = 'APPROVED' AND paid_id = '$loggedIn'";
              $stmt = mysqli_query($conn, $sql);
              $percentage = 100;
              $percent = 0;
              $average = 0;
              $planName = "";
              date_default_timezone_set("America/Los_Angeles");
              $time = date('H');
              while ($row = $stmt->FETCH_ASSOC()) {
                  $planName = $row['plan_name'];
                  $average += $row['plan_amount'];
              }
              if ($planName === "Regular trade") {
                  if ($time == 24 * 5) {
                      $percent = 10;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 10) {
                      $percent = 10 * 2;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 15) {
                      $percent = 10 * 3;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 20) {
                      $percent = 10 * 4;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 25) {
                      $percent = 10 * 5;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 30) {
                      $percent = 10 * 6;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 35) {
                      $percent = 10 * 7;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 40) {
                      $percent = 10 * 8;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 45) {
                      $percent = 10 * 9;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 50) {
                      $percent = 10 * 10;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 55) {
                      $percent = 10 * 11;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 60) {
                      $percent = 10 * 12;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 65) {
                      $percent = 10 * 13;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 70) {
                      $percent = 10 * 14;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 75) {
                      $percent = 10 * 15;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 80) {
                      $percent = 10 * 16;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 85) {
                      $percent = 10 * 17;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 90) {
                      $percent = 10 * 18;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 100) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $100 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } else {
                      echo "<pre>";
                      echo '<div class="py-5">Wait for ROI calculations...</div>';
                      echo "</pre>";
                  }
              } elseif ($planName === "Gold trade") {
                  if ($time == 24 * 14) {
                      $percent = 25;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 28) {
                      $percent = 25 * 2;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 42) {
                      $percent = 25 * 3;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 56) {
                      $percent = 25 * 4;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 70) {
                      $percent = 25 * 5;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 84) {
                      $percent = 25 * 6;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 98) {
                      $percent = 25 * 7;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 112) {
                      $percent = 25 * 8;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 126) {
                      $percent = 25 * 9;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 140) {
                      $percent = 25 * 10;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 200) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $200 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } else {
                      echo "<pre>";
                      echo '<div class="py-5">Wait for ROI calculations...</div>';
                      echo "</pre>";
                  }
              } elseif ($planName === "Premium trade") {
                  if ($time == 24 * 21) {
                      $percent = 40;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 300) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $300 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 42) {
                      $percent = 40 * 2;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 300) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $300 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 63) {
                      $percent = 40 * 3;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 300) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $300 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 84) {
                      $percent = 40 * 4;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 300) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $300 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 105) {
                      $percent = 40 * 5;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 300) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $300 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 126) {
                      $percent = 40 * 6;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 300) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $300 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 147) {
                      $percent = 40 * 7;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 300) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $300 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 168) {
                      $percent = 25 * 8;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 300) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $300 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } else {
                      echo "<pre>";
                      echo '<div class="py-5">Wait for ROI calculations...</div>';
                      echo "</pre>";
                  }
              } elseif ($planName === "Master trade") {
                  if ($time == 24 * 42) {
                      $percent = 85;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 500) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $500 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 84) {
                      $percent = 85 * 2;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 500) {
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $500 and above.</div>';
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 126) {
                      $percent = 85 * 3;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 500) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $500 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 168) {
                      $percent = 85 * 4;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 500) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $500 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 210) {
                      $percent = 85 * 5;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 500) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $500 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } elseif ($time == 24 * 252) {
                      $percent = 85 * 6;
                      $sum = ($percent / $percentage) * $average;
                      if ($sum < 500) {
                          echo "<pre>";
                          echo '<div class="py-5">You are not eligible for withdrawal. ROI must be $500 and above.</div>';
                          echo "</pre>";
                      } else {
                          echo '<button type="button" id="btn" style=" padding: 10px 10px; margin-top: 20px; background-color: #1b2e4b; color: #009688;">Request for withdrawal</button>';
                      }
                  } else {
                      echo "<pre>";
                      echo '<div class="py-5">Wait for ROI calculations...</div>';
                      echo "</pre>";
                  }
              } else {
                  echo "<pre>";
                  echo '<div class="py-5">You are not eligible for withdrawal.</div>';
                  echo "</pre>";
              }
              ?>
              </div>
            </div>
            <div class="col-sm-6 mt-5">
              <?php
              echo errorMessage();
              echo successMessage();
              ?>
              <div class="selections" style="display: none;">
                <form action="withdrawal.inc.php?id=<?= htmlentities($loggedIn); ?>" method="POST" autocomplete="off">
                  <h5>Select plan</h5>
                  <select name="plan_selection" id="plan">
                    <option value="Regular trade" >Regular trade</option>
                    <option value="Gold trade">Gold trade</option>
                    <option value="Premium trade">Premium trade</option>
                    <option value="Master trade">Master trade </option>
                  </select>
                  <h5>Select wallet</h5>
                  <select name="withdrawal_method" id="payment">
                    <option value="Bitcoin">Bitcoin</option>
                    <option value="Ethereum">Ethereum</option>
                    <option value="USDT(ERC20)">USDT(ERC20)</option>
                  </select>
                  <h5>Amount</h5>
                  <input type="number" name="withdrawal_amount" id="" style="outline: none; border: none;">
                  <h5>Input wallet address</h5>
                  <input type="text" name="wallet_address" style="outline: none; border: none;">
                  <button name="submit" id="btn_submit" style=" border: none; margin-top: 10px;">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>




        <!-- dashboard total earned -->
        <?php
 $sql = "SELECT * FROM plan_in_take WHERE status = 'APPROVED' AND paid_id = '$loggedIn'";
              $stmt = mysqli_query($conn, $sql);
              $percentage = 100;
              $percent = 0;
              $average = 0;
              $sum = 0;
              $planName = "";
              date_default_timezone_set("America/Los_Angeles");
              $time = date('H');
              while ($row = $stmt->FETCH_ASSOC()) {
                  $planName = $row['plan_name'];
                  $average += $row['plan_amount'];
              }
              if ($planName === "Regular trade") {
                  if ($time == 24 * 5) { // in 5 days user earns 10%
                      $percent = 10;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 10) { // in 10 days user earns 20%
                      $percent = 10 * 2;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 15) { // in 15 days user earns 30%
                      $percent = 10 * 3;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 20) { // in 20 days user earns 40%
                      $percent = 10 * 4;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 25) { // in 25 days user earns 50%
                      $percent = 10 * 5;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 30) { // in 30 days user earns 60%
                      $percent = 10 * 6;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 35) { // in 35 days user earns 70%
                      $percent = 10 * 7;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 40) { // in 40 days user earns 80%
                      $percent = 10 * 8;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 45) { // in 45 days user earns 90%
                      $percent = 10 * 9;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 50) { // in 50 days user earns 100%
                      $percent = 10 * 10;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 55) { // in 55 days user earns 110%
                      $percent = 10 * 11;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 60) { // in 60 days user earns 120%
                      $percent = 10 * 12;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 65) { // in 65 days user earns 130%
                      $percent = 10 * 13;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 70) { // in 70 days user earns 140%
                      $percent = 10 * 14;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 75) { // in 75 days user earns 150%
                      $percent = 10 * 15;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 80) { // in 80 days user earns 160%
                      $percent = 10 * 16;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 85) { // in 85 days user earns 170%
                      $percent = 10 * 17;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 90) { // in 90 days user earns 180%
                      $percent = 10 * 18;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } else {
                      echo '<p class="fw-lighter fs-6">ROI is calculated and returned every 5 days.</p>';
                  }
              } elseif ($planName === "Gold trade") {
                  if ($time == 24 * 14) { // in 14 days user earns 25%
                      $percent = 25;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 28) { // in 28 days user earns 50%
                      $percent = 25 * 2;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 42) { // in 42 days user earns 75%
                      $percent = 25 * 3;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 56) { // in 56 days user earns 100%
                      $percent = 25 * 4;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 70) { // in 70 days user earns 125%
                      $percent = 25 * 5;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 84) { // in 84 days user earns 150%
                      $percent = 25 * 6;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 98) { // in 98 days user earns 175%
                      $percent = 25 * 7;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 112) { // in 112 days user earns 200%
                      $percent = 25 * 8;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 126) { // in 126 days user earns 225%
                      $percent = 25 * 9;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 140) { // in 140 days user earns 250%
                      $percent = 25 * 10;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } else {
                      echo '<p class="fw-lighter fs-6">ROI is calculated and returned every 14 days.</p>';
                  }
              } elseif ($planName === "Premium trade") {
                  if ($time == 24 * 21) { // in 21 days user earns 40%
                      $percent = 40;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 42) { // in 42 days user earns 80%
                      $percent = 40 * 2;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 63) { // in 63 days user earns 120%
                      $percent = 40 * 3;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 84) { // in 84 days user earns 160%
                      $percent = 40 * 4;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 105) { // in 105 days user earns 200%
                      $percent = 40 * 5;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 126) { // in 126 days user earns 240%
                      $percent = 40 * 6;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 147) { // in 147 days user earns 280%
                      $percent = 40 * 7;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 168) { // in 168 days user earns 320%
                      $percent = 25 * 8;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } else {
                      echo '<p class="fw-lighter fs-6">ROI is calculated and returned every 21 days.</p>';
                  }
              } elseif ($planName === "Master trade") {
                  if ($time == 24 * 42) { // in 42 days user earns 85%
                      $percent = 85;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 84) { // in 84 days user earns 170%
                      $percent = 85 * 2;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 126) { // in 126 days user earns 255%
                      $percent = 85 * 3;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 168) { // in 168 days user earns 340%
                      $percent = 85 * 4;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 210) { // in 210 days user earns 425%
                      $percent = 85 * 5;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } elseif ($time == 24 * 252) { // in 252 days user earns 240%
                      $percent = 85 * 6;
                      $sum = ($percent / $percentage) * $average;
                      echo "$" . floor($sum);
                  } else {
                      echo '<p class="fw-lighter fs-6">ROI is calculated and returned every 42 days.</p>';
                  }
              } else {
                  echo '$' . number_format($sum, 2);
              }
              ?>