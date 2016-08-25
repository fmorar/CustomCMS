<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $section_title; ?></h1>
        <p><em>En esta página el usuario puede editar las propiedades del banner ya sea el título del mismo, la tienda a la cual pertenece, el estado y la misma imagen.</em></p>    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
      <div class="col-lg-12">
        <form action="Pages/updateBanner" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo" value="<?php echo $banner->Titulo; ?>">
          </div>
          <div class="form-group">
              <label for="tienda">Tienda</label>
              <select class="form-control" name="tienda" id="tienda" value="<?php echo $banner->Tienda; ?>">
                <?php foreach($tienda as $tiendas){ ?>
                <option value="<?php echo $tiendas->idTienda; ?>"<?php if ($tiendas->idTienda == $banner->idTienda) echo 'selected' ?>><?php echo $tiendas->Tienda; ?></option>
                <?php } ?>
              </select>
          </div>

          <div class="form-group">
            <label for="enlaceExterno">Enlace Externo</label>
            <input type="text" name="enlaceExterno"  class="form-control" id="enlaceExterno" placeholder="Enlace Externo" value="<?php echo $banner->EnlaceExterno; ?>">
          </div>

          <div class="form-group">
            <label for="tipo">Seleccione una sección</label>
            <select class="form-control" name="tipo" id="tipo" onchange="abrirModal()" >
              <option value="0">No Aplica</option>
              <option value="1"<?php if ($banner->idTipoBanner == '1') echo 'selected'; ?>>Comunicación</option>
              <option value="2"<?php if ($banner->idTipoBanner == '2') echo 'selected'; ?>>Pomociones</option>
              <option value="3"<?php if ($banner->idTipoBanner == '3') echo 'selected'; ?>>Activaviones</option>
            </select>
          </div>  

          <div class="form-group">  <!-- Trigger the modal with a button -->
            <p id="resultado-contenido">Id del contenido: <?php echo $banner->idContenido;?></p>
          </div>

          <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado">
              <?php foreach($estados as $estado){ ?>
              <option value="<?php echo $estado->idEstado; ?>" <?php if($banner->idEstado == $estado->idEstado)echo 'selected'; ?>><?php echo $estado->Estado; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Imagen</h3>
                </div>
                <div class="panel-body">
                  <img src="../img/banners/<?php echo $banner->Imagen; ?>" class="img-responsive">
                </div>
              </div>
            </div>
          </div>
          <div class="text-right">
            <input type="hidden" id="idContenido" name="idContenido" value="0" />
            <input type="hidden" name="id" value="<?php echo $banner->idBanner; ?>">
            <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Actualizar</button>
          </div>
        </form>
              <!-- /.panel -->
      </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<br/>
<br/>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Seleccione un contenido</h4>
      </div>
      <div class="modal-body">
        <iframe src="" id="contenido-banners" height="400px" width="100%" frameborder="0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  function  abrirModal(){
    var tipo = $("#tipo").val();
    if(tipo == 0) return false;
    var tienda = $("#tienda").val();
    var url = 'Pages/contenidobanner/tipo/'+tipo+'/tienda/'+tienda;
    $("#contenido-banners").attr("src",url);
    $("#myModal").modal();
  }
  function setContenidoBanner(id,titulo){
      $("#resultado-contenido").html('Id del contenido: '+id+' Titulo: '+titulo);
      $("#idContenido").val(id);
  }
</script>