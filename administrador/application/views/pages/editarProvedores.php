            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar provedores </h1>
                    <p><em>En esta página se puede editar la información de los provedores.</em></p>                
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/updateProvedores" method="post">

                      <div class="form-group">
                        <label for="Nombre">Nombre del provedor</label>
                        <input type="text" name="Nombre" class="form-control" id="Nombre" value="<?php echo $Provedores->Nombre; ?>">
                      </div> 

                      <div class="form-group">
                        <label for="Telefono">Numero del provedor</label>
                        <input type="text" name="Telefono" class="form-control" id="Telefono" value="<?php echo $Provedores->Telefono; ?>">
                      </div> 

                      <div class="form-group">
                        <label for="Correo">Correo del provedor</label>
                        <input type="text" name="Correo" class="form-control" id="Correo" value="<?php echo $Provedores->Correo; ?>">
                      </div> 

                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($Provedores->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado;?></option>
                          <?php } ?>
                        </select>
                      </div>


                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $Provedores->idProvedor; ?>">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->