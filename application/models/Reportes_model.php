<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }  
    
    public function consolidado_datos_paciente($rut){
        $query = $this->db->query("SELECT 
                                        *  
                                    FROM tbl_usuarios tu 
                                    JOIN tbl_historias_medicas thm on thm.id_paciente = tu.id_usuario
                                    WHERE replace(replace(rut, '.', ''), '-', '') = " . $rut);
        $r = $query->result_array();
        $data = array();
        if($query->num_rows() > 0){
            foreach ($r as $key_data => $val_data) {
                array_push($data,array( 'ficha_medica' => $val_data,
                                        'consultas_medicas' => $this->consultas_paciente($val_data['id_usuario'])));
            }
            return $data;
        }else{
            return 'error';
        }

    }

    public function consultas_paciente($id_paciente){
        $this->db->select('*');
        $this->db->from('tbl_consulta_medica');
        $this->db->where('id_paciente', $id_paciente);
        $q = $this->db->get();
        $r = $q->result_array();
        return $r;
    }
}