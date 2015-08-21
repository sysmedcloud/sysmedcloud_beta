<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paciente_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    
    /***************************************************************************
    /** @Funtion que permite retornar los datos personales del usuario
    /**************************************************************************/
    function info_personal($nom_bd,$id_usuario)
    {
        //cargamos los datos del usuario
        $this->db->select('
            u.id_usuario,
            u.username,
            du.rut,
            du.primer_nombre,
            du.segundo_nombre,
            du.apellido_paterno,
            du.apellido_materno,
            du.telefono,
            du.celular,
            du.genero,
            du.email,
            du.nacionalidad,
            du.id_region,
            du.id_provincia,
            du.id_comuna,
            du.calle,
            du.imagen,
            du.fecha_nac');
        $this->db->from('tbl_usuarios u');
        $this->db->join('tbl_data_usuarios du','du.id_usuario = u.id_usuario');
        //$this->db->join('tbl_paises p','p.id_pais = pa.id_pais');
        $this->db->where('u.id_usuario',$id_usuario);
        
        $datos = $this->db->get();
        
        if ($datos->num_rows() > 0)
        {
            return $datos->row();
            
        }else{
            
            redirect(base_url()."login_app/accion/logout");
        }
    }
    /***************************************************************************
    /** @Funtion que permite validar la existencia de un usuario tipo paciente
    /**************************************************************************/
    public function validarUsuario($id_empresa,$rut){
        
        //Query para validar existencia del usuario perfil paciente
        $this->db->select("u.id_usuario");
        $this->db->from('tbl_data_usuarios du');
        $this->db->join('tbl_usuarios u','du.id_usuario = u.id_usuario');
        $this->db->where('u.id_perfil',4);
        $this->db->where('u.id_empresa',$id_empresa);
        $this->db->where('du.rut',$rut);
        $datos = $this->db->get();
        
        return $datos->num_rows();
    }
    /***************************************************************************
    /** @Funtion que permite ingresar un nuevo usuario perfil paciente
    /**************************************************************************/
    public function anadirUsuario($data){
        
        //VALIDAR SI EXISTE UN USUARIO TIPO PACIENTE CON EL MISMO RUT
        $validaUser = $this->validarUsuario($data["id_empresa"],$data["rut"]);
        
        if ($validaUser > 0){
            
            //Este rut (paciente) ya ha sido ingresado al sistema
            $mensaje = 'El R.U.T. ingresado ya se encuentra registrado en el sistema.
                        <br>
                        Asegúrate de verificar bien los datos ingresados.
                        <br>
                        Valida la existencia de el usuario recientemente ingresado
                        desde este link <a href="'.base_url().'/paciente_admin/listadoPacientes">Ver Mis Pacientes</a>.
                        <br>
                        <a class="alert-link" href="#">¡Inténtelo otra vez!</a>.';
            
            $this->session->set_flashdata('usuario_existe',$mensaje);
            
            redirect(base_url().'paciente_admin/RegistrarPaciente');
            
        }else{
            
            //INGRESAR NUEVO USUARIO TIPO PACIENTE
            
            //obtiene fecha y hora segun zona horaria
            @date_default_timezone_set("America/Santiago");
            $fecha = @date("Y-m-d G:i:s");
            
            //crear arreglo con datos del nuevo usuario
            $dataUser = array(
                "id_empresa"        => $data["id_empresa"],
                "id_perfil"         => $data["id_perfil"],
                "username"          => $data["username"],
                "password"          => $data["password"],
                "estado"            => $data["estado"],
                "creado_por"        => $data["creado_por"],
                "fecha_creacion"    => $fecha
            );
            
            //Crear nuevo usuario tipo paciente
            $insert_user    = $this->db->insert('tbl_usuarios',$dataUser);
            
            //Retorna ultimo id ingresado
            return $id_usuario = $this->db->insert_id();
        }
        
    }
    /***************************************************************************
    /** @Funtion que permite registrar a un nuevo paciente
    /**************************************************************************/
    public function registrarPaciente($dataForm){
        
        /*antes de registrar un paciente en la base de datos se debe crear
        * un nuevos usuario tipo paciente en la base de datos de acceso */
        $data["id_usuario"]          = $dataForm["id_new_user"];
        $data['rut']                 = $dataForm["rut"];
        $data['primer_nombre']       = $dataForm["p_nombre"];
        $data['segundo_nombre']      = $dataForm["s_nombre"];
        $data['apellido_paterno']    = $dataForm["a_paterno"];
        $data['apellido_materno']    = $dataForm["a_materno"];
        $data['telefono']            = $dataForm["telefono_f"];
        $data['celular']             = $dataForm["celular"];
        $data['genero']              = $dataForm["genero"];
        $data['email']               = $dataForm["correo"];
        $data['nacionalidad']        = $dataForm["pais_res"];
        $data['id_region']           = $dataForm["region"];
        $data['id_provincia']        = $dataForm["provincia"];
        $data['id_comuna']           = $dataForm["comuna"];
        $data['calle']               = $dataForm["calle"];
        $data['imagen']              = "";//esto esta pendiente
        $data['fecha_nac']           = $dataForm["fecha_nac"];
        $data['id_estado_civil']     = $dataForm["estado_civil"];             
        $data['lugar_nac']           = $dataForm["lugar_nac"];
        $data['id_religion']         = $dataForm["religion"];
        $data['id_prevision']        = $dataForm["prevision"];
        $data['id_ocupacion']        = $dataForm["ocupacion"];
        $data['id_nivel_estudio']    = $dataForm["niv_estudios"];
        $data['id_grupo_sang']       = $dataForm["grupo_sang"];
        $data['id_factorn_rh']       = $dataForm["factorn_rh"];
        
        //registrar nuevo paciente
        $insert_paciente = $this->db->insert('tbl_data_usuarios',$data);
        
        //Validar ingreso de nuevo paciente
        $res = $insert_paciente == true ? true : redirect(base_url()."errors");
        
        //Validar ingreso del nuevo paciente
        if($res){
            
            //CREAR  NUEVA HISTORIA MEDICA PARA EL NUEVO PACIENTE
            $res = $this->anadirHistoriaClinica($dataForm["id_new_user"]);
            
            return $res;
            
        }else{
            
            redirect(base_url()."errors");
        }
    }
    /***************************************************************************
    /** @Funtion que permite crear una nueva historia medica
    /**************************************************************************/
    public function anadirHistoriaClinica($id_paciente){
        
        //Coneccion con base de datos de la empresa
        $DB  = $this->load->database($this->session->userdata('db_name'),TRUE);
                
        //obtiene fecha y hora segun zona horaria
        @date_default_timezone_set("America/Santiago");
        $fecha = @date("Y-m-d G:i:s");
        
        //datos a ingresar
        $data['id_paciente']        = $id_paciente;       
        $data["fecha_creacion"]     = $fecha;
        
        //registrar nueva historia medica
        return $insert_paciente = $DB->insert('tbl_historias_medicas',$data);
        
    }
    /***************************************************************************
    /** @Funtion que permite retornar un json con info de los pacientes
    /**************************************************************************/
    public function listadoPacientes_json($id_empresa){
        
        //Query para obtener listado de pacientes
        $this->db->select("u.id_usuario,
        du.rut,
        du.primer_nombre,
        du.segundo_nombre,
        du.apellido_paterno,
        du.apellido_materno,
        du.telefono,
        du.celular,
        du.email,
        u.fecha_creacion,
        du.fecha_nac
        ");
        $this->db->from('tbl_data_usuarios du');
        $this->db->join('tbl_usuarios u','du.id_usuario = u.id_usuario');
        $this->db->where('u.id_perfil',4);
        $this->db->where('u.estado',0);
        $this->db->where('u.id_empresa',$id_empresa);
        $this->db->order_by("u.id_usuario", "asc");
        $datos = $this->db->get();
        
        $arr_data   = array();//CREAR ARREGLO QUE TENDRA LA INFORMACION
        $response   = array();//CREAR ARREGLO DEL JSON
        
        if($datos->num_rows() > 0 ){
            
            //Recorrer resultado query
            foreach ($datos->result() as $row){
                
                //Creamos nuestras variables
                $nombres    = ucfirst($row->primer_nombre)." ".ucfirst($row->segundo_nombre);
                $apellidos  = ucfirst($row->apellido_paterno)." ".ucfirst($row->apellido_materno);
                $edad       = 22;
                $celular    = $row->celular == "" ? "Sin info." :  $row->celular;
                $email      = $row->email == "" ? "Sin info." : $row->email;
                
                $fecha      = explode(" ",$row->fecha_creacion);
                $fecha_c    = strtotime($fecha[0]);
                $fecha_c    = date('d/m/Y',$fecha_c);//cambiar formato de la fecha
                
                $fecha_nac  = $row->fecha_nac;
                $fecha_nac  = explode(" ",$fecha_nac);
                $fecha_nac  = @$fecha_nac[0];//Fecha de nacimiento
                $edad       = calcularEdad($fecha_nac) == "2015" ? "Sin info." : calcularEdad($fecha_nac); 
                
                $fa_editar  = '<a href="#" title="Editar Información"><i class="fa fa-pencil-square-o"></i></a>';
                $fa_view    = '<a href="#" title="Ver Información"><i class="fa fa-eye"></i></a>';
                $fa_delete  = '<a href="#" title="Eliminar Paciente"><i class="fa fa-times"></i></a>';
                
                //Crear arreglo con los datos del paciente
                $arr_paciente[] = array(
                    "fecha_creacion"    => $fecha_c,
                    "rut"               => $row->rut,
                    "nombres"           => $nombres,
                    "apellidos"         => $apellidos,
                    "edad"              => $edad,
                    "celular"           => $celular,
                    "email"             => $email,
                    "editar"            => $fa_editar,
                    "view"              => $fa_view,
                    "delete"            => $fa_delete
                );
            }
            
            //RETORNAR JSON CON LA INFORMACION DEL PACIENTE
            //$response['data'] = $arr_paciente;
            $arr_data = $arr_paciente;
            echo json_encode($arr_paciente); 
            
        }else{
            
            //RETORNAR JSON VACIO
            //$response['data'] = $arr_data;
            echo json_encode($arr_data);
        }
    }
}	