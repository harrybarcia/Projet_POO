<?php

class CommandeController{


  // private $id_commande;
  private $id_membre;
  private $id_vehicule;
  private $id_agence;
  private $date_d;
  private $date_f;
  private $prix_total;
  private $pj;
  

  public function __construct($IM, $IV, $IA, $DD, $DF,$pj)
  //$IC,
  {
    echo ("test 1 <br>");
    // $this->set_id_commande($IC);
    $this->set_id_membre($IM);
    $this->set_id_vehicule($IV);
    $this->set_id_agence($IA);
    $this->set_date_d($DD);
    $this->set_date_f($DF);
    $this-> set_prix_total($DD,$DF,$pj);// me renvoie return $this->prix_total=$interval->days*30;
    $this->setPj($pj);

  }
  
  // public function get_id_commande(){
  //   return $this->id_commande;
  // }
  
  // public function set_id_commande($IC){
  //   return $this->id_commande = $IC;
  // }
  
  
  public function get_id_membre(){
    return $this->id_membre;
  }
  
  public function set_id_membre($IM){
    return $this->id_membre = $IM;
  }
  
  
  public function get_id_vehicule(){
    return $this->id_vehicule;
  }
  
  public function set_id_vehicule($IV){
    return $this->id_vehicule = $IV;
  }
  
  public function get_id_agence(){
    return $this->id_agence;
  }

  public function set_id_agence($IA){
    return $this->id_agence = $IA;
  }
  
  
  public function get_date_d(){
    return $this->date_d;
  }
  
  public function set_date_d($DD){
    return $this->date_d = $DD;
  }
  
  
  public function get_date_f(){
    return $this->date_f;
  }

  public function set_date_f($DF){
    return $this->date_f = $DF;
  }
  
  
  public function get_prix_total(){
    return $this->prix_total;
  }

  public function set_prix_total($DD,$DF,$pj){
    $dateOne = new DateTime($DD);
    $dateTwo = new DateTime($DF);
    $interval = $dateOne->diff($dateTwo);
    
    return $this->prix_total=$interval->days*$pj;
    
  }
  
  
  public function getPrixVehicule(){
    return $this->prixVehicule;
  }
  
  public function inscription(){
    echo ("test 2<br>");

    print_r ($_POST);
    $commandeModel = new CommandeModel;
    $commandeModel->insert(  $this->id_membre, $this->id_vehicule,$this->id_agence, $this->date_d, $this->date_f, $this->prix_total);
//$this->id_commande,
  }



  public function setPj($pj)
  {
    return $this->pj = $pj;
    

  }
}




?>