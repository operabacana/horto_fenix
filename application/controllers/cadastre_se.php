<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastre_se extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

		$this->load->view('header');
		$this->load->view('topo');
		$this->load->view('cadastre_se');
		$this->load->view('footer');
		
		//$this -> output -> cache(60*24); // Se for dinamico remover essa linha

    }

    public function enviar_cadastro(){

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

			$this -> load -> library('form_validation');

			$this -> form_validation -> set_rules('nome', $this -> lang -> line('label_form_field_name'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('email', $this -> lang -> line('label_form_field_email'), 'required|valid_email|xss_clean');
			$this -> form_validation -> set_rules('cidade', $this -> lang -> line('label_form_field_city'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('estados', $this -> lang -> line('label_form_field_state'), 'required|exact_length[2]|xss_clean');
			$this -> form_validation -> set_rules('telefone', $this -> lang -> line('label_form_field_tel'), 'required|max_length[13]|xss_clean');
			$this -> form_validation -> set_rules('empresa', $this -> lang -> line('label_form_field_empresa'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('cnpj', $this -> lang -> line('label_form_field_cnpj'), 'required|xss_clean');
			$this -> form_validation -> set_rules('cpf', $this -> lang -> line('label_form_field_cpf'), 'required|xss_clean');
			$this -> form_validation -> set_rules('mensagem', $this -> lang -> line('label_form_field_message'), 'xss_clean');

			if( $this -> form_validation -> run() ){

				$nome = strip_tags($this -> input -> post('nome', TRUE));
				$email = strip_tags( $this -> input -> post('email', TRUE) );
				$cidade = strip_tags($this -> input -> post('cidade', TRUE)) ;
				$estado = strip_tags($this -> input -> post('estados', TRUE)) ;
				$telefone = strip_tags($this -> input -> post('telefone', TRUE));
				$empresa = strip_tags($this -> input -> post('empresa', TRUE));
				$cnpj = strip_tags($this -> input -> post('cnpj', TRUE));
				$cpf = strip_tags($this -> input -> post('cpf', TRUE));
				$mensagem = strip_tags($this -> input -> post('mensagem', TRUE));

                $this->db->insert("cadastros", array("nome"=>$nome, "email"=>$email, "cidade"=>$cidade, "estado"=>$estado, "telefone"=>$telefone, 'empresa'=>$empresa, "cnpj"=>$cnpj, "cpf"=>$cpf, "mensagem"=>$mensagem));

                $this -> session -> set_flashdata('feedback', 'success');

		        redirect('cadastre_se/', 'refresh');

			}else{

				$this -> index();

			}

		}else{

			show_404();

		}

    }

}

?>