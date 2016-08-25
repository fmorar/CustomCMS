            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Productos Participantes</h1>
                    <p><em>En esta página se pueden agregar productos participantes  a una promocion Activa.</em></p>                
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action ="<?php echo site_url('Pages/insertarcontenidoIncentivos') ?>" method="post">


                      <div class="form-group">
                        <label for="SKU">SKU</label>
                        <input type="text" name="SKU" class="form-control" id="SKU">
                      </div> 

                      <div class="form-group">
                        <label for="Articulo">Artículo</label>
                        <input type="text" name="Articulo" class="form-control" id="Articulo">
                      </div> 

                      <div class="form-group">
                        <label for="Marca">Marca</label>
                        <input type="text" name="Marca" class="form-control" id="Marca">
                      </div> 

                      <div class="form-group">
                        <label for="Modelo">Modelo</label>
                        <input type="text" name="Modelo" class="form-control" id="Modelo">
                      </div> 

                      <div class="form-group">
                        <label for="Medida">Medida</label>
                        <input type="text" name="Medida" class="form-control" id="Medida">
                      </div>

                      <div class="form-group">
                        <label for="CuotaMinima">Cuota Minima</label>
                        <input type="text" name="CuotaMinima" class="form-control" id="CuotaMinima">
                      </div> 

                      <div class="form-group">
                        <label for="DescArticulo">Descuento Articulo</label>
                        <input type="text" name="DescArticulo" class="form-control" id="DescArticulo">
                      </div> 

                      <div class="form-group">
                        <label for="TipoPremio">Tipo Premio</label>
                        <select class="form-control" name="TipoPremio">
                          <?php foreach($Premios as $Premio){ ?>
                          <option value="<?php echo $Premio->idTipoPremio; ?>"><?php echo $Premio->TipoPremio;?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="Premio">Premio</label>
                        <input type="text" name="Premio" class="form-control" id="Premio">
                      </div> 


                      <div class="text-right">
                        <input type="hidden" name="idPromo" value="<?php echo $this->input->get('idPromo', TRUE);?>">
                        <button type="submit" class="btn btn-success">Agregar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->