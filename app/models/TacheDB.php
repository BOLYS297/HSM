<?php
   require_once 'Connexion.php';
  
   class TacheDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'tache';
         $this->table_id = 'idtache';
      }
      public function create($intitule,$description,$email_client,$date_intervention,$lieu_intervention,) {
       $sql = "insert into $this->tablename set  intitule=?, description=?, email_client=?, date_intervention=?,lieu_intervention=?";
            $params = array($intitule,$description,$email_client,$date_intervention,$lieu_intervention);
            $this->db->prepare($sql, $params);
            
      }
      public function update($id,$intitule,$description,$email_client,$date_intervention,$lieu_intervention) {
         $sql="update $this->tablename set intitule=?, description=?, email_client=?, date_intervention=?, lieu_intervention=? where $this->table_id=?";
         $params=array($intitule,$description,$email_client,$date_intervention,$lieu_intervention,$id);
         $this->db->prepare($sql,$params);
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
      $sql = "select * from $this->tablename where intitule like ? or description like ? or date_intervention like ? order by $this->table_id desc";
      $params = array("%$keyword%", "%$keyword%", "%$keyword%");
      $req = $this->db->prepare($sql, $params);
      return $this->db->getDatas($req, false);
     
    }
    }

?>