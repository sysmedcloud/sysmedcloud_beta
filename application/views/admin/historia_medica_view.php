<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Historia Clínica ID# N° 2343<small></small></h5>
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
               <form method="POST" action="<?=base_url();?>paciente_admin/recibirDatosEdit" class="form-horizontal">
                  <input type="hidden" id="id_data_usuario" name="id_usuario" value="<?=$paciente["id_usuario"];?>">
                  <input type="hidden" id="id_usuario" name="id_usuario" value="<?=$paciente["id_usuario"];?>">
                  <div class="form-group">
                     <div class="col-sm-3" style="text-align:justify;">
                        <a href="#" class="thumbnail">
                        <img src="<?=base_url();?>img/sin-foto.png" class="img-thumbnail" alt="imagen usuario">
                        </a>                         
                        <hr>
                        <span>
                           La <b>historia clínica electrónica (HCE)</b>, también denominada historia clínica informatizada (HCI), 
                           es el registro mecanizado de los datos sociales, preventivos y médicos de un paciente, 
                           obtenidos de forma directa o indirecta y constantemente puestos al día, es el conjunto 
                           de documentos (tanto escritos como gráficos) que contienen los datos, valoraciones e informaciones de cualquier índole, 
                           sobre la situación y la evolución clínica de un paciente a lo largo del proceso asistencial.
                           <br><br>
                           <a href="https://es.wikipedia.org/wiki/Historia_cl%C3%ADnica_electr%C3%B3nica" title="link de referencia" target="_blanck" >
                           https://es.wikipedia.org/wiki/Historia_cl%C3%ADnica_electr%C3%B3nica
                           </a>
                           <hr>
                        </span>
                     </div>
                     <div class="col-sm-9">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="panel blank-panel">
                                  
                                 <div class="panel-heading">
                                    <div class="panel-options">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#tab-1">Datos Filiatorios</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-2">Ant. Familiares</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-3">Ant. Sociales y Personales</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-4">Personas de Contacto</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="panel-body">
                                    <div class="tab-content">
                                       <div id="tab-1" class="tab-pane active">
                                          <a class="btn btn-default" role="button" data-toggle="collapse" href="#datosPersonales" aria-expanded="false" aria-controls="collapseExample">
                                          Ver Datos Personales
                                          </a>
                                          <div class="collapse" id="datosPersonales">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <strong>R.U.T</strong>
                                                   <input type="text" disabled="true" name="rut" placeholder="no informado" class="form-control" value="<?=$paciente["rut"];?>">
                                                   <?=form_error('rut','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Primer nombre</strong>
                                                   <input type="text" disabled="true" name="p_nombre" placeholder="no informado" class="form-control " value="<?=$paciente["primer_nombre"];?>">
                                                   <?=form_error('p_nombre','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Segundo nombre</strong>
                                                   <input type="text" disabled="true" name="s_nombre" placeholder="no informado" class="form-control" value="<?=$paciente["segundo_nombre"];?>">
                                                   <?=form_error('s_nombre','<div class="text-danger">','</div>');?>
                                                </div>
                                             </div>
                                             &nbsp;
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <strong>Apellido paterno</strong>
                                                   <input type="text" disabled="true" name="a_paterno" placeholder="no informado" class="form-control " value="<?=$paciente["apellido_paterno"];?>">
                                                   <?=form_error('a_paterno','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Apellido materno</strong>
                                                   <input type="text" disabled="true" name="a_materno" placeholder="no informado" class="form-control " value="<?=$paciente["apellido_materno"];?>">
                                                   <?=form_error('a_materno','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <?php
                                                      //Validar genero
                                                      $v_masculino = $paciente["genero"] == "M" ?  true : false;
                                                      $v_femenino  = $paciente["genero"] == "F" ? true : false;
                                                      
                                                      $js     = 'id="genero" disabled="true"';
                                                      $rd_mas =  form_radio('genero', 'M',$v_masculino,$js);
                                                      
                                                      $js2    = 'id="genero" disabled="true"';
                                                      $rd_fem =  form_radio('genero', 'F',$v_femenino,$js);
                                                      
                                                      ?>
                                                   <strong>Genero</strong><br>
                                                   <label class="radio-inline i-checks"> 
                                                   <?=$rd_mas;?> Masculino
                                                   </label> 
                                                   <label class="radio-inline i-checks">
                                                   <?=$rd_fem;?> Femenino
                                                   </label>
                                                   <?=form_error('genero','<div class="text-danger">','</div>');?>
                                                </div>
                                             </div>
                                             &nbsp;
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <strong>Telefono (fijo)</strong>
                                                   <input type="text" disabled="true" name="telefono_f" placeholder="no informado" class="form-control " value="<?=$paciente["telefono"];?>">
                                                   <?=form_error('telefono_f','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Telefono celular</strong>
                                                   <input type="text" disabled="true" name="celular" placeholder="no informado" class="form-control " value="<?=$paciente["celular"];?>">
                                                   <?=form_error('celular','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Correo</strong>
                                                   <input type="text" disabled="true" name="correo" placeholder="no informado" class="form-control " value="<?=$paciente["email"];?>">
                                                   <?=form_error('correo','<div class="text-danger">','</div>');?>
                                                </div>
                                             </div>
                                             &nbsp;
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <strong>Estado Civil</strong>
                                                   <?=form_dropdown('estado_civil',$est_civil,$paciente["id_estado_civil"],'class="form-control m-b" disabled="true"');?>
                                                   <?=form_error('estado_civil','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Fecha Nac. ( día / mes /año )</strong>
                                                   <input type="text" disabled="true" name="fecha_nac" class="form-control " data-mask="99/99/9999" placeholder="no informado" value="<?=$paciente["fecha_nac"];?>">
                                                   <!-- <span class="help-block">( día / mes /año )</span> -->
                                                   <?=form_error('fecha_nac','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Lugar de Nacimiento</strong>
                                                   <input type="text" disabled="true" name="lugar_nac" class="form-control " placeholder="no informado" value="<?=$paciente["lugar_nac"];?>">
                                                   <?=form_error('lugar_nac','<div class="text-danger">','</div>');?>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <strong>Religión</strong>
                                                   <?=form_dropdown('religion',$religiones,$paciente["id_religion"],'class="form-control m-b" disabled="true"');?>
                                                   <?=form_error('religion','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>País de residencia</strong>
                                                   <?=form_dropdown('pais_res',$paises,$paciente["nacionalidad"],'class="form-control m-b " disabled="true"');?>
                                                   <?=form_error('pais_res','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Fecha / hora Creación</strong>
                                                   <input type="text" disabled="true" name="fecha_creacion" id="fecha_creacion" class="form-control " data-mask="99/99/9999" placeholder="no informado" value="<?=$paciente["fecha_creacion"];?>">
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <strong>Prev. Médica:</strong>
                                                   <?=form_dropdown('prevision',$prev_med,$paciente["id_prevision"],'class="form-control m-b" disabled="true"');?>
                                                   <?=form_error('prevision','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Ocupación:</strong>
                                                   <?=form_dropdown('ocupacion',$ocupaciones,$paciente["id_ocupacion"],'class="form-control m-b" disabled="true"');?>
                                                   <?=form_error('ocupacion','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Niv. Estudios</strong>
                                                   <?=form_dropdown('niv_estudios',$niv_estudios,$paciente["id_nivel_estudio"],'class="form-control m-b" disabled="true"');?>
                                                   <?=form_error('n_estudio','<div class="text-danger">','</div>');?>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <strong>Región</strong>
                                                   <?=form_dropdown('region',$regiones,$paciente["id_region"],'id="region" class="form-control m-b" disabled="true"');?>
                                                   <?=form_error('region','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Provincia</strong>
                                                   <?=form_dropdown('provincia',$provincias,$paciente["id_provincia"],'id="provincia" class="form-control m-b" disabled="true"');?>
                                                   <?=form_error('provincia','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Comuna</strong>
                                                   <?=form_dropdown('comuna',$comunas,$paciente["id_comuna"],'id="comuna" class="form-control m-b" disabled="true"');?>
                                                   <?=form_error('comuna','<div class="text-danger">','</div>');?>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-8">
                                                   <strong>Calle / Pasaje / Villa</strong>
                                                   <input type="text" disabled="true" name="calle" placeholder="no informado" class="form-control " value="<?=$paciente["calle"];?>">
                                                   <?=form_error('calle','<div class="text-danger">','</div>');?>
                                                </div>
                                                <div class="col-md-4">&nbsp;</div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-2" class="tab-pane">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <textarea 
                                                    name="ant_familiares" 
                                                    placeholder="En esta sección se precisan enfermedades que presenten o hayan presentado familiares cercanos como los padres y hermanos, por la posibilidad que algunas de ellas tengan transmisión por herencia. Es este sentido es importante investigar la presencia de hipertensión, diabetes mellitus, alteraciones de los lípidos, antecedentes de enfermedades coronarias, cánceres de distinto tipo (p.ej.: de mama o colon), enfermedades cerebrovasculares, alergias, asma, trastornos psiquiátricos, enfermedades genéticas y otras (gota, hemofilia, etc.)."
                                                    id="ant_familiares" 
                                                    class="form-control" 
                                                    cols="92" 
                                                    rows="10" ></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-3" class="tab-pane">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <textarea 
                                                    name="ant_soc_personales" 
                                                    placeholder="En esta sección se investigan aspectos personales del paciente que permitan conocerlo mejor. La intención es evaluar y comprender cómo su enfermedad lo afecta y qué ayuda podría llegar a necesitar en el plano familiar, de su trabajo, de su previsión, de sus relaciones interpersonales."
                                                    id="ant_soc_personales" 
                                                    class="form-control" 
                                                    cols="92" 
                                                    rows="10" ></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-4" class="tab-pane">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="table-responsive">
                                                   <table class="table table-striped">
                                                      <thead>
                                                         <tr>
                                                            <th>Nombres</th>
                                                            <th>Apellidos</th>
                                                            <th>Parentesco</th>
                                                            <th>Telefono</th>
                                                            <th>Correo</th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td>Cristian Alejandro</td>
                                                            <td>Vidal Muñoz</td>
                                                            <td>padre</td>
                                                            <td>56954323456</td>
                                                            <td>john@example.com</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Mary</td>
                                                            <td>Moe</td>
                                                            <td>padre</td>
                                                            <td>56954323456</td>
                                                            <td>mary@example.com</td>
                                                         </tr>
                                                         <tr>
                                                            <td>July</td>
                                                            <td>Dooley</td>
                                                            <td>padre</td>
                                                            <td>56954323456</td>
                                                            <td>july@example.com</td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Antecedentes Clinicos Del Paciente</h4>
                                        </div>
                                    </div>
                                     <div class="panel-options">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#tab-m">Morbidos</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-g">Ginecoobst.</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-h">Habitos</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-med">Medicamentos</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-a">Alergias</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-i">Inmunizaciones</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="panel-body">
                                    <div class="tab-content">
                                       <div id="tab-m" class="tab-pane active">
                                            <div class="row">
                                               <div class="col-md-12">
                                                  <textarea 
                                                      name="ant_familiares" 
                                                      placeholder="En esta parte se deben precisar las enfermedades, operaciones y traumatismos que el paciente ha tenido a lo largo de su vida. Por supuesto, se precisarán aquellas patologías que sean más significativas."
                                                      id="ant_familiares" 
                                                      class="form-control" 
                                                      cols="92" 
                                                      rows="10" ></textarea>
                                               </div>
                                            </div>
                                       </div>
                                       <div id="tab-g" class="tab-pane">
                                            <div class="row">
                                               <div class="col-md-12">
                                                  <textarea 
                                                      name="annt_ginecoobstetricos" 
                                                      placeholder="En las mujeres se debe precisar: Edad de la primera menstruación espontánea (menarquia), Edad en la que la mujer dejó en forma natural de menstruar (menopausia), Características de las menstruaciones, Presencia de otros flujos vaginales, Información de los embarazos, Métodos anticonceptivos y Otras informaciones."
                                                      id="annt_ginecoobstetricos" 
                                                      class="form-control" 
                                                      cols="92" 
                                                      rows="10" ></textarea>
                                               </div>
                                            </div>
                                       </div>
                                       <div id="tab-h" class="tab-pane">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <textarea 
                                                    name="habitos" 
                                                    placeholder="Entre los hábitos que se investigan destacan: El hábito de fumar (tabaquismo), La ingesta de bebidas alcohólicas, Tipo de alimentación y Uso de drogas no legales"
                                                    id="habitos" 
                                                    class="form-control" 
                                                    cols="92" 
                                                    rows="10" ></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-med" class="tab-pane">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <textarea 
                                                      name="medicamentos" 
                                                      placeholder="Es importante identificar qué medicamentos está tomando el paciente y en qué cantidad. En algunos casos, también se deben indicar los fármacos que el paciente recibió en los días o semanas anteriores."
                                                      id="medicamentos" 
                                                      class="form-control" 
                                                      cols="92" 
                                                      rows="10" ></textarea>
                                             </div>
                                          </div>
                                       </div>
                                        <div id="tab-a" class="tab-pane">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <textarea 
                                                      name="alergias" 
                                                      placeholder="El tema de las alergias es muy importante ya que puede tener graves consecuencias para la persona. Entre los alergenos, que son las sustancias ante las cuales se desencadenan las respuestas alérgicas, hay varios que se deben investigar: Medicamentos, Alimentos, Sustancias que entran en contacto con la piel y Picaduras de insectos."
                                                      id="alergias" 
                                                      class="form-control" 
                                                      cols="92" 
                                                      rows="10" ></textarea>
                                             </div>
                                          </div>
                                       </div>
                                        <div id="tab-i" class="tab-pane">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <textarea 
                                                      name="inmunizaciones" 
                                                      placeholder="Según el cuadro clínico que presente el paciente puede ser importante señalar las inmunizaciones que el paciente ha recibido."
                                                      id="inmunizaciones" 
                                                      class="form-control" 
                                                      cols="92" 
                                                      rows="10" ></textarea>
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
                                 &nbsp;
                                 <div class="row">
                                    <div class="col-md-6">
                                       <button class="btn btn-white" type="button">Mis pacientes</button>
                                       &nbsp;&nbsp;
                                       <button class="btn btn-primary" type="submit">Guardar</button>
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
<script>
   //Función para añadir un nuevo input file
   function newFile(){
       
       var html = '<div id="group_'+$("#contador").val()+'"><div class="row"><hr>'+
                   '<div class="col-md-4">'+
                      '<strong>Nombres</strong>'+
                      '<input type="hidden" name="pc_ids[]" id="pc_ids[]" value="">'+
                      '<input type="text" name="pc_nombres[]" id="pc_nombres" class="form-control m-b " value="">'+
                  '</div>'+
                   '<div class="col-md-4">'+
                      '<strong>Apellidos</strong>'+
                      '<input type="text" name="pc_apellidos[]" id="pc_apellidos" class="form-control m-b " value="">'+
                   '</div>'+
                    '<div class="col-md-4">'+
                      '<strong>Familiaridad</strong>'+
                      '<select class="form-control m-b " id="factorn_rh" name="familiariodad[]">'+
                      '<option selected="selected" value="">Seleccione un parentesco</option>'+
                      '<option value="1">Padres</option>'+
                      '<option value="2">Hijos</option>'+
                      '<option value="3">Cónyuge</option>'+
                      '<option value="4">Suegro</option>'+
                      '<option value="5">Yerno/nuera</option>'+
                      '<option value="6">Abuelos</option>'+
                      '<option value="7">Nietos</option>'+
                      '<option value="8">Hermanos</option>'+
                      '<option value="9">Cuñados</option>'+
                      '<option value="10">Bisabuelos Y Bisnietos</option>'+
                      '<option value="11">Tíos Y Sobrinos</option>'+
                      '<option value="12">Primos Y Tíos Abuelos</option>'+
                      '</select>'+
                   '</div>'+
                '</div>'+
                 '<div class="row">'+
                   '<div class="col-md-4">'+
                      '<strong>Telefono/Celular</strong>'+
                      '<input type="text" name="pc_telefono[]" id="pc_telefono" class="form-control m-b " value="">'+
                   '</div>'+
                   '<div class="col-md-4">'+
                      '<strong>Correo</strong>'+
                      '<input type="text" name="pc_correo[]" id="pc_correo" class="form-control m-b " value="">'+
                   '</div>'+
                    '<div class="col-md-4">'+
                        '<br>'+
                        '<a href="javascript:;" title="Eliminar contacto" onclick="deleteFile('+$("#contador").val()+');" id="delete_'+$("#contador").val()+'" class="delete btn btn-danger">Eliminar Contacto<i class="fa fa-fw fa-times"></i></a>'+
                    '</div>'+
                '</div></div>';
                
       $("#inFiles").append(html);
       var cont = $("#contador").val()+1;
       $("#contador").val(cont);
       //Si el contador es igual a 5 se bloquea el boton añadir nuevo input
       if(cont == 5){
           $("#plus").addClass("disabled");
           $("#msj").html("&nbsp; *Maximo de archivos permitidos!.");
       }
   
   }
   
   //Eliminar un input de archivo
   function deleteFile(num){
       $("#group_"+num+"").remove();
       cont = cont - 1;
      if(cont < 5){
           $("#plus").removeClass("disabled");
           $("#msj").html("");
       }
   }
</script>