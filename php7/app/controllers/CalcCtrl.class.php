<?php


namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;


class CalcCtrl {

	private $form;   
	private $result; 

	public function __construct(){
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	public function getParams(){
		$this->form->x = getFromRequest('x');
		$this->form->y = getFromRequest('y');
		$this->form->z = getFromRequest('op');
	}
	
	public function validate() {
		if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->z ))) {
			return false;
		}
		
		if ($this->form->x == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->y == "") {
			getMessages()->addError('Nie podano okresu kredytowania');
		}
		if ($this->form->z == "") {
			getMessages()->addError('Nie podano wartości oprocentowania kredytu');
		}
		
		if (! getMessages()->isError()) {
			
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Podana wartość kredytu nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				getMessages()->addError('Podana wartość okresu kredytowania nie jest liczbą całkowitą');
			}
			if (! is_numeric ( $this->form->z )) {
				getMessages()->addError('Podana wartość oprocentowania kredytu nie jest liczbą całkowitą');
			}
		}
		
		return ! getMessages()->isError();
	}

		public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			$this->form->z = intval($this->form->z);
			getMessages()->addInfo('Parametry poprawne.');

			$this->loan->loan = $this->form->x * ($this->form->z/100);
			$this->pay->pay = $this->form->x + $this->loan->loan;
            $this->result->result = $this->pay->pay / ($this->form->y * 12);

			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	

	public function generateView(){
		global $user;

		getSmarty()->assign('user',$user);
				
		getSmarty()->assign('page_title','Super kalkulator');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}
