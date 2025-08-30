<?php
   require_once 'Connexion.php';
  
   class UsersDB{
        private $db;
        private $tablename;
        private $table_id;

      public function __construct() {
         $this->db = new Connexion();
         $this->tablename = 'users';
         $this->table_id = 'iduser';
      }
      public function create($nom_complet,$email,$telephone,$adresse,$cni,$profil,$role,$password,$domaine_tech,$attestation_cv) {
            $sql = "insert into $this->tablename set nom_complet=?, email=?, telephone=?, adresse=?, cni=?, profil=?, role=?, password=?, domaine_tech=?, attestation_cv=?";
            $params = array($nom_complet,$email,$telephone,$adresse,$cni,$profil,$role,$password,$domaine_tech,$attestation_cv);
            $this->db->prepare($sql, $params); 
      }
      public function update($id, $nom_complet,$email,$telephone,$adresse,$cni,$profil,$role,$password,$domaine_tech,$attestation_cv) {
            $sql = "update $this->tablename set nom_complet=?, email=?, telephone=?, adresse=?, cni=?, profil=?, role=?, password=?, domaine_tech=?, attestation_cv=? where $this->table_id=?";
            $params = array($nom_complet,$email,$telephone,$adresse,$cni,$profil,$role,$password,$domaine_tech,$attestation_cv, $id);
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
     
      public function readConnexion($email, $password,$role) {
      $sql = "select * from $this->tablename where email=? and password=? and role=?";
      $params = array($email, $password,$role);
      $req = $this->db->prepare($sql, $params);
      return $this->db->getDatas($req, true);
}
public function search($keyword) {
      $sql = "select * from $this->tablename where nom like ? or prenom like ? or email like ? order by $this->table_id desc";
      $params = array("%$keyword%", "%$keyword%", "%$keyword%");
      $req = $this->db->prepare($sql, $params);
      return $this->db->getDatas($req, false);
     
    }
    public function readConnexion2($email, $password) {
        $datas= $this->readAll();
        if($datas != null && sizeof($datas)> 0) {
            foreach($datas as $d) {
                if($d->email == $email && password_verify($password, $d->password) == true) {
                    return $d;
                }
            }
            return false;
        }
        else {
            return false;
        }
    }
}

?>