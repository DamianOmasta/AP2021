<?php
require_once dirname(__FILE__).'/config.php';

//przekierowanie przeglądarki klienta (redirect)
//header("Location: ".$conf->root_path."/app/calc.php");

//przekazanie żądania do następnego dokumentu ("forward")
include $conf->root_path.'/app/calc.php';