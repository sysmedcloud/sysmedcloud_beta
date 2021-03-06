<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Mi Perfil de Usuario <small>todos los campos obligatorios tienen la etiqueta (*).</small></h5>
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
               <form method="POST" action="<?=base_url();?>perfil_admin/recibirDatos" class="form-horizontal">
                  <div class="form-group">
                     <div class="col-sm-3">
                        <a href="#" class="thumbnail">
                             <img src="<?=base_url();?>img/foto_perfil/<?=$session["imagen"];?>" class="img-thumbnail" alt="imagen usuario" id="img_perfil" name="img_perfil">
                        </a>
                        <hr>
                     </div>
                     <div class="col-sm-9">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="panel blank-panel">
                                 <div class="panel-heading">
                                    <!--<div class="panel-title m-b-md"><h4>Blank Panel with text tabs</h4></div>-->
                                    <div class="panel-options">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#tab-1">Información personal</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-2">Datos residencia actual</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-3">Cambio de contraseña</a></li>
                                          <li class=""><a data-toggle="tab" href="#tab-4">Foto de perfil</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="panel-body">
                                    <div class="tab-content">
                                       <div id="tab-1" class="tab-pane active">
                                          <div class="row">
                                             <div class="col-md-4">
                                                *&nbsp;<strong>R.U.T</strong>
                                                <input type="text" name="rut" placeholder="Ingrese su rut" class="form-control" value="<?=$info->rut;?>">
                                                <?php echo form_error('rut','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Primer nombre</strong>
                                                <input type="text" name="p_nombre" placeholder="Ingrese su primer nombre" class="form-control" value="<?=ucfirst($info->primer_nombre);?>">
                                                <?php echo form_error('p_nombre','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Segundo nombre</strong>
                                                <input type="text" name="s_nombre" placeholder="Ingrese su segundo nombre" class="form-control" value="<?=ucfirst($info->segundo_nombre);?>">
                                                <?php echo form_error('s_nombre','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Apellido paterno</strong>
                                                <input type="text" name="a_paterno" placeholder="Ingrese su apellido paterno" class="form-control" value="<?=ucfirst($info->apellido_paterno);?>">
                                                <?php echo form_error('a_paterno','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Apellido materno</strong>
                                                <input type="text" name="a_materno" placeholder="Ingrese su apellido materno" class="form-control" value="<?=ucfirst($info->apellido_materno);?>">
                                                <?php echo form_error('a_materno','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <?php
                                                   $valor_m  = $info->genero == "M" ? TRUE : FALSE;
                                                   $valor_f  = $info->genero == "F" ? TRUE : FALSE;
                                                   
                                                   $js     = 'id="genero"';
                                                   $rd_mas =  form_radio('genero', 'M',$valor_m,$js);
                                                   
                                                   $js2    = 'id="genero"';
                                                   $rd_fem =  form_radio('genero', 'F',$valor_f,$js);
                                                   
                                                   ?>
                                                *&nbsp;<strong>Genero</strong><br>
                                                <label class="radio-inline i-checks"> 
                                                <?=$rd_mas;?> Masculino
                                                </label> 
                                                <label class="radio-inline i-checks">
                                                <?=$rd_fem;?> Femenino
                                                </label>
                                                <?php echo form_error('genero','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-4">
                                                <strong>Telefono (fijo)</strong>
                                                <input type="text" name="telefono_f" placeholder="Ingrese su telefono (fijo)" class="form-control" value="<?=$info->telefono;?>">
                                                <?php echo form_error('telefono_f','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <strong>Telefono celular</strong>
                                                <input type="text" name="celular" placeholder="Ingrese su telefono celular" class="form-control" value="<?=$info->celular;?>">
                                                <?php echo form_error('celular','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Correo</strong>
                                                <input type="text" name="correo" placeholder="Ingrese su correo" class="form-control" value="<?=$info->email;?>">
                                                <?php echo form_error('correo','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Username</strong>
                                                <input type="text" name="username" placeholder="Ingrese su nombre de usuario" class="form-control" value="<?=$info->username;?>">
                                                <?php echo form_error('username','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Fecha Nacimiento ( día / mes /año )</strong>
                                                <input type="text" name="fecha_nac" class="form-control" data-mask="99/99/9999" placeholder="Ingrese su fecha de nacimiento" value="<?=cambiaf_a_normal($info->fecha_nac);?>">
                                                <!-- <span class="help-block">( día / mes /año )</span> -->
                                                <?php echo form_error('fecha_nac','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>País de residencia</strong>
                                                <?=form_dropdown('pais_res',$paises,$info->nacionalidad,'class="form-control m-b"');?>
                                                <?php echo form_error('pais_res','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>                                         
                                       </div>
                                       <div id="tab-2" class="tab-pane">                                         
                                          <div class="row">
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Región</strong>
                                                <?=form_dropdown('region',$regiones,$info->id_region,'id="region" class="form-control m-b"');?>
                                                <?php echo form_error('region','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Provincia</strong>
                                                <?=form_dropdown('provincia',$provincias,$info->id_provincia,'id="provincia" class="form-control m-b"');?>
                                                <?php echo form_error('provincia','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                *&nbsp;<strong>Comuna</strong>
                                                <?=form_dropdown('comuna',$comunas,$info->id_comuna,'id="comuna" class="form-control m-b"');?>
                                                <?php echo form_error('comuna','<div class="text-danger">','</div>');?>
                                             </div>
                                          </div>
                                          &nbsp;
                                          <div class="row">
                                             <div class="col-md-8">
                                                *&nbsp;<strong>Calle / Pasaje / Villa</strong>
                                                <input type="text" name="calle" placeholder="Nombre de la calle, pasaje o villa" class="form-control" value="<?=ucfirst($info->calle);?>">
                                                <?php echo form_error('calle','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">&nbsp;</div>
                                          </div>
                                       </div>
                                       <div id="tab-3" class="tab-pane">
                                          <strong>INFORMACIÓN: CAMBIO DE CONTRASEÑA</strong>
                                          <p>(Si no deseas cambiar tu contraseña deja los siguientes campos en blanco)</p>
                                          <div class="hr-line-dashed"></div>
                                          <div class="row">
                                             <div class="col-md-4">
                                                <strong>Nueva Contraseña</strong>
                                                <input type="password" name="password" placeholder="Ingrese su nueva contraseña" class="form-control">
                                                <?php echo form_error('password','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">
                                                <strong>Confirmar Contraseña</strong>
                                                <input type="password" name="confpassword" placeholder="Repita contraseña ingresada" class="form-control">
                                                <?php echo form_error('confpassword','<div class="text-danger">','</div>');?>
                                             </div>
                                             <div class="col-md-4">&nbsp;</div>
                                          </div>
                                       </div>
                                       <div id="tab-4" class="tab-pane">                                          
                                          <div class="row">
                                             <input multiple="" accept="image/*" type="file" id="upload_foto" name="upload_foto">
                                             <input type="button" class="btn btn-primary" id="bto_foto" name="bto_foto" value="Cambiar Imagen">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                <div class="col-md-12">
                                   <?php 
                                      if(!empty(validation_errors())){

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
                                       <button class="btn btn-white" type="button">Cancelar</button>
                                       &nbsp;&nbsp;
                                       <button class="btn btn-primary" type="submit">Guardar Cambios</button>
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