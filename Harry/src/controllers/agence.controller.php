<?php

class AgenceController{

  private $IDAgence;
  private $titreAgence;
  private $adresseAgence;
  private $villeAgence;
  private $descriptionAgence;
  private $cpAgence;
  private $photoAgence;
  private $agenceModel;

  public function __construct($TA,$AA,$VA,$CPA,$DA,$PA)
  {
    $this->setTitreAgence($TA);
    $this->setAdresseAgence($AA);
    $this->setVilleAgence($VA);
    $this->setCpAgence($CPA);
    $this->setDescriptionAgence($DA);
    $this->setPhotoAgence($PA);

  }

  public function getIDAgence(){
    return $this->IDAgence;
  }

  public function getTitreAgence(){
    return $this->titreAgence;
  }

  public function setTitreAgence($TA){
    return $this->titreAgence = $TA;
  }

  public function getAdresseAgence(){
    return $this->adresseAgence;
  }

  public function setAdresseAgence($AA){
    return $this->adresseAgence = $AA;
  }

  public function getVilleAgence()
  {
    return $this->villeAgence;
  }

  public function setVilleAgence($VA)
  {
    return $this->villeAgence = $VA;
  }

  public function getDescriptionAgence()
  {
    return $this->descriptionAgence;
  }

  public function setDescriptionAgence($DA)
  {
    return $this->descriptionAgence = $DA;
  }

  public function getCpAgence()
  {
    return $this->cpAgence;
  }
  
    public function setCpAgence($CPA)
    {
      return $this->cpAgence = $CPA;
    }

  public function getPhotoAgence()
  {
    return $this->photoAgence;
  }
  
    public function setPhotoAgence($PA)
    {
      return $this->photoAgence = $PA;

    }

    public function getAgenceModel()
    {
      return $this->agenceModel;
    }

    public function inscription(){
      $agenceModel = new AgenceModel;
      $agenceModel->insert($this->titreAgence,$this->adresseAgence,$this->villeAgence,$this->cpAgence,$this->descriptionAgence,$this->photoAgence);
    }



}


?>