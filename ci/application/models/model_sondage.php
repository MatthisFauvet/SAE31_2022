<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_sondage extends CI_Model{

    public function creation($titre,$lieu,$descriptif,$dates,$heures,$cle){
        $sql="INSERT INTO Sondage values(?,?,?,?,?)";
        $this->db->query($sql,[$titre,$lieu,$descriptif,$cle]);
        $indice=0;
        foreach($dates as $dadat){
            $sql2="INSERT INTO Dates values(?,?,?)";
            $this->db->query($sql2,[$dadat,$heures[$indice],$cle]);
            $indice++;
        }
    }
    public function random_kiki(){
        $length=64;
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0; $i<$length; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        return $string;
    }

}
?>