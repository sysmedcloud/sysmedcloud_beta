<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ficha_medica extends CI_Controller {

    public function __construct() {

        parent::__construct();  
        
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
    
    public function index()
    {
        $this->error_sql();
    }
    
    /******************************************************************/
    /** @Function...
    /******************************************************************/
    public function ver_detalle($id_paciente,$id_historia_med){
        
        $this->load->model('paciente_model');//cargar modelo
        $this->load->model('dropdown_model');//cargar modelo
        $this->load->model('ficha_medica_model');//cargar modelo
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->datosDeSession(); 
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_ficha_clinica();
        
        $data["menu"]       = "Historia Clíente";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        //Id del paciente
        $data["id_paciente"]=$id_paciente;
        
        //Id historia medica
        
        $data["id_historia_med"] = $id_historia_med;
        
        //Cargamos datos del paciente seleccionado
        $data["paciente"]       = $this->paciente_model->info_paciente($id_paciente);    
        //echo "<pre>";print_r($data["paciente"]);exit();
        
        //Cargamos informacion historia clinica
        $data["info_hc"]        = $this->ficha_medica_model->info_ficha_med($id_paciente,$id_historia_med);
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("historia_medica_view",$data);
        
    }
    
    public function personas_contacto($id_paciente){
        
        $this->load->model('paciente_model');//cargar modelo
        
        //Cargamos personas de contacto del paciente
        $personas_contacto  = $this->paciente_model->personas_contacto($id_paciente);
        
        echo $personas_contacto;
    }
    
    /******************************************************************/
    /** @Function...
    /******************************************************************/
    public function listado_consultas_med($id_paciente){
        
        $this->load->model('ficha_medica_model');
        
        //Cargamos las variables de session (LIBRERIA)
        $this->general_sessions->datosDeSession(); 
        
        echo $this->ficha_medica_model->listado_consultas_medicas($id_paciente);
    }
    
    public function eliminarConsultaMed(){
        
        $this->load->model('ficha_medica_model');
        
        $id_consulta = $this->input->post("id_consulta_med");
        
        //Eliminamos consulta medica (Solo cambiamos el estado)
        echo $this->ficha_medica_model->removeConsultaMed($id_consulta);
    }
    
    public function guardar(){
        
        $this->load->model('ficha_medica_model');//cargar modelo
        
        //Cargamos las variables de session (LIBRERIA)
        $session                            = $this->general_sessions->datosDeSession(); 
        $data["id_paciente"]                = $this->input->post("id_paciente");
        $id_historia_medica                 = $this->input->post("id_historia_med");
        $data["ant_familiares"]             = $this->input->post("ant_familiares");
        $data["ant_sociales_personales"]    = $this->input->post("ant_soc_personales");
        $data["morbidos"]                   = $this->input->post("ant_morbidos");
        $data["ginecoobstetricos"]          = $this->input->post("annt_ginecoobstetricos");
        $data["habitos"]                    = $this->input->post("habitos");
        $data["medicamentos"]               = $this->input->post("medicamentos");
        $data["alergias"]                   = $this->input->post("alergias");
        $data["inmunizaciones"]             = $this->input->post("inmunizaciones");
        $data["modificado_por"]             = $session["id_usuario"];
        
        //Editar informacion ficha clinica
        $res = $this->ficha_medica_model->guardar_cambios($data,$id_historia_medica);
        
        //Retornar resultado
        if($res){
            echo "success";
        }else{
            echo "error";
        }
        
    }
    
    /**************************************************************************/
    /** @Function que permite obtener las ultimas historias clinicas ingresadas
    /**************************************************************************/
    public function historias_clinicas_recientes(){
        
        $this->load->model('ficha_medica_model');//cargar modelo
        
        $id_empresa         = $this->session->userdata('id_empresa');
        
        //Cargamos ultimas historias clinicas
        $hc_recientes  = $this->ficha_medica_model->hc_recientes($id_empresa);
        
        echo $hc_recientes;
    }
}

