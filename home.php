<?php
    session_start();

    // Ellenőrzi,, hogy a felhasználó be van-e jelentkezve
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Üdv, <?php echo $_SESSION['username']; ?>!</h2>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/pAxUzhkwjNY?si=qCWj7sN-v94-kzsY" title="TheVR Tech" 
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
    </iframe>
    <h2>Feliratkozás hírlevélre</h2>
    <form method="post">
        Email: <input type="email" name="email" required><br>
        <input type="submit" name="subscribe" value="Feliratkozás">
    </form>
</body>
</html>
