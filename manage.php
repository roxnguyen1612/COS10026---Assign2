<?php include_once("config.php"); ?>
<?php  
  session_start();    // start and get data
  $_SESSION["test_atmpt"] = 0; //for markquiz
  // if not login, go back
  if (!isset($_SESSION["user"]) || (!isset($_SESSION["pwd"]))){
      header("location: login.php");
      exit();
  } else {
    $name = $_SESSION["user"];
  };
?>

<?php
if (isset($_POST["logout"])) {
  session_start();            
  session_destroy();
  header ("location: login.php");
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/style.css">
  <title>Supervisor Page</title>
</head>

<body>
  <header class="quiz_background">
    <?php include_once("inc/quiznav.inc"); ?>
  </header>

  <section class="p-5">

    <div class="border m-1 rounded border-dark pb-5">
      <h1 class="ps-5 pe-5 pt-5 pb-2 h1">Manager Page</h1>
      <h2 class="ps-5 pb-5 pe-5 h3">Welcome <?php echo $name; ?> !</h2>
      <div class="forms">
        <form class="container" action="displaytable.php" method="post">
          <fieldset class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <div class="col-auto form-floating">
              <input type="text" name="studentID" id="studentID" class="form-control" placeholder="Student ID">
              <label for="studentID">Student ID</label>
            </div>
            <div class="col-auto form-floating">
              <input type="text" name="fname" id="studentname" class="form-control" placeholder="Name">
              <label for="studentname">Name</label>
            </div>
            <div class="col-auto">
              <button name="listID" value="liststudent" type="submit" class="btn btn-primary">List attempts</button>
            </div>
          </fieldset>
        </form>
        <form action="" class="container">
          <fieldset class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <div class="col-auto form-floating">
              <input type="text" name="studentid" id="studentid" class="form-control" placeholder="Student ID">
              <label for="studentid">Student ID</label>
            </div>
            <div class="col-auto">
              <button type="submit" name="delete" id="delete" class="btn btn-danger">Delete all attempts</button>
            </div>
          </fieldset>
        </form>
        <form action="" class="container">
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
              <button type="submit" name="change" id="change" class="btn btn-warning">Change Attempt Score</button>
            </div>
          </fieldset>
        </form>
        <form class="container" action="displaytable.php" method="get">
          <fieldset class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <div class="col-auto">
              <button name="listAll" id="listAll" type="submit" class="btn btn-primary" value="listall">List all attempts</button>
              <button type="submit" name="list100" id="list100" class="btn btn-success">Students who got 100%</button>
              <button type="submit" name="list50" id="list50" class="btn btn-dark">Students who got less than 50%</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row g-3 align-items-center m-2 rounded-3 p-5">
        <div class="col-auto ">
          <a href='login.php'><button type="submit" name="logout">Log Out</button></a>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <?php include_once("inc/footer.inc"); ?>
  </footer>
</body>

</html>