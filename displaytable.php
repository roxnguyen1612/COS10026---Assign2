<!-- https://codingstatus.com/display-data-in-html-table-using-php-mysql/ -->
<?php
include_once("config.php");
$db = $conn;
$tableName="attempts";
$columns=[];
switch ($_REQUEST['data']) {
    case 'listall':
        $columns=['atmpt_id', 'date_time', 'studentID','fname','lname','attempt','score','dob'];
        break;
        default:
        break;
    }
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns){
    if(empty($db)){
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg="Columns Name must be defined in an indexed array";
    } elseif (empty($tableName)){
        $msg = "Table Name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " .$columnName." FROM $tableName"." ORDER BY atmpt_id DESC";
        $result = $db->query($query); 

        if($result){
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($db);
        }
    }
    return $msg;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css" />
    <title>Table Display</title>
</head>
<body>
<header class="quiz_background">
    <?php include_once("inc/quiznav.inc"); ?>
  </header>
    <section class="container w-100">
        <div class="row mt-5">
            <div class="col-auto">
                <div class="table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>attempt_id</th>
                                <th>date_time</th>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Attempt Number</th>
                                <th>Score</th>
                                <th>Date of Birth</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(is_array($fetchData)){
                                    foreach($fetchData as $data){                                    
                                        ?>
                                        <tr>
                                            <td><?php echo isset($data['atmpt_id']) ? $data['atmpt_id'] :''; ?></td>
                                            <td><?php echo isset($data['date_time']) ? $data['date_time'] : ''; ?></td>
                                            <td><?php echo isset($data['studentID']) ? $data['studentID'] : ''; ?></td>
                                            <td><?php echo isset($data['fname']) ? $data['fname'] : ''; ?></td>
                                            <td><?php echo isset($data['lname']) ? $data['lname'] : ''; ?></td>
                                            <td><?php echo isset($data['attempt']) ? $data['attempt'] : ''; ?></td>
                                            <td><?php echo isset($data['score']) ? $data['score'] : ''; ?></td>
                                            <td><?php echo isset($data['dob']) ? $data['dob'] : ''; ?></td>
                                        </tr>
                                        <?php
                                         }}else{?>
                                         <tr>
                                             <td colspan="8">
                                                 <?php echo $fetchData; ?>
                                             </td>
                                         </tr>
                                         <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="m1">

        </div>
        <div class="row g-3 align-items-center mt-2 mb-2">
        <div class="d-grid gap-2 col-4 mx-auto">
          <a href="manage.php" class="btn btn-primary btn-lg ">Back</a>
        </div>
      </div>
    </section>                          
    <footer>
        <?php include_once("inc/footer.inc"); ?>
    </footer>
</body>
</html>