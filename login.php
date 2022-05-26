<?php
session_start();
if (!isset($_SESSION["test_atmpt"])) {
    $_SESSION["test_atmpt"] = 1;
};
?>
<?php include_once("config.php"); ?>

<?php
$atmpt = 0;

// check if form is submitted
if (isset($_POST["login"])) {
    // get value of input named atmpt in html
    $atmpt = $_POST["hidden"];
    if ($atmpt < 3) {
        $user = $_POST["username"];
        $pwd = $_POST["password"];
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user' AND pwd = '$pwd'");
        if ($result = mysqli_fetch_assoc($query)) {
            echo $result;
            $_SESSION["user"] = $result["username"];
            $_SESSION["pwd"] = $result["pwd"];
            header("location: manage.php");
        } else {
            $atmpt++;
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
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Login Page</title>
</head>

<body class="quiz_background">
    <?php include_once("inc/quiznav.inc"); ?>
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-8">
                    <div class="card rounded text-center p-5">
                        <form class="card-body" method="post" action="#">
                            <?php echo " <input type='hidden' name='hidden' value='$atmpt'>"; ?>
                            <h1 class="mb-5">
                                Login
                            </h1>

                            <div class="form-floating mb-2">

                                <input type="text" name="username" id="username" <?php if ($atmpt == 3) { ?> disabled="disabled" <?php } ?> placeholder="Username" class="form-control">
                                <label for="username">Username</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="password" id="password" <?php if ($atmpt == 3) { ?> disabled="disabled" <?php } ?> placeholder="Password" class="form-control">
                                <label for="password">Password</label>
                            </div>
                            <div><?php
                                    $a = 3 - $atmpt;
                                    echo "<p>Number of attempts left is $a.</p> "; ?>
                            </div>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block shadow-sm" <?php if ($atmpt == 3) { ?> disabled="disabled" <?php } ?> type="submit" name="login" id="login">Login</button>
                    </form>
                    <hr>
                    <p>Are you a new admin? Sign up <a href="signup.php">here</a></p>
                </div>
            </div>
        </div>
        </div>
    </section>

    <?php include_once("inc/footer.inc"); ?>
</body>

</html>