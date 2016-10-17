<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="col-lg-12">
      <div class="ibox float-e-margins">
         <div class="ibox-title">
            <h5>Módulo Reportes</h5>
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
            <div class="form-group" id="tipo_repo">
                  <label class="col-sm-2 control-label">Seleccione el tipo de reporte: </label>
                  <div class="col-sm-10">
                  <select class="form-control m-b" name="reportes" onchange="desplegar_opciones(this.value)">
                      <option value="0">--</option>
                      <option value="1">Reporte General</option>
                      <option value="2">Reporte por Paciente</option>
                  </select> 

              </div>              
           </div>
           <br>        
          <div class="form-group" style="display: none" id="general_repos">
                  <label class="col-sm-2 control-label">Seleccione el reporte a descargar: </label>
                  <div class="col-sm-10">
                  <select class="form-control m-b" name="reportes" id="sel_reportes">
                      <option value="0">--</option>
                      <option value="1">Reporte de Alergias</option>
                      <option value="2">Reporte de Patologías</option>
                      <option value="3">Reporte de Medicamentos</option>
                      <option value="4">Reporte de Diagnóasticos</option>
                      <option value="5">Reporte de Pacientes en Sistema</option>
                      <option value="6">Reporte de Consultas Médicas</option>
                  </select>                  
              </div>
              <button id="bto_repo" class="btn btn-primary">Obtener Reporte</button>
              <button class="btn btn-default bto_ret">Volver</button>
           </div>
           <div class="form-group" style="display: none" id="client_repos">
                  <label class="col-sm-2 control-label">Introduzca el rut del paciente: </label>
                  <div class="col-sm-10">
                  <input type="text" name="rut" id="rut_paciente" class="form-control">                      
                  <br>
                  <select class="form-control m-b" name="reportes" id="sel_reportes_cli">
                      <option value="0">--</option>
                      <option value="7">Fícha Clínica Paciente</option>
                      <option value="8">Reporte Consultas Médicas Paciente</option>
                  </select>                  
              </div>
              <button id="bto_repo_cli" class="btn btn-primary">Obtener Reporte</button>
              <button class="btn btn-default bto_ret">Volver</button>
           </div>         
      </div>
   </div>
</div>