<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "123";
    $dbname = "btnotepad";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    $result = mysqli_query($conn, "select * from notes");
?>