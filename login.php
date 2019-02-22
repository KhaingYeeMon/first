<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
	   parent::__construct();
      $this->load->library('my_admin');
      $this->load->library('form_validation');
	}

	public function index($no=0)
	{
		$data['title'] = 'Bagan | Login';
		$data['error_no'] = $no;
		$this->load->view('login',$data);
	}

	function check()
	{
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|md5');
		
		if($this->form_validation->run()){
			if($this->my_admin->login($this->form_validation->set_value('username'), $this->form_validation->set_value('password')))
			{
				redirect('dashboard/add');
			}
			else
			{
				redirect('login/index/2');
			}
		}
		else
		{
			redirect('login/index/1');
		}
		/*$result = $this->my_admin->login($username,$password);
		if($result)
		{
			redirect('index.php/dashboard');
		}else
			{
				redirect('index.php/login/index/1');
			}*/


			
	}
		
		
	function logout()
	{
		$this->my_admin->logout();
		redirect('login');
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */