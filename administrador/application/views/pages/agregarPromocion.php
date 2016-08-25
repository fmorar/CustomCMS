 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página se pueden agregar nuevas promociones permite agregar el título de la misma, la fecha en la que empieza y en la que termina, la marca del producto, el código del mismo, una descripción del producto, si este posee una regalía o no, el precio normal y el precio con descuento.</em></p>                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarPromocion" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Titulo">Nombre del Producto</label>
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
                        <label for="tipo">Linea</label>
                        <select class="form-control" name="tipo" id="tipo">
                          <?php foreach($tipo as $tipos){ ?>
                          <option value="<?php echo $tipos->idTipo; ?>"><?php echo $tipos->Nombre; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">

                        <label>Fecha de Ingreso</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fecha" data-date="" data-date-format="YYYY-MM-DD" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Fecha Inicio</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="fechainicio" data-date="" data-date-format="YYYY-MM-DD" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                       <div class="form-group">
                          <label>Fecha Final</label>
                            <div class="col-sm-12 input-group date datetimepicker" >
                            <input type='text' class="form-control" name="fechafinal" data-date="" data-date-format="YYYY-MM-DD" required/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="Marca">Marca</label>
                        <input type="text" name="marca" class="form-control" id="marca" required placeholder="Marca">
                      </div>

                      <div class="form-group">
                        <label for="codigo">Código del Producto</label>
                        <input type="text" name="codigo" class="form-control" id="Codigo" required placeholder="Código">
                      </div>

                      <div class="form-group">
                        <label for="Descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" required placeholder="Descripción">
                      </div>

                      <div class="form-group">
                        <label for="Regalia">Regalía</label>
                        <input type="text" name="regalia" class="form-control" id="regalia" required placeholder="Regalía">
                      </div>

                      <div class="form-group">
                        <label for="Descripción">Precio normal</label>
                        <input type="text" name="precio" class="form-control" id="precio" required placeholder="Precio ¢">
                      </div>

                      <div class="form-group">
                        <label for="Descripción">Precio con descuento</label>
                        <input type="text" name="ahora" class="form-control" id="ahora" required placeholder="Ahora ¢">
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
			<br/>
			<br/>
            <!-- /.row -->