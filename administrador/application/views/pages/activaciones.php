<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Activaciones</h1>
        <p><em>En esta página se pueden administrar las activaciones, se permite desactivarla y editar su información interna.</em></p>
    </div>
    <!-- /.col-lg-12 -->
</div>

    <div class="col-lg-12">
        <form action="<?php echo site_url('ActivacionFiltro'); ?> " method="post" enctype="multipart/form-data">
          <div class="form-group">          
          <div class="form-group">
              <label for="punto">Estado</label>
              <select class="form-control" name="Estado" required id="estado">
                <option readonly value="0">Seleccione una opción</option>
                <?php foreach($estados as $estado){ ?>
                <option value="<?php echo $estado->idEstado; ?>" <?php if($this->input->post('Estado') == $estado->idEstado) echo 'selected'; ?>><?php echo $estado->Estado; ?></option>
                <?php } ?>
              </select>
          </div>

          <div class="text-right panel">
            <button type="submit" class="btn btn-success">Filtrar</button>
            <a href="<?php echo site_url('ActivacionFiltro'); ?>" class="btn btn-success">Limpiar</a>
          </div>
        </form>
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
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Tienda</th>
                                <th>Medio</th>
                                <th>Estado</th>
								<th>Fecha Ingreso</th>
                                <th>Fecha de finalización</th>
                                <th>Imagen</th>
                                 <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($Resultado)
                                    foreach ($Resultado as $key => $activaciones) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $activaciones->Titulo; ?></td>
                                <td><?php echo $activaciones->Descripcion; ?></td>
                                <td><?php echo $activaciones->Tienda; ?></td>
                                <td><?php echo $activaciones->Nombre; ?></td>
                                <td><?php echo $activaciones->Estado; ?></td>
								<td><?php echo $activaciones->Fecha; ?></td>
                                <td><?php echo $activaciones->FechaIngreso; ?></td>
                                <td><img src="../img/activaciones/<?php echo $activaciones->Banner; ?>" class="img-responsive" width="200" height="100" /></td>
                                <td>
                                    <?php if($this->session->userdata('idRol') == 1){ ?>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarActivacion?id=<?php echo $activaciones->idActivacion;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                      <a href="inactivarActivacion?id=<?php echo $activaciones->idActivacion; ?>" class="btn btn-default"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                                      <a href="borrarActivacion?id=<?php echo $activaciones->idActivacion; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </div>
                                </td>
                                 <?php } ?>
                                <?php } ?>
                             </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.table-responsive -->
<!--                 <div class="paginas">
                    <?php //echo $link; ?>
                </div> -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->