<?php
session_start();
include_once("config.php");

$errMsgs = [];

//sanitize text
function sanitize($text) {
    $text = trim($_POST["text"],'>@<!.:'); // trim($var, specchar)
	$new_t = str_replace(' ', '', $text);
    return $text;
};

//Store student information
if (isset($_POST["studentId"])) {
    $studentId = sanitize($_POST["studentId"]);
} else {
    header("location: quiz.php");
    die();
};
if (isset($_POST["fname"])) {
    $fname = sanitize($_POST["fname"]);
};
if (isset($_POST["lname"])) {
    $lname = sanitize($_POST["lname"]);
};
if (isset($_POST["dob"])) {
    $dob = sanitize($_POST["dob"]);
};

//Sanitizes 
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = str_replace(' ', '', $data);
    return $data;
};

// Validation functions
function isText($data)
{
    global $errMsgs;
    if (!empty($data)) {
        if (!preg_match("/^[a-zA-Z]{0,}$/", $data)) {
            array_push($errMsgs, "Text data must be text.");
        }
    } else {
        array_push($errMsgs, "Text inputs must contain a value.");
    }
};

//Checks if $data matches a date of birth in dd/mm/yyyy format.
function isDOB($data)
{
    global $errMsgs;
    if (!empty($data)) {
        if (!preg_match("/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/", $data)) {
            array_push($errMsgs, "Date of birth is not a valid date.");
        }
    } else {
        array_push($errMsgs, "Date of birth is empty.");
    }
};

//Checks if $data is a student ID.
function isINT($data)
{
    global $errMsgs;
    if (!empty($data)) {
        if (!preg_match("/^[0-9]{7,10}$/", $data)) {
            array_push($errMsgs, "Student ID is not a valid ID.");
        }
    } else {
        array_push($errMsgs, "Student ID is empty.");
    }
};

//Checks if $data matches 4 numbers.
function isYear($data)
{
    global $errMsgs;
    if (!empty($data)) {
        if (!preg_match("/^\d{4}$/", $data)) {
            array_push($errMsgs, "Question one is not a valid year.");
        } else {
            array_push($errMsgs, "Question one is empty.");
        }
    }
}

//Checks if $data is empty.s
function isEmpty($data, $text)
{
    global $errMsgs;
    if (empty($data)) {
        array_push($errMsgs, "$text is empty.");
    }
}

//Checks if there are any errors, and then prints them.
function printErrors($errMsgs)
{
    global $test_atmpt;
    if (count($errMsgs) != 0) {
        foreach ($errMsgs as $msg) {
            echo "<p class=\"text-white\">$msg</p> ";
        }
        //Attempt will be set to the original number of attempts.
        echo "        
        <div class='btn-group w-25'>
        <a class=\"btn btn-primary btn-lg shadow-sm\" href=\"quiz.php\">Go Back</a>
        </div>";
        $test_atmpt -= 1;
        return true;
    }
    return false;
}

isINT($studentId);
isText($fname);
isText($lname);
isDOB($dob);


// Marking function
$score = 0;
$i = 0;
$ques = ["question01", "question02", "question03", "question04", "question05", "question06", "question07", "question08"]; // this is the col

foreach ($ques as $q) {
    isEmpty($_POST[$q], $q);
}

if (count($errMsgs) === 0) {
    while ($i < count($ques)) {
        $ans = [];
        if ($ques[$i] == "question05") {
            if (!empty($_POST["question05"])) {
                foreach ($_POST["question05"] as $value) { // checkbox's name needs to + [] first before using this method
                    array_push($ans, $value);
                };
            };
        } elseif (isset($_POST["$ques[$i]"])) {
            $ans = $_POST["$ques[$i]"]; //this is the answer
        };
        $query = "SELECT * FROM qA2 WHERE ques = \"$ques[$i]\"";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p> class=\"wrong\"> Some thing is wrong with ", $query, "</p>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $db_array = [];
                if ($row["ques"] == "question05") {   // remember, this outputs each line
                    array_push($db_array, $row["ans"]);
                    $compare = array_intersect($db_array, $ans);
                    if (count($compare) == 1) {
                        $score += 0.5;
                    };
                } else {
                    if ($row["ans"] == $ans) {
                        $score += 1;
                    };
                };
            };
            $i += 1;
        };
    };
    $_SESSION["test_atmpt"] += 1;
    $test_atmpt = $_SESSION["test_atmpt"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/markquiz.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Mark Quiz</title>
</head>

<body class="quiz_background">
    <header>
        <?php include_once("inc/quiznav.inc"); ?>
    </header>
    <div class="content">
        <div>
            <h1 class="h2 text-white">Your score is</h1>
        </div>
        <div>
            <?php
            echo "<p class=\"h1 text-white\">$score</p>"
            ?>
        </div>
        <?php
        if (!printErrors($errMsgs)) {
            if ($test_atmpt < 2) {
                echo "
        <div>
            <p class=\"text-white\">You still have 1 more attempt. Would you like to retry?</p>
        </div>

        <div class='btn-group w-25'>
                <a class=\"btn btn-primary btn-lg shadow-sm\" href=\"quiz.php\">Yes</a>
                <a class=\"btn btn-secondary btn-lg shadow-sm\" href=\"index.php\">No</a>
        </div>";
            } else {
                echo "
        <div>
            <p class=\"text-white\">You are out of attempts.</p>
        </div>
        <div class='btn-group w-25'>
                <a class=\"btn btn-primary btn-lg shadow-sm\" href=\"index.php\">Go Back</a>
        </div>";
            };
            $insert_atmpt = mysqli_query($conn, "INSERT INTO `attempts` VALUES (null, now(), $studentId, '$fname', '$lname', $test_atmpt, $score, '$dob');");
        } ?>
    </div>
    </div>
    <?php include_once("inc/footer.inc"); ?>
</body>

</html>