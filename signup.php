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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/style.css" />
  <title>Sign Up Page</title>
</head>

<body class="quiz_background">
  <?php include_once("inc/quiznav.inc"); ?>
  <section>
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-8">
          <div class="card rounded">
            <form action="" method="post" class="card-body text-center p-5 h-100">

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
                <label for="password" class="form-label">Confirm Password:</label>
                <input type="password" name="pwd2" id="password" placeholder="Re-enter Password" class="form-control">
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