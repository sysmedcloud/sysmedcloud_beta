<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
    
    /**************************************************************************/
    /** CONSTRUCTOR DE LA CLASE
    /**************************************************************************/
    public function __construct() {

        parent::__construct();
        
        //cargamos modelo para CI perfil
        $this->load->model('paciente_model');
        $this->load->model('dropdown_model');
        
        //Cargamos todas las librerias utilizadas en es CI
        $this->load->library(array(
            'form_validation',//funciones para los formularios
            'session',//iniciar session
            'fileclass',//control css y js para cada pagina
            'general_sessions',//Validar datos de session
            'data_empresa',//informacion de la empresa
            'gestion_view'));//controlar vistas
        
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url', 'form','html','funciones_system'));
    }
    
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
        
        //Quitar clase gray-bg crea error con visualizacion de la agenda 
        $data["gray_bg"]  = "agenda";
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->viewsAgenda("agenda_view",$data);
    }
    
    public function obtener_eventos(){
        
        echo json_encode(
                        array(
                            "success" => 1,
                            "result" => array()
                        )
                    );
    }
    
}


