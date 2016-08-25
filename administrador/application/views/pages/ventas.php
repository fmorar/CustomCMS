<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cuadro de Ventas</h1>
        <p><em>En esta pagina se pueden ver las ventas.</em></p>
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
                                <th>Nombre de la promoción</th>
                                <th>Usuario</th>
                                <th>Nombre del PDV</th>
                                <th>SKU</th>
                                <th>Monto de la venta</th>
                                <th>Cantidad de Facturas</th>
                                <th>Porcentaje de la cuota</th>
                                <th>Premio a redemir</th>
                                <th>Estado</th>
                                <th>Fecha de actualización</th>
                                <th>Fecha de Redención</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $ventas )
                                    foreach ($ventas as $key => $datos) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $datos->NombreIncentivo; ?></td>
                                <td><?php echo $datos->Usuario; ?></td>
                                <td><?php echo $datos->NombrePdv; ?></td>
                                <td><?php echo $datos->Sku; ?></td>
                                <td><?php echo $datos->MontoVentas; ?></td>
                                <td><?php echo $datos->CantidadFacturas; ?></td>
                                <td><?php echo $datos->PorcentajeCuota; ?></td>
                                <td><?php echo $datos->PremioRedimir; ?></td>
                                <td><?php echo $datos->Estado; ?></td>
                                <td><?php echo $datos->FechaActualizacion; ?></td>
                                <td><?php echo $datos->FechaRedencion; ?></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="DetalleVentas?id=<?php echo $datos->idVenta;?>" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
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
