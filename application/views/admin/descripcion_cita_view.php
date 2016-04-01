<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$titulo?></title>
</head>
<body>
    <h3><?=$titulo?></h3>
    <hr>
    <b>Fecha inicio:</b> <?=$inicio?>
    <b>Fecha termino:</b> <?=$final?>
    <p><?=$evento?></p>
</body>
<form action="<?php echo base_url(); ?>agenda/eliminar_cita" method="post">
    <input type="text" id="id_cita_med" name="id_cita_medica" value="<?=$id_cita_medica?>">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form>
</html>