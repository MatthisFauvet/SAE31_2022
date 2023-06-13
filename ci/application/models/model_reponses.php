<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_consulter extends CI_Model{

    public function __construct()
    {
        $this->load->database();

    }

    public function getInfos($cle){
        $sql = "SELECT * FROM Sondage WHERE cleSondage=?";
        $query = $this->db->query($sql, [$cle]);
        return $query->result_array();
    }

    public function getDate($cle)
    {
        $sql = "SELECT * FROM DatesProposees WHERE cleSondage=?";
        $query = $this->db->query($sql, [$cle]);
        return $query->result_array();
    }

    public function isOpen() {
        $sql = "SELECT open FROM Sondage WHERE cleSondage=?";
        $query = $this->db->query($sql, [$cle]);
        return $query->result_array();
    }

    public function setAnswer() {
        
    }
}