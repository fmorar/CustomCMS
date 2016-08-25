      <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $section_title; ?></h1>
            <p><em>En esta página se puede realizar una carga dinámica de los Usuarios siguiendo las instrucciones redactadas más abajo.</em></p>        
      </div>
      </div>
          <!-- /.row -->
          <div class="row">
              <div class="col-lg-6">
                  <form action="<?php echo site_url('Pages/importarUsuarios'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="importcsv">Importar Datos</label>
                      <input type="file" name="importcsv"  class="form-control" required id="importcsv" />
                    </div>
                    <div class="form-group">
                      <label for="clavetmp">Clave temporal</label>
                      <input type="text" name="tmpPassword" id="clavetmp"  class="form-control" required />
                    </div>
              </div>

              <div class="col-lg-6">
                        <h4 class="tag-title">Instrucciones</h4>
                        <hr />
                        <p>
                          Se debe importar un archivo ".csv" delimitado por comas con la estructura definida en el archivo de ejemplo
                          (<a class="btn btn-link" href="assets/files/ejemploUsuarios.csv">Descargar archivo Csv de ejemplo</a>)
                          las imágenes deben estar en un ".zip" y el nombre de las mismas debe ser igual al código de la promoción, todas la 
                          imagenes deben estar en formato ".jpg", los campos en la tabla Tienda y Rol corresponden al id, los id para el campo tienda son: <b>1->Gollo, 2->La Curacao y 3->Ambas</b>
                          y para el campo Rol son:<b>1->Administrador, 2->Asistente y 3->Vendedor</b>
                        </p>
                        <br/>
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
<!-- /.row -->