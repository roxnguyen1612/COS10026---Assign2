<?php session_start(); ?>
<?php include_once("config.php"); ?>
<script>
    $(document).ready(function() {
        $("#login").click(function() {
            $atmpt = $_POST["hidden"];
            if ($atmpt < 3) { //log in 3 times
                $user = mysqli_real_escape_string($conn, $_POST["username"]);
                $pwd = mysqli_real_escape_string($conn, $_POST["password"]);

                $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$user' AND pwd = '$pwd'");
                if ($result = mysqli_fetch_assoc($query)) {
                    $_SESSION["user"] = $row["username"];
                    $_SESSION["pwd"] = $row["pwd"];
                    header("location: manager.php");
                };
            } else {
                $atmpt++;
            };
        });
    });
</script>
<!-- Check admin input w mysql -->
<?php
$atmpt = 0;
$msgErr = "";

if (isset($_POST["login"])) {         //execute when click submit btn
    $atmpt = $_POST["hidden"];
    if ($atmpt < 3) {            //log in 3 times
        $user = mysqli_real_escape_string($conn, $_POST["username"]);
        $pwd = mysqli_real_escape_string($conn, $_POST["password"]);

        $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$user' AND pwd = '$pwd'");
        if ($result = mysqli_fetch_assoc($query)) {
            $_SESSION["user"] = $row["username"];
            $_SESSION["pwd"] = $row["pwd"];
            header("location: manager.php");
        };
    };
} else {
    $atmpt++;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Login Page</title>
</head>

<body class="quiz_background">
    <?php include_once("inc/quiznav.inc"); ?>
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-8">
                    <div class="card rounded text-center p-5">
                        <form action="" method="get" class="card-body">
                            <?php echo "<input type='hidden' id='hidden' name='hidden' value='$atmpt'>"; ?>
                            <h1 class="mb-5">
                                Log In
                            </h1>

                            <div class="form-floating mb-2">

                                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                                <label for="username">Username</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                <label for="password">Password</label>
                                <?php
                                if ($atmpt > 3) {
                                    echo "<p>Already more than 3 times.</p>";
                                };
                                ?>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block shadow-sm" type="submit" name="login" id="login" <?php if ($atmpt > 3) {
                                                                                                                                    echo " disabled";
                                                                                                                                    $msgErr = "You can't login anymore.";
                                                                                                                                };
                                                                                                                                ?>>Login</button>
                        </form>
                        <hr>

                        <?php echo "<p>$msgErr</p>" ?>
                        <p>Are you a new admin? Signup <a href="signup.php">Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- REALLY THINK THAT WE SHOULD USE AJAX BUTTON -->

    <?php include_once("inc/footer.inc"); ?>
</body>

</html>

<!-- reference:  https://www.youtube.com/watch?v=ejN-oAw9vC0&ab_channel=DaniKrossing -->