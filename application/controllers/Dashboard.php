<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('users_model');
	}

	 /**
     * Frontend default landing page
     * @access  public
     * @param NA
     * @return NA
     */
    public function index() {
        try {
        //    $data["page_title"] = "Welcome to MPEDA";
       //     $data["banners"] = $this->Banners_model->list_data("core_banners", "id,name,banner_image", array("deleted_by" => 0), "id ASC", TRUE);

            #include page level js
            #Set page layout
            $this->middle = "dashboard";
         //   $this->data = $data;
            $this->layout();
        } catch (Exception $e) {
            log_message("Error", $e->getMessage());
        }
    }


}
