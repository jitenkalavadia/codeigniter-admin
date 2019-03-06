<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}

	public function index(){
		//load session library
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('dashboard');
		}
		else{
			$this->load->view('users/login');
		}
	}

	public function login(){
		//load session library
		$this->load->library('session');

		$username = $_POST['username'];
		$password = $_POST['password'];

		$data = $this->users_model->login($username, $password);
		
		if($data){
			$this->session->set_userdata('user', $data);
			redirect('dashboard');
		}
		else{
			header('location:'.base_url().$this->index());
			$this->session->set_flashdata('error','Invalid login. User not found');
		} 
	}

	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}

}
