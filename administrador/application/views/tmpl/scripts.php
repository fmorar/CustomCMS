    <!-- jQuery -->
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>

    <?php if ($section_page == 'inicio' ){ ?>
        <!-- Morris Charts JavaScript -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script type="text/javascript">
        </script>
      
<?php }elseif ($section_page == 'agregarNotificacion') { ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css">

    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
    </script>

    <?php }elseif ($section_page == 'agregarActivacion') { ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css">

    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
    </script>

    <?php }elseif ($section_page == 'agregarPromocion') { ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css">

    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
          $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
    </script>

           
<?php }elseif ($section_page == 'editarComunicado') { ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css">

    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
    </script>

    <?php }elseif ($section_page == 'editarActivacion') { ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css">

    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
    </script>

    <?php }elseif ($section_page == 'editarNotificacion') { ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css">

    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
    </script>

    <?php }elseif ($section_page == 'editarPromocion') { ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css">

    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
    </script>

     <?php }elseif ($section_page == 'agregarComunicado') { ?>
  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
</script>

  <?php }elseif ($section_page == 'editarBanner') { ?>
  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
</script>

  <?php }elseif ($section_page == 'reporteIngresos') { ?>
  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
      $(function () {

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();
      });
</script>

<?php }elseif ($section_page == 'Incentivos') { ?>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-switch.min.css'); ?>">
  <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-switch.min.js');?>"></script>
  <script type="text/javascript">
    $(function(){
          $("[name='activo']").bootstrapSwitch({
            size: 'mini'
          });
          $('.toggle-estado').on('switchChange.bootstrapSwitch', function(event, state) {
            userId = $(this).attr('data-id');
            var estado = (state == true) ? 2 : 1; 
            togglePromo(userId,estado);
        });
      });

     function togglePromo(id,idEstado){
        var url = "<?php echo site_url('Pages/activarBannerBeacon'); ?>";
        var finUrl = url+"?id="+id+"&estado="+idEstado;
        $.get(finUrl);
      }

    $(document).ready(function(){
      $('#example').DataTable();
    });

  </script>

    <?php }elseif ($section_page == 'Provedores') { ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable();
    });
  </script>

  <?php }elseif ($section_page == 'PDV') { ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable();
    });
  </script>

<?php }elseif ($section_page == 'contenidoIncentivos') { ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable();
    });
  </script>

<?php }elseif ($section_page == 'DetalleVentas') { ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable();
    });
  </script>

<?php }elseif ($section_page == 'ventas') { ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable();
    });
  </script>

<?php }elseif ($section_page == 'editarPdv') { ?>

    <link rel="stylesheet" href="assets/chosen/chosen.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="assets/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="assets/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 
    });
</script>

<?php }elseif ($section_page == 'agregarPdv') { ?>

    <link rel="stylesheet" href="assets/chosen/chosen.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="assets/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="assets/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 
    });
</script>




<?php }elseif ($section_page == 'editarIncentivos') { ?>
        <link rel="stylesheet" href="assets/css/summernote.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/chosen/chosen.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <script type="text/javascript" src="assets/js/summernote.min.js"></script>
        <script type="text/javascript" src="assets/js/moment.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/chosen/chosen.jquery.js" type="text/javascript"></script>
        <script src="assets/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">

    function obtenerPdvs(){
            var idTienda = $('#Tienda').val();
            $.get( "Pages/obtPdvByTienda", { tienda: idTienda }).done(function( data ) {
              $("#pdvs").html('');
              for (var i = 0; i < data.length; i++) {
                $("#pdvs").append('<option value="'+data[i].idPdv+'">'+data[i].NombrePdv+'</option>');
              };
              $("#pdvs").trigger("chosen:updated");
            }).error(function(data){
                alert('Mae no funka');
            });
    }
      $(function () {
        obtenerPdvs();
        $('#Tienda').on('change',function(){
            obtenerPdvs();
          })

            $('.datetimepicker').datetimepicker({
                        pickTime: false,
                        format: 'YYYY-MM-DD'
                    });

      });
    var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
  }
  for (var selector in config) {
    $(selector).chosen(config[selector]);
  }

      $(document).ready(function(){
        $("#editarReglamento").summernote({
          height: 300
        });
      });

      $('#editarReglamento').summernote({
        toolbar: [
        // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
        ]
      });

</script>

<?php }elseif ($section_page == 'agregarIncentivos') { ?>
    <link rel="stylesheet" href="assets/css/summernote.css">
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/chosen/chosen.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script type="text/javascript" src="assets/js/summernote.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="assets/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">

    function validarFechaMenorActual(){
          var fechaSeleccion = document.getElementById('fechaInicio').value;
          var hoy= new Date().toISOString().slice(0, 10);
          if (fechaSeleccion >= hoy){
            return true;
          }else{
            sweetAlert("Oops...", "La fecha no es valida", "error");
            return false;
          }
    }

    function obtenerPdvs(){
            var idTienda = $('#Tienda').val();
            $.get( "Pages/obtPdvByTienda", { tienda: idTienda }).done(function( data ) {
              $("#pdvs").html('');
              for (var i = 0; i < data.length; i++) {
                $("#pdvs").append('<option value="'+data[i].idPdv+'">'+data[i].NombrePdv+'</option>');
              };
              $("#pdvs").trigger("chosen:updated");
            }).error(function(data){
                console.log('Mae no funka');
            });
    }
      $(function () {
        obtenerPdvs();
        $('#Tienda').on('change',function(){
            obtenerPdvs();
          })
        $("#dtfechaInicio").on("dp.change",function (e) {
            validarFechaMenorActual();
        });
        $('.datetimepicker').datetimepicker({
            pickTime: false,
            format: 'YYYY-MM-DD'
        });

      });
    var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
  }
  for (var selector in config) {
    $(selector).chosen(config[selector]);
  }

        $(document).ready(function(){
        $("#editarReglamento").summernote({
          height: 300
        });
      });

      $('#editarReglamento').summernote({
        toolbar: [
        // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
        ]
      });
    </script>  

<?php }elseif ($section_page == 'usuarios') { ?>
<script type="text/javascript">
  $('#tipoBusqueda').on('change',function(){
     var selection = $(this).val();
      switch(selection){
      case "1":
        $("#buscarCedula").show();
      break;
      case "2":
        $("#buscarCedula").hide();
      break;
      }
    });
$("select#tipoBusqueda").change(function () {
   if( $("option#resetFilter:selected").length )
   {
        $("#filtro_usuario").val('');
   }
});

  </script>

<?php }elseif ($section_page == 'promocion') { ?>
<script type="text/javascript">
  $('#tipoBusqueda2').on('change',function(){
     var selection = $(this).val();
      switch(selection){
      case "1":
        $("#buscarPromo").show();
      break;
      case "2":
        $("#buscarPromo").hide();
      break;
      }
    });
  </script>


  <?php }elseif ($section_page == 'agregar_usuario' || $section_page == 'editar_usuario') { ?>
  <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="assets/css/sweetalert.css">
  <script type="text/javascript">
  function validate(){
    var pass = document.getElementById('password').value;
    var re = /^[A-Za-z]{0,4}[0-9][^<>&@$\"\!#%&\'\()*+,-.;/]*$/;
    if (re.test(pass)) {
      document.form.submit()
    } else {
      sweetAlert("Oops...", "El primer digito siempre tiene que ser una letra, Dentro de los primeros 5 dígitos debe haber un número, No se permiten caracteres especiales", "error");
      return false;
    }
  }

  </script>

  <?php }elseif ($section_page == 'editarReglamento') { ?>
    <link rel="stylesheet" href="assets/css/summernote.css">
    <script type="text/javascript" src="assets/js/summernote.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#editarReglamento").summernote({
          height: 300
        });
      });

      $('#editarReglamento').summernote({
        toolbar: [
        // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
        ]
      });
    </script>

  <?php }elseif ($section_page == 'impotarPrmociones') { ?>
    <link rel="stylesheet" href="assets/css/readme.css">
<?php } ?>