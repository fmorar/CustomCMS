            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página el usuario puede editar una notificación los datos aceptados son el título de la misma, el detalle de la notificación, el estado en el cual se encuentra, la tienda a la cual corresponde y la imagen alusiva.</em></p>                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-12">

                    <form action="Pages/updateNotificacion" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="Titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" required placeholder="titulo" value="<?php echo $notificacion->Titulo; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Detalle">Detalle</label>
                        <input type="text" name="detalle" class="form-control" id="detalle" required placeholder="Detalle" value="<?php echo $notificacion->Detalle; ?>">
                      </div>

                      <label>Fecha Envio</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fecha" data-date-format="YYYY-MM-DD" value="<?php echo $notificacion->FechaEnvio; ?>" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($notificacion->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado ; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda" value="<?php echo $notificacion->Tienda; ?>">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"<?php if ($tiendas->idTienda == $notificacion->idTienda) echo 'selected' ?>><?php echo $tiendas->Tienda; ?></option>
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

                            <img src="../img/notificaciones/<?php echo $notificacion->Imagen; ?>" class="img-responsive">

                          </div>

                        </div>

                      </div>

                    </div>

                      <div class="text-right">

                        <input type="hidden" name="id" value="<?php echo $notificacion->idNotificacion; ?>">

                        <button type="submit" class="btn btn-success">Actualizar</button>

                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>

                      </div>

                    </form>

                    <!-- /.panel -->

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->