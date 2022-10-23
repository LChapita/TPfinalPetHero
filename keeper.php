<?php
namespace models
Class keeper{
	private $name
	private $lastname;
	private $photo;
	private $DNI;
	private $tuition;
	private $sex;
	private $age;
	public funtion__constuct($name,$lastname,$photo,$DNI,$tuition,$sex,$age){
	$this->name=$name;
	$this->lastname=$lastname;
	$this->photo=$photo;
	$this->DNI=$DNI;
	$this->tuition=$tuition;
	$this->sex=$sex;
	$this->age=$age;
	}
	public function setName($name){
		$this->name=$name;
	}
	public function setLastname($lastname){
			$this->lastname=$lastname;
	}
	public function setPhoto($photo){
		$this->photo=$photo;
	}
	public function setDNI($DNI){
		$this->DNI=$DNI;
	}
	public function setTuition($tuition){
		$this->tuitoin=$tuition;
	}
	public function setSex($sex){
		$this->sex=$sex;
	}
	public function setAge($age){
		$this->age=$age;
	}

	public function getName(){
		return $this->name;
	}
	public function getLastname(){
		return $this->lastname;
	}
	public function getPhoto(){
		return $this->photo;
	}
	public function getDNI(){
		return $this->DNI;
	}
	public function getTuition(){
		return $this->tuition;
	}
	public function getSex(){
		return $this->sex;
	}
	public function getAge(){
		return $this->age;
	}
}

?> 