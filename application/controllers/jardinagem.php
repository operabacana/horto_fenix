<?php

class Jardinagem extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $sel_jardinagem = $this->db->query("SELECT * FROM jardinagem");
        $jardinagens = $sel_jardinagem->result();

		$this->load->view('header');
		$this->load->view('jardinagem', array("jardinagens"=>$jardinagens));
		$this->load->view('footer');

    }

}

?>