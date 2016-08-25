<!-- MetisMenu CSS -->
<link href="assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link href="assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="assets/assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $section_title; ?></h1>
                <p><em>En esta página se puede visualizar el reglamento de la sección de plan de vendedores</em></p>
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
                                        <th>Terminos y condiciones</th>
                                        <?php if($this->session->userdata('idRol') == 1){ ?>
                                        <th>Opciones</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $consultas ->reglamento; ?></td>
                                        <?php if($this->session->userdata('idRol') == 1){ ?>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="...">
                                              <a href="editarReglamento?id=<?php echo $consultas->idReglamento; ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                            </div>
                                        </td>
                                        <?php } ?>
                                    </tr>
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
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-right">
                    <hr>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>


