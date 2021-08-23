<?php
    session_start();
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>
<body>

    <form  action="login_db.php" method="POST">
      <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <h3>
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </h3>
        </div>
    <?php endif ?>
        <div class="input-g">
            <label>Username</label>
            <input type="text" name= "username">
        </div>
        <div class="input-g">
            <label>Password</label>
            <input type="password" name ="password">
        </div>
        <div class="input-g">
            <button type="submit" name="login" class="butt">Login</button>
        </div>
        <div class="signin">
            <p>You are register?  <a href="reg.php">register</a></p>
        </div>
    </form>
    
</body>
</html>