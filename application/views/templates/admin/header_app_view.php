<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SYSMEDCLOUD CHILE | DASHBOARD - PANEL DE CONTROL</title>
    
    <?php
        
        //Cargar archivos css
        foreach ($files['style'] as $file_css){ ?>
    
        <link rel="stylesheet" href="<?=$file_css?>" />
        
    <?php } ?>
    
</head>
<?php 
switch ($session["id_perfil"]) {
             
        case '1':
             $skin = 'pace-done skin-1';
             break;
        case '2':
             $skin = 'pace-done skin-3';
             break;
        case '3':
             $skin = 'pace-done';
             break;             
        default:
             # code...
        break;
    } 

?>
<body data-baseurl="<?=base_url()?>" class="<?=$skin;?>">