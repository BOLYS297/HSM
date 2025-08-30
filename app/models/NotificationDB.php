<?php
   require_once 'Connexion.php';
  
   class NotificationDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'notification';
         $this->table_id = 'idnotification';
      }
      public function create($nom_complet,$objet,$description){
            $sql = "insert into $this->tablename set nom_complet=?, objet=?, description=?";
            $params = array($nom_complet, $objet, $description);
            $this->db->prepare($sql, $params);
      }
      public function update($id, $iduser, $objet, $description) {
         $sql="update $this->tablename set nom_complet=?, objet=?, description=? where $this->table_id=?";
         $params=array($nom_complet, $objet, $description, $id);
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