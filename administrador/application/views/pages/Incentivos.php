<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Plan de incentivos</h1>
        <p><em>En esta pagina se pueden ver los Incentivos activos para los asesores.</em></p>
        <a href="agregarIncentivos" class="btn btn-success">Agregar Incentivos</a>
    </div>
    <!-- /.col-lg-12 -->
</div>

    </br>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr>
                                <th>Nombre del incentivo</th>
                                <th>Hora de Inicio</th>
                                <th>Hora Final</th>
                                <th>Provedor</th>
                                <th>Fecha Redencion</th>
                                <th>Tienda</th>
                                <th>Tipo de Redencion</th>
                                <th>Fecha de inclusión</th>
                                <th>Activar/inactivar</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $Incentivos )
                                    foreach ($Incentivos as $key => $datos) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $datos->NombreIncentivo; ?></td>
                                <td><?php echo $datos->FechaInicio; ?></td>
                                <td><?php echo $datos->FechaFinal; ?></td>
                                <td><?php echo $datos->NombreProvedor; ?></td>
                                <td><?php echo $datos->FechaRend; ?></td>
                                <td><?php echo $datos->Tienda; ?></td>
                                <td><?php echo $datos->tipoRedencion; ?></td>
                                <td><?php echo $datos->FechaInclusion; ?></td>
                                <td><input type="checkbox" name="activo" class="toggle-estado" data-id="<?php echo $datos->idEstado; ?>" <?php echo ($datos->idEstado == 1) ? 'checked' : ''; ?> /></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarIncentivos?id=<?php echo $datos->idPromo;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                      <a href="contenidoIncentivos?id=<?php echo $datos->idPromo;?>" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
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
