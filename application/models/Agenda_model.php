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
        
        $data["id_empresa"]             = $dataCita["id_empresa"];
        $data["id_profesional"]         = $dataCita["id_profesional"];
        $data["id_paciente"]            = $dataCita["id_paciente"];
        $data["rut_paciente"]           = $dataCita["rut_paciente"];
        $data["id_estado_cita_medica"]  = $dataCita["estado"];
        
        //Buscar color del estado de la cita
        $this->db->select("color");
        $this->db->from('tbl_estados_citas_medicas');
        $this->db->where('id_estado_cita_medica',$dataCita["estado"]);
        $datos_cita = $this->db->get();
        $row_color_est = $datos_cita->row_array();
        
        $data["class"]                  = $row_color_est["color"];
        $data["nom_paciente"]           = $dataCita["paciente"];
        $data["body"]                   = $dataCita["nota"];
        $data["url"]                    = '';
        $data["start"]                  = $dataCita["inicio"];
        $data["end"]                    = $dataCita["final"];
        $data["inicio_normal"]          = $dataCita["inicio_normal"];
        $data["final_normal"]           = $dataCita["final_normal"];
        
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
    /** @Funtion que permite retornar todas las citas medicas disponibles 
    *   de un profesional
    */
    /**************************************************************************/
    public function citas_medicas($data){
        
        //Query para obtener listado de pacientes
        $this->db->select("*");
        $this->db->from('tbl_citas_medicas');
        $this->db->where('id_empresa',$data["id_empresa"]);
        $this->db->where('id_profesional',$data["id_profesional"]);
        $citas_medicas = $this->db->get();
        
        if($citas_medicas->num_rows() > 0 ){
                    
            //creamos un array
            $datos = array(); 
            //guardamos en un array multidimensional todos los datos de la consulta
            $i=0;
            
            foreach ($citas_medicas->result_array() as $row){
                
                // Alimentamos el array con los datos de los eventos
                $datos[$i] = $row;
                $i++;
            }
            
            //Transformamos los datos encontrado en la BD al formato JSON
            return json_encode(       
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );
            
        }else{
            // Si no existen eventos mostramos este mensaje.
            return "No hay datos"; 
        }
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