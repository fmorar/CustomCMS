<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $section_title; ?></h1>
        <p><em>En esta página el usuario puede editar los datos de contacto de las oficinas centrales.</em></p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
      <div class="col-lg-12">
        <form action="Pages/updateContacto" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="tienda">Tienda</label>
            <select class="form-control" name="tienda" id="tienda" value="<?php echo $Contenido->Tienda; ?>">
              <?php foreach($tienda as $tiendas){ ?>
              <option value="<?php echo $tiendas->idTienda; ?>" <?php if ($tiendas->idTienda == $ContenidoGeneral->idTienda) echo 'selected' ?>><?php echo $tiendas->Tienda; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="Dirección">Dirección</label>
            <input type="text" name="direccion" required class="form-control" id="Direccion" placeholder="Dirección" value="<?php echo $ContenidoGeneral->Direccion;?>">
         </div>
         <div class="form-group">
            <label for="Telefono1">Teléfono 1</label>
            <input type="text" name="telefono1" required class="form-control" id="Telefono1" placeholder="Teléfono 1" value="<?php echo $ContenidoGeneral->Telefono1;?>">
          </div>
          <div class="form-group">
            <label for="Telefono2">Teléfono 2</label>
            <input type="text" name="telefono2" required class="form-control" id="Telefono2" placeholder="Teléfono 2" value="<?php echo $ContenidoGeneral->Telefono2;?>">
          </div>
          <div class="form-group">
            <label for="Email">Correo Electrónico</label>
            <input type="text" name="email" required class="form-control" id="Email" placeholder="Correo Electrónico" value="<?php echo $ContenidoGeneral->Email;?>">
          </div> 
          <div class="text-right">
            <input type="hidden" name="id" value="<?php echo $ContenidoGeneral->idContacto; ?>">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
          </div>
        </form>
              <!-- /.panel -->
      </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->