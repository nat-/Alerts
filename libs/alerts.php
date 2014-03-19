<?php

class ALERTS{

	public static function init(){

		if(!isset($_SESSION['Messages'])) $_SESSION['Messages'] = array();
		if(!isset($_SESSION['Warnings'])) $_SESSION['Warnings'] = array();
		if(!isset($_SESSION['Errors'])) $_SESSION['Errors'] = array();

	}

	public static function setMessage($message, $key = NUll){
		$_SESSION['Messages'][] = $message;
		return true;
	}

	public static function setWarning($message, $key = NUll){
		$_SESSION['Warnings'][] = $message;
		return true;
	}

	public static function setError($message, $key = NUll){
		$_SESSION['Errors'][] = $message;
		return false;
	}

	public static function errorCount(){
		return count($_SESSION['Errors']);
	}

	public static function messageCount(){
		return count($_SESSION['Messages']);
	}

	public static function warningCount(){
		return count($_SESSION['Warnings']);
	}


	public function getMessages(){
		return $_SESSION['Messages'];
	}

	public function getErrors(){
		return $_SESSION['Errors'];
	}

	public function getWarnings(){
		return $_SESSION['Warnings'];
	}

	public function Destroy(){
		unset($_SESSION['Messages']);
		unset($_SESSION['Warnings']);
		unset($_SESSION['Errors']);
	}
	
}