<?php

require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';

function getParams(&$x,&$y,&$z){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;	
}

function validate(&$x,&$y,&$z,&$messages){

	if ( ! (isset($x) && isset($y) && isset($z))) {
	return false;
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

 	if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $x )) {
		$messages [] = 'Podana wartość kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Podana wartość okresu kredytowania nie jest liczbą całkowitą';
	}	

	if (! is_numeric( $z )) {
		$messages [] = 'Podana wartość oprocentowania kredytu nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$x,&$y,&$z,&$messages,&$result){
	global $role;

	if (empty ( $messages )) { 
	
	$x = intval($x);
	$y = intval($y);
	$z = intval($z);

	$loan = $x * ($z/100);
	$pay = $x + $loan;
    $result = $pay / ($y * 12);
			
	}

}
$x = null;
$y = null;
$z = null;
$result = null;
$messages = array();

getParams($x,$y,$z);
if ( validate($x,$y,$z,$messages) ) { 
process($x,$y,$z,$messages,$result);
}
include 'calc_view.php';