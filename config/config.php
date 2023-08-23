<?php

try {
    define("HOST", "localhost");
    define("DBNAME", "threadview");
    define("USER", "root");
    define("PASS", "");

    $conn= new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if ($conn==true) {
    //     echo "DB connected";
    // } else {
    //     echo "DB not connected";
    // }

} catch (PDOException $Exception) {
    echo $Exception->getMessage();
}

?>