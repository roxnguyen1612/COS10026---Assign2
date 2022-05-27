<!DOCTYPE html>
<html lang='en'>

<?php include_once("inc/header.inc"); ?>

<body>
  <section id="eheader">
    <?php include_once("inc/menu.inc"); ?>
  </section>

  <section id="big-text">
    <div class="big-text tcontainer">
      <h1>PHP <span></span></h1>
      <h2>ENHANCEMENTS<span></span></h2>
    </div>
  </section>

  <section id="enhancement1">
    <div class="enhancement1 econtainer">
      <div class="enhancement1-top">
        <h1 class="section-title"><span>IMPROVEMENT BRIEF</span></h1>
        <p> Things we enhance on this assignment</p>
      </div>
    </div>

    <div class="enhancement1-bottom">
      <div class="enhancement1-items">
        <div class="icon"><img src="./Images/icon1.png" alt="Logo" /></div>
        <h2>USING PHP SESSION:</h2>
        <ul>
          <li>We use session_start() to store the quiz attempt. Depending on the attempt number, the landing page will have different option.</li>
          <li>We also implement it for performing login and logout through MANAGE page: </li>
          <li>1. Can NOT login into MANAGE if no $_SESSION["user"] and $_SESSION["pwd"]</li>
          <li>2. Can NOT LOGIN if fail 3 times</li>
          <li>3. Destroy section when LOGOUT</li>
        </ul>
      </div>
    </div>

    <div class="enhancement1-items">
      <div class="icon"><img src="./Images/icon1.png" alt="icon1" /></div>
      <h2>USING DATABASE TO PROCESS DATA FASTER</h2>
      <ul>
        <li>1. Store quiz question then loop through to calculate the score.</li>
        <li>2. Store students' attempt.</li>
        <li>3. Store & register admin account for managing purpose.</li>
        <li>4. Show students information based on specific requirements in manage page.</li>
      </ul>
    </div>
  </section>

  <section id="enhancement2">
    <div class="enhancement2 econtainer">
      <div class="enhancement2-top">
        <h1 class="section-title"><span>ENHANCEMENTS DETAILS</span></h1>
        <p>To provide better understanding, we will provide a showcase of code and brief explanation.</p>
      </div>

      <!-- markquiz enh_1 -->
      <div class="all-contents">
        <div class="enhancement2-items">
          <div class="enhancement2-info">
            <h2>session_start()</h2>
            <ul>
              <li>Give student maximum 2 attempts</li>
              <li>Store in $_SESSION["test_atmpt"]</li>
              <li>$_SESSION["test_atmpt"] += 1 everytime HIDDEN input is posted.</li>
            </ul>
          </div>
          <div class="enhancement2-img">
            <img src="./Images/mq-1.png" alt="img" />
          </div>
        </div>
      </div>
      <!-- mquiz showcase -->
      <div>
        <p>When attempt = 1:</p>
        <img src="./Images/mq-2.png" alt="img" />
        <p>When attempt = 2:</p>
        <img src="./Images/mq-3.png" alt="img" />
      </div>

      <!-- login page -->
      <div class="all-contents">
        <div class="enhancement2-items">
          <div class="enhancement2-info">
            <h2>Login session_start()</h2>
            <ul>
              <li>Store username and password information</li>
              <li>$_POST["hidden"] input to calculate fail times</li>
              <li>Check admin before accessing manage page</li>
            </ul>
          </div>
          <div class="enhancement2-img">
            <img src="./Images/lg-1.png" alt="img" />
          </div>
          <div>
            <p>Checking login in manage.php:</p>
            <img src="./Images/lg-2.png" alt="img" />
            <p>$_POST["hidden"] > 3 = disable button</p>
            <img src="./Images/lg-3.png" alt="img" />
            <img src="./Images/lg-4.png" alt="img" />
          </div>
        </div>
      </div>

      <!-- database -->
      <div class="all-contents">
        <div class="enhancement2-items">
          <div class="enhancement2-info">
            <h2>Database</h2>
            <ul>
            <li>Store answers & calculate score</li>
            <li>Record students' attempts</li>
            <li>Output 5 functions in manage page</li>
            </ul>
          </div>
          <div class="enhancement2-img">
            <img src="./Images/img-1.png" alt="img" />
          </div>
        </div>
        <div>
          <p>Calculate score on database answers: </p>
          <img src="./Images/db-1.png" alt="img" />
          <p>Insert student attempts: </p>
          <img src="./Images/db-2.png" alt="img" />
          <p>Functions in manage.php by displaytable.php. For example:  </p>
          <img src="./Images/db-3.png" alt="img" />
        </div>
      </div>
    </div>
  </section>
</body>