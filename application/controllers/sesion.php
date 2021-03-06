<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
                $this->load->helper('form');
		//$this->load->library('grocery_CRUD');
                $this->load->library(array('session','grocery_CRUD'));
	}

	public function _exp_output($output = null)
	{

            $this->load->view('sesion.php',$output);
            
	}
//	public function login()
//	{
//            print_r($_POST);
//            echo "<script>alert('...')</script>";
//	}
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
        $pssw = trim($this->input->post('password'));
        
                $auth_pdvsa=$this->auth_pdvsa($user,$pssw);
                
                $query_usuario = $this->db->get_where('usuario', array('indicador_usuario' => $user));

                if ($query_usuario->num_rows() > 0)
                {
                   $row = $query_usuario->row();

                   $newdata = array(
                   'id_usuario'  => $row->id_usuario,
                   'indicador_usuario'  => $row->indicador_usuario,
                   'nombre_usuario'  => $row->nombre_usuario,
                   'id_rol'  => $row->id_rol,
                   'logged_in' => TRUE
                    );
                    
                    if(!$auth_pdvsa){
                        echo "<meta charset='utf-8'/> <script>alert('Indicador y/o Contraseña Incorrecta')</script>";
                        redirect('/', 'refresh');
                    }else{
                        $this->session->set_userdata($newdata);
                        //print_r($this->session->all_userdata());die();
                        //$this->logs($accion='sesion-inicio');
                        $indicador=  strtoupper($user);
                        echo "<meta charset='utf-8'/> <script>alert('Bienvenido $row->nombre_usuario')</script>";
                        redirect('/incidentes', 'refresh');
                    }
                }else{
                    echo "<meta charset='utf-8'/> <script>alert('Indicador NO Registrado en el Sistema')</script>";
                    redirect('/', 'refresh');
                } 

        }
	public function logout()
	{
            $indicador = strtoupper($this->session->userdata('indicador'));
            $nombre_usuario = strtoupper($this->session->userdata('nombre_usuario'));
            $this->session->sess_destroy();
            echo "<meta charset='utf-8'/> <script>alert('Hasta Luego $nombre_usuario')</script>";
            redirect('/', 'refresh');
	}

	public function index()
	{
		$this->_exp_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

}
