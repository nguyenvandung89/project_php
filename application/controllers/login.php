<?php if (!defined('BASEPATH')) die();
 
session_start();
class Login extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->Model("Mlogin");
  }

  public function index()
  { 
  	$this->load->view('login');
  }

  public function authen(){
  	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
    if ($this->form_validation->run() == false){
    	$this->load->view("login");
    }
    else
    {
    	$user = array(
    		'username' => $this->input->post('username'),
    		'password' => md5($this->input->post('password'))
    	);
    	$result = $this->Mlogin->checkuser($user);
    	if($result == true){
    		$this->session->set_userdata('logged_in',$this->input->post('username'));
    		redirect(base_url()."index.php/users");
    	}
    	else{
    		$user = array('error_message' => 'Invalid Username or password');
    		$this->load->view('login');
    	}
    }
	}

	function logout(){
		$this->session->unset_userdata('logged_in', '');
		$data['message_logout'] = 'Successfully logout';
		$this->load->view('login', $data);
	}
}
?>
