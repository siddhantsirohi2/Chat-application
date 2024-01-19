<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

$conn = mysqli_connect('localhost','root','anurag','anurag');

if (!$conn) {
    echo "error in connecting";
}
else{
    $userid_error = "";
    $password_error = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
    
        $query = "select * from user where userid = '$username'";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 0) {
            // Insert data into the database
            header("location: index.php");
        }
        else{
            $result = mysqli_fetch_array($result);
            if (password_verify($password,$result['password'])) {
                // Insert data into the database
                echo "user found";
            }
            else{
                header("location: index.php");
            }
        }
    }
    
    mysqli_close($conn);
}

?>
    <h1>WELCOME</h1>
    <h2>SELECT THE USER YOU WANT TO MESSAGE</h2>
    <form action="message.php" method = "GET">
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = $_POST['username'];
        echo "<input type='hidden' name='user1' value='$user'>";
        $conn = mysqli_connect('localhost','root','anurag','anurag');
        if (!$conn) {
            echo "error in connecting";
        }

        else{
            $query = "select userid from user where userid != '$user'";
            $result = mysqli_query($conn,$query);
            echo '<select id="user2" name="user2">';
            while($row = mysqli_fetch_assoc($result)){
                echo '<option value="' . $row['userid'] . '">' . $row['userid'] . '</option>';
            }
            echo '</select>';
        }
        mysqli_close($conn);
    }
    ?>
    
    <input type="submit" value = "submit">
    </form>

    
    <button onclick = "redirectlogin()">BACK</button>
</body>
<script>

function redirectlogin(){
    window.location.href = "index.php";
}
</script>
</html>