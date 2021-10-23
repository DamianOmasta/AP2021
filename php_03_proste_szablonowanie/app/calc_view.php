<?php require_once dirname(__FILE__) .'/../config.php';?>
<?php
include _ROOT_PATH.'/templates/top.php';
?>

<h2 class="content-head is-center">Kalkulator kredytowy</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">
		<fieldset>

	<label for="x">Jaką kwotę kredytu potrzebujesz?: </label>
	<input id="x" type="text" placeholder="wartość x" name="x" value="<?php out($x); ?>">

	
	<label for="y">Podaj okres kredytowania w latach: </label>
	<input id="y" type="text" placeholder="wartość y" name="y" value="<?php out($y); ?>">

	
	<label for="z">Podaj wartość oprocentowania: </label>
	<input id="z" type="text" placeholder="wartość z" name="z" value="<?php out($z); ?>">
	<button type="submit" class="pure-button">Oblicz</button>
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php

if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
	<h4>Wynik</h4>
	<p class="res">
<?php print($result); ?>
	</p>
<?php } ?>

</div>
</div>

<?php 
include _ROOT_PATH.'/templates/bottom.php';
?>