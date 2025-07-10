<?php
// Header carousel
function carousel() {
    $carouselDisplay = "
    <div class=\"carousel-indicators\">
      <button type=\"button\" data-bs-target=\"#myCarousel\" data-bs-slide-to=\"0\"  class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>
      <button type=\"button\" data-bs-target=\"#myCarousel\" data-bs-slide-to=\"1\" aria-current=\"true\" aria-label=\"Slide 2\"></button>
      <button type=\"button\" data-bs-target=\"#myCarousel\" data-bs-slide-to=\"2\" aria-current=\"true\" aria-label=\"Slide 3\"></button>
    </div>
    <div class=\"carousel-inner\">
      <div class=\"carousel-item active\">
        <img src=\"image/9.jpg\">
        <div class=\"container\">
          <div class=\"carousel-caption\">
            <h3 class=\"animate__animated animate__pulse\">creating savings habit among the people</h3>
            <h5 class=\"animate__animated animate__pulse\">It's not about you're right or wrong that's important, but how much money you make when you're right and how much money you lose when you're wrong. 
            </h5> <br><br>
            <div class=\"login_register\">
              <a href=\"app-dashboard/user/register.php\">register now</a>
              <a href=\"app-dashboard/user/login.php\">login</a>
            </div>
          </div>
        </div>
      </div>
      <div class=\"carousel-item\">
        <img src=\"image/22.png\">
        <div class=\"container\">
          <div class=\"carousel-caption\">
            <h3 class=\"animate__animated animate__bounce\">Insuring your life, in the easy way</h3>
            <h5 class=\"animate__animated animate__bounce\">I will tell you how to become rich. Close the doors. Be fearful when others are greedy. Be greedy when others are fearful. 
            </h5> <br><br>
            <div class=\"login_register\">
              <a href=\"app-dashboard/user/register.php\">register now</a>
              <a href=\"app-dashboard/user/login.php\">login</a>
            </div>
          </div>
        </div>
      </div>
      <div class=\"carousel-item\">
        <img src=\"image/23.jpg\">
        <div class=\"container\">
          <div class=\"carousel-caption\">
            <h3 class=\"animate__animated animate__bounce\">Invest for the future</h3>
            <h5 class=\"animate__animated animate__bounce\">Invest in an industry leader, professional, and reliable company. we provide you with the most necessary features that will make your experience better.
            </h5><br><br>
            <div class=\"login_register\">
              <a href=\"app-dashboard/user/register.php\">register now</a>
              <a href=\"app-dashboard/user/login.php\">login</a>
            </div>
          </div>
        </div>
      </div>
    </div>";
    echo $carouselDisplay;
}
// crypto statistics plugin
function crypto() {
  $crypto = "<iframe src=\"https://s.tradingview.com/embed-widget/market-overview/?locale=en#%7B%22colorTheme%22%3A%22light%22%2C%22dateRange%22%3A%2212M%22%2C%22showChart%22%3Atrue%2C%22largeChartUrl%22%3A%22%22%2C%22isTransparent%22%3Atrue%2C%22width%22%3A%22350%22%2C%22height%22%3A%22660%22%2C%22plotLineColorGrowing%22%3A%22rgba(33%2C%20150%2C%20243%2C%201)%22%2C%22plotLineColorFalling%22%3A%22rgba(33%2C%20150%2C%20243%2C%201)%22%2C%22gridLineColor%22%3A%22rgba(240%2C%20243%2C%20250%2C%201)%22%2C%22scaleFontColor%22%3A%22rgba(120%2C%20123%2C%20134%2C%201)%22%2C%22belowLineFillColorGrowing%22%3A%22rgba(33%2C%20150%2C%20243%2C%200.12)%22%2C%22belowLineFillColorFalling%22%3A%22rgba(33%2C%20150%2C%20243%2C%200.12)%22%2C%22symbolActiveColor%22%3A%22rgba(33%2C%20150%2C%20243%2C%200.12)%22%2C%22tabs%22%3A%5B%7B%22title%22%3A%22Indices%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22d%22%3A%22Nasdaq%20100%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ADJI%22%2C%22d%22%3A%22Dow%2030%22%7D%2C%7B%22s%22%3A%22INDEX%3ANKY%22%2C%22d%22%3A%22Nikkei%20225%22%7D%2C%7B%22s%22%3A%22INDEX%3ADEU30%22%2C%22d%22%3A%22DAX%20Index%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3AUKXGBP%22%2C%22d%22%3A%22FTSE%20100%22%7D%5D%2C%22originalTitle%22%3A%22Indices%22%7D%2C%7B%22title%22%3A%22Commodities%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME_MINI%3AES1!%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22CME%3A6E1!%22%2C%22d%22%3A%22Euro%22%7D%2C%7B%22s%22%3A%22COMEX%3AGC1!%22%2C%22d%22%3A%22Gold%22%7D%2C%7B%22s%22%3A%22NYMEX%3ACL1!%22%2C%22d%22%3A%22Crude%20Oil%22%7D%2C%7B%22s%22%3A%22NYMEX%3ANG1!%22%2C%22d%22%3A%22Natural%20Gas%22%7D%2C%7B%22s%22%3A%22CBOT%3AZC1!%22%2C%22d%22%3A%22Corn%22%7D%5D%2C%22originalTitle%22%3A%22Commodities%22%7D%2C%7B%22title%22%3A%22Bonds%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME%3AGE1!%22%2C%22d%22%3A%22Eurodollar%22%7D%2C%7B%22s%22%3A%22CBOT%3AZB1!%22%2C%22d%22%3A%22T-Bond%22%7D%2C%7B%22s%22%3A%22CBOT%3AUB1!%22%2C%22d%22%3A%22Ultra%20T-Bond%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBL1!%22%2C%22d%22%3A%22Euro%20Bund%22%7D%2C%7B%22s%22%3A%22EUREX%3AFBTP1!%22%2C%22d%22%3A%22Euro%20BTP%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBM1!%22%2C%22d%22%3A%22Euro%20BOBL%22%7D%5D%2C%22originalTitle%22%3A%22Bonds%22%7D%2C%7B%22title%22%3A%22Forex%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FX%3AEURUSD%22%7D%2C%7B%22s%22%3A%22FX%3AGBPUSD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDJPY%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCHF%22%7D%2C%7B%22s%22%3A%22FX%3AAUDUSD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCAD%22%7D%5D%2C%22originalTitle%22%3A%22Forex%22%7D%5D%2C%22utm_source%22%3A%22bitgold-investment.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22market-overview%22%2C%22page-uri%22%3A%22bitgold-investment.com%2F%3Fa%3Daccount%22%7D\" style=\"width: 100%; height: 500px\"></iframe>";  
  echo $crypto;
}
// bitcoin balance chart
function btc_chart() {
  $btc_chart = "
    <div class=\"tradingview-widget-container\">
      <div class=\"tradingview-widget-container__widget\"><div>
      <div class=\"tradingview-widget-copyright\">
        <a href=\"https://www.tradingview.com/\" rel=\"noopener nofollow\" target=\"_blank\">
          <span class=\"blue-text\">Track all markets on TradingView</span>
        </a>
      </div>
      <script type=\"text/javascript\" src=\"https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js\" async>
        {
          \"symbols\": [
            [
              \"Microsoft\",
              \"MSFT|1D\"
            ],
            [
              \"COINBASE:BTCUSD|1D\"
            ]
          ],
          \"chartOnly\": false,
          \"width\": \"400\",
          \"height\": \"400\",
          \"locale\": \"en\",
          \"colorTheme\": \"light\",
          \"autosize\": false,
          \"showVolume\": false,
          \"showMA\": false,
          \"hideDateRanges\": false,
          \"hideMarketStatus\": false,
          \"hideSymbolLogo\": false,
          \"scalePosition\": \"right\",
          \"scaleMode\": \"Normal\",
          \"fontFamily\": \"-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif\",
          \"fontSize\": \"10\",
          \"noTimeScale\": false,
          \"valuesTracking\": \"1\",
          \"changeMode\": \"price-and-percent\",
          \"chartType\": \"area\",
          \"maLineColor\": \"#2962FF\",
          \"maLineWidth\": 1,
          \"maLength\": 9,
          \"lineWidth\": 2,
          \"lineType\": 0,
          \"dateRanges\": [
            \"1d|1\",
            \"1m|30\",
            \"3m|60\",
            \"12m|1D\",
            \"60m|1W\",
            \"all|1M\"
          ]
        } 
      </script>
    </div>
  ";
  echo $btc_chart;
}