<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $section_title; ?></h1>
        <p><em>En esta página se debe insertar el reglamento que va a regir la sección de plan de vendedores.</em></p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form action="Pages/updateReglamento" method="post">
          <div class="form-group">
            <label for="reglamento">Terminos y condiciones</label>
            <textarea id="editarReglamento" name="reglamento" class="form-control" id="reglamento" placeholder="Reglamento">
              <?php echo $reglamento->reglamento; ?>
            </textarea>
          </div>    
          <div class="text-right">
            <input type="hidden" name="id" value="<?php echo $reglamento->idReglamento; ?>">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
          </div>
        </form>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->