<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Productos participantes</h1>
        <p><em>En esta pagina se pueden ver los Productos activos para esta Promoción.</em></p>
        <a href="agregarcontenidoIncentivos/?idPromo=<?php echo $this->input->get('id', TRUE);?>" class="btn btn-success">Agregar Nuevo Producto</a>
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
                                <th>Código SKU</th>
                                <th>Artículo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Medida</th>
                                <th>Cuota Mínima</th>
                                <th>Tipo redención</th>
                                <th>Premio</th>
                                <th>Estado</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $contenidoIncentivos )
                                    foreach ($contenidoIncentivos as $key => $datos) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $datos->SKU;?></td>
                                <td><?php echo $datos->Articulo;?></td>
                                <td><?php echo $datos->Marca;?></td>
                                <td><?php echo $datos->Modelo;?></td>
                                <td><?php echo $datos->Medida;?></td>
                                <td><?php echo $datos->CuotaMinima;?></td>
                                <td><?php echo $datos->TipoPremio;?></td>
                                <td><?php echo $datos->Premio;?></td>
                                <td><?php echo $datos->Estado;?></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarIncentivos?id=<?php echo $datos->idPromo;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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
