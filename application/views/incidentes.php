<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
        <title>SGIPL | Sistema para la Gestión de Incidentes de Protección Lógica</title>
        <link rel="shortcut icon" href="<?php echo base_url('images/pdvsa.ico');?>" />
        
<?php 
//echo $this->session->userdata('indicador').'ddddd';die();
$logged_in = ($this->session->userdata('logged_in')=='')?false:true;

$file_load_css="";
$file_load_js="";
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; $file_load_css.="$file\n";?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; $file_load_js.="$file\n";?>"></script>
<?php endforeach; 
    $pos_css = strpos($file_load_css, 'assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css');
    $pos_js = strpos($file_load_js, 'assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js');
    if ($pos_css === false){?>
        <link href="<?php echo base_url('assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css')?>" rel="stylesheet" type="text/css"/>  
<?}?>
<?  if ($pos_js === false){?>
        <script src="<?php echo base_url('assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js')?>"></script>
<?}?>
<script>
    
    function login(){
            
            //passwd();
            
            var indicador=$('#indicador').val();
            var crypt=$('#crypt').val();
            $('#contrasena').val(crypt);
            var contrasena=$('#contrasena').val();
            
        $.ajax({
            url:"<?php echo base_url("incidentes/login");?>",
            type: "POST",
            data:{indicador:indicador,contrasena:contrasena},
            success: function(data) {
               
                
                if(data==='true'){
                    var url = "<?php echo base_url("incidentes/incidente_management");?>";
                    $(location).attr('href',url);
                }else{
                     alert(data);
                }
                
            }
            });
    }
    function logout(){
            
        
            var r=confirm("¿Desea salir?");
            if (r==true)
            {
            $.ajax({
                      url:"<?php echo base_url("incidentes/logout");?>",
                      type: "POST",
                      success: function(data) {
                          //alert(data);
                          if(data==='true'){
                              var url = "<?php echo base_url("incidentes/incidente_management");?>";
                              $(location).attr('href',url);
                          }
                      }
                      });
            }
          else
            {
            return false;
            } 
            
    }
    function genera_codigo_caso(){
            var region=$('#field-id_region option:selected').html().substring(0,3);
            
            var filial=$('#field-id_filial option:selected').html().substring(0,3);
            
            var fecha=$('#field-fecha_incidente').val();
            var array_fecha=fecha.split('/');
            var anio = array_fecha[2].substring(2,4); 
            var mes = array_fecha[1]; 
            var consecutivo=$('#field-consecutivo_mes').val();
            var codigo_caso=region+'-'+filial+'-'+'RIS-'+anio+'-'+mes+'-'+consecutivo;
            $('#field-codigo_caso').val(codigo_caso);
    }
    function codigo_caso(){
        $('#field-fecha_incidente').change(function (){
             genera_codigo_caso();
        });
        $('#field-id_region').change(function (){
             genera_codigo_caso();
        });
        
        $('#field-id_filial').change(function (){
             genera_codigo_caso();
        });
        $('#field-id_tipificacion_incidentes').change(function (){
            genera_codigo_caso();
        });
        $('#field-consecutivo_mes').keyup(function (){
            genera_codigo_caso();
        });
        
    }
    function no_analisis_forense(){
        $('#field-id_tipificacion_incidentes').change(function (){
            var tipo_incidente=$('#field-id_tipificacion_incidentes').val();
            
            //alert(tipo_incidente);
            if(tipo_incidente!=='3'){
                
                $('#tipo_acta_field_box').hide();
                $('#numero_acta_field_box').hide();
                $('#nombre_equipo_field_box').hide();
                $('#numero_activo_pdvsa_field_box').hide();
                $('#hash_imagen_field_box').hide();
                //alert('No-Forense');
                
            }else{
                
                $('#tipo_acta_field_box').show();
                $('#numero_acta_field_box').show();
                $('#nombre_equipo_field_box').show();
                $('#numero_activo_pdvsa_field_box').show();
                $('#hash_imagen_field_box').show();
                //alert('Forense');
            }
        });
    }
    
    function passwd(){
        
        $('#contrasena').keyup(function (){
        
        var contrasena=$('#contrasena').val();
            
        $.ajax({
            url:"<?php echo base_url("incidentes/encrypt");?>",
            type: "POST",
            data:{contrasena:contrasena},
            success: function(data) {
                //alert(data);
                $('#crypt').val(data);
            }
            });
            });
    }
    
    $(function() {
        $( ".boton_menu" ).button();
        $('#field-codigo_caso').attr('readonly', true);
        no_analisis_forense();
        codigo_caso();
        
        passwd();
        <?php 
        if(!$logged_in){
            echo "$('#output').empty();";
        }
        $id_usuario = $this->session->userdata('id_usuario');
        $indicador_usuario = $this->session->userdata('indicador_usuario');
        
        ?>
                var url = $(location).attr('href');
                var add = url.search( 'incidente_management/add' )
                //alert(add);
                if(add!=-1){
                    $('#field-id_usuario').val('<?php echo $id_usuario;?>').attr('readonly', true);
                    $('#field-indicador_usuario').val('<?php echo $indicador_usuario;?>').attr('readonly', true);
                }else{
                    $('#field-id_usuario').attr('readonly', false);
                    $('#field-indicador_usuario').attr('readonly', false);
                }
                
        
    });
    
</script>
<style type='text/css'>
body
{
	font-family: Arial;
        background: linear-gradient(#FFF ,#DDD );
}
a {
    color: blue;
    text-decoration: none;
}
a:hover
{
	text-decoration: underline;
}
.titulo{
    font-family: Arial;
    font-weight: bold;
    font-style: oblique;
    font-size: 40px;
    color: grey;
    background-color: #FFF;
    text-shadow: #60676a 0.01em 0.01em 0.2em;
    
}
.encabezado{
    text-align: center;
    padding-left: 10%;
    padding-right: 10%;
}
.cuerpo{
    padding-left: 5%;
    padding-right: 5%;
}
p{
    font-weight: normal;
    text-align: left;
    font-size: 14px;
    font-style: normal;
    color: #AAA;
    margin: 0;
    padding: 0;
}
</style>
</head>
<body>
    <div>
    <div class="titulo">
        <center>
        <table border="0" style="width: 90%">
            <tr>
                <td width="20%" style="text-align: left"><img src="<?php echo base_url('images/logo.png');?>" width="80%"></td>
                
                <td style="text-align: left">
                    Sistema para la Gestión de Incidentes
                    <p>PCP - STI - Protección Lógica</p>
                </td>
                <td colspan="2" style="text-align: right; font-size: 14px;">
                    <?php if($logged_in){?>
                    <?php echo $this->session->userdata('indicador_usuario');?> <img title="Salir" onclick="logout()" src="<?php echo base_url('images/apagar.png');?>" > 
                    <?php }?>
                </td>
            </tr>

        </table>
            </center>
    </div>
        <?php if(!$logged_in){?>
        <center>
        <div style="text-align: center; background: linear-gradient(#FFF ,#CCC); height: 100%;padding: 10em">
            <center>
                <table border="0">
                <tr>
                    <td style="color: white; text-shadow: black 0.1em 0.1em 0.2em;font-size: 20px; font-weight: 600;text-align: right">Indicador *: </td>
                    <td><input id="indicador" type="text" maxlength="30" value="" name="indicador" ></td>
                </tr>
                <tr>
                    <td style="color: white; text-shadow: black 0.1em 0.1em 0.2em;font-size: 20px; font-weight: 600;text-align: right">Contraseña *: </td>
                    <td>
                        <input id="contrasena" type="password" maxlength="30" value="" name="contrasena" >
                        <input id="crypt" type="hidden" maxlength="30" value="" name="crypt" >
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; padding: 10px;">
                        <button class="boton_menu" onclick="login()">Ingresar al Sistema</button>
                    </td>
                </tr>
            </table>
            </center>
        </div>
        </center>
        <?php }?>
    <div class="cuerpo">
        <?php if($logged_in){
                $id_rol = $this->session->userdata('id_rol');
        ?>
                <div style="text-align: left">
       		<a class="boton_menu" href='<?php echo base_url('incidentes/incidente_management')?>'>Incidentes</a>
                <?php if($id_rol>=3){?>
                <a class="boton_menu" href='<?php echo base_url('incidentes/regiones_management')?>'>Regiones</a>
                <a class="boton_menu" href='<?php echo base_url('incidentes/filiales_management')?>'>Filiales</a>
                <a class="boton_menu" href='<?php echo base_url('incidentes/tipificacion_incidentes_management')?>'>Tipificación de Incidentes</a>
                <a class="boton_menu" href='<?php echo base_url('incidentes/tipificacion_hechos_management')?>'>Tipificación de Hechos</a>
		<a class="boton_menu" href='<?php echo base_url('incidentes/herramientas_seguridad_management')?>'>Herramienta de Seguridad</a>
		<a class="boton_menu" href='<?php echo base_url('incidentes/destinado_management')?>'>Destinado</a>
<!--		<a class="boton_menu" href='<?php echo base_url('incidentes/aprobador_management')?>'>Aprobador</a>
		<a class="boton_menu" href='<?php echo base_url('incidentes/reportador_management')?>'>Reportador</a>-->
		<a class="boton_menu" href='<?php echo base_url('incidentes/servicio_impacto_management')?>'>Servicio Impacto</a>
		<a class="boton_menu" href='<?php echo base_url('incidentes/usuarios_management')?>'>Usuarios</a>
                <?php }?>
		<?php if($id_rol==4){?>
                <a class="boton_menu" href='<?php echo base_url('incidentes/roles_management')?>'>Roles</a>
                <a class="boton_menu" href='<?php echo base_url('incidentes/logs_management')?>'>Logs</a>
		<?php }?>
	</div>
        <?php }?>
	<div style='height:20px;'></div>
        <div id="output" style="display:<?php if($logged_in){echo 'block';}else{echo 'none';}?>">
            
            <?php 
                    echo $output;
            ?>
        </div>
        <div style='margin-top: 20px;text-align: left'>
            <p style="font-family: Courier, cursive; font-size: 9px; color: #60676a">By Adam Carrillo <a href="mailto: carrilloaw@pdvsa.com"> carrilloaw@pdvsa.com</a></p>
        </div>
			<!--select multiple>
		<option value="1">1 uno</option>
		<option value="2">2 dos</option>
		<option value="3">3 tres</option>
		</select-->

    </div>
        
</body>
    </html>
    <?php echo "FIN";?>