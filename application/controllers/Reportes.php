<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        $this->load->model('gestion_model', 'gestion');
        //Cargamos todas las librerias que utilizaremos
         $this->load->library(array(
            'form_validation',  //funciones para los formularios
            'session',          //iniciar session
            'fileclass',        //control css y js para cada pagina
            'general_sessions', //Validar datos de session
            'data_empresa',     //informacion de la empresa
            'gestion_view',     //controlar vistas
            'templates',        //libreria de plantillas
            'pdf'));            //Libreria PDF
            
        //Cargamos todos los helper que utilizaremos
        $this->load->helper(array('url','form','html','funciones_system'));
    }
    
    public function index()
    {
        $this->reportes();
    }
    
    /**************************************************************************/
    /** @Function que permite retornar pagina de inicio
    /**************************************************************************/
    public function reportes(){
        
        //Cargamos las variables de session (LIBRERIA)
        $data["session"]    =   $this->general_sessions->validarSessionAdmin();
        
        //CARGAR ARCHIVOS CSS Y JS (LIBRERIA)
        $data['files'] = $this->fileclass->files_reportes();
        $data["menu"]   = "Reportes";
        $data["active"]     = activeMenu("reportes");//(HELPERS)marca menu (active)
                
        //CARGAMOS LAS VISTAS NECESARIAS (VIEW - LIBRERIA)
        $this->gestion_view->defaultAdminView("reportes_view",$data);
    }

     /**************************************************************************/
    /** @Functions que permiten generar PDF's con reportes
    /**************************************************************************/

    public function reporte_medicamentos(){

        // Carga de datos
        $data_meds = $this->gestion->get_medicamentos();
        $tmp_meds = $this->templates->tmp_reporte_medicamentos($data_meds);

        // Generacion de PDF
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Sysmedcloud');
        $pdf->SetTitle('Reporte de Medicamentos');
        $pdf->SetSubject('');
        $pdf->SetKeywords('');
        $pdf->SetHeaderData('logo.png', PDF_HEADER_LOGO_WIDTH+20, 'Reporte', 'Medicamentos', array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
        $pdf->setFontSubsetting(true); 
        $pdf->SetFont('Helvetica', '', 8, '', true);
        $pdf->AddPage();
        $pdf->writeHTML($tmp_meds, true, 0, true, 0); 
        $nombre_archivo = utf8_decode("reporte-medicamentos-".date("d")."_".date("m")."_".date("Y").".pdf");
        $pdf->Output($nombre_archivo, 'I');   
    }
}
