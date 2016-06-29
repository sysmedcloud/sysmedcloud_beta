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
    
    public function add_rev_sint_generales($data){
        
        $this->db->insert('tbl_rs_sintomas_generales',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_resp($data){
        
        $this->db->insert('tbl_rs_sintomas_respiratorios',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_cardio($data){
        
        $this->db->insert('tbl_rs_sintomas_cardiovasculares',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_gastro($data){
        
        $this->db->insert('tbl_rs_sintomas_gastroinstestinales',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_geni($data){
        
        $this->db->insert('tbl_rs_sintomas_genitourinarios',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_neuro($data){
        
        $this->db->insert('tbl_rs_sintomas_neurologicos',$data);
        return $this->db->insert_id();
    }
    
    public function add_rev_sint_endo($data){
        
        $this->db->insert('tbl_rs_sintomas_endocrinos',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_decubito($data){
        
        $this->db->insert('tbl_efg_decubito',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_deambulacion($data){
        
        $this->db->insert('tbl_efg_deambulacion',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_facie($data){
        
        $this->db->insert('tbl_efg_facie',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_conciencia($data){
        
        $this->db->insert('tbl_efg_conciencia',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_piel($data){
        
        $this->db->insert('tbl_efg_piel',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_s_linfatico($data){
        
        $this->db->insert('tbl_efg_linfatico',$data);
        return $this->db->insert_id();
    }
    
    public function add_ex_signos_vitales($data){
        
        $this->db->insert('tbl_efg_signos_vitales',$data);
        return $this->db->insert_id();
    }
}	