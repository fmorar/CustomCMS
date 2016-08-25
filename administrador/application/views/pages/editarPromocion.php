            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header"><?php echo $section_title; ?></h1>

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-12">

                    <form action="Pages/updatePromocion" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="Titulo">Nombre del Producto</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" required placeholder="titulo" value="<?php echo $promocion->Titulo; ?>">
                      </div>

                       <div class="form-group">
                        <label for="Marca">Marca</label>
                        <input type="text" name="marca" class="form-control" id="marca" required placeholder="Marca" value="<?php echo $promocion->Marca; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" required placeholder="Descripción" value="<?php echo $promocion->Descripcion; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Codigo">Código del Producto</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" required placeholder="Código" value="<?php echo $promocion->Codigo; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Precio">Precio</label>
                        <input type="text" name="precio" class="form-control" id="precio" required placeholder="Precio ¢" value="<?php echo $promocion->Precio; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Ahora">Ahora</label>
                        <input type="text" name="ahora" class="form-control" id="ahora" required placeholder="Ahora ¢" value="<?php echo $promocion->Ahora; ?>">
                      </div>

                      <div class="form-group">
                        <label for="Regalia">Regalía</label>
                        <input type="text" name="regalia" class="form-control" id="regalia" placeholder="Regalía" value="<?php echo $promocion->Regalia; ?>">
                      </div>

                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($promocion->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      
                      <label>Fecha de Ingreso</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fecha" value="<?php echo $promocion->FechaIngreso; ?>" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>

                         <div class="form-group">
                            <label>Fecha Inicio</label>
                            <div class="col-sm-12 input-group date datetimepicker" >
                              <input type='text' class="form-control" name="fechainicio" data-date-format="YYYY-MM-DD" value="<?php echo $promocion->FechaInicio; ?>"/>
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Fecha Final</label>
                            <div class="col-sm-12 input-group date datetimepicker" >
                              <input type='text' class="form-control" name="fechafinal" data-date-format="YYYY-MM-DD" value="<?php echo $promocion->FechaFinal; ?>"/>
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                          </div>

                      <div class="form-group">
                        <label for="tipo">Linea</label>
                        <select class="form-control" name="tipo" id="tipo">
                          <?php foreach($tipo as $tipos){ ?>
                          <option value="<?php echo $tipos->idTipo; ?>"<?php if ($tipos->idTipo == $promocion->idTipo) echo 'selected' ?>><?php echo $tipos->Nombre; ?></option>
                          <?php } ?>
                        </select>
                      </div>    

                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda" value="<?php echo $promocion->Tienda; ?>">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"<?php if ($tiendas->idTienda == $promocion->idTienda) echo 'selected' ?>><?php echo $tiendas->Tienda; ?></option>
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
                            <img src="../img/promociones/<?php echo $promocion->Banner; ?>" class="img-responsive">
                          </div>
                        </div>
                      </div>

                    </div>

                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $promocion->idPromocion; ?>">
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