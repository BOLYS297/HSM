<?php
   require_once 'Connexion.php';
  
   class UsersDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'users';
         $this->table_id = 'idusers';
      }
      public function create($iddomaine,$nom,$prenom,$adresse,$latitude,$longitude,$telephone,$email,$password,$role,$statut,$photo,$cni_recto,$cni_verso,$piece) {
            $sql = "insert into $this->tablename set iddomaine=?, nom=?, prenom=?, adresse=?, latitude=?, longitude=?, telephone=?, email=?, password=?, role=?, statut=?, photo=?, cni_recto=?, cni_verso=?, piece=?";
            $params = array($iddomaine, $nom, $prenom, $adresse, $latitude, $longitude, $telephone, $email, $password, $role, $statut, $photo, $cni_recto, $cni_verso, $piece);
            $this->db->prepare($sql, $params); 
      }
      public function update($id, $iddomaine, $nom, $prenom, $adresse, $latitude, $longitude, $telephone, $email, $password, $role, $statut, $photo, $cni_recto, $cni_verso, $piece) {
            $sql = "update $this->tablename set iddomaine=?, nom=?, prenom=?, adresse=?, latitude=?, longitude=?, telephone=?, email=?, password=?, role=?, statut=?, photo=?, cni_recto=?, cni_verso=?, piece=? where $this->table_id=?";

            $params = array($iddomaine, $nom, $prenom, $adresse, $latitude, $longitude, $telephone, $email, $password, $role, $statut, $photo, $cni_recto, $cni_verso, $piece, $id);
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
     
      public function readConnexion($email, $password) {
      $sql = "select * from $this->tablename where email=? and password=? and role=?";
      $params = array($email, $password);
      $req = $this->db->prepare($sql, $params);
      return $this->db->getDatas($req, true);
}
public function search($keyword) {
      $sql = "select * from $this->tablename where nom like ? or prenom like ? or email like ? order by $this->table_id desc";
      $params = array("%$keyword%", "%$keyword%", "%$keyword%");
      $req = $this->db->prepare($sql, $params);
      return $this->db->getDatas($req, false);
     
    }
}

?>