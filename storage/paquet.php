<?php
class paquet {
    public function __construct() {
    }

    //Upload de fichiers
    public function uploaded($source, $destination) {
        return move_uploaded_file($source, $destination);
    }

    //Renommer un fichier
    public function rename($prefix, $separateur, $ext) {
        return ($prefix . $separateur . date('dmYHis') . $ext);
    }

    //Extensions autorisées pour les images
    public function auth_img_ext($ext) {
        $tab= array('.png', '.jpg', '.jpeg', '.gif');
        return in_array(strtolower($ext), $tab);
    }

    //Tailles autorisées pour les images
    public function auth_img_size($size) {
        if($size > 2097152) {
            return false;
        }
        return true;
    }

    //Dimensions autorisées pour l'image
    public function auth_img_dim($width, $width_auth, $height, $height_auth) {
        if($width > $width_auth || $height > $height_auth) {
            return false;
        }
        return true;
    }


    //Traitement et envoie de l'image sur le serveur
    public function upload_image($file, $prefix, $width_limit, $height_limit, $path) {
        $file_name= $file['name'];
        $file_type= $file['type'];
        $file_tmp_name= $file['tmp_name'];
        $file_error= $file['error'];
        $file_size= $file['size'];
        $file_ext= strtolower(strrchr($file_name, "."));
        $file_width= getimagesize($file_tmp_name)[0];
        $file_height= getimagesize($file_tmp_name)[1];
        $file_rename= $this->rename($prefix, '_', $file_ext);
        $destination= $path .  $file_rename;

        if($this->auth_img_ext($file_ext) == false || 
            $this->auth_img_size($file_size) == false ||
            $this->auth_img_dim($file_width, $width_limit, $file_height, $height_limit) == false) {
            return null;
        }
        else {
            $this->uploaded($file_tmp_name, $destination);
            return $file_rename;
        }
    }


    public function escapeField($field) {
        $data= htmlentities($field, ENT_NOQUOTES, 'UTF-8');
        return $data;
    }
}


?>