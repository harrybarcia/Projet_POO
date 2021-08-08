<?php

class VehiculeController
{
  private $idVehicule;
  private $IDAgence;
  private $titreVehicule;
  private $marqueVehicule;
  private $modeleVehicule;
  private $descriptionVehicule;
  private $photoVehicule;
  private $prixVehicule;


  public function __construct($IDAgence, $tv, $marv, $modv, $desv, $phov, $pv)
  {
    $this->setIDAgence($IDAgence);
    $this->setTitreVehicule($tv);
    $this->setMarqueVehicule($marv);
    $this->setModeleVehicule($modv);
    $this->setPhotoVehicule($phov);
    $this->setDescriptionVehicule($desv);
    $this->setPrixVehicule($pv);
  }

  public function getIdVehicule()
  {
    return $this->idVehicule;
  }


  public function getIDAgence()
  {
    return $this->IDAgence;
  }

  public function setIDAgence($IDAgence)
  {
    return $this->IDAgence = $IDAgence;
  }

  public function getTitreVehicule()
  {
    return $this->titreVehicule;
  }

  public function setTitreVehicule($tv)
  {
    return $this->titreVehicule = $tv;
  }
  //

  public function getMarqueVehicule()
  {
    return $this->marqueVehicule;
  }

  public function setMarqueVehicule($marv)
  {
    return $this->marqueVehicule = $marv;
  }
  //

  public function getModeleVehicule()
  {
    return $this->modeleVehicule;
  }

  public function setModeleVehicule($modv)
  {
    $this->modeleVehicule = $modv;

    return $this;
  }
  //

  public function getDescriptionVehicule()
  {
    return $this->descriptionVehicule;
  }

  public function setDescriptionVehicule($desv)
  {
    return $this->descriptionVehicule = $desv;
  }

  //
  public function getPhotoVehicule()
  {
    return $this->photoVehicule;
  }

  public function setPhotoVehicule($phov)
  {
    return $this->photoVehicule = $phov;
  }

  public function getPrixVehicule()
  {
    return $this->prixVehicule;
  }


  public function setPrixVehicule($pv)
  {
    return $this->prixVehicule = $pv;
  }




  public function inscription()
  {
    $vehiculeModele = new VehiculeModel;
    $vehiculeModele->insert(
      $this->IDAgence,
      $this->titreVehicule,
      $this->marqueVehicule,
      $this->modeleVehicule,
      $this->descriptionVehicule,
      $this->photoVehicule,
      $this->prixVehicule
    );
  }

}






?>
