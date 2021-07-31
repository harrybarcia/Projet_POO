<?php

class AgenceModel{
  
  private $connexion;

  public function __construct()
  {
    $db= new Database();
    $this->connexion=$db->getPDO();
  }

  public function insert($titreAgence, $adresseAgence, $villeAgence, $cpAgence,$descriptionAgence, $photoAgence){

    $request= $this->connexion->prepare("INSERT INTO agences (titre_agence, adresse, ville,  cp, description, photo) VALUES (:titre_agence, :adresse, :ville, :cp, :description , :photo)");

    $request->execute([
      ":titre_agence"=>$titreAgence,
      ":adresse"=>$adresseAgence,
      ":ville"=>$villeAgence,
      ":cp"=>$cpAgence,
      ":description"=>$descriptionAgence,
      ":photo"=>$photoAgence
    ]);

  }

  public function read(){
    $request = $this->connexion->prepare('SELECT * FROM agences');
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  
  
}

require_once('../src/config/Database.php');

