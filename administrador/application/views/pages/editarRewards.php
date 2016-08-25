            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página se puede editar los premios previamente insertados se permite modificar el título del mismo, las descripción, la cantidad de puntos necesarios para para canjear el premio, la tienda a la cual pertenece el premio y la imagen alusiva al mismo.</em></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/updateRewards" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Premio">Premio</label>
                        <input type="text" name="premio" class="form-control" id="premio" required placeholder="premio" value="<?php echo $rewards->Premio; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" required placeholder="Descripción" value="<?php echo $rewards->Descripcion; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Puntos">Puntos</label>
                        <input type="text" name="puntos" class="form-control" id="puntos" required placeholder="puntos" value="<?php echo $rewards->Puntos; ?>">
                      </div>

                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda" value="<?php echo $comunicados->Tienda; ?>">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"<?php if ($tiendas->idTienda == $rewards->idTienda) echo 'selected' ?>><?php echo $tiendas->Tienda; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="imagen">Imagen</label>
                          <input type="file" name="imagen" id="imagen">
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Imagen</h3>
                          </div>
                          <div class="panel-body">
                            <img src="../img/rewards/<?php echo $rewards->Imagen; ?>" class="img-responsive">
                          </div>
                        </div>
                      </div>
                    </div>

                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $rewards->idRewards; ?>">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->