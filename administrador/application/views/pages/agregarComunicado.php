 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página se pueden agregar comunicados, los cuales están compuestos por el título del mismo, la fecha en la cual se emitió, el medio de comunicación en el cual fue transmitido, el tipo de archivo, el enlace para visualizar dicho archivo y una imagen alusiva al comunicado.</em></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarComunicado" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" required placeholder="Titulo">
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
                        <label for="Enlace">Enlace</label>
                        <input type="text" name="enlace" class="form-control" id="enlace" placeholder="Enlace">
                      </div>

                      <div class="form-group">
                        <label for="multimedia">Tipo Multimedia</label>
                        <select class="form-control" name="multimedia" id="multimedia">
                          <?php foreach($multimedia as $multimedias){ ?>
                          <option value="<?php echo $multimedias->idTipoMultimedia; ?>"><?php echo $multimedias->Tipo; ?></option>
                          <?php } ?>
                        </select>
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
                        <label for="Detalle">Detalle</label>
                        <input type="text" name="detalle" class="form-control" id="detalle" required placeholder="Detalle">
                      </div>

                      <div class="form-group">

                        <label>Fecha de inicio</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fecha" data-date="" data-date-format="YYYY-MM-DD" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>

                        <label>Fecha de Fin</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fecha" data-date="" data-date-format="YYYY-MM-DD" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>

                      </div><!-- /.form-group -->

                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" required id="imagen">
                        </div>
                        
                      <div class="form-group">
                        <label for="archivo">Adjuntar Documento</label>
                        <input type="file" name="archivo" id="archivo">
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
			<br/>
			<br/>
            <!-- /.row -->