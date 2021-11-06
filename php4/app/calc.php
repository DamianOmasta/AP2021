<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

function getParams(&$form){
	$form['x'] = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$form['y'] = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$form['z'] = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;	
}

function validate(&$form,&$infos,&$msgs,&$hide_intro){

	if ( ! (isset($form['x']) && isset($form['y']) && isset($form['z']) ))	return false;	
	
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	if ( $form['x'] == "") $msgs [] = 'Nie podano kwoty kredytu';
	if ( $form['y'] == "") $msgs [] = 'Nie podano okresu kredytowania';
	if ( $form['z'] == "") $msgs [] = 'Nie podano wartości oprocentowania kredytu';
	
	if ( count($msgs)==0 ) {
		if (! is_numeric( $form['x'] )) $msgs [] = 'Podana wartość kredytu nie jest liczbą całkowitą';
		if (! is_numeric( $form['y'] )) $msgs [] = 'Podana wartość okresu kredytowania nie jest liczbą całkowitą';
		if (! is_numeric( $form['z'] )) $msgs [] = 'Podana wartość oprocentowania kredytu nie jest liczbą całkowitą';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';

	$form['x'] = floatval($form['x']);
	$form['y'] = floatval($form['y']);
	$form['z'] = floatval($form['z']);

	$loan = $form['x'] * ($form['z']/100);
	$pay = $form['x'] + $loan;
    $result = $pay / ($form['y'] * 12);
}

$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}


$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('hide_intro',$hide_intro);

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

$smarty->display(_ROOT_PATH.'/app/calc.html');
