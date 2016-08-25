    <!-- MetisMenu CSS -->
    <link href="assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="assets/assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu Categorias de Promociones</h1>
                    <p><em>En esta página se pueden ver las categorias del menu de promociones activas o inactivas, cuando una categoria es inactivada esta automáticamente desaparece de la lista de selección en el administrador.</em></p>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <?php if($this->session->userdata('idRol') == 1){ ?>
                                            <th>Opciones</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($tipoPromo)
                                                foreach ($tipoPromo as $key => $menu) {
                                         ?>
                                        <tr>
                                            <td><?php echo $menu->Nombre; ?></td>
                                            <td><?php echo $menu->Estado; ?></td>
                                            <?php if($this->session->userdata('idRol') == 1){ ?>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="...">
                                                  <a href="editar_tipoPromo?id=<?php echo $menu->idTipo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                  <a href="inactivar_tipoPromo?id=<?php echo $menu->idTipo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                                                  <a href="borrar_tipoPromo?id=<?php echo $menu->idTipo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

             <div class="row">
                    <div class="col-lg-12 text-right">
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                        <a href="javascript:window.print(); void 0;" class="btn btn-success">Imprimir</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <hr>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>


