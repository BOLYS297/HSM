<?php
   require_once 'Connexion.php';
  
   class CategorieDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'categorie';
         $this->table_id = 'idcategorie';
      }
      public function create($intitule){
            $sql = "insert into $this->tablename set intitule=?";
            $params = array($intitule);
            $this->db->prepare($sql, $params);
      }
      public function update($id,$intitule) {
         $sql="update $this->tablename set intitule=? where $this->table_id=?";
         $params=array($intitule,$id);
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