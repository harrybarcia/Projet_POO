<?php

class CommandeModel{
  
  private $connexion;

  public function __construct()
  {
    echo "test 1";
    $db= new Database();
    $this->connexion=$db->getPDO();
  }

  public function insert($id_membre, $id_vehicule, $id_agence, $date_d, $date_f, $prix_total){
//$id_commande, 
  $request= $this->connexion->prepare("INSERT INTO Commande (id_membre,id_vehicule,id_agence,date_d,date_f,prix_total,date_enregistrement) VALUES (:id_membre,:id_vehicule,:id_agence,:date_d,:date_f,:prix_total, NOW())");
//id_commande,
//:id_commande,
    //
    $request->execute([

      // ":id_commande"=>$id_commande,
      ":id_membre"=>$id_membre,
      ":id_vehicule"=>$id_vehicule,
      ":id_agence"=>$id_agence,
      ":date_d"=>$date_d,
      ":date_f"=>$date_f,
      ":prix_total"=>$prix_total]);

      //Ajout requete Read prepare
      
      $pdo = new PDO('mysql:host=localhost;dbname=projet_poo', 'root', '');
      // AS : permet de créer un alias, ici véhicule peut être appelé par v.
    $request = $pdo->prepare('SELECT titre_vehicule, modele, marque, v.description_vehicule, prix_journalier, titre_agence FROM vehicule AS v LEFT JOIN agences AS a ON a.id_agence=v.id_agence');
    $request->execute();
      // $result contient toutes mes voitures.
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
  
      // echo '<pre>';
      // print_r($result);
      // echo '</pre>';
    }

    public function read(){ 
      // je récupère toutes les agences
      $request = $this->connexion->prepare('SELECT * FROM agences LEFT JOIN commande ON commande.id_agence = agences.id_agence');
      $request->execute();
      $result = $request->fetchAll(PDO::FETCH_ASSOC);
      return $result;
      // je récupère toutes les voitures
      
      $request2 = $this->connexion->prepare('SELECT * FROM vehicule LEFT JOIN commande ON commande.id_vehicule = vehicule.id_vehicule');
      $request2->execute();
      $result2 = $request2->fetchAll(PDO::FETCH_ASSOC);
      return $result2;

    }

    }

require_once('../src/config/Database.php');

