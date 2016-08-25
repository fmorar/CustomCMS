            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/updateProductos" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $productos->Titulo; ?>">
                      </div> 
                      <div class="form-group">
                        <label for="Descripcion">Descripción</label>
                        <input type="text" name="Descripcion" class="form-control" id="nombre" placeholder="Descripción" value="<?php echo $productos->Descripcion; ?>">
                      </div>   
                      <div class="form-group">
                        <label for="Codigo">Código</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Código" value="<?php echo $productos->Codigo; ?>">
                      </div>
                      <div class="form-group">
                        <label for="Multiplica">Multiplica</label>
                        <input type="text" name="multiplica" class="form-control" id="multiplica" placeholder="Multiplica" value="<?php echo $productos->Multiplica; ?>">
                      </div>
                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda" value="<?php echo $productos->Tienda; ?>">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"<?php if ($tiendas->idTienda == $productos->idTienda) echo 'selected' ?>><?php echo $tiendas->Tienda; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="Acciones">Acciones</label>
                        <input type="text" name="acciones" class="form-control" id="acciones" placeholder="Acciones" value="<?php echo $productos->Acciones; ?>">
                      </div>
                      <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($productos->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado; ?></option>
                          <?php } ?>
                        </select>
                        <br/>
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
                            <img src="../img/productos/<?php echo $productos->Imagen; ?>" class="img-responsive">
                          </div>
                        </div>
                      </div>

                    </div>  
                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $productos->idCodigo; ?>">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->