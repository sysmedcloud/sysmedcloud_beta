<!--  inicio contenedor -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-3">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-success pull-right"></span>
               <h5>Pacientes</h5>
            </div>
            <div class="ibox-content">
               <h1 class="no-margins"><?=$cant_p;?></h1>
               <div class="stat-percent font-bold text-success"><i class="fa fa-users"></i></div>
               <small>pacientes acitvos</small>
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-info pull-right"></span>
               <h5>Consultas Médicas</h5>
            </div>
            <div class="ibox-content">
               <h1 class="no-margins"><?=$cant_cm;?></h1>
               <div class="stat-percent font-bold text-info"><i class="fa fa-stethoscope"></i></div>
               <small>consultas médicas registradas</small>
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-primary pull-right"></span>
               <h5>Citas</h5>
            </div>
            <div class="ibox-content">
               <h1 class="no-margins"><?=$cant_c;?></h1>
               <div class="stat-percent font-bold text-navy"><i class="fa fa-calendar"></i></div>
               <small>citas registradas</small>
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-danger pull-right"></span>
               <h5>Usuarios</h5>
            </div>
            <div class="ibox-content">
               <h1 class="no-margins"><?=$cant_u;?></h1>
               <div class="stat-percent font-bold text-navy"><i class="fa fa-user"></i></div>
               <small>usuarios activos</small>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Bar Chart Example <small>With custom colors.</small></h5>
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
               <div class="flot-chart">
                  <div class="flot-chart-content" id="flot-bar-chart" style="padding: 0px; position: relative;">
                     <canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 485px; height: 200px;" width="485" height="200"></canvas>
                     <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                        <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 69px; top: 185px; left: 14px; text-align: center;">1</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 69px; top: 185px; left: 96px; text-align: center;">2</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 69px; top: 185px; left: 178px; text-align: center;">3</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 69px; top: 185px; left: 260px; text-align: center;">4</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 69px; top: 185px; left: 343px; text-align: center;">5</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 69px; top: 185px; left: 425px; text-align: center;">6</div>
                        </div>
                        <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 173px; left: 6px; text-align: right;">0</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 138px; left: 0px; text-align: right;">10</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 104px; left: 0px; text-align: right;">20</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 69px; left: 0px; text-align: right;">30</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 35px; left: 0px; text-align: right;">40</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 0px; text-align: right;">50</div>
                        </div>
                     </div>
                     <canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 485px; height: 200px;" width="485" height="200"></canvas>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Line Cahrt Example</h5>
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
               <div class="flot-chart">
                  <div class="flot-chart-content" id="flot-line-chart" style="padding: 0px; position: relative;">
                     <canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 485px; height: 200px;" width="485" height="200"></canvas>
                     <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                        <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 80px; top: 185px; left: 14px; text-align: center;">1</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 80px; top: 185px; left: 106px; text-align: center;">2</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 80px; top: 185px; left: 198px; text-align: center;">3</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 80px; top: 185px; left: 290px; text-align: center;">4</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 80px; top: 185px; left: 382px; text-align: center;">5</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 80px; top: 185px; left: 474px; text-align: center;">6</div>
                        </div>
                        <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 173px; left: 6px; text-align: right;">0</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 138px; left: 0px; text-align: right;">10</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 104px; left: 0px; text-align: right;">20</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 69px; left: 0px; text-align: right;">30</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 35px; left: 0px; text-align: right;">40</div>
                           <div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 0px; text-align: right;">50</div>
                        </div>
                     </div>
                     <canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 485px; height: 200px;" width="485" height="200"></canvas>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Pie Chart Example</h5>
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
               <div class="flot-chart">
                  <div class="flot-chart-pie-content" id="flot-pie-chart" style="padding: 0px; position: relative;">
                     <canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 200px; height: 200px;" width="200" height="200"></canvas>
                     <canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 200px; height: 200px;" width="200" height="200"></canvas>
                     <div class="legend">
                        <div style="position: absolute; width: 54px; height: 60px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                        <table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454">
                           <tbody>
                              <tr>
                                 <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                       <div style="width:4px;height:0;border:5px solid #d3d3d3;overflow:hidden"></div>
                                    </div>
                                 </td>
                                 <td class="legendLabel">Sales 1</td>
                              </tr>
                              <tr>
                                 <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                       <div style="width:4px;height:0;border:5px solid #bababa;overflow:hidden"></div>
                                    </div>
                                 </td>
                                 <td class="legendLabel">Sales 2</td>
                              </tr>
                              <tr>
                                 <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                       <div style="width:4px;height:0;border:5px solid #79d2c0;overflow:hidden"></div>
                                    </div>
                                 </td>
                                 <td class="legendLabel">Sales 3</td>
                              </tr>
                              <tr>
                                 <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                       <div style="width:4px;height:0;border:5px solid #1ab394;overflow:hidden"></div>
                                    </div>
                                 </td>
                                 <td class="legendLabel">Sales 4</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <span class="label label-warning pull-right">Data has changed</span>
               <h5>Actidad Reciente</h5>
            </div>
            <div class="ibox-content">
               <div class="row">
                  <div class="col-xs-4">
                     <small class="stats-label">Pages / Visit</small>
                     <h4>236 321.80</h4>
                  </div>
                  <div class="col-xs-4">
                     <small class="stats-label">% New Visits</small>
                     <h4>46.11%</h4>
                  </div>
                  <div class="col-xs-4">
                     <small class="stats-label">Last week</small>
                     <h4>432.021</h4>
                  </div>
               </div>
            </div>
            <div class="ibox-content">
               <div class="row">
                  <div class="col-xs-4">
                     <small class="stats-label">Pages / Visit</small>
                     <h4>643 321.10</h4>
                  </div>
                  <div class="col-xs-4">
                     <small class="stats-label">% New Visits</small>
                     <h4>92.43%</h4>
                  </div>
                  <div class="col-xs-4">
                     <small class="stats-label">Last week</small>
                     <h4>564.554</h4>
                  </div>
               </div>
            </div>
            <div class="ibox-content">
               <div class="row">
                  <div class="col-xs-4">
                     <small class="stats-label">Pages / Visit</small>
                     <h4>436 547.20</h4>
                  </div>
                  <div class="col-xs-4">
                     <small class="stats-label">% New Visits</small>
                     <h4>150.23%</h4>
                  </div>
                  <div class="col-xs-4">
                     <small class="stats-label">Last week</small>
                     <h4>124.990</h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Historias Clinicas Recientes </h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">
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
               <div class="row">
                  <div class="col-sm-9 m-b-xs">
                     <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-sm btn-white"> <input type="radio" name="options" id="option1"> Day </label>
                        <label class="btn btn-sm btn-white active"> <input type="radio" name="options" id="option2"> Week </label>
                        <label class="btn btn-sm btn-white"> <input type="radio" name="options" id="option3"> Month </label>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="input-group"><input type="text" class="input-sm form-control" placeholder="Search"> <span class="input-group-btn">
                        <button class="btn btn-sm btn-primary" type="button"> Go!</button> </span>
                     </div>
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Project </th>
                           <th>Name </th>
                           <th>Phone </th>
                           <th>Company </th>
                           <th>Completed </th>
                           <th>Task</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>Project <small>This is example of project</small></td>
                           <td>Patrick Smith</td>
                           <td>0800 051213</td>
                           <td>Inceptos Hymenaeos Ltd</td>
                           <td>
                              <span style="display: none;" class="pie">0.52/1.561</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 14.933563796318165 11.990700825968545 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 14.933563796318165 11.990700825968545 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>20%</td>
                           <td>Jul 14, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Alpha project</td>
                           <td>Alice Jackson</td>
                           <td>0500 780909</td>
                           <td>Nec Euismod In Company</td>
                           <td>
                              <span style="display: none;" class="pie">6,9</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 12.702282018339785 14.47213595499958 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 12.702282018339785 14.47213595499958 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>40%</td>
                           <td>Jul 16, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Betha project</td>
                           <td>John Smith</td>
                           <td>0800 1111</td>
                           <td>Erat Volutpat</td>
                           <td>
                              <span style="display: none;" class="pie">3,1</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 1 1 0 8.000000000000002 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 0 8.000000000000002 A 8 8 0 0 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>75%</td>
                           <td>Jul 18, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Gamma project</td>
                           <td>Anna Jordan</td>
                           <td>(016977) 0648</td>
                           <td>Tellus Ltd</td>
                           <td>
                              <span style="display: none;" class="pie">4,9</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 15.48012994148332 10.836839096340286 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 15.48012994148332 10.836839096340286 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>18%</td>
                           <td>Jul 22, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Alpha project</td>
                           <td>Alice Jackson</td>
                           <td>0500 780909</td>
                           <td>Nec Euismod In Company</td>
                           <td>
                              <span style="display: none;" class="pie">6,9</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 12.702282018339785 14.47213595499958 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 12.702282018339785 14.47213595499958 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>40%</td>
                           <td>Jul 16, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>Project <small>This is example of project</small></td>
                           <td>Patrick Smith</td>
                           <td>0800 051213</td>
                           <td>Inceptos Hymenaeos Ltd</td>
                           <td>
                              <span style="display: none;" class="pie">0.52/1.561</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 14.933563796318165 11.990700825968545 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 14.933563796318165 11.990700825968545 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>20%</td>
                           <td>Jul 14, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Gamma project</td>
                           <td>Anna Jordan</td>
                           <td>(016977) 0648</td>
                           <td>Tellus Ltd</td>
                           <td>
                              <span style="display: none;" class="pie">4,9</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 15.48012994148332 10.836839096340286 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 15.48012994148332 10.836839096340286 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>18%</td>
                           <td>Jul 22, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>Project <small>This is example of project</small></td>
                           <td>Patrick Smith</td>
                           <td>0800 051213</td>
                           <td>Inceptos Hymenaeos Ltd</td>
                           <td>
                              <span style="display: none;" class="pie">0.52/1.561</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 14.933563796318165 11.990700825968545 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 14.933563796318165 11.990700825968545 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>20%</td>
                           <td>Jul 14, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Alpha project</td>
                           <td>Alice Jackson</td>
                           <td>0500 780909</td>
                           <td>Nec Euismod In Company</td>
                           <td>
                              <span style="display: none;" class="pie">6,9</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 12.702282018339785 14.47213595499958 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 12.702282018339785 14.47213595499958 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>40%</td>
                           <td>Jul 16, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Betha project</td>
                           <td>John Smith</td>
                           <td>0800 1111</td>
                           <td>Erat Volutpat</td>
                           <td>
                              <span style="display: none;" class="pie">3,1</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 1 1 0 8.000000000000002 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 0 8.000000000000002 A 8 8 0 0 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>75%</td>
                           <td>Jul 18, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Gamma project</td>
                           <td>Anna Jordan</td>
                           <td>(016977) 0648</td>
                           <td>Tellus Ltd</td>
                           <td>
                              <span style="display: none;" class="pie">4,9</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 15.48012994148332 10.836839096340286 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 15.48012994148332 10.836839096340286 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>18%</td>
                           <td>Jul 22, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Alpha project</td>
                           <td>Alice Jackson</td>
                           <td>0500 780909</td>
                           <td>Nec Euismod In Company</td>
                           <td>
                              <span style="display: none;" class="pie">6,9</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 12.702282018339785 14.47213595499958 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 12.702282018339785 14.47213595499958 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>40%</td>
                           <td>Jul 16, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>Project <small>This is example of project</small></td>
                           <td>Patrick Smith</td>
                           <td>0800 051213</td>
                           <td>Inceptos Hymenaeos Ltd</td>
                           <td>
                              <span style="display: none;" class="pie">0.52/1.561</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 14.933563796318165 11.990700825968545 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 14.933563796318165 11.990700825968545 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>20%</td>
                           <td>Jul 14, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Gamma project</td>
                           <td>Anna Jordan</td>
                           <td>(016977) 0648</td>
                           <td>Tellus Ltd</td>
                           <td>
                              <span style="display: none;" class="pie">4,9</span>
                              <svg width="16" height="16" class="peity">
                                 <path fill="#1ab394" d="M 8 8 L 8 0 A 8 8 0 0 1 15.48012994148332 10.836839096340286 Z"/>
                                 <path fill="#d7d7d7" d="M 8 8 L 15.48012994148332 10.836839096340286 A 8 8 0 1 1 7.999999999999998 0 Z"/>
                              </svg>
                           </td>
                           <td>18%</td>
                           <td>Jul 22, 2013</td>
                           <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>