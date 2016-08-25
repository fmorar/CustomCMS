<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Premios</h1>
        <p><em>En esta página se pueden visualizar los premios disponibles y los puntos necesarios para realizar el canje.</em></p>         </div>
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
                                <th>Premio</th>
                                <th>Descripción</th>
                                <th>Puntos</th>
                                <th>Tienda</th>
                                <th>Imagen</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $consultas )
                                    foreach ($consultas as $key => $premios) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $premios->Premio; ?></td>
                                <td><?php echo $premios->Descripcion; ?></td>
                                <td><?php echo $premios->Puntos; ?></td>
                                <td><?php echo $premios->Tienda; ?></td>
                                <td><img src="../img/rewards/<?php echo $premios->Imagen; ?>" class="img-responsive" width="200" height="100" /></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarRewards?id=<?php echo $premios->idRewards;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                      <a href="eliminarRewards?id=<?php echo $premios->idRewards; ?>" class="btn btn-default"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                                      <a href="borrarRewards?id=<?php echo $premios->idRewards; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </div>
                                </td>
                                <?php } ?>
                                <?php } ?>
                             </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="paginas">
                    <?php echo $link; ?>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>