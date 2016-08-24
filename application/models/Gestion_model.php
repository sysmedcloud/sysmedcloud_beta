<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestion_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

    /**************************************************************************/
    /** Área de seleccion de datos
    /**************************************************************************/

    function get_alergias(){
    	$this->db->from('tbl_alergias');
    	$query = $this->db->get();
    	return $query->result_array();
    }	

    function get_patologias(){
        $this->db->from('tbl_patologias');
        $this->db->limit('20');
        $query = $this->db->get();        
        return $query->result_array();
    }

    function get_medicamentos(){
    	$this->db->from('tbl_medicamentos');
        $this->db->limit('20');
    	$query = $this->db->get();
    	return $query->result_array();
    }
    
    function get_diagnosticos(){
        $this->db->from('tbl_diagnosticos');       
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_vacunas(){
        $this->db->from('tbl_vacunas');       
        $query = $this->db->get();
        return $query->result_array();   
    }

    function get_tratamientos(){
        $this->db->from('tbl_tratamientos');       
        $query = $this->db->get();
        return $query->result_array();
    }

    /**************************************************************************/
    /** Área de actualizacion de datos
    /**************************************************************************/


    /**************************************************************************/
    /** Área de eliminacion de datos
    /**************************************************************************/
}	