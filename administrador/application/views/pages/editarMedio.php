            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página se pueden editar los medios previamente creados, se permite modificar el nombre y cambiar el estado del mismo.</em></p>                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/updateMedio" method="post">
                      <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Medio" value="<?php echo $medio->Nombre; ?>">
                      </div> 

                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($medio->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $medio->idMedio; ?>">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->