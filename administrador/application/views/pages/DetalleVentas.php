<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Detalle de la Venta</h1>
        <p><em>En esta pagina se puede ver el detalle de la venta.</em></p>
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
                                <th>Numero de Factura</th>
                                <th>Tipo de documento</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Fecha de actualización</th>
                                <th>SKU</th>
                                <th>Monto de la Venta</th>
                                <th>Fecha Insercion</th>
                                <th>Usuario</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                           <?php if ( $detalleVentas )
                                    foreach ($detalleVentas as $key => $datos) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $datos->Factura; ?></td>
                                <td><?php echo $datos->TipoDocumento; ?></td>
                                <td><?php echo $datos->Cantidad; ?></td>
                                <td><?php echo $datos->Estado; ?></td>
                                <td><?php echo $datos->FechaActualizacion; ?></td>
                                <td><?php echo $datos->Sku; ?></td>
                                <td><?php echo $datos->MontoVentas; ?></td>
                                <td><?php echo $datos->FechaInsercion; ?></td>
                                <td><?php echo $datos->Usuario; ?></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="DetalleVentas?id=<?php echo $datos->idVenta;?>" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
                                    </div>
                                </td>
                                <?php } ?>
                                <?php } ?>
                             </tr>
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
