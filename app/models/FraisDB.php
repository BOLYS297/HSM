<?php
   require_once 'Connexion.php';
  
   class FraisDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'frais';
         $this->table_id = 'idfrais';
      }
      public function create($iddevis,$montant,$intitule){
            $sql = "insert into $this->tablename set iddevis=?, montant=?,intitule=?";
            $params = array( $iddevis,$montant,$intitule);
            $this->db->prepare($sql, $params);
      }
      public function update($id, $iddevis,$montant,$intitule) {
         $sql="update $this->tablename set iddevis=?, montant=?, intitule=? where $this->table_id=?";
         $params=array($iddevis,$montant,$intitule,$id);
         $this->db->prepare($sql, $params); 
      }
      public function delete($id) {
            $sql = "delete from $this->tablename where $this->table_id=?";
            $params = array($id);
            $this->db->prepare($sql, $params); 
     }
     public function read($id) {
            $sql = "select * from $this->tablename where $this->table_id=?";
            $params = array($id);
            $req = $this->db->prepare($sql, $params);
            return $this->db->getDatas($req, true);
     }
     public function readAll() {
            $sql = "select * from $this->tablename order by $this->table_id desc";
            $params = null;
            $req = $this->db->prepare($sql, $params);
            return $this->db->getDatas($req, false);
     }
    }

?>