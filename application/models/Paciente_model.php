<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paciente_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }    
    /***************************************************************************
    /** @Funtion que permite validar la existencia de un usuario tipo paciente
    /**************************************************************************/
    public function validarUsuario($id_empresa,$rut){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //Query para validar existencia del usuario perfil paciente
        $db_emp->select("u.id_usuario");
        $db_emp->from('tbl_usuarios du');
        $db_emp->join('smc_access_data.tbl_usuarios u','du.id_usuario = u.id_usuario');
        $db_emp->where('u.id_perfil',4);
        $db_emp->where('u.id_empresa',$id_empresa);
        $db_emp->where('du.rut',$rut);
        $datos = $db_emp->get();
        
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
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);

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
        $insert_paciente = $db_emp->insert('tbl_usuarios',$data);
        
        //ultimo id ingresado
        $id_paciente = $db_emp->insert_id();
        
        //Validar ingreso de nuevo paciente
        $res = $insert_paciente == true ? true : redirect(base_url()."errors");
        
        //Validar ingreso del nuevo paciente
        if($res){
            
            //AGREGAR PERSONAS DE CONTACTO
            foreach ($dataForm['p_contactos'] as $contacto) {
                
                $arr_contacto = array(
                    "id_paciente"   => $id_paciente,
                    "nombres"       => $contacto["nombre"],
                    "apellidos"     => $contacto["apellido"],
                    "id_parentesco" => $contacto["familiariodad"],
                    "telefono"      => $contacto["telefono"],
                    "correo"        => $contacto["correo"]
                );
                
                $db_emp->insert('tbl_personas_contacto',$arr_contacto);
            }
            
            //CREAR  NUEVA HISTORIA MEDICA PARA EL NUEVO PACIENTE
            $res = $this->anadirHistoriaClinica($id_paciente);
            
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
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
                
        //obtiene fecha y hora segun zona horaria
        @date_default_timezone_set("America/Santiago");
        $fecha = @date("Y-m-d G:i:s");
        
        //datos a ingresar
        $data['id_paciente']        = $id_paciente;       
        $data["fecha_creacion"]     = $fecha;
        
        //registrar nueva historia medica
        return $insert_paciente = $db_emp->insert('tbl_historias_medicas',$data);
        
    }
        /***************************************************************************
    /** @Funtion que permite retornar los datos de un paciente
    /**************************************************************************/
    function datos_paciente($id_paciente)
    {
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
                
        //cargamos los datos del usuario
        $db_emp->select('
            u.id_usuario,
            du.rut,
            du.primer_nombre,
            du.segundo_nombre,
            du.apellido_paterno,
            du.apellido_materno,
            du.fecha_nac,
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
            du.fecha_nac,
            du.lugar_nac,
            p.nombre as nacionalidad,
            r.REGION_NOMBRE as region,
            pr.PROVINCIA_NOMBRE as provincia,
            c.COMUNA_NOMBRE as comuna,
            e.estado_civil,
            rg.religion,
            pm.prevision_medica,
            o.descripcion as ocupacion,
            ne.nivel_estudio,
            gr.grupo_sanguineo,
            rh.factor_rh
            ');
        $db_emp->from('smc_access_data.tbl_usuarios u');
        $db_emp->join('tbl_usuarios du','du.id_usuario = u.id_usuario');
        $db_emp->join('tbl_paises p','p.cod_pais = du.nacionalidad','left');
        $db_emp->join('tbl_region r','r.REGION_ID = du.id_region','left');
        $db_emp->join('tbl_provincia pr','pr.PROVINCIA_ID = du.id_provincia','left');
        $db_emp->join('tbl_comuna c','c.COMUNA_ID = du.id_comuna','left');
        $db_emp->join('tbl_estado_civil e','e.id_estado_civil = du.id_estado_civil','left');
        $db_emp->join('tbl_religiones rg','rg.id_religion = du.id_religion','left');
        $db_emp->join('tbl_previsiones_medicas pm','pm.id_prevision_medica = du.id_prevision','left');
        $db_emp->join('tbl_ocupaciones o','o.cod_ocupacion = du.id_ocupacion','left');
        $db_emp->join('tbl_niveles_estudios ne','ne.id_nivel_estudio = du.id_nivel_estudio','left');
        $db_emp->join('tbl_grupos_sanguineos gr','gr.id_grupo_sanguineo = du.id_grupo_sang','left');
        $db_emp->join('tbl_factores_rh rh','rh.id_factor_rh = du.id_factorn_rh','left');
        $db_emp->where('u.id_usuario',$id_paciente);
        $datos = $db_emp->get();
        
        if($datos->num_rows() > 0){
            
            //calcular edad del paciente
            $fecha_nac  = $datos->row()->fecha_nac;
            $fecha_nac  = explode(" ",$fecha_nac);
            $fecha_nac  = @$fecha_nac[0];//Fecha de nacimiento
            $edad       = calcularEdad($fecha_nac) == "2015" ? "Sin info." : calcularEdad($fecha_nac); 

            //Validar otras variables
            $rut            = $datos->row()->rut == "" ? "Sin info": $datos->row()->rut;
            $p_nombre       = $datos->row()->primer_nombre == "" ? "Sin info." : $datos->row()->primer_nombre;
            $s_nombre       = $datos->row()->segundo_nombre == "" ? "Sin info." : $datos->row()->segundo_nombre;
            $a_peterno      = $datos->row()->apellido_paterno == "" ? "Sin info." : $datos->row()->apellido_paterno;
            $a_materno      = $datos->row()->apellido_materno == "" ? "Sin info." : $datos->row()->apellido_materno;
            $genero         = $datos->row()->genero == "M" ? "Masculino" : "Femenino";
            $email          = $datos->row()->email == "" ? "Sin info." : $datos->row()->email;
            $telefono       = $datos->row()->telefono == "" ? "Sin info." : $datos->row()->telefono;
            $celular        = $datos->row()->celular == "" ? "Sin info." : $datos->row()->celular;
            $lugar_nac      = $datos->row()->lugar_nac == "" ? "Sin info." : $datos->row()->lugar_nac;
            $estado_civil   = $datos->row()->estado_civil == "" ? "Sin info." : $datos->row()->estado_civil;
            $religion       = $datos->row()->religion == "" ? "Sin info." : $datos->row()->religion;
            $prevision      = $datos->row()->prevision_medica == "" ? "Sin info." : $datos->row()->prevision_medica;
            $nacionalidad   = $datos->row()->nacionalidad == "" ? "Sin info." : $datos->row()->nacionalidad;
            $nivel_estudio  = $datos->row()->nivel_estudio == "" ? "Sin info.": $datos->row()->nivel_estudio;
            $ocupacion      = $datos->row()->ocupacion == "" ? "Sin info." : $datos->row()->ocupacion;
            $region         = $datos->row()->region == "" ? "Sin info." : $datos->row()->region;
            $provincia      = $datos->row()->provincia == "" ? "Sin info." : $datos->row()->provincia;
            $comuna         = $datos->row()->comuna == "" ? "Sin info" : $datos->row()->comuna;
            $calle          = $datos->row()->calle  == "" ? "Sin info." : $datos->row()->calle;
            $gr_sang        = $datos->row()->grupo_sanguineo == "" ? "Sin info." : $datos->row()->grupo_sanguineo;
            $factor_rh      = $datos->row()->factor_rh == "" ? "Sin info." : $datos->row()->factor_rh;
            
            //Buscar personas de contacto
            $db_emp->select('pc.id_persona_contacto,pc.nombres,pc.apellidos,p.parentesco,pc.telefono,pc.correo');
            $db_emp->from('tbl_personas_contacto pc');
            $db_emp->join('tbl_parentescos p','p.id_parentesco = pc.id_parentesco');
            $db_emp->where('pc.id_paciente',$datos->row()->id_usuario);
            $personas_contacto = $db_emp->get()->result_array();
            
            $arr_paciente = array(
                "rut"               => $rut,
                "primer_nombre"     => ucfirst($p_nombre),
                "segundo_nombre"    => ucfirst($s_nombre),
                "apellido_paterno"  => ucfirst($a_peterno),
                "apellido_materno"  => ucfirst($a_materno),
                "genero"            => $genero,
                "edad"              => $edad,
                "email"             => $email,
                "estado_civil"      => ucfirst($estado_civil),
                "telefono"          => $telefono,
                "celular"           => $celular,
                "religion"          => ucfirst($religion),
                "prevision"         => ucfirst($prevision),
                "nacionalidad"      => ucfirst($nacionalidad),
                "nivel_estudio"     => ucfirst($nivel_estudio),
                "lugar_nac"         => $lugar_nac,
                "fecha_nac"         => cambiaf_a_normal($fecha_nac), 
                "ocupacion"         => ucfirst($ocupacion),
                "region"            => ucfirst($region),
                "provincia"         => ucfirst($provincia),
                "comuna"            => ucfirst($comuna),
                "calle"             => ucfirst($calle),
                "grupo_sang"        => ucfirst($gr_sang),
                "factor_rh"         => ucfirst($factor_rh),
                "personas_contacto" => $personas_contacto
            );
            
            echo json_encode($arr_paciente); 
            
        }else{
            
            $arr_paciente = array(); 
            echo json_encode($arr_paciente);
        }
    }
    /***************************************************************************
    /** @Funtion que permite retornar un json con info de los pacientes
    /**************************************************************************/
    public function listadoPacientes_json($id_empresa){
        
        $db_emp  = $this->load->database($this->session->userdata('db_name'),TRUE);
        
        //Query para obtener listado de pacientes
        $db_emp->select("u.id_usuario,
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
        $db_emp->from('tbl_usuarios du');
        $db_emp->join('smc_access_data.tbl_usuarios u','du.id_usuario = u.id_usuario');
        $db_emp->where('u.id_perfil',4);
        $db_emp->where('u.estado',0);
        $db_emp->where('u.id_empresa',$id_empresa);
        $db_emp->order_by("u.id_usuario", "asc");
        $datos = $db_emp->get();
        
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
                $fa_view    = '<a href="#" title="Ver Información" onclick="ver_datos_paciente('.$row->id_usuario.');" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>';
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