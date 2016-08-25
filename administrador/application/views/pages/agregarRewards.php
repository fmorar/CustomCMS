 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página se pueden agregar nuevos premios, se permite insertar el título del mismo, las descripción del premio, la cantidad de puntos necesarias para hacerlo efectivo y la tienda a la que pertenece.</em></p>                </div>
                <!-- /.col-lg-12 -->
  </div>
<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarRewards" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Premio">Premio</label>
                        <input type="text" name="premio" class="form-control" id="premio" required placeholder="Premio">
                      </div>

                       <div class="form-group">
                        <label for="Descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" required placeholder="Descripción">
                      </div>

                      <div class="form-group">
                        <label for="Puntos">Puntos</label>
                        <input type="text" name="puntos" class="form-control" id="puntos" required placeholder="Puntos">
                      </div>

                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="medio">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"><?php echo $tiendas->Tienda; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    
                          <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" required id="imagen">
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