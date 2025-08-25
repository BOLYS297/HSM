<?php
   require_once 'Connexion.php';
  
   class DevisDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'devis';
         $this->table_id = 'iddevis';
      }
      public function create($idtache,$diagnostic,$materiels,$main_oeuvre,$date_debut,$date_fin,$duree){
            $sql = "insert into $this->tablename set idtache=?,diagnostic=?, materiels=?,main_oeuvre=?,date_debut=?,date_fin=?, duree=?";
            $params = array($idtache,$diagnostic,$materiels,$date_debut,$date_fin,$duree);
            $this->db->prepare($sql, $params);
      }
      public function update($id,$idtache,$diagnostic,$materiels,$main_oeuvre,$date_debut,$date_fin,$duree) {
         $sql="update $this->tablename set idtache=?,diagnostic=?,materiels=?,main_oeuvre=?,date_debut=?,date_fin=?, duree=? where $this->table_id=?";
         $params=array($idtache,$diagnostic,$materiels,$date_debut,$date_fin,$duree,$id);
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
         $sql = "select * from $this->tablename where idtache like ? or diagnostic like ? or materiels like ? or main_oeuvre like ? order by $this->table_id desc";
         $params = array("%$keyword%", "%$keyword%", "%$keyword%","%$keyword%");
         $req = $this->db->prepare($sql, $params);
         return $this->db->getDatas($req, false);
    }
   }

?>