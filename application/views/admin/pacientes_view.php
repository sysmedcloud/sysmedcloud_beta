<!--  inicio contenedor -->
<div class="wrapper wrapper-content animated fadeInRight">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de pacientes registrados </h5>
                    &nbsp;&nbsp;(E: editar datos, V: ver información, E: eliminar paciente)
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

                <table id="pacientes" class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>Fecha Creación</th>
                        <th>R.U.T.</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>E</th>
                        <th>V</th>
                        <th>E</th>
                    </tr>
                </thead>
                </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;Información del paciente</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                  <a href="#" class="thumbnail">
                    <img src="<?=base_url();?>img/sin-foto.png" alt="...">
                  </a>
                </div>
                <div class="col-xs-12 col-md-9">
                    <p><strong>R.U.T:</strong> 17.484.496-8</p>
                    <p><strong>Nombre:</strong> Cristian Alejandro Vidal Muñoz</p>    
                    <p><strong>Genero:</strong> Masculino</p>
                    <p><strong>Edad:</strong> 25</p>
                </div>
            </div>
            <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" class="collapsed">Datos de Identificación</a>
                        </h5>
                    </div>
                    <div class="panel-collapse collapse" id="collapseOne" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">Datos de Residencia Actual</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseTwo" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">Gr. Sanguineo/ F. RH</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseThree" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
            </div>
                            
            <div class="table-responsive">
               <table class="table">
                    <tbody>
                        <tr>
                          <td style="width: 50%"><strong>Fecha Nac.:</strong> 09-09-2012</td>   
                          <td style="width: 50%"><strong>ID Paciente:</strong> 1</td>
                        </tr>
                        <tr>
                          <td><strong>Telefono fijo:</strong> 1234567867</td>
                          <td><strong>Celular:</strong> 123456786767</td>
                        </tr>
                        <tr>
                          <td><strong>Correo:</strong> cris.vidal04@gmail.com</td>
                          <td><strong>Estado Civil:</strong> Soltero(a)</td>
                        </tr>
                        <tr>
                          <td><strong>Lugar de Nacimiento:</strong> Hospital Clinico San Borja Arriaran</td>
                          <td><strong>Religion:</strong> Catolico</td>
                        </tr>
                        <tr>
                          <td><strong>País de Referencia:</strong> Chile</td>
                          <td><strong>Previsión Médica:</strong> Consalud</td>
                        </tr>
                        <tr>
                          <td><strong>Ocupacion:</strong> Ingenieria en informatica mencion redes</td>
                          <td><strong>Nivel de Estudio:</strong> Profesional</td>
                        </tr>
                        <tr>
                          <td><strong>Region:</strong> Ingenieria en informatica mencion redes</td>
                          <td><strong>Provincia:</strong> Profesional</td>
                        </tr>
                        <tr>
                          <td><strong>Comuna:</strong> Ingenieria en informatica mencion redes</td>
                          <td><strong>Direccion:</strong> Profesional</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
</div>