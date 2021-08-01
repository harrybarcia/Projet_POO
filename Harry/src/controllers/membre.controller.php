<?php

class MembreController{
  private $IDMembre;
  private $PseudoMembre;
  private $PassMembre;
  private $NomMembre;
  private $PrenomMembre;
  private $EmailMembre;
  private $CiviliteMembre;
  private $StatutMembre;


  
  public function __construct($PseudoM,$PassM,$NM,$PrenomM,$EM,$CM,$SM)
  //
  {
    $this->setPseudoMembre($PseudoM);
    $this->setPassMembre($PassM);
    $this->setNMembre($NM);
    $this->setPrenomMembre($PrenomM);
    $this->setEmailMembre($EM);
    $this->setCivMembre($CM);
    $this->setStatutMembre($SM);
  }
  
  
    public function getIDMembre()
    {
      return $this->IDMembre;
      
    }
  public function getPseudoMembre(){
    return $this->PseudoMembre;
  }
  
  public function setPseudoMembre($PseudoM){
    return $this->PseudoMembre = $PseudoM;
  }
  
  public function getPassMembre(){
    return $this->PassMembre;
  }
  
  public function setPassMembre($PassM){
    return $this->PassMembre = $PassM;
  }
  
  public function getNMembre()
  {
    return $this->NomMembre;
  }
  
  public function setNMembre($NM)
  {
    return $this->NomMembre = $NM;
  }
  
  public function getPrenomMembre()  {
    return $this->PrenomMembre;
  }
  
  public function setPrenomMembre($PrenomM)
  {
    return $this->PrenomMembre = $PrenomM;
  }
  
  public function getEmailMembre()
  {
    return $this->EmailMembre;
  }
  
  public function setEmailMembre($EM)
  {
  return $this->EmailMembre = $EM;
  }
  
  public function getCivMembre()
  {
    return $this->CiviliteMembre;
  }
  
  public function setCivMembre($CM)
  {
    return $this->CiviliteMembre = $CM;

  }
  
  public function getStatutMembre() {
    return $this->StatutMembre;
  }
  
  public function setStatutMembre($SM) {
    return $this->StatutMembre = $SM;
  }
   
  public function inscription(){
    $MembreModel = new MembreModel;
    $MembreModel->insert($this->PseudoMembre,$this->PassMembre,$this->NomMembre,$this->PrenomMembre,$this->EmailMembre,$this->CiviliteMembre,$this->StatutMembre);
    //
  }

    
    
  }


?>