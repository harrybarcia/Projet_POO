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

    $request= $this->connexion->prepare("INSERT INTO membre (pseudo, pass, nom, prenom, email, civilite, statut,date_enregistrement ) VALUES (:pseudo, :pass, :nom, :prenom, :email, :civilite, :statut, NOW())");

    //
    //
    $request->execute([

      ":pseudo"=>$PseudoMembre,
      ":pass"=>$PassMembre,
      ":nom"=>$NomMembre,
      ":prenom"=>$PrenomMembre,
      ":email"=>$EmailMembre,
      ":civilite"=>$CiviliteMembre,
      ":statut"=>$StatutMembre
      

    ]);

  }

  public function read(){
    $request = $this->connexion->prepare('SELECT * FROM membre');
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  
}

require_once('../src/config/Database.php');
