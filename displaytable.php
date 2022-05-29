<!-- https://codingstatus.com/display-data-in-html-table-using-php-mysql/ -->
<!-- https://stackoverflow.com/a/9317928 -->
<?php
include_once("config.php");
$tableName = "attempts";
$columns = ['date_time', 'studentID', 'fname', 'lname', 'attempt', 'score', 'dob'];

//Checks which button is pressed on the previous page and gets the relevant information from the database.
switch ($_REQUEST['data']) {
    case 'listall':
        $fetchData = fetch_data($conn, $tableName, $columns);
        break;
    case 'liststudent':
        $fetchData = fetch_student($conn, $tableName, $columns);
        break;
    case 'list100':
        $fetchData = fetch_onehundred($conn, $tableName, $columns);
        break;
    case 'list50':
        $fetchData = fetch_fifty($conn, $tableName, $columns);
        break;
    default:
        break;
}

//Fetches all row/columns from the database from $tableName.
function fetch_data($db, $tableName, $columns)
{
    $columnName = implode(", ", $columns);
    $query = "SELECT " . $columnName . " FROM $tableName";
    $result = $db->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $data = $resultArray;
        } else {
            $data = "No Data Found";
        }
    } else {
        $data = mysqli_error($db);
    }
    return $data;
}

//fetches rows where where student ID, first name or last name match.
function fetch_student($db, $tableName, $columns)
{
    $fields = array('studentID', 'fname', 'lname');
    $conditions = array();

    $columnName = implode(", ", $columns);
    $query = "SELECT " . $columnName . " FROM $tableName ";

    foreach ($fields as $field) {
        if (isset($_POST[$field]) && $_POST[$field] != '') {
            $conditions[] = "`$field` LIKE '%" . $db->real_escape_string($_POST[$field]) . "%'";
        }
    }

    if (count($conditions) > 0) {
        $query .= "WHERE " . implode(" AND ", $conditions);
    }

    $result = $db->query($query);
    if ($result) {
        if ($result->num_rows > 0) {
            $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $data = $resultArray;
        } else {
            $data = "No Data Found";
        }
    } else {
        $data = mysqli_error($db);
    }

    return $data;
}

//Returns the attempts where a student got 100% on their first attempt.
function fetch_onehundred($db, $tableName, $columns)
{
    $columnName = implode(", ", $columns);
    $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE score = 8 AND attempt = 1";
    $result = $db->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $data = $resultArray;
        } else {
            $data = "No Data Found";
        }
    } else {
        $data = mysqli_error($db);
    }
    return $data;
}

//Returns the attempts where a student got less than 50% on their second attempt
function fetch_fifty($db, $tableName, $columns)
{
    $columnName = implode(", ", $columns);
    $query = "SELECT " . $columnName . " FROM $tableName" . " WHERE score < 5 AND attempt = 2";
    $result = $db->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $data = $resultArray;
        } else {
            $data = "No Data Found";
        }
    } else {
        $data = mysqli_error($db);
    }
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("inc/header.inc"); ?>
    <title>Table Display</title>
</head>

<body>
    <header class="quiz_background">
        <?php include_once("inc/quiznav.inc"); ?>
    </header>
    <section class="container w-100">
        <h1 class="pt-5">Attempts Table</h1>
        <div class="row mt-5">
            <div class="col-auto">
                <!-- Table-responsive allows for horizontal scrolling -->
                <div class="table-responsive">
                    <!-- table-hover allows for highlighting row on hover -->
                    <table class="table table-hover">
                        <!-- table-success makes the head green -->
                        <thead class="table-success">
                            <tr>
                                <th>Time</th>
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
                            //Displays the returned information in a html table
                            if (is_array($fetchData)) {
                                foreach ($fetchData as $data) {
                            ?>
                                    <tr>
                                        <td><?php echo isset($data['date_time']) ? $data['date_time'] : ''; ?></td>
                                        <td><?php echo isset($data['studentID']) ? $data['studentID'] : ''; ?></td>
                                        <td><?php echo isset($data['fname']) ? $data['fname'] : ''; ?></td>
                                        <td><?php echo isset($data['lname']) ? $data['lname'] : ''; ?></td>
                                        <td><?php echo isset($data['attempt']) ? $data['attempt'] : ''; ?></td>
                                        <td><?php echo isset($data['score']) ? $data['score'] : ''; ?></td>
                                        <td><?php echo isset($data['dob']) ? $data['dob'] : ''; ?></td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="8">
                                        <?php
                                        //If no data is found, it will echo "No Data found"
                                        echo $fetchData;
                                        ?>
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
    <?php include_once("inc/footer.inc"); ?>
</body>

</html>