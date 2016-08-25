<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Provedores</h1>
        <p><em>En esta pagina se pueden administrar los provedores.</em></p>
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
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr>
                                <th>Provedor</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $Provedores )
                                    foreach ($Provedores as $key => $datos) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $datos->Nombre; ?></td>
                                <td><?php echo $datos->Telefono; ?></td>
                                <td><?php echo $datos->Correo; ?></td>
                                <td><?php echo $datos->Estado; ?></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarProvedores?id=<?php echo $datos->idProvedor;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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
