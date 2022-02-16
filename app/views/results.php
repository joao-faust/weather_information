<?php
require("../../autoload.php");
use MyApp\utils\ValidateSession;
new ValidateSession();

if (!$_SESSION["city_name"])
{
	header("Location: principal.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Results</title>
	<link rel="stylesheet" href="../../public/css/results.css">
</head>

<body class="<?= $_SESSION["background_option"] ?>">

	<div class="center">
		<h1>How is the weather in <?php echo "$_SESSION[city_name]"; ?></h1>
		<div class="container">
			<div>Temperature: <?php echo "$_SESSION[temperature] ºC"; ?></div>
			<div>Feels Like: <?php echo "$_SESSION[feelslike_temperature] ºC"; ?></div>
			<div>Forecasts: <?php echo "$_SESSION[forecasts]"; ?></div>
			<div>Humidity: <?php echo "$_SESSION[humidity]%"; ?></div>
			<div>Wind speed: <?php echo "$_SESSION[wind_speed] km/h"; ?></div>
			<div>
				<a href='principal.php' class='pass'>Make another search</a>
			</div>
			<div>
				<a href='history.php' class='pass'>See your search history</a>
			</div>
		</div>
		<?php require("partials/logout.php"); ?>
	</div>

	<?php
	unset($_SESSION["city_name"]);
	unset($_SESSION["temperature"]);
	unset($_SESSION["forecasts"]);
	unset($_SESSION["humidity"]);
	unset($_SESSION["wind_speed"]);
	?>

</body>