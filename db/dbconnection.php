<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "phpcrud";
    $conn = mysqli_connect($server, $user, $password, $db);

    if ($conn) {
        echo "Connection established";
    }else{
        echo "Connection failed";
    }

?>
