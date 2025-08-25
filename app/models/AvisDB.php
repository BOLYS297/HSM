<?php
   require_once 'Connexion.php';
  
   class AvisDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'avis';
         $this->table_id = 'idavis';
      }
      public function create($iduser_auteur,$iduser_cible,$idtache,$note,$commentaires){
            $sql = "insert into $this->tablename set iduser_auteur=?,iduser_cible=?,idtache=?,note=?,commentaires=?";
            $params = array($iduser_auteur,$iduser_cible,$idtache,$note,$commentaires);
            $this->db->prepare($sql, $params);
      }
      public function update($id,$iduser_auteur,$iduser_cible,$idtache,$note,$commentaires) {
         $sql="update $this->tablename set iduser_auteur=?,iduser_cible=?,idtache=?,note=?,commentaires=? where $this->table_id=?";
         $params=array($iduser_auteur,$iduser_cible,$idtache,$note,$commentaires,$id);
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
     public function classement() {
      $sql = "SELECT u.IDUSER AS technicien_id,u.NOM,u.PRENOM, AVG(a.NOTE) AS moyenne_note, COUNT(a.NOTE) AS nombre_avis FROM  AVIS a JOIN USER u ON a.IDUSER_CIBLE = u.IDUSER JOIN  USER client ON a.IDUSER_AUTEUR = client.IDUSER WHERE u.ROLE = 'technicien' AND client.ROLE = 'client' AND a.NOTE IS NOT NULL GROUP BY u.IDUSER, u.NOM, u.PRENOM ORDER BY moyenne_note DESC, nombre_avis DESC";
      $params = null;
      $req = $this->db->prepare($sql, $params);
      return $this->db->getDatas($req, false);
    }
    public function search($keyword) {
      $sql = "select * from $this->tablename where iduser_auteur like ? or iduser_cible like ? or idtache like ? or note like ? order by $this->table_id desc";
      $params = array("%$keyword%", "%$keyword%", "%$keyword%","%$keyword%");
      $req = $this->db->prepare($sql, $params);
      return $this->db->getDatas($req, false);
     
    }
   }

?>