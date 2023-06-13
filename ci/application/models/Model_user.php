<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function creerCompte($name,$prenom,$email,$login,$hash){
        $sql = "INSERT INTO Compte values(?,?,?,?,?)";
        $this->db->query($sql,[$name,$prenom,$email,$login,$hash]);
    }

    public function authentification($login){
        $sql = "SELECT password from Compte where login=?";
        $query = $this->db->query($sql,[$login]);
        if($query->num_rows()!==0){
            $hash = $query->row()->password;
        }
        else{
            return false;
        }
        return $hash;
    }

    public function info($login){
        $sql = "SELECT * FROM Compte where email=?";
        $query = $this->db->query($sql,[$login]);
        $tab=array(
            'prenom' => $query->row()->prenom,
            'nom' => $query->row()->nom,
            'email' => $query->row()->email,
            'login' => $login,
            'logged_in' => TRUE
        );
        return $tab;
    }
}