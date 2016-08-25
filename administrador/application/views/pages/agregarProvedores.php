 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Provedores</h1>
                    <p><em>En esta página se pueden agregar Nuevos Provedores.</em></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarProvedores" method="post">

                      <div class="form-group">
                        <label for="Nombre">Nombre del provedor</label>
                        <input type="text" name="Nombre" class="form-control" id="Nombre" required placeholder="Provedor">
                      </div>

                    <div class="form-group">
                        <label for="Telefono">Telefono del provedor</label>
                        <input type="text" name="Telefono" class="form-control" id="Telefono" required placeholder="Numero">
                      </div>

                    <div class="form-group">
                        <label for="Correo">Correo del provedor</label>
                        <input type="text" name="Correo" class="form-control" id="Correo" required placeholder="Correo">
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
            <!-- /.row -->