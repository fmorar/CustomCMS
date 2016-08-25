<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $section_title; ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="<?php echo site_url('filtrarPromociones'); ?> " method="post" enctype="multipart/form-data">
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

          <div class="form-group">
              <label for="punto">Categoría</label>
              <select class="form-control" name="Categoria" required id="categoria">
                <option readonly value="0">Seleccione una opción</option>
                <?php foreach($tipos as $tipo){ ?>
                <option value="<?php echo $tipo->idTipo; ?>" <?php if($this->input->post('Categoria') == $tipo->idTipo) echo 'selected'; ?>><?php echo $tipo->Nombre; ?></option>
                <?php } ?>
              </select>
          </div>

          <div class="text-right panel">
            <button type="submit" class="btn btn-success">Filtrar</button>
            <a href="<?php echo site_url('filtrarPromociones'); ?>" class="btn btn-success">Limpiar</a>
          </div>
        </form>
    </div>
    <!-- /.col-lg-12 -->
</div>

    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Categoría</th>
                                <th>Descripción</th>
                                <th>Código</th>
                                <th>Precio</th>
                                <th>Ahora</th>
                                <th>Tienda</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Imagen</th>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <th>Opciones</th>
                                 <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $Resultado )
                                    foreach ($Resultado as $key => $promociones) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $promociones->Titulo; ?></td>
                                <td><?php echo $promociones->Categoria; ?></td>
                                <td><?php echo $promociones->Descripcion; ?></td>
                                <td><?php echo $promociones->Codigo; ?></td>
                                <td><?php echo $promociones->Precio; ?></td>
                                <td><?php echo $promociones->Ahora; ?></td>
                                <td><?php echo $promociones->Tienda; ?></td>
                                <td><?php echo $promociones->Estado; ?></td>
                                <td><?php echo $promociones->FechaIngreso; ?></td>
                                <td><img src="../img/promociones/<?php echo $promociones->Banner; ?>" class="img-responsive" width="200" height="100" /></td>
                                <?php if($this->session->userdata('idRol') == 1){ ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarPromocion?id=<?php echo $promociones->idPromocion;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                      <a href="inactivarPromocion?id=<?php echo $promociones->idPromocion; ?>" class="btn btn-default"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                                      <a href="borrarPromocion?id=<?php echo $promociones->idPromocion; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </div>
                                </td>
                                <?php } ?>
                                <?php } ?>
                             </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <!--<div class="paginas">
                        <?php //echo $link; ?>
                </div>-->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>