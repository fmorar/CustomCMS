            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Pdv</h1>
                    <p><em>En esta página se puede editar el pdv.</em></p>                
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action ="<?php echo site_url('Pages/updatePdv') ?>" method="post">


                      <div class="form-group">
                        <label for="pdv">Nombre del Pdv</label>
                        <input type="text" name="pdv" class="form-control" id="pdv" value="<?php echo $PDV->NombrePdv; ?>">
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
                        <label for="usuario">Usuario</label>
                        <select class="form-control chosen-select" name="usuario" id="usuario">
                          <?php foreach($usuario as $usuarios){ ?>
                          <option value="<?php echo $usuarios->idUsuario; ?>"><?php echo $usuarios->Usuario; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($PDV->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $PDV->idPdv; ?>">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->