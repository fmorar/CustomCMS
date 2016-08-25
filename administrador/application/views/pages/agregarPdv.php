            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Pdv</h1>
                    <p><em>En esta página se pueden agregar Nuevos puntos de ventas.</em></p>                
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action ="<?php echo site_url('Pages/insertarPDV') ?>" method="post">


                      <div class="form-group">
                        <label for="pdv">Nombre del Pdv</label>
                        <input type="text" name="pdv" class="form-control" id="pdv">
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
                        <label for="usuario">Usuario</label>
                        <select class="form-control chosen-select" name="usuario" id="usuario">
                          <?php foreach($usuario as $usuarios){ ?>
                          <option value="<?php echo $usuarios->idUsuario; ?>"><?php echo $usuarios->Usuario; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="text-right">
                        <input type="hidden" name="idPromo" value="<?php echo $this->input->get('idPromo', TRUE);?>">
                        <button type="submit" class="btn btn-success">Agregar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->