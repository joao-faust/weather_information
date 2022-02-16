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
    <link rel="stylesheet" href="../../public/css/history.css">
    <title>Document</title>
</head>

<body class="nice">

    <?php 
    use MyApp\controllers\History;

    $History = new History();
    $searchs = $History->getHistory();

    echo "<div class='center'>";
    echo "<h1>Welcome $_SESSION[userName] this are your searchs</h1>";
	echo "<div class='container'>";
    echo "<div class='inform'> Click on a city to see more details.</div>";
    foreach($searchs as $content)
    {
        echo "<div><a class='pass' href='solohistory.php?id=$content[id]'> $content[cityName] was $content[temperature] ºC in $content[actualDay] at $content[actualHour].</a></div>";
    }
    echo "</div>";
    echo "<div><a id='clearHistory' href='../controllers/ClearHistory.php'>Clear history</a></div>";
    echo "<div class='backbtt'><a href='principal.php'>Make a new search</a></div>";
    
    require("partials/logout.php");
    echo "</div>";
    ?>

</body>

</html>