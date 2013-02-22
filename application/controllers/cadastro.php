<?php

class Cadastro extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){ }

	public function enviar_cadastro(){

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

            $referer = $_SERVER['HTTP_REFERER'];

			$this -> load -> library('form_validation');

			$this -> form_validation -> set_rules('nome', $this -> lang -> line('label_form_field_name'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('email', $this -> lang -> line('label_form_field_email'), 'required|valid_email|xss_clean');

			if( $this -> form_validation -> run() ){

				$nome = strip_tags( $this -> input -> post('nome', TRUE) );
				$email = strip_tags( $this -> input -> post('email', TRUE) );

				$this -> db -> query("INSERT INTO cadastros SET nome='$nome', email='$email'");

                $this -> session -> set_flashdata('feedback', 'success');

		        redirect($referer, 'refresh');

			}else{

                $this -> session -> set_flashdata('feedback', 'error');

				redirect($referer, 'refresh');

			}

		}else{

			show_404();

		}

	}
    
}

?>