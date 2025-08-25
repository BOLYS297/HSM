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
      public function create($iduser, $objet, $description, $statut){
            $sql = "insert into $this->tablename set iduser=?, objet=?, description=?, statut=?";
            $params = array($iduser, $objet, $description, $statut);
            $this->db->prepare($sql, $params);
      }
      public function update($id, $iduser, $objet, $description, $statut) {
         $sql="update $this->tablename set iduser=?, objet=?, description=?, statut=? where $this->table_id=?";
         $params=array($iduser, $objet, $description, $statut, $id);
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