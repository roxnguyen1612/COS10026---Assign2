<?php include_once("config.php"); ?>
<?php
session_start();    // start and get data
$_SESSION["test_atmpt"] = 0; //for markquiz
// if not login values not set, go back
if (!isset($_SESSION["user"]) || (!isset($_SESSION["pwd"]))) {
  header("location: login.php");
  exit();
} else {
  $name = $_SESSION["user"];
};

$msg1 = "";
$msg2 = "";
//Deletes rows equal to student ID
if (isset($_POST["delete"])) {
  $studentID = $_POST["studentid"];
  $result = mysqli_query($conn, "DELETE FROM attempts WHERE studentID = $studentID");
  if ($result) {
    $msg1 = "Delete successfully!";
  } else {
    $msg1 = "Something wrong with the delete query";
  };
};
//Changes scoreNum column based on studentid and attemptNum
if (isset($_POST["change"])) {
  $studentID = $_POST["studentid"];
  $atmpt = $_POST["attemptNum"];
  $new_score = $_POST["scoreNum"];
  $result = mysqli_query($conn, "UPDATE attempts SET score = $new_score WHERE studentID = $studentID AND attempt = $atmpt");
  if ($result) {
    $msg2 = "Updated successfully!";
  } else {
    $msg2 = "Something wrong with the change query";
  };
};

//Ends session and sends user back to login.php
if (isset($_GET["logout"])) {
  session_start();
  session_destroy();
  header("location: login.php");
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("./header.inc"); ?>
  <title>Supervisor Page</title>
</head>

<body class="quiz_background">
  <header class="quiz_background">
    <?php include_once("./quiznav.inc"); ?>
  </header>

  <section class="p-5 m-5 bg-light">
    <div class="border m-1 rounded border-dark pb-5">
      <h1 class="ps-5 pe-5 pt-5 pb-2 h1">Manager Page</h1>
      <h2 class="ps-5 pb-5 pe-5 h3">Welcome <?php echo $name; ?> !</h2>
      <!-- Related input fields are grouped using forms and fieldsets -->
      <div class="forms">
        <form class="container" action="displaytable.php" method="post">
          <fieldset class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <!-- Using form-floating and form-control allows for floating labels using Bootstrap5 -->
            <div class="col form-floating">
              <input type="text" name="studentID" id="studentID" class="form-control" placeholder="Student ID">
              <label for="studentID">Student ID</label>
            </div>
            <div class="col form-floating">
              <input type="text" name="fname" id="studentfname" class="form-control" placeholder="First Name">
              <label for="studentfname">First Name</label>
            </div>
            <div class="col form-floating">
              <input type="text" name="lname" id="studentlname" class="form-control" placeholder="Last Name">
              <label for="studentlname">Last Name</label>
            </div>
            <div class="col">
              <!-- Value is used to know which button was pressed in displaytable.php -->
              <button name="data" value="liststudent" type="submit" class="btn btn-primary col-8">List attempts</button>
            </div>
          </fieldset>
        </form>
        <form action="manage.php" method="post" class="container">
          <fieldset class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <div class="col-auto form-floating">
              <input type="text" name="studentid" id="delstudentid" class="form-control" placeholder="Student ID">
              <label for="delstudentid">Student ID</label>
            </div>

            <div class="col-auto">
              <button type="submit" name="delete" value="delete" class="btn btn-danger">Delete all attempts</button>
            </div>
            <?php echo "<div> $msg1 </div>"; ?>
          </fieldset>

        </form>
        <form action="manage.php" method="post" class="container">
          <fieldset class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <div class="col form-floating">
              <input type="text" name="studentid" id="studentid" class="form-control" placeholder="Student ID">
              <label for="studentid">Student ID</label>
            </div>
            <div class="col form-floating">
              <input type="text" name="attemptNum" id="attemptNum" class="form-control" placeholder="Attempt Number">
              <label for="attemptNum">Attempt Number</label>
            </div>
            <div class="col form-floating">
              <input type="text" name="scoreNum" id="scoreNum" class="form-control" placeholder="New Score">
              <label for="scoreNum">New Score</label>
            </div>

            <div class="col">
              <button type="submit" name="change" value="change" class="btn btn-warning">Change Attempt Score</button>
            </div>
            <?php echo "<div> $msg2 </div>"; ?>
          </fieldset>
        </form>
        <form class="container" action="displaytable.php" method="post">
          <fieldset class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <div class="col-auto">
              <!-- Value is used to know which button was pressed in displaytable.php -->
              <button name="data" id="listAll" type="submit" class="btn btn-primary" value="listall">List all attempts</button>
              <button name="data" type="submit" value="list100" id="list100" class="btn btn-success">Students who got 100%</button>
              <button name="data" type="submit" value="list50" id="list50" class="btn btn-dark">Students who got less than 50%</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row g-3 align-items-center m-2 rounded-3 p-5">

        <div class="col-auto d-grid gap-2 col-4 mx-auto">
          <!-- Pressing the button destroys the session and takes the user back to the login page. -->
          <!-- By only using PHP means we have to reload the page and set logout to true to run the related function-->
          <a href="manage.php?logout=true" class="btn btn-danger btn-lg btn-block shadow-sm">Log Out</a>
        </div>
      </div>
    </div>
  </section>
  <?php include_once("./footer.inc"); ?>
</body>

</html>