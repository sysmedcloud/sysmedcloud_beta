<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    
    //ingresar consulta medica
    public function add_consulta_med($data,$id_cita_med){
        
        $this->db->insert('tbl_consulta_medica',$data);
        $id_consulta_med = $this->db->insert_id();
        
        if($id_consulta_med > 0){
            
            //Validar si consulta medica tiene relacion con alguna cita medica
            if($id_cita_med != ""){
                
                //Relacionar cita med. con consulta realizada 
                //Cambiamos estado cita medica (atendido)
                $this->db->where('id',$id_cita_med);
                $this->db->update('tbl_citas_medicas',array("id_consulta_medica"=>$id_consulta_med,"id_estado_cita_medica" => 5,"class"=>"#095894"));
                
                return $id_consulta_med;
                
            }else{//No hay relacion con alguna cita medica
                
                return $id_consulta_med;
            }
            
        }else{
            
            return $id_consulta_med;
        }
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