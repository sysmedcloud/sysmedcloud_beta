<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller1 extends MY_Controller
{
    function __construct()
    {
        parent::__construct(
            TRUE, // Controller secured
            array(
            'index' => array('administrador','paciente'),
            'edit' => array('asistente','administrador'),
            'asistente' => array('asistente'),
            'profile' => '*'
            ));
    }
    
    function index()
    {
      echo "metodo index";
    }

    function edit($id = NULL)
    {
       echo "metodo edit";
    }
    
    function asistente(){
        
        echo "metodo solo para asistente";
    }
    
    function profile($id = NULL)
    {
        echo "metodo profile";
    }
}