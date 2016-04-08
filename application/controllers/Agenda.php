<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
    
    /**************************************************************************/
    /** CONSTRUCTOR DE LA CLASE
    /**************************************************************************/
    public function __construct() {
        
        parent::__construct();
        
        //cargamos modelo para CI perfil
        $this->load->model('agenda_model');
        $this->load->model('dropdown_model');
        
        //Cargamos todas las librerias utilizadas en es CI
        $this->load->library(array(
            'form_validation',  //funciones para los formularios
            'session',          //iniciar session
            'fileclass',        //control css y js para cada pagina
            'general_sessions', //Validar datos de session
            'data_empresa',     //informacion de la empresa
            'gestion_view'));   //controlar vistas
        
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url', 'form','html','funciones_system'));
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE VISUALIZAR CALENDARIO PARA CREAR CITAS MEDICAS
    /**************************************************************************/
    public function index(){
        
        /* el profesional medico tendra la opcion de poder notificar via email al paciente,
         * de esta manera el paciente podra confirmar o rechazar la cita */
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_agenda();
        
        //Crear titulo
        $data["menu"]   = "Agenda / Calendario";
        
        //Activar modulo menu
        $data["active"]     = activeMenu("calendario");//(HELPERS)marca menu (active)
        
        $data["estadosCitas"]  = $this->dropdown_model->cargarEstadosCitasMed();
        
        //Quitar clase gray-bg crea error con visualizacion de la agenda 
        $data["gray_bg"]  = "agenda";
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->viewsAgenda("agenda_view",$data);
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE CREAR UNA CITA MEDICA
    /**************************************************************************/
    public function crear_cita(){
        
        //Cargamos las variables de session (LIBRERIA)
        $session        = $this->general_sessions->validarSessionAdmin();
        
        // Definimos nuestra zona horaria
        date_default_timezone_set("America/Santiago");
        $from   = $this->input->post('from');
        $to     = $this->input->post('to');
        
        // Verificamos si se ha enviado el campo con name from
        if (isset($from)) 
        {
            // Si se ha enviado verificamos que no vengan vacios
            if ($from != "" AND $to != "") 
            {
                //Recibimos el fecha de inicio y la fecha final desde el form
                //y la formateamos con la funcion _formatear
                //Recibimos el fecha de inicio y la fecha final desde el form
                //y la formateamos con la funcion _formatear
                //Recibimos los demas datos desde el form
                //reemplazamos los caracteres no permitidos
                
                //Creamos arreglo con los datos de la cita
                $arr_data_cita = array(
                    "id_empresa"    => $session["id_empresa"],
                    "id_profesional"=> $session["id_usuario"],
                    "id_paciente"   => $this->input->post("id_paciente"),
                    "rut_paciente"  => $this->input->post("rut_paciente"),
                    "inicio"        => _formatear($from),
                    "final"         => _formatear($to),
                    "inicio_normal" => $from,
                    "final_normal"  => $to,
                    "paciente"      => evaluar($this->input->post('paciente')),
                    "nota"          => evaluar($this->input->post('nota')),
                    "estado"        => evaluar($this->input->post('estado')),
                );
                
                //Enviar datos a nuestro modelo para el ingreso de la cita medica
                $resp = $this->agenda_model->add_cita_medica($arr_data_cita);
                
                if($resp){
                    
                    redirect(base_url()."agenda");
                }
            }
        }
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE OBTENER TODAS LAS CITAS MEDICAS REGISTRADAS
    /**************************************************************************/
    public function obtener_citas_medicas(){
        
        //Query para obtener listado de pacientes
        $this->db->select("*");
        $this->db->from('tbl_citas_medicas');
        //$this->db->where('du.id_perfil',4);
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
            echo json_encode(       
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );
            
        }else{
            // Si no existen eventos mostramos este mensaje.
            echo "No hay datos"; 
        }
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE CREAR MODAL DE INFORMACION DE LA CITA
    /**************************************************************************/
    public function descripcion_evento($id){
        
        //Obtenemos el id del evento
        $id_cita_medica = evaluar($id);
        
        //Obtener datos de la cita medica
        $row = $this->agenda_model->info_cita_medica($id_cita_medica);
        
        $data["id_cita_medica"] = $id_cita_medica;
        $data["titulo"] = $row['nom_paciente'];
        $data["evento"] = $row['body'];
        $data["inicio"] = $row['inicio_normal'];
        $data["final"] = $row['final_normal'];
        
        $this->load->view('admin/descripcion_cita_view',$data);
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE ELIMINAR UNA CITA
    /**************************************************************************/
    public function eliminar_cita(){
        
        $id = $this->input->post("id_cita_medica");
        
        $id_cita_medica  = evaluar($id);
         
        $resp = $this->agenda_model->remove_cita_medica($id_cita_medica);
         
        if($resp){ 
            echo "Cita Medica eliminada correctamente";
        }else{
            echo "Error al eliminar cita medica";
        }
    }
}
