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
        $this->db->limit('50');
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
    function eliminar_datos( $param ){        
        switch ($param['dato']) {
            case 1:
                # Alergias
                $this->db->delete('tbl_alergias', array('cod_alergia' => $param['id']));
                break;
            case 2:
                # Patologias
                $this->db->delete('tbl_patologias', array('cod_patologia' => $param['id']));
                break;
            case 3:
                # Medicamentos
                $this->db->delete('tbl_medicamentos', array('cod_medicamento' => $param['id']));
                break;
            case 4:
                # Vacunas
                $this->db->delete('tbl_vacunas', array('cod_vacuna' => $param['id']));
                break;
            case 5:
                # Tratamientos
                $this->db->delete('tbl_tratamientos', array('cod_tratamiento' => $param['id']));
                break;
            case 6:
                # Diagnosticos
                $this->db->delete('tbl_diagnosticos', array('cod_diagnostico' => $param['id']));
                break;            
            default:
                echo "Error al eliminar datos";
                break;
        }
    }
}	