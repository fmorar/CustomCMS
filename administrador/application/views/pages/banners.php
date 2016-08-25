<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Banners</h1>
        <p><em>En esta página el usuario Puede visualizar los banners activos e inactivos para las respectivas tiendas.</em></p>                   </div>
    <!-- /.col-lg-12 -->
    </div>

    <div class="col-lg-12">
        <form action="<?php echo site_url('BannersFiltro'); ?> " method="post" enctype="multipart/form-data">
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
            <a href="<?php echo site_url('BannersFiltro'); ?>" class="btn btn-success">Limpiar</a>
          </div>
        </form>
</div>
<!-- /.col-lg-12 -->
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
                                <th>Tienda</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( isset($Resultado) )
                                    foreach ($Resultado as $key => $banner) {
                             ?>
                            <tr class="odd"> 
                                <td><?php echo $banner->Titulo; ?></td>
                                <td><?php echo $banner->Tienda; ?></td>
                                <td><img src="../img/banners/<?php echo $banner->Imagen; ?>" class="img-responsive" width="200" height="100" /></td>
                                <td><?php echo $banner->Estado; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                      <a href="editarBanner?id=<?php echo $banner->idBanner;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                      <a href="inactivarBanner?id=<?php echo $banner->idBanner; ?>" class="btn btn-default"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                                    <a href="borrarBanner?id=<?php echo $banner->idBanner; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </div>
                                </td>
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
</div>