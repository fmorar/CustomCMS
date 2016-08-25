<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contenido Contacto</h1>
        <p><em>En esta página el usuario puede ver los datos de contacto de las oficinas centrales.</em></p>
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
                                <th>Tienda</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Teléfono 2</th>
                                <th>Correo Electrónico</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                    if ($consultas) foreach ($consultas as $key => $contacto) {
                             ?>
                            <tr class="odd">
                                <td><?php echo $contacto->Tienda; ?></td> 
                                <td><?php echo $contacto->Direccion; ?></td>
                                <td><?php echo $contacto->Telefono1; ?></td>
                                <td><?php echo $contacto->Telefono2; ?></td>
                                <td><?php echo $contacto->Email; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarSobreNosotros?id=<?php echo $contacto->idContacto;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    </div>
                                </td>
                                <?php } ?>
                             </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
     <div class="col-lg-12">
             <div class="col-lg-10">
             </div>
        </div>
</div>