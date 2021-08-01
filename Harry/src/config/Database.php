<?php

class Database{

  private $host="localhost";
  private $dbname="projet_poo";
  private $username="root";
  private $password="";



  public function getPDO(){
    try {
      return new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname,$this->username,$this->password);
    } catch (PDOException $error) {
      echo '<pre>';
      echo "Connection failed : ". $error->getMessage();
      echo '</pre>';

      exit();

      
    }
  }

}
