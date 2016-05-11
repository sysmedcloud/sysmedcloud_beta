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
                                                <li><a data-toggle="pill" href="#r_sistema">R. por Sist.</a></li>
                                                <li><a data-toggle="pill" href="#e_fisico">E. Físico</a></li>
                                                <li><a data-toggle="pill" href="#e_fisico_s">E. Físico S.</a></li>
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
                                                    <p>
                                                        La Anamnesis Remota se enfoca en constatar los antecedentes del paciente.  
                                                        En esta, se deben consignar en orden cronológico todas las enfermedades, hospitalizaciones, cirugías, etc., 
                                                        que el paciente haya padecido, y que sean relevantes en cuanto al diagnóstico.
                                                    </p>                                                    
                                                </div>
                                                <div id="r_sistema" class="tab-pane fade">
                                                    &nbsp;
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a data-toggle="tab" href="#rs_1">Síntomas Generales<b></b></a></li>
                                                        <li><a data-toggle="tab" href="#rs_2">Respiratorio<b></b></a></li>
                                                        <li><a data-toggle="tab" href="#rs_3">Cardiovascular</a></li>
                                                        <li><a data-toggle="tab" href="#rs_4">Gastroinstestinal</a></li>
                                                        <li><a data-toggle="tab" href="#rs_5">Genitourinario</a></li>
                                                        <li><a data-toggle="tab" href="#rs_6">Neurológico</a></li>
                                                        <li><a data-toggle="tab" href="#rs_7">Endocrino</a></li>
                                                        <li><a data-toggle="tab" href="#rs_8">Archivos y Documentos</a></li>
                                                    </ul>
                                                    
                                                    <div class="tab-content">
                                                        <div id="rs_1" class="tab-pane fade in active">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Síntomas Generales
                                                            </h4>
                                                            <div class="col-sm-6">
                                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                                <br>
                                                                Puede agregar un comentario adicional para mayor información
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks"> 
                                                                        <input type="checkbox" name="sg_fiebre" id="sg_fiebre"> Fiebre
                                                                    </label> 
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks">
                                                                        <input type="checkbox" name="sg_trans_peso" id="sg_trans_peso"> Transtornos de Peso
                                                                    </label>
                                                                </div>
                                                                
                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks">
                                                                        <input type="checkbox" name="sg_malestar_gen" id="sg_malestar_gen"> Malestar General
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks">
                                                                        <input type="checkbox" name="sg_problemas_ape" id="sg_problemas_ape"> Problemas con el apetito
                                                                    </label>
                                                                </div>
                                                                
                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks">
                                                                        <input type="checkbox" name="sg_sudoracion_n" id="sg_sudoracion_n"> Sudoración Nocturna
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks">
                                                                        <input type="checkbox" name="sg_insomnio" id="sg_insomnio"> Insomnio
                                                                    </label>
                                                                </div>
                                                                
                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks">
                                                                        <input type="checkbox" name="sg_angustia" id="sg_angustia"> Angustia
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks">
                                                                        <input type="checkbox" name="sg_otros" id="sg_otros"> Otros Sintomas
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div class="col-sm-12">
                                                                &nbsp;
                                                                Comentarios Adicionales:
                                                                &nbsp;
                                                                <textarea class="form-control" id="sg_comentarios" name="anamnesis" cols="90" rows="4"></textarea>
                                                            </div>
                                                                
                                                        </div>
                                                        <div id="rs_2" class="tab-pane fade">
                                                          &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Respiratorio
                                                            </h4>
                                                            <p>Contenido...</p>
                                                        </div>
                                                        <div id="rs_3" class="tab-pane fade">
                                                          &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Cardiovascular
                                                            </h4>
                                                            <p>Contenido...</p>
                                                        </div>
                                                        <div id="rs_4" class="tab-pane fade">
                                                          &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Gastroinstestinal
                                                            </h4>
                                                            <p>Contenido...</p>
                                                        </div>
                                                        <div id="rs_5" class="tab-pane fade">
                                                          &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Genitourinario
                                                            </h4>
                                                            <p>Contenido...</p>
                                                        </div>
                                                        <div id="rs_6" class="tab-pane fade">
                                                          &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Neurológico
                                                            </h4>
                                                            <p>Contenido...</p>
                                                        </div>
                                                        <div id="rs_7" class="tab-pane fade">
                                                          &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Endocrino
                                                            </h4>
                                                            <p>Contenido...</p>
                                                        </div>
                                                        <div id="rs_8" class="tab-pane fade">
                                                          &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Archivos y Documentos
                                                            </h4>
                                                            <p>Contenido...</p>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div id="e_fisico" class="tab-pane fade">
                                                    &nbsp;
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a data-toggle="tab" href="#ef_1">Decúbito</a></li>
                                                        <li><a data-toggle="tab" href="#ef_2">Deambulación</a></li>
                                                        <li><a data-toggle="tab" href="#ef_3">Facie</a></li>
                                                        <li><a data-toggle="tab" href="#ef_4">Conciencia</a></li>
                                                        <li><a data-toggle="tab" href="#ef_5">Constitución</a></li>
                                                        <li><a data-toggle="tab" href="#ef_6">Piel</a></li>
                                                        <li><a data-toggle="tab" href="#ef_7">S. Linfático</a></li>
                                                        <li><a data-toggle="tab" href="#ef_8">Respiración</a></li>
                                                        <li><a data-toggle="tab" href="#ef_9">Temperatura</a></li>
                                                        <li><a data-toggle="tab" href="#ef_10">Presion y Pulso</a></li>
                                                        <li><a data-toggle="tab" href="#ef_11">Archivos y Documentos</a></li>                                                        
                                                    </ul>
                                                    
                                                    <div class="tab-content">
                                                        <div id="ef_1" class="tab-pane fade in active">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Decúbito
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_2" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Deambulación
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_3" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Facie
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_4" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Conciencia
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_5" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Constitución
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_6" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Piel
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_7" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / S. Linfático
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_8" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Respiración
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_9" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Temperatura
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_10" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Presion y Pulso
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_11" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Archivos y Documentos
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                     </div>
                                                </div>
                                                <div id="e_fisico_s" class="tab-pane fade">
                                                    &nbsp;
                                                    <h4 style="color:#21B9BB;">
                                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                                        Examen Físico Segmentado
                                                    </h4>
                                                    <p>Contenido...</p>
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