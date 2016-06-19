<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    
    //ingresar consulta medica
    public function add_consulta_med($data){
        
        $this->db->insert('tbl_consulta_medica',$data);
        return $this->db->insert_id();
    }
}	