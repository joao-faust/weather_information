<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../public/css/register.css">
</head>

<body>

    <div class="center">
        <h1>Register</h1>

        <form method="post" action="../controllers/RegisterUser.php" autocomplete="off">
            <div class="txt_field">
                <input type="text" name="name" id="name" minlength="5" maxlength="15" required>
                <span></span>
                <label>Name</label>
            </div>
            <div class="txt_field">
                <input type="email" name="email" id="email" maxlength="25" required>
                <span></span>
                <label>E-mail</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" minlength="8" required>
                <span></span>
                <label>Password</label>
            </div>
            <div>
                <input type="submit" value="Cadastrar">
            </div>
            <?php
                if (isset($_SESSION["error"])) {
                    echo "<div class='error'>$_SESSION[error]</div>";
                }
                    unset($_SESSION["error"]);
                ?>
            <div class="signup_link">
                Already have an account? <a href="login.php">Make login</a>
            </div>
        </form>
    </div>

</body>

</html>
