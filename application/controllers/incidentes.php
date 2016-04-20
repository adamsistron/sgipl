<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incidentes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
                $this->load->library('session');
                $this->load->library('encrypt');

	}

	public function _example_output($output = null)
	{
		//$this->load->view('incidentes.php',$output);
            
            $session_id = $this->session->userdata('indicador_usuario');
            if($session_id<>''){
                $this->load->view('main-aplicacion.php',$output);
            }else{
                redirect('/', 'refresh');
            }
		
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
	
             redirect('/incidentes/incidente_management/', 'refresh');
             
	}

        public function regiones_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('region');
			$crud->set_subject('Región');
			$crud->required_fields('nombre_region');
                        $crud->set_rules('nombre_region','Nombre de Región','trim|required|min_length[2]|max_length[12]|xss_clean');
                        
			//$crud->required_fields('descripcion_region');
			//$crud->columns('nombre_region', 'descripcion_region','last_update_region');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function tipificacion_incidentes_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('tipificacion_incidentes');
			$crud->set_subject('Tipificación de Incidentes');
			$crud->required_fields('nombre_tipificacion_incidentes');
                        $crud->fields('nombre_tipificacion_incidentes','descripcion_tipificacion_incidentes');
			//$crud->required_fields('descripcion_tipificacion_incidentes');
			//$crud->columns('nombre_tipificacion_incidentes', 'descripcion_tipificacion_incidentes','last_update_tipificacion_incidentes');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function tipificacion_hechos_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('tipificacion_hecho');
			$crud->set_subject('Tipificación de Hechos');
			$crud->required_fields('nombre_tipificacion_hecho');
			$crud->fields('id_tipificacion_incidentes','nombre_tipificacion_hecho','descripcion_tipificacion_hecho');
                        
                        $crud->set_relation('id_tipificacion_incidentes','tipificacion_incidentes','nombre_tipificacion_incidentes');
			
                        $crud->display_as('id_tipificacion_incidentes','Tipificación Incidente');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function herramientas_seguridad_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('herramienta_seguridad');
			$crud->set_subject('Herramienta de Seguridad');
			$crud->required_fields('nombre_herramientas_seguridad');
			//$crud->required_fields('descripcion_herramientas_seguridad');
			//$crud->columns('nombre_tipificacion_hecho', 'descripcion_tipificacion_hecho','last_update_tipificacion_hecho');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function aprobador_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('aprobador');
			$crud->set_subject('Aprobador');
			//$crud->required_fields('nombre_herramientas_seguridad');
			//$crud->required_fields('descripcion_herramientas_seguridad');
			//$crud->columns('nombre_tipificacion_hecho', 'descripcion_tipificacion_hecho','last_update_tipificacion_hecho');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function reportador_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('reportador');
			$crud->set_subject('Reportador');
			//$crud->required_fields('nombre_herramientas_seguridad');
			//$crud->required_fields('descripcion_herramientas_seguridad');
			//$crud->columns('nombre_tipificacion_hecho', 'descripcion_tipificacion_hecho','last_update_tipificacion_hecho');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function destinado_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('destinado');
			$crud->set_subject('Destinado a');
                        $crud->fields('nombre_destinado','descripcion_destinado');
                        $crud->required_fields('nombre_destinado');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function servicio_impacto_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('servicio_impacto');
			$crud->set_subject('Servicio(s) Impactado/Afectado');
                        $crud->fields('nombre_servicio_impacto','descripcion_servicio_impacto');
                        $crud->required_fields('nombre_servicio_impacto');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function incidente_management()
	{
		try{
			$crud = new grocery_CRUD();
                        

			$crud->set_table('registro_incidente');
			$crud->set_subject('Incidente');
                        $crud->fields('id_incidente', 'fecha_incidente', 'id_region','id_filial',
                                      'id_tipificacion_incidentes', 'id_tipificacion_hecho','consecutivo_mes',
                                      'codigo_caso', 'estatus_caso', 'fecha_ultimo_estatus',
                                      'id_herramienta_seguridad', 'id_reportador', 'id_aprobador',
                                      'descripcion_hecho', 'tiempo_ocurrencia_hecho', 'tiempo_finalizacion_hecho',
                                      'descripcion_causa', 'descripcion_acciones_tomadas', 'accion',
                                      'destinado_a', 'estatus_accion',
                                      'servicio_impacto', 'valor_impacto', 'descripcion_impacto', 
                                      'tipo_acta', 'numero_acta', 'nombre_equipo', 
                                      'numero_activo_pdvsa', 'hash_imagen',
                                      'id_usuario','indicador_usuario');

                        $crud->field_type('id_usuario','invisible');
                        $crud->field_type('indicador_usuario','invisible');


                        /*$crud->required_fields('fecha_incidente', 'id_region','id_filial',
                                      'id_tipificacion_incidentes', 'id_tipificacion_hecho','consecutivo_mes',
                                      'codigo_caso', 'estatus_caso', 'fecha_ultimo_estatus',
                                      'id_herramienta_seguridad', 'id_reportador', 'id_aprobador',
                                      'descripcion_hecho', 'tiempo_ocurrencia_hecho', 'tiempo_finalizacion_hecho',
                                      'descripcion_causa', 'descripcion_acciones_tomadas', 'accion',
                                      'destinado_a', 'estatus_accion',
                                      'servicio_impacto', 'valor_impacto', 'descripcion_impacto'
                                      );*/
                        
                        $crud->display_as('id_incidente','N°')
                             ->display_as('fecha_incidente','Fecha del Registro')
                             ->display_as('id_region','Región')
                             ->display_as('id_filial','Filial')
                             ->display_as('id_tipificacion_incidentes','Tipificación de Incidente')
                             ->display_as('id_tipificacion_hecho','Tipificación de Hecho')
                             ->display_as('codigo_caso','Código del Caso')
                             ->display_as('estatus_caso','Estatus del Caso')
                             ->display_as('fecha_ultimo_estatus','Fecha del Último Estatus')
                             ->display_as('id_herramienta_seguridad','Herramienta de Seguridad')
                             ->display_as('id_reportador','Reportador')
                             ->display_as('id_aprobador','Aprobador')
                             ->display_as('descripcion_hecho','Descripción del Hecho')
                             ->display_as('tiempo_ocurrencia_hecho','Fecha de Ocurrencia del Hecho')
                             ->display_as('tiempo_finalizacion_hecho','Fecha de Finalización del Hecho')
                             ->display_as('descripcion_causa','Descripción de la Causa')
                             ->display_as('descripcion_acciones_tomadas','Descripción de Acción Tomada')
                             ->display_as('accion','Acción Tomada')
                             ->display_as('estatus_accion','Estatus Acción')
                             ->display_as('servicio_impacto','Servicio de Impacto')
                             ->display_as('valor_impacto','Valor de Impacto')
                             ->display_as('numero_acta','Número de Acta')
                             ->display_as('numero_activo_pdvsa','Número de Activo PDVSA')
                                ;
                        $crud->field_type('id_incidente', 'readonly');
                        $crud->set_rules('consecutivo_mes','min_length[3]|max_length[3]');
                     
                        $crud->set_relation('id_region','region','nombre_region');
                        $crud->set_relation('id_filial','filial','nombre_filial');
                        
                        $this->db->select('nombre_servicio_impacto');
                        $this->db->from('servicio_impacto');
                        $query = $this->db->get();
                        $servicio_impacto="";
                        $s="";
                        
                        if ($query->num_rows() > 0)
                        {
                           $i=0; 
                           foreach ($query->result() as $row)
                           {
                               if($i<>0)
                                   $s=',';
                               $servicio_impacto .= $s.$row->nombre_servicio_impacto;
                               $i++;     
                           }
                        } 
                        $array_servicio_impacto=  explode($s, $servicio_impacto);
                        //print_r($array_servicio_impacto);die();
                        $crud->field_type('servicio_impacto','set',$array_servicio_impacto);
                        
                        $crud->set_relation('id_tipificacion_incidentes','tipificacion_incidentes','nombre_tipificacion_incidentes');
                        $crud->set_relation('id_tipificacion_hecho','tipificacion_hecho','nombre_tipificacion_hecho');
                        $crud->set_relation('id_herramienta_seguridad','herramienta_seguridad','nombre_herramienta_seguridad');
                        $crud->set_relation('destinado_a','destinado','nombre_destinado');
                        $crud->set_relation('id_reportador','usuario','nombre_usuario',array('id_rol' => '2'));
                        $crud->set_relation('id_aprobador','usuario','nombre_usuario',array('id_rol' => '3'));
                        
                        
                        //$crud->change_field_type('id_region', 'hidden', 2);
                        //$crud->field_type('indicador', 'hidden', $indicador);
                        
                        $id_rol = $this->session->userdata('id_rol');
                        $indicador_usuario = $this->session->userdata('indicador_usuario');
                        
                        if($id_rol==1){
                            $crud->unset_operations();
                                                         
                        }
                        if($id_rol==2){
                            $crud->unset_delete();
                            //$crud->where('`registro_incidente`.indicador_usuario',$indicador_usuario);
                        }
                        if($id_rol==3){
                            $crud->unset_delete();
                            
                        }
                                                
                        $crud->callback_before_insert($this->logs($accion='incidente-insert'));
                        $crud->callback_before_update($this->logs($accion='incidente-update'));
                        $crud->callback_before_delete($this->logs($accion='incidente-delete'));


			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

public function forense_management()
	{
		try{
			$crud = new grocery_CRUD();
                        

			$crud->set_table('registro_forense');
$crud->set_relation('id_region','region','nombre_region');
                        $crud->set_relation('id_filial','filial','nombre_filial');
/*			

$crud->set_subject('Incidente');
                        $crud->fields('id_incidente', 'fecha_incidente', 'id_region','id_filial',
                                      'id_tipificacion_incidentes', 'id_tipificacion_hecho','consecutivo_mes',
                                      'codigo_caso', 'estatus_caso', 'fecha_ultimo_estatus',
                                      'id_herramienta_seguridad', 'id_reportador', 'id_aprobador',
                                      'descripcion_hecho', 'tiempo_ocurrencia_hecho', 'tiempo_finalizacion_hecho',
                                      'descripcion_causa', 'descripcion_acciones_tomadas', 'accion',
                                      'destinado_a', 'estatus_accion',
                                      'servicio_impacto', 'valor_impacto', 'descripcion_impacto', 
                                      'tipo_acta', 'numero_acta', 'nombre_equipo', 
                                      'numero_activo_pdvsa', 'hash_imagen',
                                      'id_usuario','indicador_usuario');

                        $crud->field_type('id_usuario','invisible');
                        $crud->field_type('indicador_usuario','invisible');


                        /*$crud->required_fields('fecha_incidente', 'id_region','id_filial',
                                      'id_tipificacion_incidentes', 'id_tipificacion_hecho','consecutivo_mes',
                                      'codigo_caso', 'estatus_caso', 'fecha_ultimo_estatus',
                                      'id_herramienta_seguridad', 'id_reportador', 'id_aprobador',
                                      'descripcion_hecho', 'tiempo_ocurrencia_hecho', 'tiempo_finalizacion_hecho',
                                      'descripcion_causa', 'descripcion_acciones_tomadas', 'accion',
                                      'destinado_a', 'estatus_accion',
                                      'servicio_impacto', 'valor_impacto', 'descripcion_impacto'
                                      );*/
                        /*
                        $crud->display_as('id_incidente','N°')
                             ->display_as('fecha_incidente','Fecha del Registro')
                             ->display_as('id_region','Región')
                             ->display_as('id_filial','Filial')
                             ->display_as('id_tipificacion_incidentes','Tipificación de Incidente')
                             ->display_as('id_tipificacion_hecho','Tipificación de Hecho')
                             ->display_as('codigo_caso','Código del Caso')
                             ->display_as('estatus_caso','Estatus del Caso')
                             ->display_as('fecha_ultimo_estatus','Fecha del Último Estatus')
                             ->display_as('id_herramienta_seguridad','Herramienta de Seguridad')
                             ->display_as('id_reportador','Reportador')
                             ->display_as('id_aprobador','Aprobador')
                             ->display_as('descripcion_hecho','Descripción del Hecho')
                             ->display_as('tiempo_ocurrencia_hecho','Fecha de Ocurrencia del Hecho')
                             ->display_as('tiempo_finalizacion_hecho','Fecha de Finalización del Hecho')
                             ->display_as('descripcion_causa','Descripción de la Causa')
                             ->display_as('descripcion_acciones_tomadas','Descripción de Acción Tomada')
                             ->display_as('accion','Acción Tomada')
                             ->display_as('estatus_accion','Estatus Acción')
                             ->display_as('servicio_impacto','Servicio de Impacto')
                             ->display_as('valor_impacto','Valor de Impacto')
                             ->display_as('numero_acta','Número de Acta')
                             ->display_as('numero_activo_pdvsa','Número de Activo PDVSA')
                                ;
                        $crud->field_type('id_incidente', 'readonly');
                        $crud->set_rules('consecutivo_mes','min_length[3]|max_length[3]');
                     
                        $crud->set_relation('id_region','region','nombre_region');
                        $crud->set_relation('id_filial','filial','nombre_filial');
                        
                        $this->db->select('nombre_servicio_impacto');
                        $this->db->from('servicio_impacto');
                        $query = $this->db->get();
                        $servicio_impacto="";
                        $s="";
                        
                        if ($query->num_rows() > 0)
                        {
                           $i=0; 
                           foreach ($query->result() as $row)
                           {
                               if($i<>0)
                                   $s=',';
                               $servicio_impacto .= $s.$row->nombre_servicio_impacto;
                               $i++;     
                           }
                        } 
                        $array_servicio_impacto=  explode($s, $servicio_impacto);
                        //print_r($array_servicio_impacto);die();
                        $crud->field_type('servicio_impacto','set',$array_servicio_impacto);
                        
                        $crud->set_relation('id_tipificacion_incidentes','tipificacion_incidentes','nombre_tipificacion_incidentes');
                        $crud->set_relation('id_tipificacion_hecho','tipificacion_hecho','nombre_tipificacion_hecho');
                        $crud->set_relation('id_herramienta_seguridad','herramienta_seguridad','nombre_herramienta_seguridad');
                        $crud->set_relation('destinado_a','destinado','nombre_destinado');
                        $crud->set_relation('id_reportador','usuario','nombre_usuario',array('id_rol' => '2'));
                        $crud->set_relation('id_aprobador','usuario','nombre_usuario',array('id_rol' => '3'));
                        
                        
                        //$crud->change_field_type('id_region', 'hidden', 2);
                        //$crud->field_type('indicador', 'hidden', $indicador);
                        
                        $id_rol = $this->session->userdata('id_rol');
                        $indicador_usuario = $this->session->userdata('indicador_usuario');
                        
                        if($id_rol==1){
                            $crud->unset_operations();
                            /*
                            $crud->unset_add();
                            $crud->unset_edit();
                            $crud->unset_delete();
                            */                             
                   /*     }
                        if($id_rol==2){
                            $crud->unset_delete();
                            $crud->where('`registro_incidente`.indicador_usuario',$indicador_usuario);
                        }
                        if($id_rol==3){
                            $crud->unset_delete();
                            
                        }
                        
                        /*
                        $crud->callback_before_insert(array($this,'logs'));
                        $crud->callback_before_update(array($this,'logs'));
                        $crud->callback_before_delete(array($this,'logs'));
                        *//*
                        $crud->callback_before_insert($this->logs($accion='incidente-insert'));
                        $crud->callback_before_update($this->logs($accion='incidente-update'));
                        $crud->callback_before_delete($this->logs($accion='incidente-delete'));

*/
			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

        public function filiales_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('filial');
			$crud->set_subject('Filial');
			$crud->required_fields('nombre_filial');
			$crud->required_fields('descripcion_filial');
			$crud->fields('nombre_filial', 'descripcion_filial');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function usuarios_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('usuario');
			$crud->set_subject('Usuarios');
			$crud->required_fields('nombre_usuario','indicador_usuario','id_rol');
                        $crud->columns('nombre_usuario', 'indicador_usuario','id_rol','last_update_usuario');
			$crud->fields('nombre_usuario', 'indicador_usuario','id_rol');
                        $crud->set_relation('id_rol','roles','nombre_rol');
                        $crud->display_as('indicador_usuario','Indicador de Usuario')
                             ->display_as('nombre_usuario','Nombre de Usuario')
                             ->display_as('id_rol','Rol de Usuario');
			//$crud->field_type('nombre_usuario', 'colocar_tipo de campo');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function roles_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('roles');
                        $crud->fields('nombre_rol', 'descripcion_rol');
			/*$crud->set_subject('Usuarios');
			$crud->required_fields('nombre_usuario','indicador_usuario');
			$crud->fields('nombre_usuario', 'indicador_usuario','rol_sistema_usuario','rol_incidente_usuario');
                         
                         */
			//$crud->field_type('nombre_usuario', 'colocar_tipo de campo');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        
    ////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////SESION DE USUARIO//////////////////////////////////
    //////////////////////////////ADAM 02/01/2011///////////////////////////////////

        
    public function encrypt()
    {
        $pssw = trim($this->input->post('contrasena'));
        $encrypted_pssw = $this->encrypt->encode($pssw);
        
        echo $encrypted_pssw;
        
        
    }
    public function auth_pdvsa($user,$pass)
    {
        if ($user == '' or empty($user) or $pass == '' or empty($pass))
           return false;
            $ldap = ldap_connect("167.134.201.179");
		//print($ldap);die();
            if ($ldap){
                if (!(@ldap_bind($ldap, 'pdvsa2000\\'.$user, $pass)))
					return false;
				@ldap_close($ldap);
		}                
		return true;
    }
    
    
    public function login()
    {
        $user = trim(strtolower($this->input->post('indicador')));
        $pssw_encode = trim($this->input->post('contrasena'));
        
        $pssw_decode = $this->encrypt->decode($pssw_encode);
        
        //echo $pssw_decode;die();

                $auth_pdvsa=$this->auth_pdvsa($user,$pssw_decode);
		$user_2=strtoupper($user);
		//echo $auth_pdvsa.'-'.$user.'-'.$user_2;die();
                $query_usuario = $this->db->get_where('usuario', array('indicador_usuario' => $user_2));

                if ($query_usuario->num_rows() > 0)
                {
                   $row = $query_usuario->row();

                   $newdata = array(
                   'id_usuario'  => $row->id_usuario,
                   'nombre_usuario'  => $row->nombre_usuario,
                   'indicador_usuario'  => $row->indicador_usuario,
                   'id_rol'  => $row->id_rol,
                   'logged_in' => TRUE
                    );
                    
                    if(!$auth_pdvsa){
                        echo "Indicador y/o Contraseña Incorrecta";die(); 
                    }else{
                        $this->session->set_userdata($newdata);
                        //print_r($this->session->all_userdata());die();
                        $this->logs($accion='sesion-inicio');
                        echo 'true';
                    }
                }else{
                    echo "Indicador NO Registrado en el Sistema";die(); 
                } 

        }
        
                public function logout(){
              
                    $this->logs($accion='sesion-fin');
                    $this->session->sess_destroy();
                    echo 'true';
                    

        }
                public function logs_management(){

                    $crud = new grocery_CRUD(); 
	            $crud->set_table('logs');
                    $crud->unset_add();
                    $crud->unset_edit();
                    $crud->unset_delete();
		    $output = $crud->render();
                    
                    $this->_example_output($output);
        }
                public function logs($accion='a'){

                    $data = $this->session->all_userdata();
                    $data['accion'] = $accion;
                    $this->db->insert('logs', $data); 
        }

                public function offices_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('region');
			$crud->set_subject('Región');
			$crud->required_fields('nombre_region');
			$crud->required_fields('descripcion_region');
			$crud->columns('nombre_region', 'descripcion_region','last_update_region');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}



	public function employees_management()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_example_output($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->offices_management2();

		$output2 = $this->employees_management2();

		$output3 = $this->customers_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');

		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function customers_management2()
	{

		$crud = new grocery_CRUD();

		$crud->set_table('customers');
		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
		$crud->display_as('salesRepEmployeeNumber','from Employeer')
			 ->display_as('customerName','Name')
			 ->display_as('contactLastName','Last Name');
		$crud->set_subject('Customer');
		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

}
