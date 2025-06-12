<?php
    session_start();
    echo"Vous êtes bien connecté " . $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="session.php" method="post">
        <input type="submit" value="logout" name="logout">
    </form>
</body>
</html>

<?php
    if(isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
?>