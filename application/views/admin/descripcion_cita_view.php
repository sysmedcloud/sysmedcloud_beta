<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <title><?=$titulo?></title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-md-4">
            <a href="#" class="thumbnail">
                <img src="<?php echo base_url(); ?>img/1.jpg" alt="...">
            </a>
        </div>
        <div class="col-xs-8 col-md-8">
            <p><strong><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Paciente:</strong> 32423423-9 <?=$titulo?></p> 
            <p><strong><i class="fa fa-at" aria-hidden="true"></i>&nbsp;Correo:</strong> asd@gmail.com</p>
            <p><strong><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Celular:</strong> 34535354 / <strong>T. fijo:</strong> 34535354</p>
            <p>
                <a href="#">Ver Datos Paciente</a> / 
                <a href="#">Ver Ficha Medica</a> / 
                <a href="#" title="Puedes enviar un email para que el paciente confirme asistencia">Notificar vía e-mail</a></p>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-md-12">
        <div style="border: 0px;margin: 0px;padding: 0px;" aria-expanded="false" id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><strong>Correo:</strong></td>
                                <td>asd@gmail.com</td> 
                                <td><strong>Estado Civil:</strong></td>
                                <td>Divorciado/a</td></tr><tr>
                                <td><strong>Telefono fijo:</strong></td>
                                <td>Sin info.</td>
                                <td><strong>Celular:</strong></td>
                                <td>34535354</td>
                            </tr>
                            <tr>
                                <td><strong>Religión:</strong></td>
                                <td>Budismo</td>
                                <td><strong>Previsión méd.:</strong></td>
                                <td>Cruz Blanca</td>
                            </tr>
                            <tr>
                                <td><strong>País de res.:</strong></td>
                                <td>CHILE</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>N. de estudio:</strong></td>
                                <td colspan="3">Profesional</td>
                            </tr>
                            <tr>
                                <td><strong>Fecha Nac.:</strong></td>
                                <td>22/11/1992</td>
                                <td><strong></strong></td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td><strong>Lugar de Nac.:</strong></td>
                                <td colspan="3">curico</td>
                            </tr>
                            <tr>
                                <td><strong>Ocupación:</strong></td>
                                <td colspan="3">ADMINISTRACION INFORMATICA</td>
                            </tr>
                            <tr>
                                <td><strong>Datos de Residencia Actual:</strong></td>
                                <td colspan="3">calle , comuna, provincia, region</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>--
        </div>
    </div>-->
    <div class="row">
        <label for="title" class="control-label col-xs-4 col-md-4 col-sm-4"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;Fecha Inicio: </label>
        <div class="col-xs-8 col-md-8 col-sm-8">
        <input type="text" placeholder="Introduce rut del paciente ejm: 11.111.111-1" id="rut_paciente" class="form-control" name="rut_paciente" autocomplete="off" required="" onblur="buscar_paciente(this.value);">
        </div>
    </div>
    <div class="row">
        <label for="title" class="control-label col-xs-4 col-md-4 col-sm-4"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;Fecha Final: </label>
        <div class="col-xs-8 col-md-8 col-sm-8">
        <input type="text" placeholder="Introduce rut del paciente ejm: 11.111.111-1" id="rut_paciente" class="form-control" name="rut_paciente" autocomplete="off" required="" onblur="buscar_paciente(this.value);">
        </div>
    </div>
    <div class="row">
        <label for="title" class="control-label col-xs-4 col-md-4"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Estado Cita: </label>
        <div class="col-xs-8 col-md-12">
        <input type="text" placeholder="Introduce rut del paciente ejm: 11.111.111-1" id="rut_paciente" class="form-control" name="rut_paciente" autocomplete="off" required="" onblur="buscar_paciente(this.value);">
        </div>
    </div>
    <div class="row">    
        <div class="col-xs-12 col-md-12">
            <label for="title">Nota: </label>
            <textarea id="nota" class="form-control" rows="2" required="" name="nota"><?=$evento?></textarea>
        </div>
    </div>
    <br>
    <div class="row">    
        <div class="col-xs-12 col-md-12">
            <button type="button" class="btn btn-default btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Modificar Cita</button>
            <button type="button" class="btn btn-default btn-danger"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Eliminar Cita</button>
            <button type="button" class="btn btn-default btn-info"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp;Iniciar Consulta Medica</button>
        </div>
    </div>
    <!--              <div class="col-xs-12 col-md-12">
                <br>
                
            </div>-->
</div>
    <!--<div class="row">
        <div class="col-xs-12 col-md-3">
          <a href="#" class="thumbnail">
              <img src="<?php echo base_url(); ?>img/1.jpg" alt="...">
          </a>
        </div>
        <div class="col-xs-12 col-md-9">
            <p><strong>R.U.T:</strong>rut paciente</p>
            <p><strong>Nombre:</strong>nombre paciente</p>    
            <p><strong>Genero:</strong>genero</p>
            <p><strong>Edad:</strong>edad</p>
        </div>
    </div>
    <hr>-->
    <!--<h3><?=$titulo?></h3>
    <hr>
    <b>Fecha inicio:</b> <?=$inicio?>
    <b>Fecha termino:</b> <?=$final?>
    <p><?=$evento?></p>
</body>
<form action="<?php echo base_url(); ?>agenda/eliminar_cita" method="post">
    <input type="hidden" id="id_cita_med" name="id_cita_medica" value="<?=$id_cita_medica?>">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form>-->
</body>
</html>