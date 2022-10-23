<?php
namespace Models;
use Models\Owner as Owner;

class Pet{

	private $foto;
	private $id;
	private $name;
	private $vaccinationSchedule;
	private $raza;
	private $video;

	private $dueño;

	public function setFoto($foto){
		$this->foto=$foto;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function setName($name){
		$this->name=$name;
	}
	public function setVaccinationSchedule($vaccinationSchedule){
		$this->vaccinationSchedule= $vaccinationSchedule;
	}
	public function setRaza($raza){
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
	public function getVaccinationSchedule(){
		return $this->vaccinationSchedule;
	}
	public function getRaza(){
		return $this->raza;
	}
	public function getVideo(){
		return $this->video;
	}

	public function getDueño(){
		return $this->dueño;
	}
	public function setDueño(Owner $owner){
		$this->dueño=$owner;
	}

}
?> 