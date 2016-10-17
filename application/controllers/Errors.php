<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function __construct() {

        parent::__construct();
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url'));
    }
    
    public function index()
    {
        $this->error_sql();
    }
    
    /******************************************************************/
    /** @Function que permite controlar los errores de sql
    /******************************************************************/
    public function error_sql($error = "Error: esto es vergonzoso..."){
        
        $data["msg_error"] = $error;
        switch ($data["session"]["id_perfil"]) {
             case '1':
                 $data["skin"] = 'pace-done skin-1';
                 break;
             case '2':
                 $data["skin"] = 'pace-done skin-3';
                 break;
             case '3':
                 $data["skin"] = 'pace-done';
                 break;             
             default:
                 # code...
                 break;
         } 
        $this->load->view('errors/error_sql_view',$data);
    }
}
