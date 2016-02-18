<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*******************************************************************************
* 
* MODELO QUE PERMITE RETORNAR INFORMACION NECESARIA PARA CREAR 
* SELECT (DROPDOWN) UTILIZADAS EN LAS VISTAS DEL SISTEMA
* ADEMAS TIENES FUNCIONES QUE SON UTLIZADAS EN ALGUNAS SENTECIAS AJAX
* 
*******************************************************************************/
class dropdown_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }	
    
    /***************************************************************************
    * @Funcion que permite retornar todos los paises #@dropdown paises@# 
    ***************************************************************************/
    function cargarPaises(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para los paises
        $data = array();
        //valor por defecto del select instituciones
        $data['']='Seleccione un país';
        //cargamos todas los paises
        $db_emp->select('p.cod_pais,p.nombre');
        $db_emp->from('tbl_paises p');
        $db_emp->order_by("p.nombre", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->cod_pais] = ucwords(mb_strtolower($row->nombre,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las regiones #@dropdown regiones@# 
    ***************************************************************************/
    function cargarRegiones(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para los paises
        $data = array();
        //valor por defecto del select instituciones
        $data['']='Seleccione una región';
        //cargamos todas las regiones
        $db_emp->select('r.REGION_ID,r.REGION_NOMBRE');
        $db_emp->from('tbl_region r');
        $db_emp->order_by("r.REGION_NOMBRE", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->REGION_ID] = ucwords(mb_strtolower($row->REGION_NOMBRE,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las provincias #@dropdown provincias@# 
    ***************************************************************************/
    function cargarProvincias(){
        
	$db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para los paises
        $data = array();
        //valor por defecto del select provincias
        $data['']='Seleccione una provincia';
        //cargamos todas las provincias
        $db_emp->select('p.PROVINCIA_ID,p.PROVINCIA_NOMBRE');
        $db_emp->from('tbl_provincia p');
        $db_emp->order_by("p.PROVINCIA_NOMBRE", "asc");
        
        foreach($db_emp->get()->result() as $row){
            //agregamos datos a nuestro array
            $data[$row->PROVINCIA_ID] = ucwords(mb_strtolower($row->PROVINCIA_NOMBRE,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las comunas #@dropdown comunas@# 
    ***************************************************************************/
    function cargarComunas(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para las comunas
        $data = array();
        //valor por defecto del select comunas
        $data['']='Seleccione una comuna';
        //cargamos todas las provincias
        $db_emp->select('c.COMUNA_ID,c.COMUNA_NOMBRE');
        $db_emp->from('tbl_comuna c');
        $db_emp->order_by("c.COMUNA_NOMBRE", "asc");
        
        foreach($db_emp->get()->result() as $row){
            //agregamos datos a nuestro array
            $data[$row->COMUNA_ID] = ucwords(mb_strtolower($row->COMUNA_NOMBRE,'utf-8'));  
        }       
        return $data;
    }
    
    
    //Otras funcionalidades
    public function provincias($provincia){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        $db_emp->where('PROVINCIA_REGION_ID',$provincia);
        $db_emp->order_by('PROVINCIA_NOMBRE','asc');
        $comunas = $db_emp->get('tbl_provincia');
        
        if($comunas->num_rows()>0)
        {
            return $comunas->result();
        }
    }
    
    public function comunas($provincia){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        $db_emp->where('COMUNA_PROVINCIA_ID',$provincia);
        $db_emp->order_by('COMUNA_NOMBRE','asc');
        $comunas = $db_emp->get('tbl_comuna');
        
        if($comunas->num_rows()>0)
        {
            return $comunas->result();
        }
    }
    
    
    /***************************************************************************
    * @Funcion que permite retornar todos las proviciones medicas 
    ***************************************************************************/
    function cargarPrevisiones(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para las previsiones medicas
        $data = array();
        //valor por defecto del select previsiones medicas
        $data['']='Seleccione una previsión';
        //cargamos todas las previsiones medicas
        $db_emp->select('pm.id_prevision_medica,pm.prevision_medica');
        $db_emp->from('tbl_previsiones_medicas pm');
        $db_emp->order_by("pm.prevision_medica", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_prevision_medica] = ucwords(mb_strtolower($row->prevision_medica,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos los parentescos familiares
    ***************************************************************************/
    function cargarParentescos(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para las previsiones medicas
        $data = array();
        //valor por defecto del select previsiones medicas
        $data['']='Seleccione un parentesco';
        //cargamos todas las previsiones medicas
        $db_emp->select('p.id_parentesco,p.parentesco');
        $db_emp->from('tbl_parentescos p');
        $db_emp->order_by("p.id_parentesco", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_parentesco] = ucwords(mb_strtolower($row->parentesco,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos los estados civiles
    ***************************************************************************/
    function cargarEstCivil(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para los estados civiles
        $data = array();
        //valor por defecto del select estado civiles
        $data['']='Seleccione una estado civil';
        //cargamos todas las previsiones medicas
        $db_emp->select('e.id_estado_civil,e.estado_civil');
        $db_emp->from('tbl_estado_civil e');
        $db_emp->order_by("e.estado_civil", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_estado_civil] = ucwords(mb_strtolower($row->estado_civil,'utf-8'));  
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las ocupaciones
    ***************************************************************************/
    function cargarOcupaciones(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para los estados civiles
        $data = array();
        //valor por defecto del select estado civiles
        $data['']='Seleccione una ocupación';
        //cargamos todas las previsiones medicas
        $db_emp->select('o.cod_ocupacion,o.descripcion');
        $db_emp->from('tbl_ocupaciones o');
        $db_emp->order_by("o.descripcion", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->cod_ocupacion] = ucfirst(mb_strtolower($row->descripcion,'utf-8'));
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos los niveles de estudios
    ***************************************************************************/
    function cargarNivelesEst(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para los niveles de estudios
        $data = array();
        //valor por defecto del select niveles de estudios
        $data['']='Seleccione nivel de estudio';
        //cargamos todas los niveles de estudios
        $db_emp->select('id_nivel_estudio,nivel_estudio');
        $db_emp->from('tbl_niveles_estudios');
        $db_emp->order_by("id_nivel_estudio", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_nivel_estudio] = ucwords(mb_strtolower($row->nivel_estudio,'utf-8')); 
        }       
        return $data;
    }
    
    /***************************************************************************
    * @Funcion que permite retornar todos las religiones
    ***************************************************************************/
    function cargarReligiones(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para las religiones
        $data = array();
        //valor por defecto del select religiones
        $data['']='Seleccione Religión';
        //cargamos todas las religiones
        $db_emp->select('id_religion,religion');
        $db_emp->from('tbl_religiones');
        $db_emp->order_by("id_religion", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_religion] = ucwords(mb_strtolower($row->religion,'utf-8')); 
        }       
        return $data;
    }
    /***************************************************************************
    * @Funcion que permite retornar todos los grupos sanguineos
    ***************************************************************************/
    function cargarGrSanguineos(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para los gr. sanguineos
        $data = array();
        //valor por defecto del select grupos sanguineos
        $data['']='Seleccione Grupo Sanguíneo';
        //cargamos todas las religiones
        $db_emp->select('id_grupo_sanguineo,grupo_sanguineo');
        $db_emp->from('tbl_grupos_sanguineos');
        $db_emp->order_by("id_grupo_sanguineo", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_grupo_sanguineo] = strtoupper(mb_strtolower($row->grupo_sanguineo,'utf-8')); 
        }       
        return $data;
    }
    /***************************************************************************
    * @Funcion que permite retornar todos los factores RH
    ***************************************************************************/
    function cargarFactoresRH(){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //creamos array para los gr. sanguineos
        $data = array();
        //valor por defecto del select grupos sanguineos
        $data['']='Seleccione Factor RH';
        //cargamos todas las religiones
        $db_emp->select('id_factor_rh,factor_rh');
        $db_emp->from('tbl_factores_rh');
        $db_emp->order_by("factor_rh", "asc");
        
        foreach($db_emp->get()->result() as $row){
            // agregamos datos a nuestro array
            $data[$row->id_factor_rh] = ucfirst(mb_strtolower($row->factor_rh,'utf-8')); 
        }       
        return $data;
    }
}	