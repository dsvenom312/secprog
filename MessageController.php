<?php

    if($_SERVER['REQUEST_METHOD' === "POST"]){

        // ini kalau ngesend
        if(isset($POST['send'])){

            $title = $POST['title'];
            $recipient = $POST['recipient'];
            $message = $POST['message'];
            $user_attachment = $_FILES['user_attachment'];

            if($user_attachment['size'] > 20 * 1000 * 1000){
                echo "FILE IS TOO BIG";

                $_SESSION['error_message'] = "FILE IS TOO BIG";

                $target_directory = "../storage/";
                // <random_code>_<filename>.
                // example
                // 123duq8.ktp.jpg
                $new_file_name = uniqid()."_".$user_attachment['name'];


                if(move_uploaded_file($user_attachment['tmp_name'], $target_directory.$new_file_name)){
                    echo "upload success";
                }
                else{
                    echo "upload failed";
                }
            }
        }
        else if(isset($POST['delete'])){
            // ini kalau delete
        }
    }




?>
