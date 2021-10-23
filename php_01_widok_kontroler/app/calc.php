<?php

require_once dirname(__FILE__).'/../config.php';

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$z = $_REQUEST ['z'];

if ( ! (isset($x) && isset($y) && isset($z))) {

	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $x == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $y == "") {
	$messages [] = 'Nie podano okresu kredytowania';
}

if ( $z == "") {
	$messages [] = 'Nie podano wartości oprocentowania kredytu';
}

if (empty( $messages )) {
	
	if (! is_numeric( $x )) {
		$messages [] = 'Podana wartość kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Podana wartość okresu kredytowania nie jest liczbą całkowitą';
	}	

	if (! is_numeric( $z )) {
		$messages [] = 'Podana wartość oprocentowania kredytu nie jest liczbą całkowitą';
	}	

}


if (empty ( $messages )) { 
	
	$x = intval($x);
	$y = intval($y);
	$z = intval($z);

	$loan = $x * ($z/100);
	$pay = $x + $loan;
    $result = $pay / ($y * 12);
			
}

include 'calc_view.php';