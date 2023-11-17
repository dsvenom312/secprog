<?php
    session_start();
    // print_r($_SESSION);
    require ("./controllers/connection2.php");
    if ($_SESSION['is_login'] !== true) {
        header("Location: login.php");
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tranqsite</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/hack.css">
    <link rel="stylesheet" href="assets/dark.css">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</head>

<div class="nav">
    <a class="button btn btn-success btn-ghost newq" href="messages.php">Messages</a>
    <a class="button btn btn-primary btn-ghost newq" href="send.php">Send Message</a>
    <a class=" btn btn-default btn-ghost skip" href="./controllers/AuthController.php?logout">Logout</a>
</div>

<body class="hack dark">
    <div class="grid main-form">
            <?php

            $user_id = $conn->real_escape_string($_SESSION['id']);
            $sql = "SELECT * FROM communications WHERE sender_id = '$user_id'";
            $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div>';
                        echo '<h1>Account</h1>';
                        echo '<div class="card">';
                        echo '<header class="card-header">Sender ID: ' . $row["sender_id"] . '</header>';
                        echo '<header class="card-header">Recipient ID: ' . $row["recipient_id"] . '</header>';
                        echo '<p>titel: ' . $row["title"] . '</p>';
                        echo '<p>Message: ' . $row["message"] . '</p>';
                        echo '<p>Sent At: ' . $row["send_at"] . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No messages found in the database.";
                }

// Close the database connection
$conn->close();
?>
        <br><br>
        <div>
            <h1>Messages</h1>
            <div class="card">
                <header class="card-header">To: Someone</header>
                <header class="card-header">Lorem Ipsum</header>
                <div class="card-content">
                    <div class="inner">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iure vitae dicta rerum natus, vero laudantium veritatis. Laboriosam iste unde quis alias dignissimos aliquam dolorum officia suscipit. Eius, fugit tenetur.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="alert alert-warning">No messages found.</div> -->
</body>

</html>