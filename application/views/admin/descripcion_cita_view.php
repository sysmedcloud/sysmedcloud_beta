<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>css/calendar.css">
    <script type="text/javascript" src="<?php echo base_url();?>js/es-ES.js"></script>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/moment.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" />
    <script src="<?php echo base_url();?>js/bootstrap-datetimepicker.es.js"></script>
    
    <title><?=$paciente;?></title>
</head>
<body>
<div class="container">
<script src="<?=base_url();?>js/underscore-min.js"></script>
<script src="<?=base_url();?>js/calendar.js"></script>
    <div class="row">
        <div class="col-xs-3 col-md-3">
            <a href="#" class="thumbnail">
                <img src="<?php echo base_url(); ?>img/1.jpg" alt="...">
            </a>
        </div>
        <div class="col-xs-9 col-md-9">
            <div class="row">
                <label for="title" class="control-label col-xs-5 col-md-5 col-sm-5"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;Fecha Inicio: </label>
                <div style="margin-bottom: 5px;" class="col-xs-7 col-md-7 col-sm-7">
                <div class='input-group date' id='from'>
                    <input type='text' id="from" name="from" style="font-weight:bold;" value="<?=$inicio;?>" class="form-control" readonly />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </div>
                </div>
            </div>
            <div class="row">
                <label for="title" class="control-label col-xs-5 col-md-5 col-sm-5"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;Fecha Final: </label>
                <div style="margin-bottom: 5px;" class="col-xs-7 col-md-7 col-sm-7">
                <div class='input-group date' id='to'>
                    <input type='text' name="to" id="to" style="font-weight:bold;" value="<?=$final;?>" class="form-control" readonly />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </div>
                </div>
            </div>
             <div class="row">
                <label for="title" class="control-label col-xs-5 col-md-5"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Estado Cita: </label>
                <div class="col-xs-7 col-md-7">
                <select style="font-weight:bold;" class="form-control" name="estado" id="tipo">
                    <option value="">-- Seleccione estado cita --</option>
                    <?php echo $estadosCitas; ?>
                </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="control-label col-xs-12 col-md-12">
            <p><strong><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Paciente:</strong> 32423423-9 <?=$paciente;?></p> 
            <p><strong><i class="fa fa-at" aria-hidden="true"></i>&nbsp;Correo:</strong> <?php echo $correo; ?></p>
            <p><strong><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Celular:</strong> <?php echo $celular; ?> / <strong>T. fijo:</strong> <?php echo $tel_fijo; ?></p>
            <p>
            <a href="#">Ver Datos Paciente</a> / 
            <a href="#">Ver Ficha Medica</a> / 
            <a href="#" title="Puedes enviar un email para que el paciente confirme asistencia">Notificar vía e-mail</a>
            </p>
        </div>
    </div>
    
    <div class="row">    
        <div class="col-xs-12 col-md-12">
            <label for="title">Nota: </label>
            <textarea id="nota" class="form-control" rows="2" required="" name="nota"><?=$nota;?></textarea>
        </div>
    </div>
            <script type="text/javascript">
                        
                $(function () {
                        
                    $('#from').datetimepicker({
                        //defaultDate: mm+'/'+dd+'/'+yyyy+' '+hora+':'+min,
                        language: 'es',
                        minDate: new Date()
                    });
                    $('#to').datetimepicker({
                        //defaultDate: mm+'/'+dd+'/'+yyyy+' '+hora+':'+min,
                        language: 'es',
                        minDate: new Date()
                    });

                });

            </script>
    <br>
    <div class="row">    
        <div class="col-xs-12 col-md-12">
            <button type="button" class="btn btn-default btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Modificar Cita</button>
            <button type="button" class="btn btn-default btn-danger"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Eliminar Cita</button>
            <button type="button" class="btn btn-default btn-info"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp;Iniciar Consulta Medica</button>
        </div>
    </div>
</div>
<!--
<form action="<?php echo base_url(); ?>agenda/eliminar_cita" method="post">
    <input type="hidden" id="id_cita_med" name="id_cita_medica" value="<?=$id_cita_medica?>">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form>-->
</body>
</html>