<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="contact.php" method = "POST">
        <label for="username">USERID:</label>
        <input type="text" name="username" id="username">
        <label for="password">PASSWORD:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="submit">
    </form>

    <button onclick = register()>REGISTER</button>
</body>

<script>
    function register(){
        window.location.href = "register.php";
    }

</script>
</html>