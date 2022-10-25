<?php
namespace models
Class Keeperhours{
	//private $tuition;
	//private $name;
	private $date;
	private $numbersofpets;
	
	
	//public function setTuition($tuition){
	//	$this->tuitoin=$tuition;
	//}
	//public function setName($name){
	//	$this->name=$name;
	//}
	public function setDate($date(format)){
			$this->date(format)=$date;
	}
	public function setNumbersofpets($numbersofpets){
		$this->numbersofpets=$numbersofpets;
	}
	
	//public function getTuition(){
	//	return $this->tuition;
	//}
	//public function getName(){
	//	return $this->name;
	//}
	public function getDate(){
		return $this->date(format);
	}
	public function getNumbersofpets(){
		return $this->numbersofpets;
	}
	
}

?> 