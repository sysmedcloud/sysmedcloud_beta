<div class="row" style="background-color:#ffffff;padding: 0px 25px 15px 25px;">
    <div class="page-header" style="margin-top: 5px;"><h2></h2></div>
    <div class="pull-left form-inline"><br>
            <div class="btn-group">
                <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                <button class="btn" data-calendar-nav="today">Hoy</button>
                <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
            </div>
            <div class="btn-group">
                <button class="btn btn-warning" data-calendar-view="year">Año</button>
                <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                <button class="btn btn-warning" data-calendar-view="day">Dia</button>
            </div>

    </div>
    <div class="pull-right form-inline"><br>
        <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Agendar Cita</button>
    </div>
</div>
<div class="row">
    <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->
</div>
<!--ventana modal para el calendario-->
<div class="modal fade" id="events-modal">
    <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-body" style="height: 400px">
                        <p>One fine body&hellip;</p>
                    </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrar_modal_cita();" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
<script src="<?=base_url();?>js/underscore-min.js"></script>
<script src="<?=base_url();?>js/calendar.js"></script>
<script type="text/javascript">
    (function($){
            //creamos la fecha actual
            var date = new Date();
            var yyyy = date.getFullYear().toString();
            var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
            var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

            //establecemos los valores del calendario
            var options = {

                    //definimos que los eventos se mostraran en ventana modal
                    modal: '#events-modal', 

                    // dentro de un iframe
                    modal_type:'iframe',    

                    //obtenemos citas medicas registradas
                    events_source: '<?=  base_url()?>agenda/obtener_citas_medicas', 

                    // mostramos el calendario en el mes
                    view: 'month',             

                    // y dia actual
                    day: yyyy+"-"+mm+"-"+dd,   

                    // definimos el idioma por defecto
                    language: 'es-ES', 
                            
                    //Template de nuestro calendario
                    tmpl_path: '<?=base_url()?>tmpls/', 
                    tmpl_cache: false,

                    // Hora de inicio
                    time_start: '08:00', 

                    // y Hora final de cada dia
                    time_end: '22:00',   

                    // intervalo de tiempo entre las hora, en este caso son 30 minutos
                    time_split: '30',    

                    // Definimos un ancho del 100% a nuestro calendario
                    width: '100%', 

                    onAfterEventsLoad: function(events)
                    {
                            if(!events)
                            {
                                    return;
                            }
                            var list = $('#eventlist');
                            list.html('');

                            $.each(events, function(key, val)
                            {
                                    $(document.createElement('li'))
                                            .html('<a href="' + val.url + '">' + val.title + '</a>')
                                            .appendTo(list);
                            });
                    },
                    onAfterViewLoad: function(view)
                    {
                            $('.page-header h2').text(this.getTitle());
                            $('.btn-group button').removeClass('active');
                            $('button[data-calendar-view="' + view + '"]').addClass('active');
                    },
                    classes: {
                            months: {
                                    general: 'label'
                            }
                    }
            };

            // id del div donde se mostrara el calendario
            var calendar = $('#calendar').calendar(options); 

            $('.btn-group button[data-calendar-nav]').each(function()
            {
                    var $this = $(this);
                    $this.click(function()
                    {
                            calendar.navigate($this.data('calendar-nav'));
                    });
            });

            $('.btn-group button[data-calendar-view]').each(function()
            {
                    var $this = $(this);
                    $this.click(function()
                    {
                            calendar.view($this.data('calendar-view'));
                    });
            });

            $('#first_day').change(function()
            {
                    var value = $(this).val();
                    value = value.length ? parseInt(value) : null;
                    calendar.setOptions({first_day: value});
                    calendar.view();
            });
    }(jQuery));
</script>

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Crear nueva cita</h4>
      </div>
      <div class="modal-body">
          <form id="form_crear_cita" action="<?php echo base_url(); ?>agenda/crear_cita" method="post">
                    <label for="from">Inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="to">Final</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    
                    <br>
                    <label for="tipo">Estado Cita</label>
                    <select class="form-control" name="estado" id="tipo">
                        <option style="background-color:#D9EDF7;color:#000;" value="event-info">Informacion</option>
                        <option style="background-color: #DFF0D8;color: #000;" value="event-success">Exito</option>
                        <option value="event-important">Importantante</option>
                        <option style="background-color: #FCF8E3;color: #000;" value="event-warning">Advertencia</option>
                        <option style="background-color: #F2DEDE;color:#000;" value="event-special">Especial</option>
                    </select>
                    <br>

                    <label for="title">Paciente</label>
                    <input type="text" required autocomplete="off" name="paciente" class="form-control" id="paciente" placeholder="Introduce rut del paciente">

                    <br>

                    <label for="body">Notas</label>
                    <textarea id="body" name="nota" required class="form-control" rows="3"></textarea>
        <script type="text/javascript">
            $(function () {

                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm   = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd   = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
                var hora = date.getHours();
                var min  = date.getMinutes();

                $('#from').datetimepicker({
                    defaultDate: mm+'/'+dd+'/'+yyyy+' '+hora+':'+min,
                    language: 'es',
                    minDate: new Date()
                });
                $('#to').datetimepicker({
                    defaultDate: mm+'/'+dd+'/'+yyyy+' '+hora+':'+min,
                    language: 'es',
                    minDate: new Date()
                });

            });
            
            function cerrar_modal_cita(){
                
                $(location).attr('href','<?=  base_url()?>agenda');
            }
        </script>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar Cita</button>
            </form>
        </div>
    </div>
</div>
</div>