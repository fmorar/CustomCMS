<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Reporte de Ingresos</h1>
        <p><em>En esta página el usuario puede observar todos lo usuarios para ambas tiendas, buscar por medio de su numero de cédula y editar o eliminar usuarios.</em></p>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="<?php echo site_url('reporteIngresos'); ?> " method="post" enctype="multipart/form-data">
          <div class="form-group">
            <!--<input name="idPdv" type="hidden" value="<?php //echo $this->input->get('id');?>"/>-->
          <div class="form-group">
            <label>Fecha Inicio</label>
            <div class="col-sm-12 input-group date datetimepicker" >
              <input type='text' class="form-control" name="fechaIni" value="<?php echo $this->input->post('fechaIni'); ?>"/>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label>Fecha Final</label>
            <div class="col-sm-12 input-group date datetimepicker" >
              <input type='text' class="form-control" name="fechaFin" value="<?php echo $this->input->post('fechaFin'); ?>"/>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
          <div class="text-right panel">
            <button type="submit" class="btn btn-success">Filtrar</button>
            <a href="<?php echo site_url('reporteIngresos'); ?>" class="btn btn-success">Limpiar</a>
          </div>
        </form>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
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
                                    <th>Tienda</th>
                                    <th>PDV</th>
                                    <th>Ultima Fecha de Conexión</th>
                                    <th>Cantidad de Conexiones</th>
                                    <th>Estado</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($Resultado)
                                        foreach ($Resultado as $key => $usuario) {
                                 ?>
                                <tr>
                                    <td><?php echo $usuario->Nombre; ?></td>
                                    <td><?php echo $usuario->Cedula; ?></td>
                                    <td><?php echo $usuario->Email; ?></td>
                                    <td><?php echo $usuario->Telefono; ?></td>
                                    <td><?php echo $usuario->Usuario; ?></td>
                                    <td><?php echo $usuario->Tienda; ?></td>
                                    <td><?php echo $usuario->NombrePdv; ?></td>
                                    <td><?php echo $usuario->FechaConexion; ?></td>
                                    <td><?php echo $usuario->Total; ?></td>
                                    <td><?php echo $usuario->Estado; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <!-- /.table-responsive -->
                </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

     <div class="row">
            <div class="col-lg-12 text-right">
                <a href="<?php echo site_url('Pages/exportarReporte'); ?>" class="btn btn-info">Exportar Reporte</a>
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
