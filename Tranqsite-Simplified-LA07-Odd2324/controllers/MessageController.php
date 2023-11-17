<?php
    session_start();
    require "./connection.php";


    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['send'])) {
            $title = $_POST['title'];
            $recipient = $_POST['recipient'];
            $message = $_POST['message'];
            $sender_id = $_SESSION['id'];

        $send_at = date('Y-m-d H:i:s'); // Current date and time

        $sql = "INSERT INTO communications (sender_id, recipient_id, title, message, send_at)
                VALUES ('$sender_id', '$recipient', '$title', '$message', '$send_at')";

        if ($conn->query($sql) === TRUE) {
            echo "Message sent and saved to the database successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    
        }
        else if (isset($_POST['delete'])) {

        }
    }



?>