            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Usuarios Sistema</h1>
                    <p><em>En esta página el usuario puede observar todos lo usuarios para ambas tiendas, buscar por medio de su numero de cédula y editar o eliminar usuarios.</em></p>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <form action="usuarios" method="post">
                            <fieldset>
                                <legend>Filtrar:</legend>
                                <select class="form-control" name="tipoBusqueda" id="tipoBusqueda" required>
                                    <option id="resetFilter">Todos</option>
                                    <option <?php if ($this->session->userdata('filtro')['tipoBusqueda'] == 'cedula') echo 'selected'; ?> value="cedula">Busqueda por Número de Cédula</option>
                                    <option <?php if ($this->session->userdata('filtro')['tipoBusqueda'] == 'pdv') echo 'selected'; ?> value="pdv">Busqueda por PDV</option>
                                    <option <?php if ($this->session->userdata('filtro')['tipoBusqueda'] == 'nombre') echo 'selected'; ?>value="nombre">Busqueda por Nombre</option>
                                </select>
                            </fieldset>
                            <br>
                            <div id="filtro">
                                <div class="form-group">
                                    <label for="filtro_usuario">Busqueda</label>
                                    <input type="text" class="form-control" id="filtro_usuario" name="filtro_usuario" placeholder="Ingrese el elemento a buscar..." value="<?php echo $this->session->userdata('filtro')['filtro_usuario']; ?>">
                                </div>
                            </div>
                            <input type="submit" value="Buscar" name="filtro" class="btn btn-success" />
                            <a href="<?php echo site_url('Pages/exportarUsuarios'); ?>" class="btn btn-info">Exportar Usuarios</a>
                        </form>
                        <br>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cédula</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Usuario</th>
                                            <th>Rol</th>
                                            <th>Tienda</th>
                                            <th>PDV</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Estado</th>
                                            <th>Ultima Fecha de Modificación</th>
                                            <?php if($this->session->userdata('idRol') == 1){ ?>
                                            <th>Opciones</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($consultas)
                                                foreach ($consultas as $key => $usuario) {
                                         ?>
                                        <tr>
                                            <td><?php echo $usuario->Nombre; ?></td>
                                            <td><?php echo $usuario->Cedula; ?></td>
                                            <td><?php echo $usuario->Email; ?></td>
                                            <td><?php echo $usuario->Telefono; ?></td>
                                            <td><?php echo $usuario->Usuario; ?></td>
                                            <td><?php echo $usuario->Rol; ?></td>
                                            <td><?php echo $usuario->Tienda; ?></td>
                                            <td><?php echo $usuario->NombrePdv; ?></td>
                                            <td><?php echo $usuario->FechaIngreso; ?></td>
                                            <td><?php echo $usuario->Estado; ?></td>
                                            <td><?php echo $usuario->FechaBaja; ?></td>
                                            <?php if($this->session->userdata('idRol') == 1){ ?>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="...">
                                                  <a href="editar_usuario?id=<?php echo $usuario->idUsuario; ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                  <a href="inactivarUsuario?id=<?php echo $usuario->idUsuario; ?>" class="btn btn-default"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
                                                  <a href="borrarUsuario?id=<?php echo $usuario->idUsuario; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                        </div>

                        <!-- /.panel-body -->
                    </div>
                                            <div class="paginas">
                            <?php echo $link; ?>
                        </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

             <div class="row">
                    <div class="col-lg-12 text-right">
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                        <a href="javascript:window.print(); void 0;" class="btn btn-success">Imprimir</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <hr>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
