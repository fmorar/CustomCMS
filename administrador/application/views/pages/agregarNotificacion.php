 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página el usuario puede agregar una notificación los datos aceptados son el título de la misma, el detalle de la notificación, el estado en el cual se encuentra, la tienda a la cual corresponde y la imagen alusiva.</em></p>               
                </div>

<!-- /.col-lg-12 -->
</div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarNotificacion" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" required placeholder="Titulo">
                      </div>
                    
                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"><?php echo $tiendas->Tienda; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">

                      <div class="form-group">
                        <label for="Detalle">Detalle</label>
                        <input type="text" name="detalle" class="form-control" id="detalle" required placeholder="Detalle">
                      </div>

                          <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen"  id="imagen">
                        </div>
                      </div>
                      <div class="text-right">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->