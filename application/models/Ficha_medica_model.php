<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha_medica_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }    
    
    /***************************************************************************
    /** @Funtion que permite retornar consultas medicas realizadas a un usuario
    /**************************************************************************/
    public function listado_consultas_medicas($id_paciente){
        
        //Query para obtener listado de pacientes
        $this->db->select("cm.id_consulta,cm.id_paciente,cm.motivo_consulta,cm.anamnesis_proxima,cm.hipotesis_diagnostica,cm.tratamiento,cm.observaciones,cm.fecha_consulta");
        $this->db->from('tbl_consulta_medica cm');
        $this->db->join('tbl_usuarios u','u.id_usuario = cm.id_paciente');
        $this->db->where('u.id_perfil',4);
        $this->db->where('u.estado',0);
        $this->db->where('u.eliminado',0);
        //$this->db->where('u.id_usuario',$id_paciente);
        $this->db->where('cm.id_paciente',$id_paciente);
        $this->db->order_by("cm.id_consulta","asc");
        $datos = $this->db->get();
        //echo $this->db->last_query();exit();
        $arr_data   = array();//CREAR ARREGLO QUE TENDRA LA INFORMACION
        $response   = array();//CREAR ARREGLO DEL JSON
        
        if($datos->num_rows() > 0 ){
            
            //Recorrer resultado query
            foreach ($datos->result() as $row){
                
                //Creamos nuestras variables               
                $fecha      = explode(" ",$row->fecha_consulta);
                $fecha_c    = strtotime($fecha[0]);
                $fecha_c    = date('d/m/Y',$fecha_c);//cambiar formato de la fecha
                
                $fa_editar  = '<a href="#" title="Editar Información" onclick="editar_consulta_med('.$row->id_consulta.');"><i class="fa fa-pencil-square-o"></i></a>';
                $fa_view    = '<a href="#" title="Ver Información" onclick="ver_info_consulta_med('.$row->id_consulta.');" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>';
                $fa_delete  = '<a href="#" title="Eliminar Consulta Medica" onclick="eliminar_consulta_med(\''.$row->id_consulta.'\');"><i class="fa fa-times"></i></a>';
                
                //Crear arreglo con los datos del paciente
                $arr_consultas_medicas[] = array(
                    "id_consulta"       => $row->id_consulta,
                    "fecha"             => $fecha_c,
                    "motivo_consulta"   => $row->motivo_consulta,
                    "anamnesis_proxima" => $row->anamnesis_proxima,
                    "acciones"          => "<div style='width:100%; text-align:center; letter-spacing: 8px;'>".$fa_view." ".$fa_editar." ".$fa_delete."</div>",
                );
            }
            
            //RETORNAR JSON CON LA INFORMACION DEL PACIENTE
            //$response['data'] = $arr_paciente;
            $arr_data = $arr_consultas_medicas;
            echo json_encode($arr_data); 
            
        }else{
            
            //RETORNAR JSON VACIO
            //$response['data'] = $arr_data;
            echo json_encode($arr_data);
        }
    }
}	