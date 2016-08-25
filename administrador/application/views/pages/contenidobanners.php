<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrador</title>
    <?php $this->load->view('tmpl/head'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/datatables/media/css/jquery.dataTables.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/datatables-responsive/css/dataTables.responsive.css'); ?>">
</head>

<body>

    <div id="wrapper">
        <!-- Page Content -->
                        <div class="row">
                <div class="col-lg-12">
                    <div class="well">
                        <h4>Instrucciones</h4>
                        <p>Se debe seleccionar el contenido al cual se desea el banner redireccione al usuario, el administrador puede elegir cuantos elementos desea que se visualicen y también puede hacer uso del buscador para filtrar por palabras clave.</p>                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contenido Disponible.
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <?php if ($tipo == 1){
                                              echo "<th>Tipo Comunicado</th>";
                                            }else if ($tipo == 2 || $tipo == 3) {
                                                echo "<th>Descripcion</th>";
                                            } ?>
                                            <th>Fecha</th>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($contenido as $item) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $item->Titulo; ?></td>
                                            <?php if ($tipo == 1){
                                              echo "<th>".$item->NombreComunicado."</th>";
                                            } else if ($tipo == 2 || $tipo == 3){
                                              echo "<th>".$item->Descripcion."</th>";
                                            } ?>
                                            <td><?php echo $item->FechaIngreso; ?></td>
                                            <td class="center"><button onclick="selecCont(<?php echo $item->idContenido.','."'".$item->Titulo."'"; ?>)">Seleccionar</button></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

    </div>
    <!-- /#wrapper -->

</body>
<!-- jQuery -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/dataTables.responsive/js/dataTables.responsive.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

    function selecCont(id,titulo){
        window.parent.setContenidoBanner(id,titulo);
    }
    
</script>
</html>