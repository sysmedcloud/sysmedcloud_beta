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
            <h4 class="modal-title"><i class="fa fa-user fa-2x"></i>&nbsp;Información del paciente</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                  <a href="#" class="thumbnail">
                    <img src="<?=base_url();?>img/<?=$session["imagen"];?>" alt="...">
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
                            <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" class="collapsed">
                                <i class="fa fa-plus-circle"></i>&nbsp;Datos de Identificación
                            </a>
                        </h5>
                    </div>
                    <div class="panel-collapse collapse" id="collapseOne" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                     <tbody>
                                        <tr>
                                           <td><strong>Correo:</strong></td>
                                           <td>cris.vidal04@gmail.com</td>
                                          
                                           <td><strong>Estado Civil:</strong></td>
                                           <td>Soltero(a)</td>
                                        </tr>
                                        <tr>
                                           <td><strong>Telefono fijo:</strong></td>
                                           <td>1234567867</td>
                                          
                                           <td><strong>Celular:</strong></td>
                                           <td>123232323</td>
                                        </tr>
                                        <tr>
                                           <td><strong>Religión:</strong></td>
                                           <td>Catolicismo</td>
                                           <td><strong>Previsión méd.:</strong></td>
                                           <td>Consalud</td>
                                        </tr>
                                        <tr>
                                           <td><strong>País de res.:</strong></td>
                                           <td>Chile</td>
                                           <td><strong>N. de estudio:</strong></td>
                                           <td>Profesional</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Fecha Nac.:</strong></td>
                                            <td>09-09-2012</td>
                                            <td><strong></strong></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td><strong>Lugar de Nac.:</strong></td>
                                            <td colspan="3">Hospital Clinico San Borja Arriaran</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ocupación:</strong></td>
                                            <td colspan="3">Ingenieria en informatica mencion redes</td>
                                        </tr>
                                     </tbody>
                                 </table>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                                <i class="fa fa-plus-circle"></i>&nbsp;Datos de Residencia Actual
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseTwo" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td><strong>Región:</strong></td>
                                            <td colspan="3">Región del libertador Gral. Bernardo O'higgins</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Provincia:</strong></td>
                                            <td colspan="3">cachapoal</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Comuna:</strong></td>
                                            <td colspan="3">Teodoro Schmidt</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Calle/pasaje/villa:</strong></td>
                                            <td colspan="3">Ingenieria en informatica mencion redes</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                                <i class="fa fa-plus-circle"></i>&nbsp;Gr. Sanguineo/ F. RH
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseThree" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                           <td><strong>Grupo Sanguíneo:</strong></td>
                                           <td>AB</td>
                                          
                                           <td><strong>Factor RH:</strong></td>
                                           <td>Positivo</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseFour" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                                <i class="fa fa-plus-circle"></i>&nbsp;Personas de Contacto
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseFour" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <h1>EN CONSTRUCCION...</h1>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>

      </div>
    </div>
</div>