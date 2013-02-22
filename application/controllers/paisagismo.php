<?php

class Paisagismo extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $sel_paisagismos = $this->db->query("SELECT * FROM paisagismo");
        $paisagismos = $sel_paisagismos->result();

		$this->load->view('header');
		$this->load->view('paisagismo', array("paisagismos"=>$paisagismos));
		$this->load->view('footer');

    }

}

?>