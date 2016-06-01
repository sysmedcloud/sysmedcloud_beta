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
                                                            <div class="col-sm-7">
                                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks"> 
                                                                            <input type="checkbox" name="sg_fiebre" id="sg_fiebre">&nbsp;&nbsp;Fiebre
                                                                        </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="sg_trans_peso" id="sg_trans_peso">&nbsp;&nbsp;Transtornos de Peso
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="sg_malestar_gen" id="sg_malestar_gen">&nbsp;&nbsp;Malestar General
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="sg_problemas_ape" id="sg_problemas_ape">&nbsp;&nbsp;Problemas con el apetito
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="sg_sudoracion_n" id="sg_sudoracion_n">&nbsp;&nbsp;Sudoración Nocturna
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="sg_insomnio" id="sg_insomnio">&nbsp;&nbsp;Insomnio
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="sg_angustia" id="sg_angustia">&nbsp;&nbsp;Angustia
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="sg_otros" id="sg_otros">&nbsp;&nbsp;Otros Sintomas
                                                                        </label>
                                                                    </div>
                                                                </div>                                                                
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Puedes agregar un comentario adicional.
                                                                    <hr>
                                                                    <textarea class="form-control" id="sg_comentarios" name="sg_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="rs_2" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Respiratorio
                                                            </h4>
                                                            <div class="col-sm-7">
                                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks"> 
                                                                            <input type="checkbox" name="resp_disnea" id="resp_disnea">&nbsp;&nbsp;Disnea
                                                                        </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="resp_tos" id="resp_tos">&nbsp;&nbsp;Tos
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="resp_exp" id="resp_exp">&nbsp;&nbsp;Expectoración
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="resp_hemop" id="resp_hemop">&nbsp;&nbsp;Hemoptisis
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="resp_p_costado" id="resp_p_costado">&nbsp;&nbsp;Puntada de Costado
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="resp_obs_br" id="resp_obs_br">&nbsp;&nbsp;Obstrucción bronquial
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="resp_otros" id="resp_otros">&nbsp;&nbsp;Otros Sintomas
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            &nbsp;
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Puedes agregar un comentario adicional.
                                                                    <hr>
                                                                    <textarea class="form-control" id="resp_comentarios" name="resp_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="rs_3" class="tab-pane fade">
                                                           &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Cardiovascular
                                                            </h4>
                                                            <div class="col-sm-7">
                                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks"> 
                                                                            <input type="checkbox" name="card_dis_esf" id="card_dis_esf">&nbsp;&nbsp;Disnea de Esfuerzo
                                                                        </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="card_ortopnea" id="card_ortopnea">&nbsp;&nbsp;Ortopnea
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="card_dis_parox_noc" id="card_dis_parox_noc">&nbsp;&nbsp;Disnea Paroxística Nocturna
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="card_edema_ext_inf" id="card_edema_ext_inf">&nbsp;&nbsp;Edema de extremidades interiores
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="card_dolor_preco" id="card_dolor_preco">&nbsp;&nbsp;Dolor Precordial
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="card_otros" id="card_otros">&nbsp;&nbsp;Otros Sintomas
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Puedes agregar un comentario adicional.
                                                                    <hr>
                                                                    <textarea class="form-control" id="card_comentarios" name="card_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="rs_4" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Gastroinstestinal
                                                            </h4>
                                                            <div class="col-sm-7">
                                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks"> 
                                                                            <input type="checkbox" name="gast_p_ape" id="gast_p_ape">
                                                                            &nbsp;&nbsp;Problemas de Apetito
                                                                        </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="gast_nausas" id="gast_nausas">
                                                                            &nbsp;&nbsp;Nausas
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="gast_vomitos" id="gast_vomitos">
                                                                                &nbsp;&nbsp;Vomitos
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="gast_disfagia" id="gast_disfagia">
                                                                            &nbsp;&nbsp;Disfagia
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="gast_pirosis" id="gast_pirosis">
                                                                            &nbsp;&nbsp;Pirosis
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="gast_diarrea" id="gast_diarrea">
                                                                            &nbsp;&nbsp;Diarrea
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="gast_constipación" id="gast_constipación">
                                                                                &nbsp;&nbsp;Constipación
                                                                            </label>
                                                                        </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="gast_melena" id="gast_melena">
                                                                            &nbsp;&nbsp;Melena
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="gast_otros" id="gast_otros">
                                                                            &nbsp;&nbsp;Otros Sintomas
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        &nbsp;
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Puedes agregar un comentario adicional.
                                                                    <hr>
                                                                    <textarea class="form-control" id="gast_comentarios" name="gast_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="rs_5" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Genitourinario
                                                            </h4>
                                                            <div class="col-sm-7">
                                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks"> 
                                                                            <input type="checkbox" name="geni_disuria" id="geni_disuria">
                                                                            &nbsp;&nbsp;Disuria dolorosa o de esfuerzo
                                                                        </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="geni_polaquiuria" id="geni_polaquiuria">
                                                                            &nbsp;&nbsp;Polaquiuria
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="geni_poliuria" id="geni_poliuria">
                                                                                &nbsp;&nbsp;Poliuria
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="geni_nicturia" id="geni_nicturia">
                                                                            &nbsp;&nbsp;Nicturia
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="geni_alt_uri" id="geni_alt_uri">
                                                                            &nbsp;&nbsp;Alteración del chorro urinario
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="geni_hematuria" id="geni_hematuria">
                                                                            &nbsp;&nbsp;Hematuria
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="geni_dolores_lum" id="geni_dolores_lum">
                                                                                &nbsp;&nbsp;Dolores en fosas lumbares
                                                                            </label>
                                                                        </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="geni_otros" id="geni_otros">
                                                                            &nbsp;&nbsp;Otros Sintomas
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Puedes agregar un comentario adicional.
                                                                    <hr>
                                                                    <textarea class="form-control" id="geni_comentarios" name="geni_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="rs_6" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Neurológico
                                                            </h4>
                                                            <div class="col-sm-7">
                                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks"> 
                                                                            <input type="checkbox" name="neuro_cafalea" id="neuro_cafalea">
                                                                            &nbsp;&nbsp;Cafalea
                                                                        </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="neuro_mareos" id="neuro_mareos">
                                                                            &nbsp;&nbsp;Mareos
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="neuro_problemas_coord" id="neuro_problemas_coord">
                                                                                &nbsp;&nbsp;Problemas de Coordinación
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="neuro_paresias" id="neuro_paresias">
                                                                            &nbsp;&nbsp;Paresias
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="neuro_parestesias" id="neuro_parestesias">
                                                                            &nbsp;&nbsp;Parestesias
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="neuro_otros" id="neuro_otros">
                                                                            &nbsp;&nbsp;Otros Sintomas
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Puedes agregar un comentario adicional.
                                                                    <hr>
                                                                    <textarea class="form-control" id="neuro_comentarios" name="neuro_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="rs_7" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Endocrino
                                                            </h4>
                                                            <div class="col-sm-7">
                                                                Indique aquellos sintomas que pueden ser observados en el paciente.
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks"> 
                                                                            <input type="checkbox" name="endo_b_peso" id="endo_b_peso">
                                                                            &nbsp;&nbsp;Baja de peso
                                                                        </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="endo_into_frio" id="endo_into_frio">
                                                                            &nbsp;&nbsp;Intolerancia al frío
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="endo_into_calor" id="endo_into_calor">
                                                                                &nbsp;&nbsp;Intolerancia al calor
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="endo_temblor_fino" id="endo_temblor_fino">
                                                                            &nbsp;&nbsp;Temblor fino
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="endo_polidefecacion" id="endo_polidefecacion">
                                                                            &nbsp;&nbsp;Polidefecacion
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="endo_ronquera" id="endo_ronquera">
                                                                            &nbsp;&nbsp;Ronquera
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="endo_somnolencia" id="endo_somnolencia">
                                                                            &nbsp;&nbsp;Somnolencia
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="endo_sequedad_piel" id="endo_sequedad_piel">
                                                                            &nbsp;&nbsp;Sequedad de la piel
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="endo_otros" id="endo_otros">
                                                                            &nbsp;&nbsp;Otros Sintomas
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        &nbsp;
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Puedes agregar un comentario adicional.
                                                                    <hr>
                                                                    <textarea class="form-control" id="neuro_comentarios" name="endo_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="rs_8" class="tab-pane fade">
                                                          &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Revisíon por Sistemas / Archivos y Documentos
                                                            </h4>
                                                            <p>Si lo deseas puedes adjuntar documentos, vídeos, imágenes, audio, o cualquier 
                                                               tipo de archivo digital. Recuerda escribir un titulo y una descripción a los archivos que adjuntes. 
                                                               Tienes la posibilidad de adjuntar todos los archivos que sean necesarios. </p>
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
                                                        <li><a data-toggle="tab" href="#ef_5">Piel</a></li>
                                                        <li><a data-toggle="tab" href="#ef_6">S. Linfático</a></li>
                                                        <li><a data-toggle="tab" href="#ef_7">Signos Vitales</a></li>
                                                        <li><a data-toggle="tab" href="#ef_8">Archivos y Documentos</a></li>                                                        
                                                    </ul>
                                                    
                                                    <div class="tab-content">
                                                        <div id="ef_1" class="tab-pane fade in active">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Decúbito
                                                            </h4>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <b>Posición /</b> descripción de la posición de pie del paciente.
                                                                    <hr>
                                                                    <textarea class="form-control" id="d_posición_pie" name="d_posición_pie" cols="90" rows="5"></textarea>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <b>Decúbito /</b> descripción de la posición en decúbito del paciente.
                                                                    <hr>
                                                                    <textarea class="form-control" id="d_posición_decubito" name="d_posición_decubito" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="ef_2" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Deambulación
                                                            </h4>
                                                            <div class="col-sm-7">
                                                                Seleccione algun trastorno de marcha que presente el paciente.
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks"> 
                                                                            <input type="checkbox" name="deammbulación_normal" id="deammbulación_normal">
                                                                            &nbsp;&nbsp;Deammbulación normal
                                                                        </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="marcha_ataxica" id="marcha_ataxica">
                                                                            &nbsp;&nbsp;Marcha atáxica o tabética
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="marcha_polineuritis" id="marcha_polineuritis">
                                                                                &nbsp;&nbsp;Marcha de pacientes con polineuritis (marcha esquina o "steppage")
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="marcha_espastica" id="marcha_espastica">
                                                                            &nbsp;&nbsp;Marcha espástica (en tijeras) 
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="marcha_hemiplejico" id="marcha_hemiplejico">
                                                                            &nbsp;&nbsp;Marcha del hemipléjico
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="marcha_parkinsoniana" id="marcha_parkinsoniana">
                                                                            &nbsp;&nbsp;Marcha parkinsoniana
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="d_otros_trastornos" id="d_otros_trastornos">
                                                                            &nbsp;&nbsp;Otros trastornos
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        &nbsp;
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Comentarios / Puedes ingresar un nuevo transtorno.
                                                                    <hr>
                                                                    <textarea class="form-control" id="neuro_comentarios" name="endo_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="ef_3" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Facie
                                                            </h4>
                                                            <div class="col-sm-7">
                                                                Seleccione algun trastorno facie que presente el paciente.
                                                                <hr>
                                                                <div class="row">                                                                <div class="col-sm-6">
                                                                    <label class="radio-inline i-checks"> 
                                                                        <input type="checkbox" name="facie_normal" id="facie_normal">
                                                                        &nbsp;&nbsp;Facie normal
                                                                    </label> 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_acromegalica" id="facie_acromegalica">
                                                                            &nbsp;&nbsp;Facie acromegálica
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_cushingoide" id="facie_cushingoide">
                                                                                &nbsp;&nbsp;Facie cushingoide
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_hipertiroídea" id="facie_hipertiroídea">
                                                                            &nbsp;&nbsp;Facie hipertiroídea
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_hipotiroidea" id="facie_hipotiroidea">
                                                                            &nbsp;&nbsp;Facie hipotiroídea o mixedematosa
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_hipocratica" id="facie_hipocratica">
                                                                            &nbsp;&nbsp;Facie hipocrática
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_mongolica" id="facie_mongolica">
                                                                            &nbsp;&nbsp;Facie mongólica (s. de Down)
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_parkinsoniana" id="facie_parkinsoniana">
                                                                            &nbsp;&nbsp;Facie parkinsoniana
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_febril" id="facie_febril">
                                                                            &nbsp;&nbsp;Facie febril
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_mitralica" id="facie_mitralica">
                                                                            &nbsp;&nbsp;Facie mitrálica
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="radio-inline i-checks">
                                                                            <input type="checkbox" name="facie_otros_trastornos" id="facie_otros_trastornos">
                                                                            &nbsp;&nbsp;Otros trastornos
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        &nbsp;
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="row">
                                                                    Comentarios / Puedes ingresar un nuevo transtorno.
                                                                    <hr>
                                                                    <textarea class="form-control" id="facie_comentarios" name="facie_comentarios" cols="90" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="ef_4" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Conciencia
                                                            </h4>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                Orientación en el tiempo
                                                                <textarea class="form-control" id="orientacion_t" name="orientacion_t" cols="90" rows="3"></textarea>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    Orientación en el espacio
                                                                    <textarea class="form-control" id="orientacion_e" name="orientacion_e" cols="90" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                Reconocimiento de personas&nbsp;
                                                                <textarea class="form-control" id="reconocimiento_p" name="reconocimiento_p" cols="90" rows="3"></textarea>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    Nivel de conciencia&nbsp;
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="lucidez" id="lucidez">
                                                                                &nbsp;&nbsp;Lucidez
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="obnubilacion" id="obnubilacion">
                                                                                &nbsp;&nbsp;Obnubilación
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-5">&nbsp;</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="sopor" id="sopor">
                                                                                &nbsp;&nbsp;Sopor
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="coma" id="coma">
                                                                                &nbsp;&nbsp;Coma
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-5">&nbsp;</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    Comentarios&nbsp;
                                                                    <textarea class="form-control" id="conciencia_comentarios" name="conciencia_comentarios" cols="90" rows="3"></textarea>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    &nbsp;
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="ef_5" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Piel
                                                            </h4>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                Color
                                                                <textarea class="form-control" id="piel_color" name="piel_color" cols="90" rows="2"></textarea>
                                                                <br>
                                                                Humedad y untuosidad
                                                                <textarea class="form-control" id="piel_humedad_u" name="piel_humedad_u" cols="90" rows="2"></textarea>
                                                                <br>
                                                                Turgor y elasticidad
                                                                <textarea class="form-control" id="piel_turgor_e" name="piel_turgor_e" cols="90" rows="2"></textarea>
                                                                <br>
                                                                Temperatura
                                                                <select name="piel_temperatura" id="piel_temperatura" class="form-control">
                                                                    <option value="">--- Seleccione una opción ---</option>
                                                                    <option value="">Normal</option>
                                                                    <option value="">Aumentada</option>
                                                                    <option value="">Disminuida</option>
                                                                </select>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    Seleccione algun trastorno en la piel que presente el paciente.
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_sin_lesiones" id="piel_sin_lesiones">
                                                                                &nbsp;&nbsp;No presenta lesiones
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_Eritema" id="piel_Eritema">
                                                                                &nbsp;&nbsp;Eritema por exposicion solar
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_mascula" id="piel_mascula">
                                                                                &nbsp;&nbsp;Máscula en la cara
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_papula" id="piel_papula">
                                                                                &nbsp;&nbsp;Pápula
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_nodulo" id="piel_nodulo">
                                                                                &nbsp;&nbsp;Nódulo
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_tumor" id="piel_tumor">
                                                                                &nbsp;&nbsp;Tumor
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_vesicula" id="piel_vesicula">
                                                                                &nbsp;&nbsp;Vesícula
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_ampolla" id="piel_ampolla">
                                                                                &nbsp;&nbsp;Ampolla
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_pustula" id="piel_pustula">
                                                                                &nbsp;&nbsp;Pústula
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_placa" id="piel_placa">
                                                                                &nbsp;&nbsp;Placa
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_eritema" id="piel_eritema">
                                                                                &nbsp;&nbsp;Eritema
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_escama" id="piel_escama">
                                                                                &nbsp;&nbsp;Escama
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_erosion" id="piel_erosion">
                                                                                &nbsp;&nbsp;Erosión
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_ulceracion" id="piel_ulceracion">
                                                                                &nbsp;&nbsp;Ulceración
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_costra" id="piel_costra">
                                                                                &nbsp;&nbsp;Costra
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_cicatriz" id="piel_cicatriz">
                                                                                &nbsp;&nbsp;Cicatriz
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_roncha" id="piel_roncha">
                                                                                &nbsp;&nbsp;Roncha
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_liquenificacion" id="piel_liquenificacion">
                                                                                &nbsp;&nbsp;Liquenificación
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_telangiectasia" id="piel_telangiectasia">
                                                                                &nbsp;&nbsp;Telangiectasia
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_petequia" id="piel_petequia">
                                                                                &nbsp;&nbsp;Petequia
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_equimosis" id="piel_equimosis">
                                                                                &nbsp;&nbsp;Equímosis
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_vibice" id="piel_vibice">
                                                                                &nbsp;&nbsp;Víbice
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_efelide" id="piel_efelide">
                                                                                &nbsp;&nbsp;Efélide
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="piel_otros_t" id="piel_otros_t">
                                                                                &nbsp;&nbsp;Otros trastornos
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <strong>Anexos de la piel: pelos y uñas.</strong>
                                                                    <hr>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <b>Pelos:</b> alteraciones de la distribución y características del pelo.
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="pelos_calvicie" id="pelos_calvicie">
                                                                                &nbsp;&nbsp;Calvicie
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <label class="radio-inline i-checks">
                                                                                    <input type="checkbox" name="pelos_alopecia" id="pelos_alopecia">
                                                                                    &nbsp;&nbsp;Alopecía
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="pelos_hirsutismo" id="pelos_hirsutismo">
                                                                                    &nbsp;&nbsp;Hirsutismo
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <label class="radio-inline i-checks">
                                                                                    <input type="checkbox" name="pelos_otros_alt" id="pelos_otros_alt">
                                                                                    &nbsp;&nbsp;Otras alteraciones
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <b>Uñas:</b> seleccione signos presentes.
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="unias_acropaquia" id="unias_acropaquia">
                                                                                &nbsp;&nbsp;Acropaquia
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="unias_coiloniquia" id="unias_coiloniquia">
                                                                                &nbsp;&nbsp;Coiloniquia o uña en cuchara
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="unias_psoriasis" id="unias_psoriasis">
                                                                                &nbsp;&nbsp;Uñas en psoriasis
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="unias_l_beau" id="unias_l_beau">
                                                                                &nbsp;&nbsp;Uñas con líneas de Beau
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="unias_l_ungueales_p" id="unias_l_ungueales_p">
                                                                                &nbsp;&nbsp;Lechos ungueales pálidos
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="unias_l_ungueales_c" id="unias_l_ungueales_c">
                                                                                &nbsp;&nbsp;Lechos ungueales cianóticos
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                    <input type="checkbox" name="unias_renal_c" id="unias_renal_c">
                                                                                &nbsp;&nbsp;Uñas en la insuficiencia renal crónica
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline i-checks">
                                                                                <input type="checkbox" name="unias_hemorragias_s" id="unias_hemorragias_s">
                                                                                &nbsp;&nbsp;Hemorragias subungueales o en astilla
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <!--<textarea class="form-control" id="piel_turgor_e" name="piel_turgor_e" cols="90" rows="2"></textarea>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="ef_6" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / S. Linfático
                                                            </h4>
                                                            <p>Contenido...</p>    
                                                        </div>
                                                        <div id="ef_7" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Signos Vitales
                                                            </h4>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    constitucion
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    Respiracion
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    Temperatura
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    Presion y pulso
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="ef_8" class="tab-pane fade">
                                                            &nbsp;
                                                            <h4 style="color:#21B9BB;">
                                                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                                                Examen Físico / Archivos y Documentos
                                                            </h4>
                                                            <p>
                                                                Si lo deseas puedes adjuntar documentos, vídeos, imágenes, audio, o cualquier 
                                                                tipo de archivo digital. 
                                                                Recuerda escribir un titulo y una descripción a los archivos que adjuntes. 
                                                                Tienes la posibilidad de adjuntar todos los archivos que sean necesarios. 
                                                            </p>    
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