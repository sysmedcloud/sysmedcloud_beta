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
                                     <!--<div class="panel-options">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#tab-1">Antecentes Clínicos / Anamnésis Remota</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-2">Revisión por Sistemas</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-3">Examen Físico General</a></li>
                                       </ul>
                                    </div>-->
                                    <div class="row">
                                      <div class="col-lg-12">
                                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                          <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                              <h4 class="panel-title" >
                                                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Antecedentes Clínicos / Anamnésis Remota
                                                </a>
                                              </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                              <div class="panel-body">
                                                  <h3>En Construcción...</h3>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                              <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Revisión por Sistemas
                                                </a>
                                              </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                              <div class="panel-body">
                                                  <h3>En Construcción...</h3>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                              <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  <i class="fa fa-sort-desc" aria-hidden="true"></i>&nbsp;&nbsp;Examen Físico General
                                                </a>
                                              </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                              <div class="panel-body">
                                                <h3>En Construcción...</h3>
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
                                                            <textarea class="form-control" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Anamnésis Próxima: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                        <label for="title" class="col-xs-12 col-md-3 col-sm-3">
                                                            Hipótesis Diagnóstica: </label>
                                                        <div style="margin-bottom: 5px;" class="col-xs-12 col-md-9 col-sm-9">
                                                        <div class='input-group'>
                                                            <textarea class="form-control" cols="90" rows="1"></textarea>
                                                        </div>
                                                        </div>
                                                  </div>
                                                </div>
                                            </div>
                                    </div>
                                      </div>
                                    </div>
                                 </div>
                                
                                 <!--<div class="panel-body">
                                    <div class="tab-content">
                                       <div id="tab-1" class="tab-pane active">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    tab 1
                                                </div>
                                            </div>
                                       </div>
                                       <div id="tab-2" class="tab-pane">                                          
                                            <div class="row">
                                                <div class="col-md-12">
                                                    tab 2
                                                </div>
                                            </div>
                                       </div>
                                       <div id="tab-3" class="tab-pane">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    tab 3
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                 </div>-->
                                 
                                 
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