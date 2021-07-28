<?php

class MembreModel{
  
  private $connexion;

  public function __construct()
  {
    $db= new Database();
    $this->connexion=$db->getPDO();
  }

  public function insert($PseudoMembre,$PassMembre,$NomMembre,$PrenomMembre,$EmailMembre,$CiviliteMembre,$StatutMembre){
    //

    $request= $this->connexion->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, rang,date_enregistrement ) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :rang, NOW())");

    //
    //
    $request->execute([

      ":pseudo"=>$PseudoMembre,
      ":mdp"=>$PassMembre,
      ":nom"=>$NomMembre,
      ":prenom"=>$PrenomMembre,
      ":email"=>$EmailMembre,
      ":civilite"=>$CiviliteMembre,
      ":rang"=>$StatutMembre
      

    ]);

  }
  
}

require_once('../src/config/Database.php');

