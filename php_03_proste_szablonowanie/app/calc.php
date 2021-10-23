<?php

require_once dirname(__FILE__).'/../config.php';

$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : '';
$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : '';
$z = isset($_REQUEST['z']) ? $_REQUEST['z'] : '';

$hide_intro = false;

if ( isset($_REQUEST['x']) && isset($_REQUEST['y']) && isset($_REQUEST['z']) ) {

	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';


	if ( $x == "") {
	$messages [] = 'Nie podano kwoty kredytu';
	}
	if ( $y == "") {
	$messages [] = 'Nie podano okresu kredytowania';
	}

	if ( $z == "") {
	$messages [] = 'Nie podano wartości oprocentowania kredytu';
	}	

	if ( !isset ( $messages ) ) {
	
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


	if ( !isset ( $messages ) ) {
	
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';

	$x = intval($x);
	$y = intval($y);
	$z = intval($z);

	$loan = $x * ($z/100);
	$pay = $x + $loan;
    $result = $pay / ($y * 12);
			
}}

$page_title = 'Zadanie 3 - proste szablonowanie';
$page_description = 'Szybkie pieniądze bez zbędnych formalności';
$page_header = 'Kalkulator kredytowy';
$page_footer = 'Szybkie pieniądze bez zbędnych formalności';

include 'calc_view.php';