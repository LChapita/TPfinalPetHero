<?php
namespace models
Class Pets{
	private $foto;
	private $id;
	private $name;
	private $vaccinationschedule;
	private $raza;
	private $video;
	public funtion__constuct($foto,$id,$name,$vaccinationschedule,$raza,$video){
	$this->foto=$foto;
	$this->id=$id;
	$this->name=$name;
	$this->vaccinationschedule=$vaccinationschedule;
	$this->raza=$raza;
	$this->video=$video;
	}
	public function setFoto($foto){
		$this->foto=$foto;
	}
	public function setId($id){
			$this->id=$id;
	}
	public function setName($name){
		$this->name=$name;
	}
	public function setVaccinationschedule($vaccinationschedule){
		$this->vaccinationschedule=$vaccinationschedule;
	}public function setRaza($raza){
	$this->raza=$raza;
	}
	public function setVideo($video){
		$this->video=$video;
	}

	public function getFoto(){
		return $this->foto;
	}
	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getVaccinationschedule(){
		return $this->vaccinationschedule;
	}
	public function getRaza(){
		return $this->raza;
	}
	public function getVideo(){
		return $this->video;
	}
}
?> 