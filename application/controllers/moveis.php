<?php

class Moveis extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $sel_moveis_interno = $this->db->query("SELECT * FROM moveis WHERE tipo IN(1,3)");
        $moveis_interno = $sel_moveis_interno->result();

        $sel_moveis_externo = $this->db->query("SELECT * FROM moveis WHERE tipo IN(2,3)");
        $moveis_externo = $sel_moveis_externo->result();

		$this->load->view('header');
		$this->load->view('moveis', array("internos"=>$moveis_interno, "externos"=>$moveis_externo));
		$this->load->view('footer');

    }

}

?>