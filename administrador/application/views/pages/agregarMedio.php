 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $section_title; ?></h1>
                    <p><em>En esta página se pueden agregar nuevos medios de comunicación.</em></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarMedio" method="post">
                      <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required placeholder="Medio">
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