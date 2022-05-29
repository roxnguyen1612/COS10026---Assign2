<?php
include_once("config.php");
$msg = "";
if (isset($_POST["submit"])) {
  $user = $_POST["user"];
  $search = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$user'");
  if ($result = mysqli_fetch_assoc($search)) {
    $msg = "Account available!";
  } else {
    if ($_POST["pwd1"] == $_POST["pwd2"]) {
      $pwd = $_POST["pwd1"];
      $query = mysqli_query($conn, "INSERT INTO `admin` VALUES ('$user','$pwd')");
      if ($query) {
        $msg = "Created successfully!";
      };
    } else {
      $msg = "Wrong password!";
    };
  };
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("inc/header.inc"); ?>
  <title>Sign Up Page</title>
</head>

<body class="quiz_background">
  <?php include_once("inc/quiznav.inc"); ?>
  <section>
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-8">
          <div class="card rounded">
            <form action="#" method="post" class="card-body text-center p-5 h-100">

              <h1 class="mb-5">
                Sign Up
              </h1>

              <div class="mb-5 text-start">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="user" id="username" placeholder="Username" class="form-control">
              </div>

              <div class="mb-4 text-start">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="pwd1" id="password" placeholder="Password" class="form-control">
              </div>
              <div class="mb-4 text-start">
                <label for="retrypassword" class="form-label">Confirm Password:</label>
                <input type="password" name="pwd2" id="retrypassword" placeholder="Re-enter Password" class="form-control">
              </div>
              <?php echo "<p>$msg</p>"; ?>
              <button class="btn btn-primary btn-lg btn-block shadow-sm" type="submit" name="submit">Sign Up</button>
              <br><br><p>Already have an account? Login <a href="login.php">here</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include_once("inc/footer.inc"); ?>
</body>

</html>