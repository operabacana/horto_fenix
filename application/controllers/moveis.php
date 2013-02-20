<?php

class Moveis extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

		$this->load->view('header');
		$this->load->view('moveis');
		$this->load->view('footer');

    }

}

?>