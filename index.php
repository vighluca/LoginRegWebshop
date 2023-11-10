<?php
    // Adatbázis kapcsolódás
    $servername = "localhost";
    $username = "felhasznalo";
    $password = "jelszo";
    $dbname = "weboldal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Regisztráció feldolgozása
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $conn->query($sql);
    }

    // Bejelentkezés feldolgozása
    if(isset($_POST['login'])){
        $login_username = $_POST['login_username'];
        $login_password = $_POST['login_password'];

        $sql = "SELECT * FROM users WHERE username='$login_username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($login_password, $row['password'])) {
                header('Location: home.php');
            } else {
                echo "Hibás jelszó";
            }
        } else {
            echo "Felhasználó nem található";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weboldal</title>
</head>
<body>
    <h2>Regisztráció</h2>
    <form method="post">
        Felhasználónév: <input type="text" name="username" required><br>
        Jelszó: <input type="password" name="password" required><br>
        <input type="submit" name="register" value="Regisztráció">
    </form>

    <h2>Bejelentkezés</h2>
    <form method="post">
        Felhasználónév: <input type="text" name="login_username" required><br>
        Jelszó: <input type="password" name="login_password" required><br>
        <input type="submit" name="login" value="Bejelentkezés">
    </form>
</body>
</html>
