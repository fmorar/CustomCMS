            <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Agregar Productos</h1>
                  <p><em>En esta página se pueden agregar productos, los cuales están compuestos por el nombre del mismo, una descripción, el código que lo identifica como un producto marcado para generar puntos, la cantidad de puntos que este genera, también permite ingresar condiciones especiales como el campo de multiplicar que permite asignar al producto la opción de que multiplique los puntos previamente insertados, permite seleccionar la tienda y agregar una imagen relacionada al producto .</em></p>                
              </div>
            </div>

               <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarProductos" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required placeholder="Nombre">
                      </div>
                      <div class="form-group">
                        <label for="Descripcion">Descripción</label>
                        <input type="text" name="Descripcion" class="form-control" id="nombre" placeholder="Descripción">
                      </div>   
                      <div class="form-group">
                        <label for="Codigo">Código</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" required placeholder="Código">
                      </div>
                      <div class="form-group">
                        <label for="Acciones">Acciones</label>
                        <input type="text" name="acciones" class="form-control" id="acciones" required placeholder="Acciones">
                      </div>
                      <div class="form-group">
                        <label for="Multilplica">Multilplica</label>
                        <input type="text" name="multiplica" class="form-control" id="multiplica" required placeholder="Multilplica">
                      </div>
                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda" value="<?php echo $productos->Tienda; ?>">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"><?php echo $tiendas->Tienda; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" required id="imagen">
                      </div> 
                      <div class="text-right">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                </div>
            </div> 
