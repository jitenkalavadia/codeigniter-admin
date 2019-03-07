<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("employee_model");
	}

	public function index()
    {
    	try {
            $this->middle = "employee/list";
            $this->layout();
        } catch (Exception $e) {
            log_message("Error", $e->getMessage());
        }
    }

    public function employee_list()
    {
	    // Datatables Variables
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));

	    $employee = $this->employee_model->get_employee();
	    $data = array();
	    $cnt = 1;
	    foreach($employee->result() as $r) {
	        $data[] = array(
	        	$cnt,
	            $r->emp_code,
	            $r->emp_name,
	            $r->emp_email,
	            $r->phone
	        );
	        $cnt++;
	    }
	    $output = array(
	            "draw" => $draw,
	            "recordsTotal" => $employee->num_rows(),
	            "recordsFiltered" => $employee->num_rows(),
	            "data" => $data
	    );
	    echo json_encode($output);
	    exit();
    }
}
