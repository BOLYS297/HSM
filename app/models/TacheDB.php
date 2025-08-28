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
      public function create($iduser,$iduser_tech,$reference,$intitule,$description,$date_intervention,$image,$lieu_intervention,$statut) {
       $sql = "insert into $this->tablename set iduser=?,iduser_tech=?, reference=?, intitule=?, description=?, date_intervention=?, image=?, lieu_intervention=? statut=?";
            $params = array($iduser,$iduser_tech,$reference,$intitule,$description,$date_intervention,$image,$lieu_intervention,$statut);
            $this->db->prepare($sql, $params);
            
      }
      public function update($id,$iduser,$iduser_tech,$reference,$intitule,$description,$email_tech,$email_client,$date_intervention,$image,$lieu_intervention,$statut) {
         $sql="update $this->tablename set iduser=?,iduser_tech=?, reference=?, intitule=?, description=?, email_tech=?, email_client=?, date_intervention=?, image=?, lieu_intervention=? statut=? where $this->table_id=?";
         $params=array($iduser,$iduser_tech,$reference,$intitule,$description,$email_tech,$email_client,$date_intervention,$image,$lieu_intervention,$statut,$id); 
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