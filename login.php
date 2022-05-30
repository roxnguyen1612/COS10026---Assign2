<!-- for testing purpose only
will delete after finishing all -->

<?php
session_start();
?>

<?php include_once("config.php"); ?>

<?php
//Number of login attempts
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
    <?php include_once("./header.inc"); ?>
    <title>Login Page</title>
</head>

<body class="quiz_background">
    <?php include_once("./quiznav.inc"); ?>
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-8">
                    <!-- Uses card class to display login page as a card -->
                    <div class="card rounded text-center p-5">
                        <form class="card-body" method="post" action="#">
                            <?php echo " <input type='hidden' name='hidden' value='$atmpt'>"; ?>
                            <h1 class="mb-5">
                                Login
                            </h1>

                            <div class="form-floating mb-2">
                                <!-- Will be disabled if attempts are greater than 3 -->
                                <input type="text" class="form-control" name="username" id="username" <?php if ($atmpt == 3) { ?> disabled="disabled" <?php } ?> placeholder="Username">
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
                            <button class="btn btn-primary btn-lg btn-block shadow-sm" <?php if ($atmpt == 3) { ?> disabled="disabled" <?php } ?> type="submit" name="login" id="login">Login</button>
                        </form>
                        <hr>
                        <!-- Takes you to signup.php where you can create an account -->
                        <p>Are you a new admin? Sign up <a href="signup.php">here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("./footer.inc"); ?>
</body>

</html>