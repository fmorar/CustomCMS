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
        <p><em>En esta página se pueden visualizar los productos con codigos promocionales y la cantidad de puntos que cada productos genera por venta</em></p>                
    </div>
    <!-- /.col-lg-12 -->
</div>
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
                                            <th>Banner</th>
                                            <th>Descripción</th>
                                            <th>Código</th>
                                            <th>Tienda</th>
                                            <th>Acciones</th>
                                            <th>Multiplica</th>
                                            <th>Estado</th>
                                            <?php if($this->session->userdata('idRol') == 1){ ?>
                                            <th>Opciones</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ( isset($productos) )
                                                foreach ($productos as $key => $prod) {
                                         ?>
                                        <tr>
                                            <td><?php echo $prod->Titulo; ?></td>
                                            <td><img src="../img/productos/<?php echo $prod->Imagen; ?>" class="img-responsive" width="200" height="100" /></td>
                                            <td><?php echo $prod->Descripcion; ?></td>
                                            <td><?php echo $prod->Codigo; ?></td>
                                            <td><?php echo $prod->Tienda; ?></td>
                                            <td><?php echo $prod->Acciones; ?></td>
                                            <td><?php echo $prod->Multiplica; ?></td>
                                            <td><?php echo $prod->Estado; ?></td>
                                            <?php if($this->session->userdata('idRol') == 1){ ?>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="...">
                                                  <a href="editarProductos?id=<?php echo $prod->idCodigo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                  <a href="eliminarProductos?id=<?php echo $prod->idCodigo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                                                  <a href="borrarProductos?id=<?php echo $prod->idCodigo; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>

                    </div>
                </div>
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
            </div>

           

