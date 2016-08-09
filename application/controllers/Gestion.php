<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

    public function __construct() {

        parent::__construct();
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url'));
        $this->load->model('Gestion_model');
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
        echo "gestion de datos";
    }

    public function medicamentos(){
        echo "medicamentos";

    }

    public function alergias(){
        echo "alergias";
    }

    public function patologias(){
        echo "patologias";
    }

    public function tratamientos(){
        echo "tratamientos";
    }

    public function vacunas(){
        echo "vacunas";
    }   
    
    

    function ajax()
        {
            
            switch(@$_POST['case'])
            {
                case 1:
                    $this->modlogin->tracking($_POST);
                break;
            }
            
        }

}
