<?php
    $server = "feenix-mariadb.swin.edu.au";
    $user = "s103500095";
    $pwd = "161202";
    $db = "s103500095_db";

    $conn = @mysqli_connect($server, $user, $pwd, $db);

    if (!$conn) {
        die("ERROR: Could not connect. " .mysqli_connect_error());
    };

    $atmpt = 0;
?>