<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_medica extends CI_Controller {
    
    /**************************************************************************/
    /** CONSTRUCTOR DE LA CLASE
    /**************************************************************************/
    public function __construct() {
        
        parent::__construct();
        
        //cargamos modelo para CI perfil
        $this->load->model('consulta_model');
        $this->load->model('dropdown_model');
        
        //Cargamos todas las librerias utilizadas en es CI
        $this->load->library(array(
            'form_validation',  //funciones para los formularios
            'session',          //iniciar session
            'fileclass',        //control css y js para cada pagina
            'general_sessions', //Validar datos de session
            'data_empresa',     //informacion de la empresa
            'gestion_view'));   //controlar vistas
        
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url', 'form','html','funciones_system'));
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE VISUALIZAR CONSULTAS MEDICAS REALIZADAS
    /**************************************************************************/
    public function index(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_dashboard();
        
        $data["menu"]   = "Consultas Médicas";
        
        $data["active"]     = activeMenu("consulta");//(HELPERS)marca menu (active)
                
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("consultas_medicas_view",$data);
    }
    
    /**************************************************************************/
    /** FUNCION QUE PERMITE CREAR UNA CONSULTA MEDICA
    /**************************************************************************/
    public function nueva_consulta(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->nueva_consulta();
        
        $data["menu"]   = "Nueva Consulta Médica";
        
        $data["active"]     = activeMenu("consulta");//(HELPERS)marca menu (active)
                
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("nueva_consulta_med_view",$data);
    }
    
    public function recibirDatos(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //Datos POST formulario
        $this->form_validation->set_rules('motivo','motivo de la consulta','required|trim');
        /*$this->form_validation->set_rules('anamnesis','anamnesis próxima','required|trim');
        $this->form_validation->set_rules('diagnostico','diagnóstico','required|trim');
        $this->form_validation->set_rules('tratamiento','tratamiento','required|trim');*/
        
        //Validar datos del formulario
        if($this->form_validation->run() == FALSE) {
                
            //Muestra los errores en la vista
            $this->nueva_consulta();
                
         } else {
             
            //DATOS BASICOS CONSULTA MEDICA
            $data_consulta  = $this->data_consulta();
             
            //DATOS REFERENTES A LA REVISION POR SISTEMA
            $rv_sistema    = $this->revision_por_sistema();
            
            //DATOS REFERENTES AL EXAMEN FISICO GENERAL
            //echo "<pre>";print_r($_POST);
            echo "<pre>";print_r(array(
                                    "consulta_med"=>$data_consulta,
                                    "rev_sistemas" =>$rv_sistema)
                                );exit();
            
            return false;
        }       
    }
    
    //DATOS BASICOS CONSULTA MEDICA
    public function data_consulta(){
        
        $CONSULTA["motivo"]         = $this->input->post('motivo');
        $CONSULTA["anamnesis"]      = $this->input->post('anamnesis');
        $CONSULTA["diagnostico"]    = $this->input->post('diagnostico');
        $CONSULTA["tratamiento"]    = $this->input->post('tratamiento');
        $CONSULTA["observaciones"]  = $this->input->post('observaciones');
        
        return $CONSULTA;
    }
    
    //OBTENER TODOS LOS DATOS DEL FORMULARIO CORRESPONDIENTES A LA REVISION POR SISTEMA
    public function revision_por_sistema(){
        
        //Retornamos informacion de la revision por sistema
        return array(
            $this->rv_sintomas_generales(),
            $this->rv_sintomas_respiratorios(),
            $this->rv_sintomas_cardiovasculares(),
            $this->rv_sintomas_gastroinstestinales(),
            $this->rv_sintomas_genitourinarios(),
            $this->rv_sintomas_neurologicos(),
            $this->rv_sintomas_endocrinicos()
        );
    }
    
    //REVISION POR SISTEMA / SINTOMAS GENERALES
    public function rv_sintomas_generales(){
        
        $RV_SG["sg_fiebre"]         = $this->input->post('sg_fiebre')       !== null ? TRUE : FALSE;
        $RV_SG["sg_trans_peso"]     = $this->input->post('sg_trans_peso')   !== null ? TRUE : FALSE;
        $RV_SG["sg_malestar_gen"]   = $this->input->post('sg_malestar_gen') !== null ? TRUE : FALSE;
        $RV_SG["sg_problemas_ape"]  = $this->input->post('sg_problemas_ape')!== null ? TRUE : FALSE;
        $RV_SG["sg_sudoracion_n"]   = $this->input->post('sg_sudoracion_n') !== null ? TRUE : FALSE;
        $RV_SG["sg_insomnio"]       = $this->input->post('sg_insomnio')     !== null ? TRUE : FALSE;
        $RV_SG["sg_angustia"]       = $this->input->post('sg_angustia')     !== null ? TRUE : FALSE;
        $RV_SG["sg_otros"]          = $this->input->post('sg_otros')        !== null ? TRUE : FALSE;
        $RV_SG["sg_comentarios"]    = $this->input->post('sg_comentarios');
        
        return $RV_SG;
    }
    
    //REVISION POR SISTEMA / SINTOMAS RESPIRATORIOS
    public function rv_sintomas_respiratorios(){
        
        $RV_RESP["resp_disnea"]     = $this->input->post('resp_disnea')     !== null ? TRUE : FALSE;
        $RV_RESP["resp_tos"]        = $this->input->post('resp_tos')        !== null ? TRUE : FALSE;
        $RV_RESP["resp_exp"]        = $this->input->post('resp_exp')        !== null ? TRUE : FALSE;
        $RV_RESP["resp_hemop"]      = $this->input->post('resp_hemop')      !== null ? TRUE : FALSE;
        $RV_RESP["resp_p_costado"]  = $this->input->post('resp_p_costado')  !== null ? TRUE : FALSE;
        $RV_RESP["resp_obs_br"]     = $this->input->post('resp_obs_br')     !== null ? TRUE : FALSE;
        $RV_RESP["resp_otros"]      = $this->input->post('resp_otros')      !== null ? TRUE : FALSE;
        $RV_RESP["resp_comentarios"]= $this->input->post('resp_comentarios');
        
        return $RV_RESP;
    }
    
    //REVISION POR SISTEMA / SINTOMAS CARDIOVASCULARES
    public function rv_sintomas_cardiovasculares(){
        
        $RV_CARD["card_dis_esf"]        = $this->input->post('card_dis_esf')        !== null ? TRUE : FALSE;
        $RV_CARD["card_ortopnea"]       = $this->input->post('card_ortopnea')       !== null ? TRUE : FALSE;
        $RV_CARD["card_dis_parox_noc"]  = $this->input->post('card_dis_parox_noc')  !== null ? TRUE : FALSE;
        $RV_CARD["card_edema_ext_inf"]  = $this->input->post('card_edema_ext_inf')  !== null ? TRUE : FALSE;
        $RV_CARD["card_dolor_preco"]    = $this->input->post('card_dolor_preco')    !== null ? TRUE : FALSE;
        $RV_CARD["card_otros"]          = $this->input->post('card_otros')          !== null ? TRUE : FALSE;        
        $RV_CARD["card_comentarios"]    = $this->input->post('card_comentarios');
        
        return $RV_CARD;
    }
    
    //REVISION POR SISTEMA / SINTOMAS GASTROINSTESTINALES
    public function rv_sintomas_gastroinstestinales(){
        
        $RV_GAST["gast_p_ape"]          = $this->input->post('gast_p_ape')          !== null ? TRUE : FALSE;
        $RV_GAST["gast_nausas"]         = $this->input->post('gast_nausas')         !== null ? TRUE : FALSE;
        $RV_GAST["gast_vomitos"]        = $this->input->post('gast_vomitos')        !== null ? TRUE : FALSE;
        $RV_GAST["gast_disfagia"]       = $this->input->post('gast_disfagia')       !== null ? TRUE : FALSE;
        $RV_GAST["gast_pirosis"]        = $this->input->post('gast_pirosis')        !== null ? TRUE : FALSE;
        $RV_GAST["gast_diarrea"]        = $this->input->post('gast_diarrea')        !== null ? TRUE : FALSE; 
        $RV_GAST["gast_constipacion"]   = $this->input->post('gast_constipacion')   !== null ? TRUE : FALSE; 
        $RV_GAST["gast_melena"]         = $this->input->post('gast_melena')         !== null ? TRUE : FALSE;
        $RV_GAST["gast_otros"]          = $this->input->post('gast_otros')          !== null ? TRUE : FALSE;
        $RV_GAST["gast_comentarios"]    = $this->input->post('gast_comentarios');
        
        return $RV_GAST;
    }
    
    //REVISION POR SISTEMA / SINTOMAS GENITOURINARIOS
    public function rv_sintomas_genitourinarios(){
        
        $RV_GENIT["geni_disuria"]       = $this->input->post('geni_disuria')       !== null ? TRUE : FALSE;
        $RV_GENIT["geni_polaquiuria"]   = $this->input->post('geni_polaquiuria')   !== null ? TRUE : FALSE;
        $RV_GENIT["geni_poliuria"]      = $this->input->post('geni_poliuria')      !== null ? TRUE : FALSE;
        $RV_GENIT["geni_nicturia"]      = $this->input->post('geni_nicturia')      !== null ? TRUE : FALSE;
        $RV_GENIT["geni_alt_uri"]       = $this->input->post('geni_alt_uri')       !== null ? TRUE : FALSE;
        $RV_GENIT["geni_hematuria"]     = $this->input->post('geni_hematuria')     !== null ? TRUE : FALSE; 
        $RV_GENIT["geni_dolores_lum"]   = $this->input->post('geni_dolores_lum')   !== null ? TRUE : FALSE; 
        $RV_GENIT["geni_otros"]         = $this->input->post('geni_otros')         !== null ? TRUE : FALSE;
        $RV_GENIT["geni_comentarios"]   = $this->input->post('geni_comentarios');
        
        return $RV_GENIT;
    }
    
    //REVISION POR SISTEMA / SINTOMAS NEUROLOGICOS
    public function rv_sintomas_neurologicos(){
        
        $RV_NEURO["neuro_cafalea"]          = $this->input->post('neuro_cafalea')           !== null ? TRUE : FALSE;
        $RV_NEURO["neuro_mareos"]           = $this->input->post('neuro_mareos')            !== null ? TRUE : FALSE;
        $RV_NEURO["neuro_problemas_coord"]  = $this->input->post('neuro_problemas_coord')   !== null ? TRUE : FALSE;
        $RV_NEURO["neuro_paresias"]         = $this->input->post('neuro_paresias')          !== null ? TRUE : FALSE;
        $RV_NEURO["neuro_parestesias"]      = $this->input->post('neuro_parestesias')       !== null ? TRUE : FALSE;
        $RV_NEURO["neuro_otros"]            = $this->input->post('neuro_otros')             !== null ? TRUE : FALSE; 
        $RV_NEURO["neuro_comentarios"]      = $this->input->post('neuro_comentarios');
        
        return $RV_NEURO;
    }
    
    //REVISION POR SISTEMA / SINTOMAS ENDOCRINICOS
    public function rv_sintomas_endocrinicos(){
        
        $RV_ENDO["endo_b_peso"]         = $this->input->post('endo_b_peso')         !== null ? TRUE : FALSE;
        $RV_ENDO["endo_into_frio"]      = $this->input->post('endo_into_frio')      !== null ? TRUE : FALSE;
        $RV_ENDO["endo_into_calor"]     = $this->input->post('endo_into_calor')     !== null ? TRUE : FALSE;
        $RV_ENDO["endo_temblor_fino"]   = $this->input->post('endo_temblor_fino')   !== null ? TRUE : FALSE;
        $RV_ENDO["endo_polidefecacion"] = $this->input->post('endo_polidefecacion') !== null ? TRUE : FALSE;
        $RV_ENDO["endo_ronquera"]       = $this->input->post('endo_ronquera')       !== null ? TRUE : FALSE; 
        $RV_ENDO["endo_somnolencia"]    = $this->input->post('endo_somnolencia')    !== null ? TRUE : FALSE; 
        $RV_ENDO["endo_sequedad_piel"]  = $this->input->post('endo_sequedad_piel')  !== null ? TRUE : FALSE;
        $RV_ENDO["endo_otros"]          = $this->input->post('endo_otros')          !== null ? TRUE : FALSE;
        $RV_ENDO["endo_comentarios"]    = $this->input->post('endo_comentarios');
        
        return $RV_ENDO;
    }
}
