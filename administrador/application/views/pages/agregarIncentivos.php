            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Incentivos </h1>
                    <p><em>En esta página se puede Agregar la información de los Nuevos Incentivos.</em></p>                
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/insertarIncentivos" method="post">

                      <div class="form-group">
                        <label for="NombreIncentivo">Nombre del Incentivo</label>
                        <input type="text" name="NombreIncentivo" class="form-control" id="NombreIncentivo">
                      </div> 

                      <div class="form-group">
                        <label for="Descripcion">Descripción</label>
                        <input type="text" name="Descripcion" class="form-control" id="Descripcion">
                      </div> 

                      <label>Fecha de Inicio</label>
                        <div class="col-sm-12 input-group date datetimepicker" id="dtfechaInicio" >
                          <input type='text' class="form-control"  id="fechaInicio" name="FechaInicio" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>

                      <label>Fecha Final</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="FechaFinal" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>

                      <label>Fecha de Redencion</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="FechaRend" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>

                    <div class="form-group">
                       <label>Fecha Inclusión</label>
                        <div class="col-sm-12 input-group date datetimepicker" >
                          <input type='text' class="form-control" name="Fechainclusion" required/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                         </div>
                    </div>  

                      <div class="form-group">
                        <label for="Provedor">Provedor</label>
                        <select class="form-control" name="Provedor">
                          <?php foreach($provedores as $Provedor){?>
                          <option value="<?php echo $Provedor->idProvedor; ?>"><?php echo $Provedor->Nombre; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                          <label for="Tienda">Tienda</label>
                          <select class="form-control" name="Tienda" id="Tienda">
                            <?php foreach($tienda as $tiendas){ ?>
                            <option value="<?php echo $tiendas->idTienda; ?>"><?php echo $tiendas->Tienda; ?></option>
                            <?php } ?>
                          </select>
                      </div>

                    <div class="form-group show">
                      <label>Seleccione los pdv participantes</label>
                      <select data-placeholder="Seleccione los pdvs" multiple class="chosen-select-width form-control" name="pdvs[]" id="pdvs" >
                        <option value=""></option>
                      </select>
                    </div>  

                      <div class="form-group">
                        <label for="idTipoRedencion">Tipo Redención</label>
                        <select class="form-control" name="idTipoRedencion">
                          <?php foreach($redencion as $tipoRedencion){ ?>
                          <option value="<?php echo $tipoRedencion->idTipoRedencion; ?>"><?php echo $tipoRedencion->tipoRedencion;?></option>
                          <?php } ?>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="reglamento">Terminos y condiciones</label>
                      <textarea id="editarReglamento" name="reglamento" class="form-control" id="reglamento" placeholder="Reglamento">
                        
                      </textarea>
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