<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Supervisor Page</title>
</head>


<body>
  <section id="eheader">
    <?php include_once("inc/menu.inc"); ?>
  </section>

  <section id="big-text">
    <div class="big-text tcontainer">
      <h1>Supervisor <span></span></h1>
      <h2>Management page <span></span></h2>
    </div>
  </section>

  <section class="p-5">
    <div class="border m-1 rounded border-dark pb-5">
      <h1 class="p-5">Manager Page</h1>
      <div class="forms">
        <form action="" class="container">
          <fieldset class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <div class="col-auto form-floating">
              <input type="text" name="studentid" id="studentid" class="form-control" placeholder="Student ID">
              <label for="studentid">Student ID</label>
            </div>
            <div class="col-auto form-floating">
              <input type="text" name="studentname" id="studentname" class="form-control" placeholder="Name">
              <label for="studentname">Name</label>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary">List attempts</button>
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
              <button type="submit" class="btn btn-danger">Delete all attempts</button>
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
              <button type="submit" class="btn btn-warning">Change Attempt Score</button>
            </div>
          </fieldset>
        </form>
        <div class="container">
          <div class="row g-3 align-items-center border-dark border m-2 rounded-3 p-5">
            <div class="col-auto">
              <button type="submit" class="btn btn-primary">List all attempts</button>
              <button type="submit" class="btn btn-success">Students who got 100%</button>
              <button type="submit" class="btn btn-dark">Students who got less than 50%</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <?php include_once("inc/footer.inc"); ?>
  </footer>
</body>

</html>