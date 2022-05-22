<!-- input disable to check 3-time false submit -->

<?php session_start(); ?>
<?php include_once("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css" />
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
                            </div>
                            <button class="btn btn-primary btn-lg btn-block shadow-sm" type="submit" name="login">Login</button>
                            <!-- $_POST works with only input submit or even button? -->
                        </form>
                        <hr>

                        <!-- Check admin input w mysql -->
                        <?php
                        $msgErr = "";

                        if (isset($_POST["login"])) {         //execute when click submit btn
                            $user = mysqli_real_escape_string($conn, $_POST["username"]);
                            $pwd = mysqli_real_escape_string($conn, $_POST["password"]);

                            $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$user' AND pwd = '$pwd'");
                            if ($result = mysqli_fetch_assoc($query)) {
                                $_SESSION["user"] = $row["username"];
                                $_SESSION["pwd"] = $row["pwd"];
                                header("manager.php");
                            } else {
                                $msgErr = "Can't login, something wrong with your information";
                            };
                        };
                        ?>


                        <?php echo "<p>$msgErr</p>" ?>
                        <p>Are you a new admin? Signup <a href="signup.php">Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <?php include_once("inc/footer.inc"); ?>
</body>

</html>