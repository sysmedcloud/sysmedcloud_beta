<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_admin extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        //cargamos modelo para CI perfil
        $this->load->model('paciente_model');
        $this->load->model('dropdown_model');
        
        //Cargamos todas las librerias utilizadas en es CI
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
        $this->listadoPacientes();
    }
        
    /**************************************************************************/
    /** @Function que permite retornar pagina paciente
    /**************************************************************************/
    public function RegistrarPaciente(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    = $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->files_miperfil();
        
        //Cargamos datos de la empresa (LIBRERIA)
        $data["empresa"]    = $this->data_empresa->info_empresa();
        
        $data["menu"]       = "Registrar Paciente";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        //Obtener informacion personal del usuario
        $data["info"]       = $this->paciente_model->info_personal($data["session"]["db_name"],$data["session"]["id_usuario"]);
        
        //Cargamos todos nuestros dropdown utilizados en la vista
        $data["prev_med"]       = $this->dropdown_model->cargarPrevisiones();
        $data["est_civil"]      = $this->dropdown_model->cargarEstCivil();
        $data["ocupaciones"]    = $this->dropdown_model->cargarOcupaciones();
        $data["religiones"]     = $this->dropdown_model->cargarReligiones();
        $data["niv_estudios"]   = $this->dropdown_model->cargarNivelesEst();
        $data["paises"]         = $this->dropdown_model->cargarPaises();
        $data["regiones"]       = $this->dropdown_model->cargarRegiones();
        $data["provincias"]     = $this->dropdown_model->cargarProvincias();
        $data["comunas"]        = $this->dropdown_model->cargarComunas();
        $data["gr_sang"]        = $this->dropdown_model->cargarGrSanguineos();
        $data["factoresRH"]     = $this->dropdown_model->cargarFactoresRH();
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("paciente_view",$data);
    }
    
    public function listadoPacientes(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_tbl();
        
        //Cargamos datos de la empresa (LIBRERIA)
        $data["empresa"]    = $this->data_empresa->info_empresa();
        //echo "<pre>";print_r($data);exit();//VISUALIZAR ARRAY DE DATOS
        
        $data["menu"]   = "Listado de Pacientes";
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        $id_empresa         = $this->session->userdata('id_empresa');
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("pacientes_view",$data);
    }
    
    public function pacientes_json(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    = $this->general_sessions->validarSessionAdmin();
        
        $id_empresa         = $this->session->userdata('id_empresa');
        
        $this->paciente_model->listadoPacientes_json($id_empresa);    
    }
    
    /**************************************************************************/
    /** @Funcion que permite recibir los datos del form de perfil
    /**************************************************************************/
    public function  recibirDatos(){
       
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //Datos POST formulario
        $this->form_validation->set_rules('rut','R.U.T.','required|trim');
        $this->form_validation->set_rules('p_nombre','primer nombre','required|trim');
        $this->form_validation->set_rules('s_nombre','segundo nombre','required|trim');
        $this->form_validation->set_rules('a_paterno','apellido paterno','required|trim');
        $this->form_validation->set_rules('a_materno','apellido materno','required|trim');
        $this->form_validation->set_rules('genero','genero','required|trim');
        $this->form_validation->set_rules('correo','correo electronico','required|trim|valid_email');
        $this->form_validation->set_rules('fecha_nac','fecha de nacimiento','required|trim');
        $this->form_validation->set_rules('pais_res','pais de referencia','required|trim');
        $this->form_validation->set_rules('prevision','previsión médica','required|trim');
        $this->form_validation->set_rules('region','region', 'required|trim');
        $this->form_validation->set_rules('provincia','provincia','required|trim');
        $this->form_validation->set_rules('comuna','comuna','required|trim');
        $this->form_validation->set_rules('calle','calle','required|trim');
        
        //Validar datos del formulario
        if($this->form_validation->run() == FALSE) {
                
            //Muestra los errores en la vista
            $this->RegistrarPaciente();
                
         } else {
            
            //CREAMOS NUESTRO NUEVO USUARIO
            $p_nombre       = strtolower($this->input->post('p_nombre'));
            $a_paterno      = strtolower($this->input->post('a_paterno'));
            //3 primeras letras del primer nombre
            $nom_recortado  = substr($this->input->post('p_nombre'),0,3);
            //crear username del usuario (3 primeras letas + a. paterno)
            $username       = $nom_recortado.".".$a_paterno;
            
            //Caracteres que no deseamos tener
            $caracteres = array(".", "-");
            //El password es el rut sin guiones ni puntos
            $password   = str_replace($caracteres,"",$this->input->post('rut'));
            
            //Arreglo con los dato de acceso del nuevo paciente 
            $dataUser = array(
                //datos para ingresar un nuevo usuario
                "id_empresa"    => $data["session"]["id_empresa"],
                "id_perfil"     => 4,
                "rut"           => $this->input->post('rut'),
                "username"      => $username,
                "password"      => md5($password),
                "estado"        => false,
                "creado_por"    => $data["session"]["id_usuario"]
            );
            
            //Registrar nuevo usuario tipo paciente, esta funcion 
            //nos retornara el ultimo id recientemente ingresado
            //es decir el id del usuario que recien creamos
            $idUser = $this->paciente_model->anadirUsuario($dataUser);
            
            //validar id del nuevo usuario
            if($idUser > 0){
                
                //Crear arreglo con los datos del nuestro nuevo paciente
                $dataForm = array(//Nuestro arreglo con los datos del paciente
                    "id_new_user"   => $idUser,
                    "rut"           => $this->input->post('rut'),
                    "p_nombre"      => $this->input->post('p_nombre'),
                    "s_nombre"      => $this->input->post('s_nombre'),
                    "a_paterno"     => $this->input->post('a_paterno'),
                    "a_materno"     => $this->input->post('a_materno'),
                    "genero"        => $this->input->post('genero'),
                    "telefono_f"    => $this->input->post('telefono_f'),
                    "celular"       => $this->input->post('celular'),
                    "correo"        => $this->input->post('correo'),
                    "estado_civil"  => $this->input->post('estado_civil'),
                    "fecha_nac"     => cambiaf_a_mysql($this->input->post('fecha_nac')),
                    "lugar_nac"     => $this->input->post('lugar_nac'),
                    "religion"      => $this->input->post('religion'),
                    "pais_res"      => $this->input->post('pais_res'),
                    "prevision"     => $this->input->post('prevision'),
                    "ocupacion"     => $this->input->post('ocupacion'),
                    "niv_estudios"  => $this->input->post('niv_estudios'),
                    "region"        => $this->input->post('region'),
                    "provincia"     => $this->input->post('provincia'),
                    "comuna"        => $this->input->post('comuna'),
                    "calle"         => $this->input->post('calle'),
                    "grupo_sang"    => $this->input->post('grupo_sang'),
                    "factorn_rh"    => $this->input->post('factorn_rh')
                );
                
                //Registrar los datos del nuevo paciente
                //Ademas se creara una nueva historia medica para el paciente
                $this->paciente_model->registrarPaciente($dataForm);
                
                //Muestra vista de exito
                $this->pacienteAdd_succes();
            }
            
            return false;
        }       
        
    }
    /**************************************************************************/
    /** @Funcion que permite retornar vista de exista cambio info mi perfil
    /**************************************************************************/
    public function pacienteAdd_succes(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    = $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']      = $this->fileclass->files_dashboard();
        
        //Cargamos datos de la empresa (LIBRERIA)
        $data["empresa"]    = $this->data_empresa->info_empresa();
        //echo "<pre>";print_r($data);exit();//VISUALIZAR ARRAY DE DATOS
        
        $data["menu"]       = "Mi Perfil";//muestra opcion seleccionada top
        
        $data["active"]     = activeMenu("pacientes");//(HELPERS)marca menu (active)
        
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("paciente_succes_view",$data);
    }
    
    /**************************************************************************/
    /** @Funcion que permite cargar las provincias segun 
    /** region seleccionada
    /**************************************************************************/    
    public function llena_provincias(){
        
        $options = "";
        
        if($this->input->post('region'))
        {
            $region = $this->input->post('region');
            
            $provincias   = $this->dropdown_model->provincias($region);
            
            foreach($provincias as $fila)
            {
            ?>
            <option value="<?=$fila->PROVINCIA_ID;?>">
                <?=$fila->PROVINCIA_NOMBRE;?>
            </option>
            <?php
            }
        }
    }
    
    /**************************************************************************/
    /** @Funcion que permite cargar las comunas segun 
    /** provincia seleccionada
    /**************************************************************************/
    public function llena_comunas(){
        
        $options = "";
        
        if($this->input->post('provincia'))
        {
            $provincia = $this->input->post('provincia');
            
            $comunas   = $this->dropdown_model->comunas($provincia);
            
            foreach($comunas as $fila)
            {
            ?>
            <option value="<?=$fila->COMUNA_ID;?>">
                <?=$fila->COMUNA_NOMBRE;?>
            </option>
            <?php
            }
        }
    }
}
