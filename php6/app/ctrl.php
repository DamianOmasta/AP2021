<?php
require_once dirname (__FILE__).'/../config.php';



$action = $_REQUEST['action'];


switch ($action) {
	default : 
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';

		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :

		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'action1' :
	break;
	case 'action2' :
	break;
}
