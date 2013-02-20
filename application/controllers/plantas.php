<?php

class Plantas extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

		$this->load->view('header');
		$this->load->view('plantas');
		$this->load->view('footer');

    }

}

?>