 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p>
                      <em>En esta página el usuario puede agregar nuevos usuarios la contraseña siempre debe cumplir con los siguientes parámetros: 
                      <ul>
                        <li>El primer dígito siempre tiene que ser una letra.</li>
                        <li>Dentro de los primeros 5 dígitos debe haber un número.</li>
                        <li>No se permiten caracteres especiales.</li>
                      </ul>
                      </em>
                    </p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form  action="Pages/insertarUsuario" onSubmit="return validate()" method="post">
                      <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required placeholder="Nombre Usuario">
                      </div>
                      <div class="form-group">
                        <label for="Cedula">Cédula</label>
                        <input type="text" name="cedula" required class="form-control" id="cedula" placeholder="Cédula" minlength="9">
                      </div>
                      <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email" required class="form-control" id="Email" placeholder="Email">
                      </div>
                       <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input type="text" name="telefono" required class="form-control" id="telefono" placeholder="Teléfono">
                      </div>
                      <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" required class="form-control" id="usuario" placeholder="Usuario">
                      </div>
                      <div class="form-group">
                        <label for="Contraseña">Contraseña</label>
                        <input type="password" id="password" name="password" required class="form-control" minlength="9" maxlength="30">
                        <p id="error-email"></p>
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
                        <label for="pdv">PDV</label>
                        <select class="form-control" name="pdv">
                          <?php foreach($pdvs as $pdv){ ?>
                          <option value="<?php echo $pdv->idPdv; ?>"><?php echo $pdv->NombrePdv; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" required id="rol">
                          <?php foreach($roles as $rol){ ?>
                          <option value="<?php echo $rol->idRol; ?>"><?php echo $rol->Rol; ?></option>
                          <?php } ?>
                        </select>
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