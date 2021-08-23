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

    <form  action="reg_db.php" method="POST">
        <?php include('errors.php'); ?>
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
            <input type="password" name ="password_1">
        </div>
        <div class="input-g">
            <button type="submit" name="but" class="butt">register</button>
        </div>
        <div class="signin">
            <p>Already a member? <a href="login.php">Sign in</a></p>
        </div>
    </form>
    
</body>
</html>