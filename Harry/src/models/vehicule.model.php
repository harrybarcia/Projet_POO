<?php
require_once('../src/config/Database.php');

// $Vehicule1 = new VehiculeModel();
// $Vehicule1->insert(1,"Test","test","PHP","Meilleur langage du monde","/upload/blabla",300);
class VehiculeModel
{
  private $connexion;
  public function __construct()
  {
    $db = new Database();
    $this->connexion = $db->getPDO();
  }

  public function insert($IDAgence, $titreVehicule, $marqueVehicule, $modeleVehicule, $descriptionVehicule, $photoVehicule, $prixVehicule)
  {
    var_dump($IDAgence, $titreVehicule, $marqueVehicule, $modeleVehicule, $descriptionVehicule, $photoVehicule, $prixVehicule);
    var_dump('Test model');

    $request = $this->connexion->prepare('INSERT INTO vehicule 
    (id_agence, titre_vehicule, marque, modele, description_vehicule, photo_vehicule, prix_journalier)
     VALUES 
    (:id_agence, :titre_vehicule, :marque, :modele, :description_vehicule, :photo_vehicule, :prix_journalier)');


    // 'INSERT INTO vehicule (id_agence, titre_vehicule, marque, model, description_vehicule, photo_vehicule, prix_journalier) VALUES (:id_agence, :titre_vehicule, :marque, :modele, :description_vehicule, :photo_vehicule, :prix_journalier)'
    //

    $request->execute([
      ":id_agence"=> $IDAgence,
      ":titre_vehicule" => $titreVehicule,
      ":marque" => $marqueVehicule,
      ":modele" => $modeleVehicule,
      ":description_vehicule" => $descriptionVehicule,
      ":photo_vehicule" => $photoVehicule,
      ":prix_journalier" => $prixVehicule
    ]);
  }

  public function read_agence($id_agence_m){ //récup véhicules selon agence
    $request = $this->connexion->prepare('SELECT * FROM vehicule WHERE id_agence=:id_agence');

    $request->execute([":id_agence"=>$id_agence_m]);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function read(){ //récupère tous les véhicules avec agence
    $request = $this->connexion->prepare('SELECT * FROM vehicule LEFT JOIN agences ON vehicule.id_agence = agences.id_agence');
  $request->execute(/*[":id_agence"=>$_GET['titre_agence']]*/);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getPJ($id_vehicule){ //récupère tous les véhicules avec agence
    $request = $this->connexion->prepare('SELECT * FROM vehicule Where vehicule.id_vehicule = :id_vehicule');
    // $request->bindParam(':id_vehicule', $id_vehicule, PDO::PARAM_INT);

  $request->execute([":id_vehicule"=>$id_vehicule]);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    print_r("<h3> result post id_vehicule</h3>");
    echo ("<pre>");
    print_r($result);
    echo ("</pre>");
    print_r(" ------------------------<br>");
    return $result;
  }

}