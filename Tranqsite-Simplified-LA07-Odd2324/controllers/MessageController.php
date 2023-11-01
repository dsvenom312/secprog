<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['send'])) {
            $title = $_POST['title'];
            $recipient = $_POST['recipient'];
            $message = $_POST['message'];
            $sender_id = $_SESSION['user_id'];

            // $user_attachment = $_FILES['user_attachment'];

                // Your database connection settings
        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "tranqsite";

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }

        // Insert the message into the communications table
        // $sender_id = 1; // You'll need to set the appropriate sender ID
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