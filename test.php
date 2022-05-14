<?php
include_once("config.php");

$score = 0;
$i = 0;

$ques = ["question01", "question02", "question03", "question04", "question05", "question06", "question07", "question08"]; // this is the col

while ($i < count($ques)) {
    if ($ques[$i] == "question05") {
        if (!empty($_POST['question05'])) {
            $ans = [];
            foreach ($_POST['question05'] as $value) {
                array_push($ans, $value);
            };
            echo "question number: " . $i . "<br>";
            echo "received: " . $ans[0] . " and " . $ans[1] . "<br>";
        };
    } elseif (isset($_POST["$ques[$i]"])) {
        $ans = $_POST["$ques[$i]"]; //this is the answer
        echo "question number: " . $i . "<br>";
        echo "received: " . $ans . "<br>";
    };
    $query = "select * from qA2 where ques = \"$ques[$i]\"";
    echo "query is: " . $query . "<br>";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<p> class=\"wrong\"> Some thing is wrong with ", $query, "</p>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $db_array = [];
            if ($row["ques"] == "question05") {
                array_push($db_array, $row["ans"]);
                $compare = array_intersect($db_array,$ans);
                if (count($compare) == 1){
                    $score += 0.5;
                    echo "Score: " . $score . "<br><br>";
                };
            } else {
                echo $row["ques"] . " " . $row["ans"] . "<br>";
                if ($row["ans"] == $ans) {
                    $score += 1;
                };
            };
        };
        $i += 1;
        echo "Score: " . $score . "<br><br>";
    };
};
?>