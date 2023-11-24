<?php
    session_start();
    require "./connection.php";


    function checkvalueLength($string, $max_length){

        if(empty($string) || $string == "" || $string == NULL || strlen($string) > $max_length){

            return false;
        }
        return true;
    }


    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['send'])) {
            $title = $_POST['title'];
            $recipient = $_POST['recipient'];
            $message = $_POST['message'];
            $sender_id = $_SESSION['id'];


            //TO DO: validate input and sanitize $title input
            // title must not be empty
            // title length < 30 char
            // title should be robust against xss and html injection

            //TO DO: validate and sanitize $message input
            // message must not empty
            // message should be robust
            // message length < 200
            // message must be atleast 5 words
            // message must not contain trailing space

            //TO DO: validate and sanitize recipient
            // recipient must be between 1 to 4
            // recipient must be a digit
            

            //TO DO: validate and sanitize user attachment
            // file size < 25mb
            // file extension must be either: .png, .jpeg, .gif, .jpg, .pdf, .txt, .docx, .zip, .xlsx, .rar, .7z, .mp3, .mp4, .mkv, .mov
            // fize size minimum 1b
            // file must be renamed
            // file name must not have contain path element




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