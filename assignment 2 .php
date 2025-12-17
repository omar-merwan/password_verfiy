<?php
session_start();

$matching = "";

if(isset($_POST['hash'])){
    $password_from = $_POST['password'];
    $hasedpassword = password_hash($password_from,PASSWORD_BCRYPT);
    $_SESSION['hash'] = $hasedpassword;
}

if (isset($_POST['verify'])) {
    if (password_verify($_POST['password'], $_SESSION['hash'])) {
        $matching = "match";
    } else {
        $matching = "not match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2</title>
</head>
<body>
    <h3>Hashed And Verify Password</h3>
    <form method = "post">
        <label>Password:</label>
        <input type="text" name="password">
        <br>
        <br>
        <input type="submit" name="hash" value="تشفير">
        <input type="submit" name="verify" value="تحقق">
    </form>
</body>
</html>
<br>

<?php
echo $_SESSION['hash'];
echo "<br>";
echo "<br>";
echo  $matching;
?>