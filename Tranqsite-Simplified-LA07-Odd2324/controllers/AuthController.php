<?php
    session_start();

    require "connection.php";


    function dologin($username, $password){

        global $conn;
        // ini adalah cara yg unsafe
        $query = "SELECT * from users WHERE username='$username' and password='$password';";

        $result = $conn->query($query);

        return $result;

    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // var_dump($username);
        // var_dump($password);

        // for ($i = 0; $i < count($usernames); $i++) {
        //     if ($username === $usernames[$i] && $password === $passwords[$i]) {
        //         $is_login = true;
        //         break;
        //     }
        // }

        $loginresult = dologin($username, $password);

        if ($loginresult->num_rows == 1) {
            $data = $loginresult->fetch_assoc();

            $_SESSION["success_message"] = "Welcome, $username";

            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $data["username"];
            $_SESSION['role'] = $data["role"];
            $_SESSION['fullname'] = $data["fullname"];

            header("Location: ../messages.php");

        }
        else {
            $_SESSION["error_message"] = "Login Failed.";

            header("Location: ../login.php?error=1");
        }

    }
