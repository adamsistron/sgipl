
<div class="Contenedor-Editable" id="Menu">
    <p style="margin: 0.05em; font-size: 8;margin-left: 1em; font-family: Arial; font-weight: bold; color: #A19B9E ">Opciones</p>
    <span class="PuntoHo_Cortico"></span>

               <a href="#" class="Contenedor-Texto-Menu"><span class="Text-menu" > Registrar  </span></a>
                <span class="PuntoHo_Cortico"></span>
                <a href="<?php echo site_url('incidentes/incidente_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Incidentes </span></a> 
                  <span class="PuntoHo_Cortico"></span>
                <a href="#" class="Contenedor-Texto-Menu"><span class="Text-menu" > Datos Maestros  </span></a>
                <span class="PuntoHo_Cortico"></span>
                <a href="<?php echo site_url('incidentes/regiones_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Regiones </span></a> 
                <a href="<?php echo site_url('incidentes/filiales_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Filiales </span></a> 
                <a href="<?php echo site_url('incidentes/tipificacion_incidentes_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Tipificación de Incidentes </span></a> 
                <a href="<?php echo site_url('incidentes/tipificacion_hechos_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Tipificación de Hechos </span></a> 
                <a href="<?php echo site_url('incidentes/herramientas_seguridad_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Herramienta de Seguridad </span></a> 
                <a href="<?php echo site_url('incidentes/aprobador_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Aprobador </span></a> 
                <a href="<?php echo site_url('incidentes/reportador_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Reportador </span></a> 
                <a href="<?php echo site_url('incidentes/usuarios_management')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Usuarios </span></a> 
                
<?php //}?>
                        
                        <span class="PuntoHo_Cortico"></span>
                <a href="<?php echo site_url('sesion/logout')?>" class="Contenedor-Texto-Menu"><span class="Text-menu" > Salir(<?php echo strtoupper($this->session->userdata('indicador_usuario'));?>) </span></a>
    <span class="PuntoHo_Cortico"></span>
             

</div>
