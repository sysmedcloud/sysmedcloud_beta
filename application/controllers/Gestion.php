<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        //Cargar modelo utilizado en este CI
        $this->load->model('Gestion_model', 'gestion');
        
        //Cargamos todas las librerias que utilizaremos
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
        $this->gestion();
    }
    
    /**************************************************************************/
    /** @Function que permite retornar pagina de inicio
    /**************************************************************************/
    public function gestion(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files']  = $this->fileclass->files_gestion();
        
        $data["menu"]   = "Gestión de Datos";
        
        $data["active"] = activeMenu("gestion");//(HELPERS)marca menu (active)
                
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("gestion_view",$data);
    }

   
    function ajax()
        {   

            switch(@$_POST['case'])
            {
                case 1: // Ver / Editar Informacion
                    switch (@$_POST['tipo']) {
                        case '1': 
                            # Alergias
                            $r = $this->gestion->get_alergias();
                            
                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                            
                            $html.= '    <th>Nombre</th>';
                            $html.= '    <th>Alergeno Detectado</th>';               
                            $html.= '    <th>Zona Afectada</th>';  
                            $html.= '    <th>Sintomatología</th>';
                            $html.= '    <th>Indicaciones</th>';
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_alergia => $val_alergia) {
                                $html.= '<tr>';
                                $html.= '  <td>'.$val_alergia['nombre_alergia'].'</td>';
                                $html.= '  <td>'.$val_alergia['alergeno_detectado'].'</td>';
                                $html.= '  <td>'.$val_alergia['zona_afectada'].'</td>';
                                $html.= '  <td>'.$val_alergia['sintomatologia'].'</td>';
                                $html.= '  <td>'.$val_alergia['indicaciones'].'</td>';
                                $html.= '  <td align="center"><button class="btn btn-primary btn-circle"><i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-primary btn-circle"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  

                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));

                            break;
                        case '2': 
                            # Patologías
                            $r = $this->gestion->get_patologias();                         

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                           
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_patologia => $val_patologia) {
                                $html.= '<tr>';                                
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                   
                            break;
                        case '3': 
                            # Medicamentos
                            $r = $this->gestion->get_medicamentos();

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                    
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_meds => $val_meds) {
                                $html.= '<tr>';                          
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '4': 
                            # Vacunas
                            $r = $this->gestion->get_vacunas(); //Falta tabla

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                    
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_alergia => $val_alergia) {
                                $html.= '<tr>';                         
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '5': 
                            # Tratamientos
                            $r = $this->gestion->get_tratamientos(); // Falta tabla

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                     
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_alergia => $val_alergia) {
                                $html.= '<tr>';                            
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                           echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        case '6': 
                            # Diagnósticos
                            $r = $this->gestion->get_diagnosticos();

                            $html= '<table class="table table-bordered" text-align="left">';
                            $html.= '<thead>';
                            $html.= '<tr>';                                                 
                            $html.= '    <th>Ver</th>';
                            $html.= '    <th>Editar</th>';    
                            $html.= '</tr>';
                            $html.= '</thead>';
                            $html.= '<tbody>';
                            foreach ($r as $key_diag => $val_diag) {
                                $html.= '<tr>';                            
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></td>';
                                $html.= '  <td align="center"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                                $html.= '</tr>'; 
                            }                            
                            $html.= '</tbody>';
                            $html.= '</table>';  
                            echo json_encode(array("html" => $html, "tipo" => @$_POST['tipo']));
                            break;
                        default:
                            # Error
                            echo json_encode("Error al procesar su solicitud");
                            break;
                    };                    
                break;
                case 2: // Ingreso de Informacion
                    # code...
                    break;
                case 3: // Eliminacion de Informacion
                    # code...
                    break;
                default:
                    # Error
                echo json_encode("Error al procesar su solicitud");
                    break;
            }
            
        }
}
