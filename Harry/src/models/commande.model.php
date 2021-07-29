<?php

class CommandeModel{
  
  private $connexion;

  public function __construct()
  {
    echo "test 1";
    $db= new Database();
    $this->connexion=$db->getPDO();
  }

  public function insert($id_commande, $id_membre, $id_vehicule, $id_agence, $date_d, $date_f, $prix_total){

  $request= $this->connexion->prepare("INSERT INTO Commande (id_commande,id_membre,id_vehicule,id_agence,date_d,date_f,prix_total,date_enregistrement) VALUES (:id_commande,:id_membre,:id_vehicule,:id_agence,:date_d,:date_f,:prix_total, NOW())");

    //
    //
    $request->execute([

      ":id_commande"=>$id_commande,
      ":id_membre"=>$id_membre,
      ":id_vehicule"=>$id_vehicule,
      ":id_agence"=>$id_agence,
      ":date_d"=>$date_d,
      ":date_f"=>$date_f,
      ":prix_total"=>$prix_total]);

  }

  public function read(){
    $request = $this->connexion->prepare('SELECT * FROM Commande');
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  
}

require_once('../src/config/Database.php');

