            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header"><?php echo $section_title; ?></h1>

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-12">
                    <form action="Pages/updateActivacion" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="Titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" required placeholder="titulo" value="<?php echo $activacion->Titulo; ?>">
                      </div>

                      <div class="form-group">
                        <label>Fecha de Inicio</label>
                          <div class="col-sm-12 input-group date datetimepicker" >
                            <input type='text' class="form-control" name="fechainicio" data-date-format="YYYY-MM-DD" value="<?php echo $activacion->Fecha; ?>" required/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                      </div>

                      <div class="form-group">
                        <label>Fecha de final</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fechafinal" data-date-format="YYYY-MM-DD" value="<?php echo $activacion->FechaFinal; ?>" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda" value="<?php echo $activacion->Tienda; ?>">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"<?php if ($tiendas->idTienda == $activacion->idTienda) echo 'selected' ?>><?php echo $tiendas->Tienda; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="medio">Medio</label>
                        <select class="form-control" name="medio" id="medio">
                          <?php foreach($medio as $medios){ ?>
                          <option value="<?php echo $medios->idMedio; ?>"<?php if ($medios->idMedio == $activacion->idMedio) echo 'selected' ?>><?php echo $medios->Nombre; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="Descripción">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo $activacion->Descripcion; ?>" required placeholder="Descripción">
                      </div>
                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($activacion->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado ; ?></option>
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
                            <img src="../img/activaciones/<?php echo $activacion->Banner; ?>" class="img-responsive">
                          </div>
                        </div>

                      </div>
                    </div>

                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $activacion->idActivacion; ?>">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>

                    </form>

                    <!-- /.panel -->

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->
			</div>
<br/>
<br/>