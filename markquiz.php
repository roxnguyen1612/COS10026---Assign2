<?php
// problem with sql, include later
// post get name but we can compare the value
$score = 0;

if (isset($_POST["question01"])) {
    $question01 = $_POST["question01"];
    if ($question01 == "1991") {
        $score += 1;
    };
};

if (isset($_POST["question02"])) {
    $question02 = $_POST["question02"];
    if ($question02 == "karlheinz") {
        $score += 1;
    };
};

if (isset($_POST["question03"])) {
    $question03 = $_POST["question03"];
    if ($question03 == "MPEG") {
        $score += 1;
    };
};

if (isset($_POST["question04"])) {
    $question04 = $_POST["question04"];
    if ($question04 == "2MB") {
        $score += 1;
    };
};
// check-box seems to not working
if (isset($_POST["question05"])) {
    $question05 = $_POST["question05"];
    if ($question05 == "outside" and $question05 == "softer-sound") {
        $score += 0.5;
        if ($question05 == "softer-sound") {
            $score += 0.5;
        };
    };
};

if (isset($_POST["question06"])) {
    $question06 = $_POST["question06"];
    if ($question06 == "lossy") {
        $score += 1;
    };
};
if (isset($_POST["question07"])) {
    $question07 = $_POST["question07"];
    if ($question07 == "OGG") {
        $score += 1;
    };
};

if (isset($_POST["question08"])) {
    $question08 = $_POST["question08"];
    if ($question08 == "M1L3") {
        $score += 1;
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
        <div>
            <p class="text-white">You still have 1 more attempt wanna retry?</p>
        </div>

        <div class="w-25 btn-group">
            <button type="submit" name="button1" class="btn btn-secondary m-1" value="Button1">Yes</button>
            <button type="submit" name="button2" class="btn btn-success m-1" value="Button2">No</button>
        </div>
    </div>
    <?php include_once("inc/footer.inc"); ?>
</body>

</html>