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
        $this->form_validation->set_rules('anamnesis','anamnesis próxima','required|trim');
        $this->form_validation->set_rules('diagnostico','diagnóstico','required|trim');
        $this->form_validation->set_rules('tratamiento','tratamiento','required|trim');
        
        //Validar datos del formulario
        if($this->form_validation->run() == FALSE) {
                
            //Muestra los errores en la vista
            $this->nueva_consulta();
                
         } else {
             
            //DATOS BASICOS CONSULTA MEDICA
            $data_consulta  = $this->data_consulta();
             
            //DATOS REFERENTES A LA REVISION POR SISTEMA
            $rv_sistema    = $this->revision_por_sistema();
            
            //DATOS REFERENTES AL EXAMEN FISICO
            $examen_fisico = $this->examen_fisico(); 
            
            echo "<pre>";print_r(array($data_consulta,$rv_sistema,$examen_fisico));exit();
            
            return false;
        }       
    }
    
    //DATOS BASICOS CONSULTA MEDICA
    public function data_consulta(){
        
        $CONSULTA["motivo_consulta"]        = $this->input->post('motivo');
        $CONSULTA["anamnesis_proxima"]      = $this->input->post('anamnesis');
        $CONSULTA["hipotesis_diagnostica"]  = $this->input->post('diagnostico');
        $CONSULTA["tratamiento"]            = $this->input->post('tratamiento');
        $CONSULTA["observaciones"]          = $this->input->post('observaciones');
        
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
            $this->rv_sintomas_endocrinicos(),
            $this->rv_archivos_documentos()
        );
    }
    
    //REVISION POR SISTEMA / SINTOMAS GENERALES
    public function rv_sintomas_generales(){
        
        $RV_SG["fiebre"]                = $this->input->post('sg_fiebre')       !== null ? TRUE : FALSE;
        $RV_SG["transtornos_peso"]      = $this->input->post('sg_trans_peso')   !== null ? TRUE : FALSE;
        $RV_SG["malestar_general"]      = $this->input->post('sg_malestar_gen') !== null ? TRUE : FALSE;
        $RV_SG["problemas_apetito"]     = $this->input->post('sg_problemas_ape')!== null ? TRUE : FALSE;
        $RV_SG["sudoracion_nocturna"]   = $this->input->post('sg_sudoracion_n') !== null ? TRUE : FALSE;
        $RV_SG["insomnio"]              = $this->input->post('sg_insomnio')     !== null ? TRUE : FALSE;
        $RV_SG["angustia"]              = $this->input->post('sg_angustia')     !== null ? TRUE : FALSE;
        $RV_SG["otros_sintomas"]        = $this->input->post('sg_otros')        !== null ? TRUE : FALSE;
        $RV_SG["comentarios"]           = $this->input->post('sg_comentarios');
        
        return $RV_SG;
    }
    
    //REVISION POR SISTEMA / SINTOMAS RESPIRATORIOS
    public function rv_sintomas_respiratorios(){
        
        $RV_RESP["disnea"]                  = $this->input->post('resp_disnea')     !== null ? TRUE : FALSE;
        $RV_RESP["tos"]                     = $this->input->post('resp_tos')        !== null ? TRUE : FALSE;
        $RV_RESP["expectoracion"]           = $this->input->post('resp_exp')        !== null ? TRUE : FALSE;
        $RV_RESP["hemoptisis"]              = $this->input->post('resp_hemop')      !== null ? TRUE : FALSE;
        $RV_RESP["puntada_costado"]         = $this->input->post('resp_p_costado')  !== null ? TRUE : FALSE;
        $RV_RESP["obstruccion_bronquial"]   = $this->input->post('resp_obs_br')     !== null ? TRUE : FALSE;
        $RV_RESP["otros_sintomas"]          = $this->input->post('resp_otros')      !== null ? TRUE : FALSE;
        $RV_RESP["comentarios"]             = $this->input->post('resp_comentarios');
        
        return $RV_RESP;
    }
    
    //REVISION POR SISTEMA / SINTOMAS CARDIOVASCULARES
    public function rv_sintomas_cardiovasculares(){
        
        $RV_CARD["disnea_esfuerzo"]        = $this->input->post('card_dis_esf')        !== null ? TRUE : FALSE;
        $RV_CARD["ortopnea"]       = $this->input->post('card_ortopnea')       !== null ? TRUE : FALSE;
        $RV_CARD["disnea_paroxistica"]  = $this->input->post('card_dis_parox_noc')  !== null ? TRUE : FALSE;
        $RV_CARD["edema_ext_int"]  = $this->input->post('card_edema_ext_inf')  !== null ? TRUE : FALSE;
        $RV_CARD["dolor_precordial"]    = $this->input->post('card_dolor_preco')    !== null ? TRUE : FALSE;
        $RV_CARD["otros_sintomas"]          = $this->input->post('card_otros')          !== null ? TRUE : FALSE;        
        $RV_CARD["comentarios"]    = $this->input->post('card_comentarios');
        
        return $RV_CARD;
    }
    
    //REVISION POR SISTEMA / SINTOMAS GASTROINSTESTINALES
    public function rv_sintomas_gastroinstestinales(){
        
        $RV_GAST["problemas_apetito"]          = $this->input->post('gast_p_ape')          !== null ? TRUE : FALSE;
        $RV_GAST["nausas"]         = $this->input->post('gast_nausas')         !== null ? TRUE : FALSE;
        $RV_GAST["vomitos"]        = $this->input->post('gast_vomitos')        !== null ? TRUE : FALSE;
        $RV_GAST["disfagia"]       = $this->input->post('gast_disfagia')       !== null ? TRUE : FALSE;
        $RV_GAST["pirosis"]        = $this->input->post('gast_pirosis')        !== null ? TRUE : FALSE;
        $RV_GAST["diarrea"]        = $this->input->post('gast_diarrea')        !== null ? TRUE : FALSE; 
        $RV_GAST["constipacion"]   = $this->input->post('gast_constipacion')   !== null ? TRUE : FALSE; 
        $RV_GAST["melena"]         = $this->input->post('gast_melena')         !== null ? TRUE : FALSE;
        $RV_GAST["otros_sintomas"]          = $this->input->post('gast_otros')          !== null ? TRUE : FALSE;
        $RV_GAST["comentarios"]    = $this->input->post('gast_comentarios');
        
        return $RV_GAST;
    }
    
    //REVISION POR SISTEMA / SINTOMAS GENITOURINARIOS
    public function rv_sintomas_genitourinarios(){
        
        $RV_GENIT["disuria"]        = $this->input->post('geni_disuria')       !== null ? TRUE : FALSE;
        $RV_GENIT["polaquiuria"]    = $this->input->post('geni_polaquiuria')   !== null ? TRUE : FALSE;
        $RV_GENIT["poliuria"]       = $this->input->post('geni_poliuria')      !== null ? TRUE : FALSE;
        $RV_GENIT["nicturia"]       = $this->input->post('geni_nicturia')      !== null ? TRUE : FALSE;
        $RV_GENIT["chorro_urinario"]= $this->input->post('geni_alt_uri')       !== null ? TRUE : FALSE;
        $RV_GENIT["hematuria"]      = $this->input->post('geni_hematuria')     !== null ? TRUE : FALSE; 
        $RV_GENIT["fosas_lumbares"] = $this->input->post('geni_dolores_lum')   !== null ? TRUE : FALSE; 
        $RV_GENIT["otros_sintomas"] = $this->input->post('geni_otros')         !== null ? TRUE : FALSE;
        $RV_GENIT["comentarios"]    = $this->input->post('geni_comentarios');
        
        return $RV_GENIT;
    }
    
    //REVISION POR SISTEMA / SINTOMAS NEUROLOGICOS
    public function rv_sintomas_neurologicos(){
        
        $RV_NEURO["cafalea"]        = $this->input->post('neuro_cafalea')           !== null ? TRUE : FALSE;
        $RV_NEURO["mareos"]         = $this->input->post('neuro_mareos')            !== null ? TRUE : FALSE;
        $RV_NEURO["p_coordinacion"] = $this->input->post('neuro_problemas_coord')   !== null ? TRUE : FALSE;
        $RV_NEURO["paresias"]       = $this->input->post('neuro_paresias')          !== null ? TRUE : FALSE;
        $RV_NEURO["parestesias"]    = $this->input->post('neuro_parestesias')       !== null ? TRUE : FALSE;
        $RV_NEURO["otros_sintomas"] = $this->input->post('neuro_otros')             !== null ? TRUE : FALSE; 
        $RV_NEURO["comentarios"]    = $this->input->post('neuro_comentarios');
        
        return $RV_NEURO;
    }
    
    //REVISION POR SISTEMA / SINTOMAS ENDOCRINICOS
    public function rv_sintomas_endocrinicos(){
        
        $RV_ENDO["baja_peso"]           = $this->input->post('endo_b_peso')         !== null ? TRUE : FALSE;
        $RV_ENDO["intolerancia_frio"]   = $this->input->post('endo_into_frio')      !== null ? TRUE : FALSE;
        $RV_ENDO["intolerancia_calor"]  = $this->input->post('endo_into_calor')     !== null ? TRUE : FALSE;
        $RV_ENDO["temblor_fino"]        = $this->input->post('endo_temblor_fino')   !== null ? TRUE : FALSE;
        $RV_ENDO["polidefecacion"]      = $this->input->post('endo_polidefecacion') !== null ? TRUE : FALSE;
        $RV_ENDO["ronquera"]            = $this->input->post('endo_ronquera')       !== null ? TRUE : FALSE; 
        $RV_ENDO["somnolencia"]         = $this->input->post('endo_somnolencia')    !== null ? TRUE : FALSE; 
        $RV_ENDO["sequedad_piel"]       = $this->input->post('endo_sequedad_piel')  !== null ? TRUE : FALSE;
        $RV_ENDO["otros_sintomas"]      = $this->input->post('endo_otros')          !== null ? TRUE : FALSE;
        $RV_ENDO["comentarios"]         = $this->input->post('endo_comentarios');
        
        return $RV_ENDO;
    }
    
    //REVISION POR SISTEMA / ARCHIVOS Y DOCUMENTOS
    public function rv_archivos_documentos(){}
    
    //DATOS EXAMEN FISICO
    public function examen_fisico(){
        
        return array(
                    $this->decubito(),
                    $this->deambulacion(),
                    $this->facie(),
                    $this->conciencia(),
                    $this->piel(),
                    $this->s_linfatico(),
                    $this->signos_vitales(),
                    $this->archivos_documentos());
    }
    
    //DATOS EXAMEN FISICO DECUBITO
    public function decubito(){
        
        $EX_DECUBITO["descripcion_posicion"] = $this->input->post('d_posicion_pie');
        $EX_DECUBITO["descripcion_decubito"] = $this->input->post('d_posicion_decubito');
        
        return $EX_DECUBITO;
    }
    
    //DATOS EXAMEN FISICO DEAMBULACION
    public function deambulacion(){
        
        $EX_DEAMBULACION["deam_normal"]    = $this->input->post('deammbulación_normal')  !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_ataxica"]          = $this->input->post('marcha_ataxica')        !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_p_polineuritis"]     = $this->input->post('marcha_polineuritis')   !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_espastica"]        = $this->input->post('marcha_espastica')      !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_hemiplejico"]      = $this->input->post('marcha_hemiplejico')    !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["marcha_parkinsoniana"]    = $this->input->post('marcha_parkinsoniana')  !== null ? TRUE : FALSE;
        $EX_DEAMBULACION["otros_trastornos"]      = $this->input->post('d_otros_trastornos')    !== null ? TRUE : FALSE;       
        $EX_DEAMBULACION["comentarios"]           = $this->input->post('d_comentarios');
        
        return $EX_DEAMBULACION;
    }
    
    //DATOS EXAMEN FISICO FACIE
    public function facie(){
        
        $EX_FACIE["facie_normal"]           = $this->input->post('facie_normal')            !== null ? TRUE : FALSE;
        $EX_FACIE["facie_acromegalica"]     = $this->input->post('facie_acromegalica')      !== null ? TRUE : FALSE;
        $EX_FACIE["facie_cushingoide"]      = $this->input->post('facie_cushingoide')       !== null ? TRUE : FALSE;
        $EX_FACIE["facie_hipertiroidea"]    = $this->input->post('facie_hipertiroídea')     !== null ? TRUE : FALSE;
        $EX_FACIE["facie_hipotiroidea"]     = $this->input->post('facie_hipotiroidea')      !== null ? TRUE : FALSE;
        $EX_FACIE["facie_hipocratica"]      = $this->input->post('facie_hipocratica')       !== null ? TRUE : FALSE;
        $EX_FACIE["facie_mongolica"]        = $this->input->post('facie_mongolica')         !== null ? TRUE : FALSE;
        $EX_FACIE["facie_parkinsoniana"]    = $this->input->post('facie_parkinsoniana')     !== null ? TRUE : FALSE;
        $EX_FACIE["facie_febril"]           = $this->input->post('facie_febril')            !== null ? TRUE : FALSE;
        $EX_FACIE["facie_mitralica"]        = $this->input->post('facie_mitralica')         !== null ? TRUE : FALSE;
        $EX_FACIE["otros_trastornos"]       = $this->input->post('facie_otros_trastornos')  !== null ? TRUE : FALSE;
        $EX_FACIE["comentarios"]            = $this->input->post('facie_comentarios');
        
        return $EX_FACIE;
    }
    
    //DATOS EXAMEN FISICO CONCIENCIA
    public function conciencia(){
        
        $EX_CONCIENCIA["orientacion_tiempo"]               = $this->input->post('orientacion_t');
        $EX_CONCIENCIA["orientacion_espacio"]               = $this->input->post('orientacion_e');
        $EX_CONCIENCIA["reconocimiento_personas"]            = $this->input->post('reconocimiento_p');
        $EX_CONCIENCIA["comentarios"]      = $this->input->post('conciencia_comentarios');
        
        $EX_CONCIENCIA["lucidez"]        = $this->input->post('lucidez')         !== null ? TRUE : FALSE;
        $EX_CONCIENCIA["obnubilacion"]   = $this->input->post('obnubilacion')    !== null ? TRUE : FALSE;
        $EX_CONCIENCIA["sopor"]          = $this->input->post('sopor')           !== null ? TRUE : FALSE;
        $EX_CONCIENCIA["coma"]           = $this->input->post('coma')            !== null ? TRUE : FALSE;
        
        return $EX_CONCIENCIA;
    }
    
    //DATOS EXAMEN FISICO PIEL 
    public function piel(){
        
        $EX_PIEL["color"]                 = $this->input->post('piel_color');
        $EX_PIEL["humedad_untuosidad"]    = $this->input->post('piel_humedad_u');
        $EX_PIEL["turgor_elasticidad"]    = $this->input->post('turgor_elasticidad');
        $EX_PIEL["temperatura"]           = $this->input->post('piel_temperatura');        
        $EX_PIEL["piel_sin_lesiones"]     = $this->input->post('piel_sin_lesiones')       !== null ? TRUE : FALSE;
        $EX_PIEL["piel_Eritema"]          = $this->input->post('piel_Eritema')            !== null ? TRUE : FALSE;
        $EX_PIEL["piel_mascula"]          = $this->input->post('piel_mascula')            !== null ? TRUE : FALSE;
        $EX_PIEL["piel_papula"]           = $this->input->post('piel_papula')             !== null ? TRUE : FALSE;
        $EX_PIEL["piel_nodulo"]           = $this->input->post('piel_nodulo')             !== null ? TRUE : FALSE;
        $EX_PIEL["piel_tumor"]            = $this->input->post('piel_tumor')              !== null ? TRUE : FALSE;
        $EX_PIEL["piel_vesicula"]         = $this->input->post('piel_vesicula')           !== null ? TRUE : FALSE;
        $EX_PIEL["piel_ampolla"]          = $this->input->post('piel_ampolla')            !== null ? TRUE : FALSE;
        $EX_PIEL["piel_pustula"]          = $this->input->post('piel_pustula')            !== null ? TRUE : FALSE;
        $EX_PIEL["piel_placa"]            = $this->input->post('piel_placa')              !== null ? TRUE : FALSE;
        $EX_PIEL["piel_eritema"]          = $this->input->post('piel_eritema')            !== null ? TRUE : FALSE;
        $EX_PIEL["piel_escama"]           = $this->input->post('piel_escama')             !== null ? TRUE : FALSE;
        $EX_PIEL["piel_erosion"]          = $this->input->post('piel_erosion')            !== null ? TRUE : FALSE;
        $EX_PIEL["piel_ulceracion"]       = $this->input->post('piel_ulceracion')         !== null ? TRUE : FALSE;
        $EX_PIEL["piel_costra"]           = $this->input->post('piel_costra')             !== null ? TRUE : FALSE;
        $EX_PIEL["piel_cicatriz"]         = $this->input->post('piel_cicatriz')           !== null ? TRUE : FALSE;
        $EX_PIEL["piel_roncha"]           = $this->input->post('piel_roncha')             !== null ? TRUE : FALSE;
        $EX_PIEL["piel_liquenificacion"]  = $this->input->post('piel_liquenificacion')    !== null ? TRUE : FALSE;
        $EX_PIEL["piel_telangiectasia"]   = $this->input->post('piel_telangiectasia')     !== null ? TRUE : FALSE;
        $EX_PIEL["piel_petequia"]         = $this->input->post('piel_petequia')           !== null ? TRUE : FALSE;
        $EX_PIEL["piel_equimosis"]        = $this->input->post('piel_equimosis')          !== null ? TRUE : FALSE;
        $EX_PIEL["piel_vibice"]           = $this->input->post('piel_vibice')             !== null ? TRUE : FALSE;
        $EX_PIEL["piel_efelide"]          = $this->input->post('piel_efelide')            !== null ? TRUE : FALSE;
        $EX_PIEL["piel_otros_t"]          = $this->input->post('piel_otros_t')            !== null ? TRUE : FALSE;
        $EX_PIEL["pelos_calvicie"]        = $this->input->post('pelos_calvicie')          !== null ? TRUE : FALSE;
        $EX_PIEL["pelos_alopecia"]        = $this->input->post('pelos_alopecia')          !== null ? TRUE : FALSE;
        $EX_PIEL["pelos_hirsutismo"]      = $this->input->post('pelos_hirsutismo')        !== null ? TRUE : FALSE;
        $EX_PIEL["pelos_otros_alt"]       = $this->input->post('pelos_otros_alt')         !== null ? TRUE : FALSE;
        $EX_PIEL["unias_acropaquia"]      = $this->input->post('unias_acropaquia')        !== null ? TRUE : FALSE;
        $EX_PIEL["unias_coiloniquia"]     = $this->input->post('unias_coiloniquia')       !== null ? TRUE : FALSE;
        $EX_PIEL["unias_psoriasis"]       = $this->input->post('unias_psoriasis')         !== null ? TRUE : FALSE;
        $EX_PIEL["unias_l_beau"]          = $this->input->post('unias_l_beau')            !== null ? TRUE : FALSE;
        $EX_PIEL["unias_l_ungueales_p"]   = $this->input->post('unias_l_ungueales_p')     !== null ? TRUE : FALSE;
        $EX_PIEL["unias_l_ungueales_c"]   = $this->input->post('unias_l_ungueales_c')     !== null ? TRUE : FALSE;
        $EX_PIEL["unias_renal_c"]         = $this->input->post('unias_renal_c')           !== null ? TRUE : FALSE;
        $EX_PIEL["unias_hemorragias_s"]   = $this->input->post('unias_hemorragias_s')     !== null ? TRUE : FALSE;
        
        return $EX_PIEL;
    }
    
    //DATOS EXAMEN FISICO S. LINFATICO
    public function s_linfatico(){
        
        $EX_S_LINFATICO["sl_adenopatia"]   = $this->input->post('sl_adenopatia');
        $EX_S_LINFATICO["sl_comercial"]    = $this->input->post('sl_comercial');
        
        return $EX_S_LINFATICO;
    }
    
    //DATOS EXAMEN FISICO SIGNOS VITALES
    public function signos_vitales(){
        
        $EX_SIGNOS_VITALES["sv_fr"]            = $this->input->post('sv_fr');
        $EX_SIGNOS_VITALES["sv_temperatura"]   = $this->input->post('sv_temperatura');
        $EX_SIGNOS_VITALES["sv_ta_sis"]        = $this->input->post('sv_ta_sis');
        $EX_SIGNOS_VITALES["sv_ta_diast"]      = $this->input->post('sv_ta_diast');
        $EX_SIGNOS_VITALES["sv_pa"]            = $this->input->post('sv_pa');
        $EX_SIGNOS_VITALES["sv_fc"]            = $this->input->post('sv_fc');
        $EX_SIGNOS_VITALES["sv_peso"]          = $this->input->post('sv_peso');
        $EX_SIGNOS_VITALES["sv_talla"]         = $this->input->post('sv_talla');
        $EX_SIGNOS_VITALES["sv_imc"]           = $this->input->post('sv_imc');
        
        return $EX_SIGNOS_VITALES;
    }
    
    //DATOS EXAMEN FISICO ARCHIVOS Y DOCUMENTOS
    public function archivos_documentos(){}
}
