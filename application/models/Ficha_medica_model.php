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
        $this->db->where('cm.eliminado',0);
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
                
                $fa_editar  = '<a href="#" data-toggle="modal" data-target=".editar_consulta_medica" title="Editar Información" onclick="editar_consulta_med('.$row->id_consulta.');"><i class="fa fa-pencil-square-o"></i></a>';
                $fa_view    = '<a href="#" data-toggle="modal" data-target=".informacion_consulta_medica" title="Ver Información" onclick="ver_info_consulta_med('.$row->id_consulta.');"><i class="fa fa-eye"></i></a>';
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
    
    public function removeConsultaMed($id_consulta_meds){
        
        //Editar estado eliminado de la consulta medica
        $this->db->where('id_consulta',$id_consulta_meds);
        $res = $this->db->update('tbl_consulta_medica',array("eliminado" => true));
        
        if($res){
            
            return "success";
            
        }else{
            
            return "error";
        }
    }
    
    /***************************************************************************
    /** @Funtion que permite retornar informacion de la historia medica
    /**************************************************************************/
    public function info_ficha_med($id_paciente,$id_hc){
        
        //Query para obtener informacion de la historia clinica
        $this->db->select("h.id_historia_medica,h.id_paciente,h.ant_familiares,h.ant_sociales_personales,h.morbidos,h.ginecoobstetricos,h.habitos,h.medicamentos,h.alergias,h.inmunizaciones,h.fecha_creacion,h.fecha_modificacion,h.creado_por,h.modificado_por");
        $this->db->from('tbl_historias_medicas h');
        $this->db->join('tbl_usuarios u','u.id_usuario = h.id_paciente');
        $this->db->where('u.id_perfil',4);
        $this->db->where('u.estado',0);
        $this->db->where('u.eliminado',0);
        $this->db->where('h.id_paciente',$id_paciente);
        $this->db->where('h.id_historia_medica',$id_hc);
        $datos = $this->db->get();
        
        if($datos->num_rows() > 0 ){
            
            return $datos->row_array();
            
        }else{
            
            return false;
        }
    }
    
    /***************************************************************************
    /** @Funtion que permite modificar informacion de una ficha clinica
    /**************************************************************************/
    public function guardar_cambios($data,$id_hc){
        
        //Editar historia clinica del usuario
        $this->db->where('id_historia_medica',$id_hc);
        return $this->db->update('tbl_historias_medicas',$data);
    }
    
    /***************************************************************************
    /** @Funtion que permite retornar las ultimas historias clinicas activas
    /**************************************************************************/
    public function hc_recientes($id_empresa){
        
        //Query para obtener listado de pacientes
        $this->db->select("h.id_historia_medica,h.id_paciente,h.fecha_creacion,u.id_usuario,u.rut,u.primer_nombre,u.segundo_nombre,u.apellido_paterno,u.apellido_materno");
        $this->db->from('tbl_historias_medicas h');
        $this->db->join('tbl_usuarios u','u.id_usuario = h.id_paciente');
        $this->db->where('u.id_perfil',4);
        $this->db->where('u.estado',0);
        $this->db->where('u.eliminado',0);
        $this->db->where('u.id_empresa',$id_empresa);
        $this->db->order_by("h.id_historia_medica", "desc");
        $this->db->limit(50);
        $datos = $this->db->get();
        
        $arr_data   = array();//CREAR ARREGLO QUE TENDRA LA INFORMACION
        $response   = array();//CREAR ARREGLO DEL JSON
        
        if($datos->num_rows() > 0 ){
            
            //Recorrer resultado query
            foreach ($datos->result() as $row){
                
                //Buscamos ultimo control
                $this->db->select("c.fecha_consulta as ultimo_control");
                $this->db->from('tbl_consulta_medica c');
                $this->db->join('tbl_usuarios u','u.id_usuario = c.id_paciente');
                $this->db->where('u.id_perfil',4);
                $this->db->where('u.estado',0);
                $this->db->where('u.eliminado',0);
                $this->db->where('c.id_paciente',$row->id_paciente);
                $this->db->where('u.id_empresa',$id_empresa);
                $this->db->order_by("c.fecha_consulta", "desc");
                $this->db->limit(1);
                $query_2 = $this->db->get();
                
                if($query_2->num_rows() > 0 ){
                    
                    $u_control = $query_2->row()->ultimo_control;
                    
                    if($u_control != "" && $u_control != '0000-00-00 00:00:00'){
                        $ultimo_control = $u_control;
                        $fecha_uc    = explode(" ",$ultimo_control);
                        $fecha_uc    = strtotime($fecha_uc[0]);
                        $fecha_uc    = date('d/m/Y',$fecha_uc);
                    }else{
                        $fecha_uc  = '-';
                    }
                    
                }else{
                    $fecha_uc  = "-";
                }
                
                //Creamos nuestras variables
                $nombres    = ucfirst($row->primer_nombre)." ".ucfirst($row->segundo_nombre);
                $apellidos  = ucfirst($row->apellido_paterno)." ".ucfirst($row->apellido_materno);
                
                $fecha      = explode(" ",$row->fecha_creacion);
                $fecha_c    = strtotime($fecha[0]);
                $fecha_c    = date('d/m/Y',$fecha_c);
                
                $ver_detalle  = '<a href="'.base_url().'ficha_medica/ver_detalle/'.$row->id_paciente.'/'.$row->id_historia_medica.'" title="Ver Historia Clínica">Ver detalle</a>';                
                
                //Crear arreglo con los datos del paciente
                $arr_hc_recientes[] = array(
                    "fecha_creacion"        => $fecha_c,
                    "id_historia_medica"    => $row->id_historia_medica,
                    "rut"                   => $row->rut,
                    "nombres"               => $nombres,
                    "apellidos"             => $apellidos,
                    "ultimo_control"        => $fecha_uc,
                    "ver_detalle"           => $ver_detalle
                );
            }
            
            //RETORNAR JSON CON LA INFORMACION DEL PACIENTE
            //$response['data'] = $arr_paciente;
            $arr_data = $arr_hc_recientes;
            echo json_encode($arr_data); 
            
        }else{
            
            //RETORNAR JSON VACIO
            //$response['data'] = $arr_data;
            echo json_encode($arr_data);
        }
    }
}	