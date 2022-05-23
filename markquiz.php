<?php
include_once("config.php");

//Store student information
$errMsgs = [];
if (isset($_POST["studentId"])) {
    $studentId = $_POST["studentId"];
} else {
    header("Location: quiz.php");
    die();
};
if (isset($_POST["fname"])) {
    $fname = $_POST["fname"];
};
if (isset($_POST["lname"])) {
    $lname = $_POST["lname"];
};
if (isset($_POST["dob"])) {
    $dob = $_POST["dob"];
};

// Sanitize and validate inputs
sanitizeInput($studentId);
sanitizeInput($fname);
sanitizeInput($lname);
sanitizeInput($dob);

isStudentID($studentId);
isFirstName($fname);
isLastName($lname);
isDOB($dob);

//Sanitizes input to avoid SQL Injections
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Checks if text is text
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
}

// Checks if valid first name
function isFirstName($data)
{
    global $errMsgs;
    if (!empty($data)) {
        if (!preg_match("/^[a-zA-Z -]{1,30}$/", $data)) {
            array_push($errMsgs, "First name must be text.");
        }
    } else {
        array_push($errMsgs, "First name must contain a value.");
    }
}

// Checks if valid last name
function isLastName($data)
{
    global $errMsgs;
    if (!empty($data)) {
        if (!preg_match("/^[a-zA-Z -]{1,30}$/", $data)) {
            array_push($errMsgs, "Last name must be text.");
        }
    } else {
        array_push($errMsgs, "Last name must contain a value.");
    }
}

//Checks if date of birth matches a valid date within a certain range
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
}


//Checks if input is a valid student ID
function isStudentID($data)
{
    global $errMsgs;
    if (!empty($data)) {
        if (!preg_match("/^[0-9]{7,10}$/", $data)) {
            array_push($errMsgs, "Student ID is not a valid ID.");
        }
    } else {
        array_push($errMsgs, "Student ID is empty.");
    }
}

// Checks if input is a valid year
function isYear($data)
{
}

// Marking function
$score = 0;
$i = 0;
$ques = ["question01", "question02", "question03", "question04", "question05", "question06", "question07", "question08"]; // this is the col

while ($i < count($ques)) {
    if ($ques[$i] == "question05") {
        if (!empty($_POST["question05"])) {
            $ans = [];
            foreach ($_POST["question05"] as $value) { // checkbox's name needs to + [] first before using this method
                array_push($ans, $value);
            };
        };
    } elseif (isset($_POST["$ques[$i]"])) {
        $ans = $_POST["$ques[$i]"]; //this is the answer
    };
    $query = "select * from qA2 where ques = \"$ques[$i]\"";
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
        <?php include_once("inc/quiznav.inc");
        ?>
    </header>
    <div class="content">
        <?php
        global $error, $errMsgs;
        if (count($errMsgs) != 0) {
            foreach ($errMsgs as $msg) {
                echo "<p class=\"text-white\"/>$msg</p>";
            }
        }
        ?>
        <div>
            <?php
            if (count($errMsgs) === 0)
                echo "<h1 class=\"h2 text-white\">Your score is</h1>";
            ?>
        </div>
        <div>
            <?php
            if (count($errMsgs) === 0)
                echo "<p class=\"h1 text-white\">$score</p>"
            ?>
        </div>
        <div>
            <?php
            if (count($errMsgs) === 0)
                echo "<p class=\"text-white\">You still have 1 more attempt wanna retry?</p>";
            ?>
        </div>

        <div class="w-25 btn-group">
            <?php
            if (count($errMsgs) === 0) {
                echo '
                    <button type="submit" name="button1" class="btn btn-secondary m-1" value="Button1">Yes</button>
                    <button type="submit" name="button2" class="btn btn-success m-1" value="Button2">No</button>';
            } else {
                echo '<button type="submit" name="button1" class="btn btn-secondary m-1" value="Button1">Go Back</button>';
            }
            ?>
        </div>
    </div>
    <?php include_once("inc/footer.inc"); ?>
</body>

</html>