<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/******************************************************************************* 
 * Como vemos comprobamos si existe algún usuario en la tabla usuarios con esos 
 * datos, en caso afirmativo devolvemos la fila con los datos de ese usuario, 
 * en otro caso creamos una sesión flashdata y redirigimos al login mostrando el 
 * mensaje de dicha sesión, que como sabemos este tipo de sesiones desaparecen 
 * la próxima vez que actualicemos la página.
 ******************************************************************************/

class Login_app_model extends CI_Model {
    
    public function __construct() {
        
        parent::__construct();
        //Cargar base de datos
        $this->load->database("smc_access_data");
    }
    
    /******************************************************************/
    /** @VALIDAR DATOS INGRESADOS - RETORNAR INFORMACION DE SESSION
    /******************************************************************/
    public function login_user($data)
    {
        $this->db->select('u.id_usuario,'
            .'u.id_empresa,'
            .'e.db_name,'
            .'u.id_perfil,'
            .'p.perfil,'
            .'u.username,'
            .'u.password,'
            .'u.estado,'
            //.'u.activo,'
            //.'u.last_login,'
            .'du.primer_nombre,'
            .'du.segundo_nombre,'
            .'du.apellido_paterno,'
            .'du.apellido_materno,'
            .'du.rut,'
            .'du.imagen');
        $this->db->from('tbl_usuarios u');
        $this->db->join('tbl_perfiles p','p.id_perfil = u.id_perfil');
        $this->db->join('tbl_empresas e','e.id_empresa = u.id_empresa');
        $this->db->join('tbl_data_usuarios du','du.id_usuario = u.id_usuario');
        $this->db->where('u.username',$data['username']);
        $this->db->where('u.password',$data['password']);
        $this->db->where('u.estado',0);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0)
        {
            return $query->row();

        }else{
            
            //Errores en los datos de acceso ingresado
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect(base_url().'login_app');
        }
    }
    
    /******************************************************************/
    /** @Registrar log de inicio o cierre de session
    /******************************************************************/
    public function log_login_out($data){
        
        @date_default_timezone_set("America/Santiago");
        $fecha = @date("Y-m-d G:i:s");

        $data = array(
            'id_usuario'    => $data["id_usuario"],
            'accion'        => $data["accion"],
            'ip_address'    => $data["ip_address"],
            'user_agent'    => $data["user_agent"],
            'fecha'         => $fecha
        );
        $this->db->insert('tbl_sessions', $data); 
        //echo $this->db->last_query();
    }
    
}