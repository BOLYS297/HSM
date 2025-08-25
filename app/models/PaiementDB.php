<?php
   require_once 'Connexion.php';
  
   class PaiementDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'paiement';
         $this->table_id = 'idpaiement';
      }
      public function create($idtache,$idmode,$motif,$montant){
            $sql = "insert into $this->tablename set idtache=?, idmode=?, motif=?, montant=?";
            $params = array($idtache, $idmode, $motif, $montant);
            $this->db->prepare($sql, $params);
      }
      public function update($id, $idtache, $idmode, $motif, $montant) {
         $sql="update $this->tablename set idtache=?, idmode=?, motif=?, montant=? where $this->table_id=?";
         $params=array($idtache, $idmode, $motif, $montant, $id);
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
         $sql = "select * from $this->tablename where idtache like ? or idmode like ? or motif like ? or montant like ? order by $this->table_id desc";
         $params = array("%$keyword%", "%$keyword%", "%$keyword%","%$keyword%");
         $req = $this->db->prepare($sql, $params);
         return $this->db->getDatas($req, false);
    }
   }

?>