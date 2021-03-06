<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/*
 *   LIBRERIA GENERAL SESION: PERMITE VALIDAR SESIONES
 *   version 1.0
*/
class General_sessions {
    
    var $CI = "";
    
    function General_sessions()
    {   
        $this->CI =& get_instance();  
        $this->CI->load->helper('url');
        $this->CI->load->library('session');
        //$this->CI->config->item('base_url');
    }
    
    /******************************************************************/
    /** @Funcion que permite validar datos de session del usuario
    /******************************************************************/
    public function validarSessionAdmin(){
        
        if($this->CI->session->userdata('is_logued_in') == true){
            
            //Validar si el usuario es tipo administrador
            if($this->CI->session->userdata('id_perfil') == 1){
                
                $arr_session = array(
                    "id_usuario"    => $this->CI->session->userdata('id_usuario'),
                    "id_perfil"     => $this->CI->session->userdata('id_perfil'),
                    "perfil"        => $this->CI->session->userdata('perfil'),
                    "username"      => $this->CI->session->userdata('username'),
                    "id_empresa"    => $this->CI->session->userdata('id_empresa'),
                    "empresa"       => $this->CI->session->userdata('empresa'),
                    "rut"           => $this->CI->session->userdata('rut'),
                    "primer_nom"    => $this->CI->session->userdata('primer_nom'),
                    "segundo_nom"   => $this->CI->session->userdata('segundo_nom'),
                    "apellido_pat"  => $this->CI->session->userdata('apellido_pat'),
                    "apellido_mat"  => $this->CI->session->userdata('apellido_mat'),
                    "imagen"        => $this->CI->session->userdata('imagen'),
                    "last_login"    => $this->CI->session->userdata('last_login')
                );
                
                return $arr_session;
                
            }else{
                
                redirect(base_url()."login_app/accion/logout");
            }
            
        }else{
            
            redirect(base_url()."login_app/accion/logout");
        }   
    }
}

/* End of file Files.php */ 