<?php

class Plantas extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $sel_jardim = $this->db->query("SELECT plantas.* FROM plantas, plantas_tipo_plantas, tipo_plantas WHERE tipo_plantas.nome='Jardim' AND plantas_tipo_plantas.id_tipo = tipo_plantas.id  AND plantas.id = plantas_tipo_plantas.id_plantas ORDER BY nome ASC");

        $jardim = $sel_jardim->result();

		$this->load->view('header');
		$this->load->view('plantas', array("plantas"=>$jardim));
		$this->load->view('footer');

    }

}

?>