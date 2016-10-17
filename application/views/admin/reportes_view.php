<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
<div class="row">
  <div class="col-lg-6">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Reportes por Paciente</h5>
      </div>        
      <div class="ibox-content">    
      <div class="form-group" id="client_repos">
        <label class="col-sm-2 control-label">Introduzca el rut del paciente y seleccione el tipo de reporte: </label>
        <div class="col-sm-10">
          <input type="text" name="rut" id="rut_paciente" class="form-control">                      
          <br>
          <select class="form-control m-b" name="reportes" id="sel_reportes_cli">
            <option value="0">--</option>
            <option value="7">Fícha Clínica Paciente</option>
            <option value="8">Reporte Consultas Médicas Paciente</option>
          </select>
        </div>
        <button id="bto_repo_cli" class="btn btn-primary btn-sm">Obtener Reporte</button>        
      </div>        
      </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Reportes Generales</h5>          
        </div>
        <div class="ibox-content">  
          <div class="form-group" id="general_repos">
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
            <button id="bto_repo" class="btn btn-sm btn-primary">Obtener Reporte</button>            
          </div>          
        </div>
      </div>
    </div>
  </div>



