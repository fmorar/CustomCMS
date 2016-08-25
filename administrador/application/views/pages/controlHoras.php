<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Control del Horario de ingreso</h1>
        <p><em>En esta página se puede controlar el horario en el cual se permite ingresar al app de asesores.</em></p>
    </div>
    <!-- /.col-lg-12 -->
</div>


<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Hora de Inicio</th>
                                <th>Hora de Final</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $Resultado )
                                    foreach ($Resultado as $key => $datos) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $datos->HoraInicio; ?></td>
                                <td><?php echo $datos->HoraFinal; ?></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarControlHoras?id=<?php echo $datos->idAccesoApp;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    </div>
                                </td>
                                <?php } ?>
                                <?php } ?>
                             </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <!-- <div class="paginas">
                        <?php //echo $link; ?>
                </div> -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
