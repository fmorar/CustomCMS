            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página se pueden editar los comunicados, los cuales están compuestos por el título del mismo, la fecha en la cual se emitió, el medio de comunicación en el cual fue transmitido, el tipo de archivo, el enlace para visualizar dicho archivo, el estado  y una imagen alusiva al comunicado.</em></p>
                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/updateComunicado" method="post" enctype="multipart/form-data">



                      <div class="form-group">
                        <label for="Titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" required placeholder="titulo" value="<?php echo $comunicados->Titulo; ?>">
                      </div>

                      <label>Fecha</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fecha" data-date-format="YYYY-MM-DD" value="<?php echo $comunicados->FechaPublicacion; ?>" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                        
                      <div class="form-group">
                        <label for="medio">Medio de comunicación</label>
                        <select class="form-control" name="medio" id="medio">
                          <?php foreach($medio as $medios){ ?>
                          <option value="<?php echo $medios->idMedio; ?>"<?php if ($medios->idMedio == $comunicados->idMedio) echo 'selected' ?>><?php echo $medios->Nombre; ?></option>
                          <?php } ?>
                        </select>
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
                        <label for="Titulo">Enlace</label>
                        <input type="text" name="enlace" class="form-control" id="enlace" placeholder="enlace" value="<?php echo $comunicados->Enlace; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Detalle">Detalle</label>
                        <input type="text" name="detalle" class="form-control" id="detalle" required placeholder="Detalle" value="<?php echo $comunicados->Detalle; ?>">
                      </div>

                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($comunicados->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda" value="<?php echo $comunicados->Tienda; ?>">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"<?php if ($tiendas->idTienda == $comunicados->idTienda) echo 'selected' ?>><?php echo $tiendas->Tienda; ?></option>
                          <?php } ?>
                        </select>
                      </div>

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
                            <img src="../img/comunicados/<?php echo $comunicados->Imagen; ?>" class="img-responsive">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="archivo">Adjuntar Documento</label>
                            <input type="file" name="archivo" id="archivo">
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel-heading">
                              <h3 class="panel-title">Documento</h3>
                            </div>
                            <div class="panel-body">
                              <h3><?php echo $comunicados->Archivo; ?></h3>
                            </div>
                        </div>
                      </div>

                    </div>

                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $comunicados->idComunicado; ?>">
                        <button type="submit" class="btn btn-success">Actualizar</button>
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