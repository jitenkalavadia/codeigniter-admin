<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");
ob_clean();

class MY_Controller extends CI_Controller {

    //Set the class variable.
    var $template = array();
    var $data = array();

    public function __construct() {
        parent::__construct();
    }

    /**
     * layout : Layout management
     *
     * @access    public
     * @param    NA
     * @return    NA
     */
    public function layout() {
        $this->template["header"] = $this->load->view("layout/header", $this->data, true);
        $this->template["sidebar"] = $this->load->view("layout/sidebar", $this->data, true);
        $this->template["middle"] = $this->load->view($this->middle, $this->data, true);
        $this->template["footer"] = $this->load->view("layout/footer", $this->data, true);
        //Load view
        $this->load->view("layout/index", $this->template);
    }

    /**
     * _valid_request
     *
     * @access    public
     * @param    req_method get or post, check_ajax_req
     * @return    boolean
     */
    protected function _valid_request($req_method = "post", $check_ajax_req = true) {

        if ($check_ajax_req) {
            return ($this->input->is_ajax_request() && $this->input->method() == $req_method);
        } else {
            return ($this->input->method() == $req_method);
        }
    }

    /**
     * Method to check admin user already logged in or not
     * if Already Logged In then redirect to admin dashboard
     * @access    protected
     * @param    sesson data
     * @return    boolean or redirect
     */
    protected function checkAdminLogged() {

        if (!$this->session->userdata()) {
            return false;
            //Redirect based on action
            redirect(base_url());
        } else {
            return true;
        }
    }


}
