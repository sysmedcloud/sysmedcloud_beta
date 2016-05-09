<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Crear Nueva Consulta Médica <small>todos los campos obligatorios tienen la etiqueta (*).</small></h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-wrench"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                     <li><a href="#">Config option 1</a>
                     </li>
                     <li><a href="#">Config option 2</a>
                     </li>
                  </ul>
                  <a class="close-link">
                  <i class="fa fa-times"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">
               <form method="POST" action="<?=base_url();?>consulta_medica/recibirDatos" class="form-horizontal">
                  <div class="form-group">
                     <!--<label clas<s="col-sm-2 control-label">
                     <img src="<?=base_url();?>img/sin-foto.png" class="img-thumbnail" alt="imagen usuario">
                     </label>-->
                    <div class="col-sm-12">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="panel blank-panel">
                                <div class="panel-heading">
                                     <div class="row">
                                        <div class="col-lg-12">
                                                <label class="col-sm-3"  for="title">Busqueda por RUT del paciente: </label>
                                                &nbsp;
                                                <div class="col-sm-5">
                                                    <input type='text' placeholder="Ingrese RUT o DNI de un paciente" class="form-control" />
                                                </div>
                                                &nbsp;
                                                <div class="col-sm-3">
                                                    <button class="btn btn-info" type="button" ><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Buscar Paciente</button>
                                                </div>
                                        </div>
                                    </div>
                                     &nbsp;
                                    <div class="row">
                                         <div class="col-lg-12">
                                            <div class="col-lg-3">
                                                <a href="#" class="thumbnail" style="height: 140px;">
                                                    <img src="<?=base_url();?>img/sin-foto.png" style="width: 140px;left:0;right:0;margin-left:auto;" class="img-thumbnail" alt="imagen usuario">
                                                </a>
                                            </div>
                                             
                                            <div class="col-lg-8">
                                                <label for="title">Rut del paciente: </label>&nbsp; 
                                                <br>
                                                <label for="title">Nombre Completo: </label>&nbsp; 
                                                <br>
                                                <label for="title">Sexo: </label>&nbsp; 
                                                <br>
                                                <label for="title">Edad: </label>&nbsp; 
                                                <br>
                                                <label for="title">Nacionalidad: </label>&nbsp; 
                                                <br>
                                                <label for="title">Estado Civil: </label>&nbsp; 
                                            </div>
                                         </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="pill" href="#motivo_consulta">Motivo</a></li>
                                                <li><a data-toggle="pill" href="#anamnesis_proxima">A. Próx.</a></li>
                                                <li><a data-toggle="pill" href="#anamnesis_remota">A. Remota</a></li>
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        R. por Sist.
                                                    <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#rs_gen">Revisíon por Sistemas / <b>Síntomas Generales</b></a></li>
                                                        <li><a href="#rs_resp">Revisíon por Sistemas / <b>Respiratorio</b></a></li>
                                                        <li><a href="#rs_card">Revisíon por Sistemas / <b>Cardiovascular</b></a></li>
                                                        <li><a href="#rs_gast">Revisíon por Sistemas / <b>Gastroinstestinal</b></a></li>
                                                        <li><a href="#rs_geni">Revisíon por Sistemas / <b>Genitourinario</b></a></li>
                                                        <li><a href="#rs_neuro">Revisíon por Sistemas / <b>Neurológico</b></a></li>
                                                        <li><a href="#rs_endo">Revisíon por Sistemas / <b>Endocrino</b></a></li>
                                                        <li><a href="#rs_arch_doc">Revisíon por Sistemas / <b>Archivos y Documentos</b></a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        E. Físico
                                                    <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#ex_decubito">Examen Físico / <b>Decúbito</b></a></li>
                                                      <li><a href="#ex_deambu">Examen Físico / <b>Deambulación</b></a></li>
                                                      <li><a href="#ex_facie">Examen Físico / <b>Facie</b></a></li>
                                                      <li><a href="#ex_conciencia">Examen Físico / <b>Conciencia</b></a></li>
                                                      <li><a href="#ex_const">Examen Físico / <b>Constitución</b></a></li>
                                                      <li><a href="#ex_piel">Examen Físico / <b>Piel</b></a></li>
                                                      <li><a href="#ex_s_linfa">Examen Físico / <b>S. Linfático</b></a></li>
                                                      <li><a href="#ex_resp">Examen Físico / <b>Respiración</b></a></li>
                                                      <li><a href="#ex_temp">Examen Físico / <b>Temperatura</b></a></li>
                                                      <li><a href="#ex_pres_pul">Examen Físico / <b>Presion y Pulso</b></a></li>
                                                      <li><a href="#ex_arch_doc">Examen Físico / <b>Archivos y Documentos</b></a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        E. Físico S.
                                                    <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#">Examen Físico Segmentario / <b></b></a></li>
                                                    </ul>
                                                </li>
                                                <li><a data-toggle="pill" href="#diagnostico">Diagnostico</a></li>
                                                <li><a data-toggle="pill" href="#tratamiento">Tratamiento</a></li>
                                                <li><a data-toggle="pill" href="#obs_recomendaciones">Obs.</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="motivo_consulta" class="tab-pane fade in active">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Motivo Consulta Médica
                                                    </h4>
                                                    <textarea class="form-control" id="motivo" name="motivo" cols="90" rows="6"></textarea>
                                                </div>
                                                <div id="anamnesis_proxima" class="tab-pane fade">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Anamnesis Próxima
                                                    </h4>
                                                    <textarea class="form-control" id="anamnesis" name="anamnesis" cols="90" rows="6"></textarea>
                                                </div>
                                                <div id="anamnesis_remota" class="tab-pane fade">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Anamnesis Remota
                                                    </h4>
                                                    <div class="alert alert-info">
                                                        <h4>
                                                            La Anamnesis Remota se enfoca en constatar los antecedentes del paciente.  
                                                            En esta, se deben consignar en orden cronológico todas las enfermedades, hospitalizaciones, cirugías, etc., 
                                                            que el paciente haya padecido, y que sean relevantes en cuanto al diagnóstico.
                                                        </h4>
                                                    </div>
                                                    
                                                </div>
                                                <div id="diagnostico" class="tab-pane fade">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Hipótesis Diagnóstico
                                                    </h4>
                                                    <textarea class="form-control" id="diagnostico" name="diagnostico" cols="90" rows="6"></textarea>
                                                </div>
                                                <div id="tratamiento" class="tab-pane fade">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Tratamiento
                                                    </h4>
                                                    <textarea class="form-control" id="tratamiento" name="tratamiento" cols="90" rows="6"></textarea>
                                                </div>
                                                <div id="biometria" class="tab-pane fade">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Biometría / Exploración Física
                                                    </h4>
                                                </div>
                                                <div id="archivos_documentos" class="tab-pane fade">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Archivos y Documentos
                                                    </h4>
                                                    
                                                </div>
                                                <div id="obs_recomendaciones" class="tab-pane fade">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Observaciones / Recomendaciones
                                                    </h4>
                                                    <textarea class="form-control" id="observaciones" name="observaciones" cols="90" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="col-md-12">
                                  <?php
                    
                                    //Mensaje tipo flashdata - datos de acceso son incorrectos
                                    $validaUser = $this->session->flashdata('usuario_existe');
                                    
                                    if ($validaUser){ ?>
                                        <div class="alert alert-warning" role="alert">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                            <?=$validaUser;?>
                                        </div>
                                    <?php } ?> 
                                    
                                   <?php 
                                      if(validation_errors()){

                                      ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Recuerda completar todos los campos que sean obligatorios.
                                        <br>
                                        Asegúrate de ingresar todos los datos correctamente.
                                        <br>
                                        <a class="alert-link" href="#">¡Inténtelo otra vez!</a>.
                                    </div>
                                   <?php } ?> 
                                </div>
                                 
                                 <div class="hr-line-dashed"></div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <button class="btn btn-white" type="button">Cancelar</button>
                                       &nbsp;&nbsp;
                                       <button class="btn btn-primary" type="submit">Crear Consulta Médica</button>
                                    </div>
                                    <div class="col-md-6">&nbsp;</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>