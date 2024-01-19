<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WELCOME</h1>

    <div id="messages">
        <!-- load messages -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['user1']) && isset($_GET['user2'])) {
            $conn = mysqli_connect("localhost", "root", "anurag", "anurag");
            $user1 = $_GET['user1'];
            $user2 = $_GET['user2'];
            if (!$conn) {
                echo "connection not successful";
            } else {
                $query = "select * from messages where (user1 = '$user1' and user2 = '$user2') or (user1 = '$user2' and user2 = '$user1') order by dateofmessage";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>".$row['user1']." : ".$row['message']."</p>";
                }
            }
        }
        ?>
    </div>

    <script>
        setTimeout(function(){
            window.location.href = "message.php?user1=<?php echo $user1; ?>&user2=<?php echo $user2; ?>";
        }, 5000); // Refresh the page after 1 second with the same user data
    </script>
</body>
</html>