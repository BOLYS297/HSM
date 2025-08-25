<?php
   require_once 'Connexion.php';
  
   class DomaineDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'domaine';
         $this->table_id = 'iddomaine';
      }
      public function create($intitule,$description){
            $sql = "insert into $this->tablename set intitule=?, description=?";
            $params = array($intitule,$description);
            $this->db->prepare($sql, $params);
      }
      public function update($id,$intitule,$description) {
         $sql="update $this->tablename set intitule=?, description=? where $this->table_id=?";
         $params=array($intitule,$description,$id);
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
     public function search($keyword) {
      $sql = "select * from $this->tablename where intitule like ? or description like ? order by $this->table_id desc";
      $params = array("%$keyword%", "%$keyword%");
      $req = $this->db->prepare($sql, $params);
      return $this->db->getDatas($req, false);
    }
   }

?>