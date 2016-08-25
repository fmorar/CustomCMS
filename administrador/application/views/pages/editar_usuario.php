            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/updateUsuario" onSubmit="return validate()" method="post">
                      <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre Usuario" value="<?php echo $usuario->Nombre; ?>">
                      </div>
                      <div class="form-group">
                        <label for="Cedula">Cédula</label>
                        <input type="text" name="cedula" class="form-control" id="Cedula" placeholder="Cédula" value="<?php echo $usuario->Cedula; ?>">
                      </div>
                      <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="email" class="form-control" id="Email" placeholder="Email" value="<?php echo $usuario->Email; ?>">
                      </div>
                      <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Teléfono" value="<?php echo $usuario->Telefono; ?>">
                      </div>
                      <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario" value="<?php echo $usuario->Usuario; ?>">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required class="form-control" minlength="9" maxlength="30">
                      </div>
                      <div class="form-group">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol">
                          <?php foreach($roles as $rol){ ?>
                          <option value="<?php echo $rol->idRol; ?>" <?php if($usuario->idRol == $rol->idRol)echo 'selected'; ?>><?php echo $rol->Rol; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="pdv">PDV</label>
                        <select class="form-control" name="pdv">
                          <?php foreach($pdvs as $pdv){ ?>
                          <option value="<?php echo $pdv->idPdv; ?>" <?php if($usuario->idPdv == $pdv->idPdv)echo 'selected'; ?>><?php echo $pdv->NombrePdv; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <select class="form-control" name="tienda" id="tienda" value="<?php echo $comunicados->Tienda; ?>">
                          <?php foreach($tienda as $tiendas){ ?>
                          <option value="<?php echo $tiendas->idTienda; ?>"><?php echo $tiendas->Tienda; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                          <?php foreach($estados as $estado){ ?>
                          <option value="<?php echo $estado->idEstado; ?>" <?php if($usuario->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $usuario->idUsuario; ?>">
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