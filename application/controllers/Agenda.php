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
        
        $data["estadosCitas"]  = $this->dropdown_model->cargarEstadosCitasMed(1);
        
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
        
        $session        = $this->general_sessions->validarSessionAdmin();
        $id_profesional = $session["id_usuario"];
        $id_perfil      = $session["id_perfil"];
        $id_empresa     = $session["id_empresa"];
        //Parametros necesarios
        $data           = array(
            "id_profesional" => $id_profesional,
            "id_perfil"      => $id_perfil,
            "id_empresa"     => $id_empresa,
        );
        //Obtener citas medicas
        $res = $this->agenda_model->citas_medicas($data);
        
        echo $res; 
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE CREAR MODAL DE INFORMACION DE LA CITA
    /**************************************************************************/
    public function descripcion_evento($id){
        
        $session        = $this->general_sessions->validarSessionAdmin();
        
        //Obtenemos el id del evento
        $id_cita_medica = evaluar($id);
        
        //Obtener datos de la cita medica
        $row = $this->agenda_model->info_cita_medica($id_cita_medica,$session["id_empresa"]);
        
        $data["estadosCitas"]  = $this->dropdown_model->cargarEstadosCitasMed($row["id_estado_cita_medica"]);
        
        //Obtener datos de contacto del usuario
        $row_c = $this->agenda_model->datos_contacto($row['id_paciente']);
        
        //Creamos variables para nuestra vista
        $data["id_cita_medica"] = $id_cita_medica;
        $data["id_paciente"]    = $row['id_paciente'];
        $data["paciente"]       = $row['nom_paciente'];
        $data["correo"]         = $row_c['email']       != "" ? $row_c['email']  : "no informado";
        $data["celular"]        = $row_c['celular']     != "" ? $row_c['celular'] : "no informado";
        $data["tel_fijo"]       = $row_c['telefono']    != "" ? $row_c['telefono']: "no informado";
        $data["nota"]           = $row['body']          != "" ? $row['body']    : "Sin comentarios";
        $data["inicio"]         = $row['inicio_normal'];
        $data["final"]          = $row['final_normal'];
        
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
