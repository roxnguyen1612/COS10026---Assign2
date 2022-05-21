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
            <form action="" method="get" class="card-body text-center p-5 h-100">

              <h1 class="mb-5">
                Sign Up
              </h1>

              <div class="form-floating mb-2">
                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                <label for="username">Username</label>
              </div>

              <div class="form-floating mb-4">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                <label for="password">Password</label>
              </div>
              <button class="btn btn-primary btn-lg btn-block shadow-sm" type="submit">Sign Up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include_once("inc/footer.inc"); ?>
</body>

</html>