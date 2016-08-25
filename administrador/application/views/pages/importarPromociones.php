      <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $section_title; ?></h1>
            <p><em>En esta página se puede realizar una carga dinámica de las promociones siguiendo las instrucciones redactadas más abajo.</em></p>        <!-- /.col-lg-12 -->
      </div>
          <!-- /.row -->
          <div class="row">
              <div class="col-lg-6">
                  <form action="<?php echo site_url('Pages/importarPromociones'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="importcsv">Importar Datos</label>
                      <input type="file" name="importcsv" required id="importcsv">
                    </div>

                    <div class="form-group">
                      <label for="importImg">Importar Imagenes</label>
                      <input type="file" name="importImg" required id="importImg">
                    </div>
              </div>

              <div class="col-lg-6">
                        <h4 class="tag-title">Instrucciones</h4>
                        <hr />
                        <p>
                          Se debe importar un archivo ".csv" delimitado por comas con la estructura definida en el archivo de ejemplo
                          (<a class="btn btn-link" href="assets/files/ejemplo.csv">Descargar archivo Csv de ejemplo</a>)
                          las imágenes deben estar en un ".zip" y el nombre de las mismas debe ser igual al código de la promoción, todas la 
                          imagenes deben estar en formato ".jpg", los campos en la tabla Tienda y Categoria corresponden al id, los id para el campo tienda son: <b>1->Gollo, 2->La Curacao y 3->Ambas</b> y a continuación se presenta
                          una tabla con los id's correspondientes para cada categoria.
                        </p>
                        <br/>

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">ID Categorias</div>
                                <!-- /.panel-heading -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Categoria</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ( isset($tipoPromo) )
                                                foreach ($tipoPromo as $key => $menu) {
                                         ?>
                                        <tr>
                                            <td><?php echo $menu->idTipo; ?></td>
                                            <td><?php echo $menu->Nombre; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                  </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
              </div>

              <div class="text-right">
                  <input type="submit" value="Guardar" name="Guardar" class="btn btn-success"/>
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