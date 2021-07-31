
<?php
require_once('../src/config/Database.php');


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
    // var_dump($IDAgence, $titreVehicule, $marqueVehicule, $modeleVehicule, $descriptionVehicule, $photoVehicule, $prixVehicule);
    // var_dump('Test model');

    $request = $this->connexion->prepare(
      'INSERT INTO vehicule (id_agence, titre_vehicule, marque, modele, description_vehicule, photo_vehicule, prix_journalier)
        VALUES (:id_agence, :titre_vehicule, :marque, :modele, :description, :photo, :prix_journalier)');


    // 'INSERT INTO vehicule (id_agence, titre_vehicule, marque, model, description, photo, prix_journalier) VALUES (:id_agence, :titre_vehicule, :marque, :modele, :description, :photo, :prix_journalier)'
    //

    $request->execute([
      ":id_agence"=> $IDAgence,
      ":titre_vehicule" => $titreVehicule,
      ":marque" => $marqueVehicule,
      ":modele" => $modeleVehicule,
      ":description" => $descriptionVehicule,
      ":photo" => $photoVehicule,
      ":prix_journalier" => $prixVehicule
    ]);
  }
  public function read(){ //récupère tous les véhicules avec agence
    $request = $this->connexion->prepare('SELECT * FROM vehicule LEFT JOIN agences ON vehicule.id_agence = agences.id_agence');
  $request->execute(/*[":id_agence"=>$_GET['titre_agence']]*/);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function read_agence($id_agence_m){ //récup véhicules selon agence
    $request = $this->connexion->prepare('SELECT * FROM vehicule WHERE id_agence=:id_agence');

    $request->execute([":id_agence"=>$id_agence_m]);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

