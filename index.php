<?php 
    include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="body.css"></link>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" placeholder="username" name="username"/>
        <input type="text" placeholder="password" name="password"/>
        <input type="submit" value="register" name="register">
    </form>
    <a href="login.php">aller sur la page login</a><br>
</body>
</html>
<?php
    include("database.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (username,password)
            VALUES ('$username','$hash')";
    if (isset($_POST["register"]) && !empty($username) && !empty($password)) {
        try {
            mysqli_query($conn, $sql);
            echo"l'utilisateur $username, avec le mot de passe $password est bien enregistrer";
        }
        catch(mysqli_sql_exception) {
            echo"impossible de s'enregistrer";
        }
    }
    else {
        echo"veuillez entrer un nom et un mot de passe";
    }
    mysqli_close($conn);
?>
