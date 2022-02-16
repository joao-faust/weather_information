<?php
require("../../autoload.php");
use MyApp\utils\ValidateSession;
new ValidateSession();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeatherForecasts</title>
    <link rel="stylesheet" href="../../public/css/principal.css">
</head>

<body>
    <div class="center">
        <h1>Type the city name</h1>
        <form action="../controllers/CallApi.php" method="POST">
            <div class="txt_field">
                <input type="text" name="city" id="city" required>
                <span></span>
                <label>City name</label>
            </div>
            <?php
            if (isset($_SESSION["error"])) {
                echo "<div class='error'>$_SESSION[error]</div>";
            }
            unset($_SESSION["error"]);
            ?>
            <div>
                <input type="submit" value="Bring me the results">
            </div>
            <div class="button">
                <a href="history.php">Click here to see your search history.</a>
            </div>
        </form>
        <?php require("partials/logout.php")?>
    </div>
</body>