<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }    
    
    /***************************************************************************
    /** @Funtion que permite ingresar una cita a la db tabla tbl_citas_medicas
    /**************************************************************************/
    public function add_cita_medica($dataCita){
        
        // Definimos nuestra zona horaria
        date_default_timezone_set("America/Santiago");
             
        $data["title"]          = $dataCita["paciente"];
        $data["body"]           = $dataCita["nota"];
        $data["url"]            = '';
        $data["class"]          = $dataCita["estado"];
        $data["start"]          = $dataCita["inicio"];
        $data["end"]            = $dataCita["final"];
        $data["inicio_normal"]  = $dataCita["inicio_normal"];
        $data["final_normal"]   = $dataCita["final_normal"];
        
        //registrar nueva cita medica
        $this->db->insert('tbl_citas_medicas',$data);
        
        //Obtenemos el ultimo id insetado
        $id_cita_medica = $this->db->insert_id();
        
        $id = trim($id_cita_medica);
        //para generar el link del evento
        $link = base_url()."agenda/descripcion_evento/".$id;
        
        //y actualizamos su link
        $this->db->where('id',$id);
        $this->db->update('tbl_citas_medicas',array("url"=>$link));
        
        return $id_cita_medica;
    }
    
    /***************************************************************************
    /** @Funtion que permite buscar informacion de una cita medica en la db
    /**************************************************************************/
    public function info_cita_medica($id_cita_medica){
        
        //Query para validar existencia del usuario perfil paciente
        $this->db->select("*");
        $this->db->from('tbl_citas_medicas');
        $this->db->where('id',$id_cita_medica);
        $datos_cita = $this->db->get();
        return $datos_cita->row_array();
    }
    
    /***************************************************************************
    /** @Funtion que permite eliminar una cita medica de la db
    /**************************************************************************/
    public function remove_cita_medica($id_cita_medica){
     
        $this->db->where('id',$id_cita_medica);
        return $this->db->delete('tbl_citas_medicas');
    }
}	