<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="register.php" method="post">
        UserID: <input type="text" name="userid" required><br>
        Password: <input type="password" name="password" required><br>
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Phone Number: <input type="text" name="phoneno" required><br>
        <input type="submit" value="Register">
    </form>
</body>
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
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneno = $_POST['phoneno'];
        
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        // Check if the userid is unique
        $sql = "SELECT * FROM user WHERE userid = '$userid'";
        $result = mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($result) == 0) {
            // Insert data into the database
            $insertSql = "INSERT INTO user (userid, password, name, email, phoneno) VALUES ('$userid', '$hash_password', '$name', '$email', '$phoneno')";
            if (mysqli_query($conn,$insertSql) === TRUE) {
                echo "Registration successful! You can now <a href='index.php'>login</a>.";
            } else {
                echo "Error: <br>";
            }
        } else {
            echo "Error: User ID already exists. Please choose a different User ID.";
        }
    }
    
    mysqli_close($conn);
}

?>
</html>