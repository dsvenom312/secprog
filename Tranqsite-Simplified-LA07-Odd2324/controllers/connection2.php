<?php
    require "./config/database.php";

    $conn = new mysqli(
        $config["server"],
        $config["username"],
        $config["password"],
        $config["database"]
    );

?>