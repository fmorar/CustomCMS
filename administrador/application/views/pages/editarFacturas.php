<form action="<?php echo site_url('Pages/updateFacturas'); ?>" method="POST">          
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Validar Facturas</h1>
                    <p><em>En esta página el usuario puede revisar la factura para validar que todos los datos sean reales.</em></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


                      <div class="row center">
                        <div class="col-md-6 col-centered">
                          <div class="thumbnail">
                            <img alt="Image" class="img-responsive" src="<?php echo $facturas[0]->Imagen; ?>">
                            <div class="caption">
                              <h3>Detalle del Usuario</h3>
                              <ul>
                                <li><p><b>Nombre del Usuario:</b> <?php echo $facturas[0]->Usuario; ?></p></li>
                                <li><p><b>Nombre del Completo:</b> <?php echo $facturas[0]->Nombre; ?></p></li>
                                <li><p><b>Fecha de la Activación:</b> <?php echo $facturas[0]->Fecha; ?></p></li>
                                <li><b>Codigos  de Productos:</b>
                                  <ul>
                                    <li>
                                      <?php foreach ($facturas as $item) { ?>
                                        <p><?php echo $item->Codigo; ?></p>                               
                                      <?php } ?>
                                    </li>
                                  </ul>

                                </li>
                              </ul>
                                <p>
                                  <label>Seleccione una opción</label>
                                  <select class="form-control" name="validarFactura">
                                    <option value="0" <?php echo ($facturas[0]->Valido == 0) ? 'selected' : ''; ?>>Por revisar</option>
                                    <option value="1" <?php echo ($facturas[0]->Valido == 1) ? 'selected' : ''; ?>>Válido</option>
                                    <option value="2" <?php echo ($facturas[0]->Valido == 2) ? 'selected' : ''; ?>>No válido</option>
                                  </select>
                                </p>
                          </div>
                        </div>
                      </div>

  <div class="col-md-1"></div>
  <div class="col-md-3">
  </div>
  <div class="col-md-1">
  </div>
</div>
</div>

<div class="text-right">
  <input type="hidden" name="idVendedor" value="<?php echo $facturas[0]->idVendedor; ?>">
  <input type="hidden" name="Factura" value="<?php echo $facturas[0]->Factura; ?>">
  <button type="submit" class="btn btn-success">Actualizar</button>
  <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
</div>
<br/>
      <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</form>