            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Control del Horario de ingreso</h1>
                    <p><em>En esta página se puede controlar el horario en el cual se permite ingresar al app de asesores.</em></p>                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="Pages/updateControlHoras" method="post">

                      <div class="form-group">
                        <label for="HoraInicio">Hora de Inicio</label>
                        <input type="time" name="HoraInicio" class="form-control" id="HoraInicio" value="<?php echo $controlHoras->HoraInicio; ?>">
                      </div> 

                      <div class="form-group">
                        <label for="HoraFinal">Hora de Finalización</label>
                        <input type="time" name="HoraFinal" class="form-control" id="HoraFinal" value="<?php echo $controlHoras->HoraFinal; ?>">
                      </div> 

                      <div class="text-right">
                        <input type="hidden" name="id" value="<?php echo $controlHoras->idAccesoApp; ?>">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                      </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->