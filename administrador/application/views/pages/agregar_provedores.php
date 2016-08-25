 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página se pueden agregar activaciones, las cuales están compuestas por el título de la misma, la tienda a la cual pertenece, una descripción, el medio de comunicación donde se publicó y una imagen alusiva de la misma.</em></p>                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarActivacion" method="post" enctype="multipart/form-data">
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
                        <label for="Descripción">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" required placeholder="Descripción">
                      </div>

                      <div class="form-group">
                        <label for="medio">Medio</label>
                        <select class="form-control" name="medio" id="medio">
                          <?php foreach($medio as $medios){ ?>
                          <option value="<?php echo $medios->idMedio; ?>"><?php echo $medios->Nombre; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Fecha de Inicio</label>
                          <div class="col-sm-12 input-group date datetimepicker" >
                            <input type='text' class="form-control" name="fechainicio" data-date-format="YYYY-MM-DD" required/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                      </div>

                      <div class="form-group">
                        <label>Fecha de final</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fechafinal" data-date-format="YYYY-MM-DD" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
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