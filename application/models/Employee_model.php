<?php
	class Employee_model extends CI_Model {
		public function get_employee()
     	{
        	return $this->db->get("employee");
     	}

	}
?>