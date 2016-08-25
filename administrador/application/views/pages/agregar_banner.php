 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $section_title; ?></h1>
        <p><em>En esta página el usuario puede agregar las propiedades del banner ya sea el título del mismo, la tienda a la cual pertenece, el estado y la misma imagen.</em></p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="Pages/insertarBanner" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" required class="form-control" id="titulo" placeholder="Titulo">
          </div>
          <div class="form-group">
            <label for="tienda">Tienda</label>
            <select class="form-control" name="tienda" id="tienda">
              <?php foreach($tienda as $tiendas){ ?>
              <option value="<?php echo $tiendas->idTienda; ?>"><?php echo $tiendas->Tienda; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="enlaceExterno">Enlace Externo</label>
            <input type="text" name="enlaceExterno"  class="form-control" id="enlaceExterno" placeholder="Enlace Externo">
          </div>

          <div class="form-group">
            <label for="tipo">Seleccione una sección</label>
            <select class="form-control" name="tipo" id="tipo" onchange="abrirModal()">
              <option value="0">No Aplica</option>
              <option value="1">Comunicación</option>
              <option value="2">Pomociones</option>
              <option value="3">Activaviones</option>
            </select>
          </div>      
          <div class="form-group">  <!-- Trigger the modal with a button -->
            <p id="resultado-contenido"></p>
          </div>
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" required id="imagen">
          </div>          
          <div class="text-right">
            <input type="hidden" id="idContenido" name="idContenido" value="0" />
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
          </div>
        </form>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

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