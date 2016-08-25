<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">PDV</h1>
        <p><em>En esta pagina se pueden ver los PDVS existentes.</em></p>
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
                                <th>Id del pdv</th>
                                <th>Nombre del PDV</th>
                                <th>Estado</th>
                                <th>Tienda</th>
                                <th>Nombre del Administrador</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $PDV )
                                    foreach ($PDV as $key => $datos) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $datos->idPdv;?></td>
                                <td><?php echo $datos->NombrePdv;?></td>
                                <td><?php echo $datos->Estado;?></td>
                                <td><?php echo $datos->Tienda;?></td>
                                <td><?php echo $datos->Nombre;?></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarPdv?id=<?php echo $datos->idPdv;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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
