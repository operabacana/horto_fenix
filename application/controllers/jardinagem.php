<?php

class Jardinagem extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

		$this->load->view('header');
		$this->load->view('jardinagem');
		$this->load->view('footer');

    }

}

?>