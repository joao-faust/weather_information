<?php
require("../../autoload.php");
use MyApp\utils\ValidateSession;
new ValidateSession();

use MyApp\controllers\SoloHistory;
use MyApp\utils\ChangeBackground;
$soloHistory = new SoloHistory();

$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$content = $soloHistory->getSoloHistory($id);
new ChangeBackground($content["temperature"]);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/solohistory.css">
    <title>Document</title>
</head>

<body class="<?= $_SESSION["background_option"] ?>">

	<?php
    echo "<div class='center'>";
    echo "<h1>How was the weather in $content[cityName]</h1>";
    echo "<div class='container'>";
    echo "<div>Temperature was: $content[temperature] ºC at $content[actualDay]</div>";
    echo "<div>Feels Like: $content[feelslikeTemperature] ºC</div>";
    echo "<div>Forecasts: $content[forecasts]</div>";
    echo "<div>Humidity: $content[humidity]%</div>";
    echo "<div>Wind speed: $content[windSpeed] km/h</div>";
    echo "<div class='removebtt'><a href='../controllers/DeleteSearch.php?id=$content[id]'>Delete this history</a></div>";
    echo "</div>";
    echo "<div class='backbtt'><a href='history.php'>Go back</a></div>";
    echo "</div>";
	?>

</body>

</html>