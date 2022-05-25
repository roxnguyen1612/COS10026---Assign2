<?php session_start(); ?>
<?php include_once("config.php"); ?>

<?php
if ($atmpt < 3) {
  $user = mysqli_real_escape_string($conn, $_POST["username"]);
  $pwd = mysqli_real_escape_string($conn, $_POST["password"]);

  $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$user' AND pwd = '$pwd'");
  if ($result = mysqli_fetch_assoc($query)) {
    $_SESSION["user"] = $row["username"];
    $_SESSION["pwd"] = $row["pwd"];
    // header("location: manager.php");
  };
} else {
  $atmpt++;
};
?>
