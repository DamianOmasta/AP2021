<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_x">Jaką kwotę kredytu potrzebujesz?: </label>
	<input id="id_x" type="text" name="x" value="<?php print($x); ?>" /><br />

	
	<label for="id_y">Podaj okres kredytowania w latach: </label>
	<input id="id_y" type="text" name="y" value="<?php print($y); ?>" /><br />

	
	<label for="id_z">Podaj wartość oprocentowania: </label>
	<input id="id_z" type="text" name="z" value="<?php print($z); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>