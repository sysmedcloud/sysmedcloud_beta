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
                                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                          <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                              <h4 class="panel-title" >
                                                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Información adicional
                                                </a>
                                              </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                              <div class="panel-body">
                                                 <ul class="nav nav-tabs">
                                                    <li class="dropdown">
                                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Antecedentes Clínicos / Anamnésis Remota <b class="caret"></b></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-toggle="tab" href="#tab1">Mórbidos</a></li>
                                                            <li><a data-toggle="tab" href="#tab2">Ginecoobstétricos</a></li>
                                                            <li><a data-toggle="tab" href="#tab3">Hábitos</a></li>
                                                            <li><a data-toggle="tab" href="#tab4">Medicamentos</a></li>
                                                            <li><a data-toggle="tab" href="#tab5">Alergias</a></li>
                                                            <li><a data-toggle="tab" href="#tab6">Social y Personales</a></li>
                                                            <li><a data-toggle="tab" href="#tab7">Familiares</a></li>
                                                            <li><a data-toggle="tab" href="#tab8">Inmunizaciones</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Revisión por Sistemas <b class="caret"></b></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-toggle="tab" href="#tab9">Síntomas Generales</a></li>
                                                            <li><a data-toggle="tab" href="#tab10">Respiratorio</a></li>
                                                            <li><a data-toggle="tab" href="#tab11">Cardiovascular</a></li>
                                                            <li><a data-toggle="tab" href="#tab12">Gastrointestinal</a></li>
                                                            <li><a data-toggle="tab" href="#tab13">Genitourinario</a></li>
                                                            <li><a data-toggle="tab" href="#tab14">Neurológico</a></li>
                                                            <li><a data-toggle="tab" href="#tab15">Endocrino</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Examen Físico General <b class="caret"></b></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-toggle="tab" href="#tab16">Decúbito</a></li>
                                                            <li><a data-toggle="tab" href="#tab17">Deambulación</a></li>
                                                            <li><a data-toggle="tab" href="#tab18">Facie</a></li>
                                                            <li><a data-toggle="tab" href="#tab19">Conciencia</a></li>
                                                            <li><a data-toggle="tab" href="#tab20">Constitución</a></li>
                                                            <li><a data-toggle="tab" href="#tab21">Piel</a></li>
                                                            <li><a data-toggle="tab" href="#tab22">S. Linfático</a></li>
                                                            <li><a data-toggle="tab" href="#tab23">Respiración</a></li>
                                                            <li><a data-toggle="tab" href="#tab24">Temperatura</a></li>
                                                            <li><a data-toggle="tab" href="#tab25">Presion y Pulso</a></li>
                                                        </ul>
                                                    </li>
                                                  </ul>
                                                  <div class="tab-content">
                                                    <!-- in active -->
                                                    <div class="tab-pane in active">
                                                        <div class="col-xs-12 col-md-12">
                                                            <br>
                                                            <div class="thumbnail" style="border: 0px;">
                                                                <img class="img-responsive" src="<?php echo base_url();?>img/logo.png" alt="SysMedCloud" title="SysMedCloud">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tab1" class="tab-pane fade">
                                                        <div class="col-xs-12 col-md-12 col-sm-12">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Mórbidos
                                                            </h4>
                                                            <hr>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Enfermedades: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="enfermedades" name="enfermedades" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Traumatismos: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="traumatismos" name="traumatismos" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Operaciones: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="operaciones" name="operaciones" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div id="tab2" class="tab-pane fade">
                                                      <div class="col-xs-12 col-md-12 col-sm-12">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Ginecoobstétricos
                                                            </h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div id="tab3" class="tab-pane fade">
                                                        <div class="col-xs-12 col-md-12 col-sm-12">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Hábitos
                                                            </h4>
                                                            <hr>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Tabaquismo: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="tabaquismo" name="tabaquismo" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Alcoholismo: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="alcoholismo" name="alcoholismo" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Drogas: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="drogas" name="drogas" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Desórdenes Alimenticios: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="des_alimenticios" name="des_alimenticios" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div id="tab4" class="tab-pane fade">
                                                      <div class="col-xs-12 col-md-12 col-sm-12">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Medicamentos
                                                            </h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div id="tab5" class="tab-pane fade">
                                                        <div class="col-xs-12 col-md-12 col-sm-12">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Alergias
                                                            </h4>
                                                            <hr>
                                                        </div>
                                                        <label class="col-xs-12 col-md-3 col-sm-3">
                                                            Alimentos: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="alimentos" name="alimentos" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Medicamentos: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="medicamentos" name="medicamentos" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Ambiente: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="ambiente" name="ambiente" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Animales: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="animales" name="animales" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Contacto con la Piel: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="contacto_piel" name="contacto_piel" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div id="tab6" class="tab-pane fade">
                                                      <div class="col-xs-12 col-md-12 col-sm-12">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Sociales y Personales
                                                            </h4>
                                                            <hr>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Breve descripción de antecedentes sociales relevantes: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="sociales_personales" name="sociales_personales" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div id="tab7" class="tab-pane fade">
                                                      <div class="col-xs-12 col-md-12 col-sm-12">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Familiares
                                                            </h4>
                                                            <hr>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Breve descripción de antecedentes familiares relevantes: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="familiares" name="familiares" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div id="tab8" class="tab-pane fade">
                                                      <div class="col-xs-12 col-md-12 col-sm-12">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Inmunizaciones
                                                            </h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    
                                                    <div id="tab9" class="tab-pane fade">
                                                      <h1>Antecedentes Síntomas Generales</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab10" class="tab-pane fade">
                                                      <h1>Antecedentes Respiratorio</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab11" class="tab-pane fade">
                                                      <h1>Antecedentes Cardiovascular</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab12" class="tab-pane fade">
                                                      <h1>Antecedentes Gastrointestinal</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab13" class="tab-pane fade">
                                                      <h1>Antecedentes Genitourinario</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab14" class="tab-pane fade">
                                                      <h1>Antecedentes Neurológico</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab15" class="tab-pane fade">
                                                      <h1>Antecedentes Endocrino</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    
                                                    <div id="tab16" class="tab-pane fade">
                                                      <h1>Antecedentes Decúbito</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab17" class="tab-pane fade">
                                                      <h1>Antecedentes Deambulación</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab18" class="tab-pane fade">
                                                      <h1>Antecedentes Facie</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab19" class="tab-pane fade">
                                                      <h1>Antecedentes Conciencia</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab20" class="tab-pane fade">
                                                      <h1>Antecedentes Constitución</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab21" class="tab-pane fade">
                                                      <h1>Antecedentes Piel</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab22" class="tab-pane fade">
                                                      <h1>Antecedentes S. Linfático</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab23" class="tab-pane fade">
                                                      <h1>Antecedentes Respiración</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab24" class="tab-pane fade">
                                                      <h1>Antecedentes Temperatura</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    <div id="tab25" class="tab-pane fade">
                                                      <h1>Antecedentes Presion y Pulso</h1>
                                                      <br>
                                                      <h2>En Construcción...</h2>
                                                    </div>
                                                    
                                                  </div>
                                              </div>
                                            </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingMotivo">
                                                  <h4 class="panel-title" >
                                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMotivo" aria-expanded="true" aria-controls="collapseMotivo">
                                                          <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Motivo de la Consulta / Diagnóstico Clínico Preliminar
                                                    </a>
                                                  </h4>
                                                </div>
                                                <div id="collapseMotivo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingMotivo">
                                                  <div class="panel-body">
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Motivo de la Consulta: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="motivo_consulta" name="motivo_consulta" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Anamnésis Próxima: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="anamnesis_proxima" name="anamnesis_proxima" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Hipótesis Diagnóstica: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" id="hipotesis_diagnostica" name="hipotesis_diagnostica" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                  </div>
                                                </div>
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