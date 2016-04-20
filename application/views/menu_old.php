<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
        <?php echo $file_load;?>
        <link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css')?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url('assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js')?>"></script>
        <script>
            $(function() {
                $( ".boton_menu" ).button()      
            });
        </script>
</head>
<body>
        <div style="text-align: left">
       		<a class="boton_menu" href='<?php echo base_url('incidentes/incidente_management')?>'>Incidentes</a>
                <a class="boton_menu" href='<?php echo base_url('incidentes/regiones_management')?>'>Regiones</a>
                <a class="boton_menu" href='<?php echo base_url('incidentes/filiales_management')?>'>Filiales</a>
                <a class="boton_menu" href='<?php echo base_url('incidentes/tipificacion_incidentes_management')?>'>Tipificación de Incidentes</a>
                <a class="boton_menu" href='<?php echo base_url('incidentes/tipificacion_hechos_management')?>'>Tipificación de Hechos</a>
		<a class="boton_menu" href='<?php echo base_url('incidentes/herramientas_seguridad_management')?>'>Herramienta de Seguridad</a>
		<a class="boton_menu" href='<?php echo base_url('incidentes/aprobador_management')?>'>Aprobador</a>
		<a class="boton_menu" href='<?php echo base_url('incidentes/reportador_management')?>'>Reportador</a>
		<a class="boton_menu" href='<?php echo base_url('incidentes/usuarios_management')?>'>Usuarios</a>
		
	</div>
</body>
</html>
