<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }	
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE OBTENER LA CANTIDAD DE PACIENTES ACTIVOS
    /**************************************************************************/
    public function cantidad_paciente($id_empresa){
        
        $this->db->select("COUNT(*) as cantidad_pacientes");
        $this->db->from('tbl_usuarios du');
        $this->db->join('tbl_historias_medicas hd','hd.id_paciente = du.id_usuario');
        $this->db->where('du.id_perfil',4);//tipo paciente
        $this->db->where('du.estado',0);
        $this->db->where('du.eliminado',0);
        $this->db->where('du.id_empresa',$id_empresa);
        $this->db->order_by("du.id_usuario", "asc");
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0 ){
            
            return $datos->row()->cantidad_pacientes;
            
        }else{
            
            return 0;
        }
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE OBTENER CANTIDAD DE CONSULTAS MEDICAS REGISTRADAS
    /**************************************************************************/
    public function cantidad_cons_medicas($id_empresa){
        
        $this->db->select("COUNT(*) as cantidad_consultas_med");
        $this->db->from('tbl_consulta_medica cm');
        $this->db->join('tbl_usuarios u','u.id_usuario = cm.ingresado_por');
        $this->db->where('u.estado',0);
        $this->db->where('u.eliminado',0);
        //$this->db->where('u.id_usuario',$id_usuario);
        $this->db->where('u.id_empresa',$id_empresa);
        $this->db->where('cm.eliminado',0);        
        $this->db->order_by("cm.id_consulta","asc");
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0 ){
            
            return $datos->row()->cantidad_consultas_med;
            
        }else{
            
            return 0;
        }
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE OBTENER CANTIDAD DE CITAS REGISTRADAS
    /**************************************************************************/
    public function cantidad_citas($id_empresa){
        
        $this->db->select("COUNT(*) as cantidad_citas");
        $this->db->from('tbl_citas_medicas c');
        $this->db->join('tbl_usuarios u','u.id_usuario = c.id_paciente');
        $this->db->where('u.estado',0);
        $this->db->where('u.eliminado',0);
        //$this->db->where('u.id_usuario',$id_usuario);
        $this->db->where('c.id_empresa',$id_empresa);      
        $this->db->order_by("c.id","asc");
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0 ){
            
            return $datos->row()->cantidad_citas;
            
        }else{
            
            return 0;
        }
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE OBTENER CANTIDAD DE USUARIOS DE LA CUENTA
    /**************************************************************************/
    public function cantidad_users($id_empresa){
        
        $this->db->select("COUNT(*) as cantidad_usuarios");
        $this->db->from('tbl_usuarios u');       
        $this->db->where_in('u.id_perfil',array(1,2,3,5));//tipo paciente
        $this->db->where('u.estado',0);
        $this->db->where('u.eliminado',0);
        $this->db->where('u.id_empresa',$id_empresa);
        $this->db->order_by("u.id_usuario", "asc");
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0 ){
            
            return $datos->row()->cantidad_usuarios;
            
        }else{
            
            return 0;
        }
    }
}	