    <!-- MetisMenu CSS -->
    <link href="assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página el usuario puede ver las facturas que los vendedores activan para posteriormente validar las.</em></p>                  </div>
                <!-- /.col-lg-12 -->
  </div>
<!-- /.row -->
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                                    <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre Completo</th>
                                <th>Fecha de la activación</th>
                                <th>Tienda</th>
                                <th>Factura</th>
                                 <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( isset($facturas) )
                                    foreach ($facturas as $key => $facturas) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $facturas->Usuario; ?></td>
                                <td><?php echo $facturas->Nombre; ?></td>
                                <td><?php echo $facturas->Fecha; ?></td>
                                <td><?php echo $facturas->Tienda; ?></td>
                                <td><?php echo $facturas->Factura; ?></td>
                                <td>
                                    <?php if($this->session->userdata('idRol') == 1){ ?>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="<?php echo site_url('editarFacturas?factura='.$facturas->Factura.'&vendedor='.$facturas->idVendedor); ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    </div>
                                </td>
                                 <?php } ?>
                                <?php } ?>
                             </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.table-responsive -->
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

           

