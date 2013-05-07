<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

		$this->load->view('header');
		$this->load->view('contato');
		$this->load->view('footer');

    }

    public function enviar_contato(){

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

			$this -> load -> library('form_validation');

			$this -> form_validation -> set_rules('nome', $this -> lang -> line('label_form_field_name'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('email', $this -> lang -> line('label_form_field_email'), 'required|valid_email|xss_clean');
			$this -> form_validation -> set_rules('cidade', $this -> lang -> line('label_form_field_city'), 'required|min_length[2]|xss_clean');
            $this -> form_validation -> set_rules('telefone', $this -> lang -> line('label_form_field_tel'), 'required|max_length[13]|xss_clean');
			$this -> form_validation -> set_rules('endereco', $this -> lang -> line('label_form_field_endereco'), 'required|xss_clean');
			$this -> form_validation -> set_rules('assunto', $this -> lang -> line('label_form_field_assunto'), 'required|xss_clean');
			$this -> form_validation -> set_rules('mensagem', $this -> lang -> line('label_form_field_message'), 'xss_clean');

			if( $this -> form_validation -> run() ){

				$nome = strip_tags($this -> input -> post('nome', TRUE));
				$email = strip_tags( $this -> input -> post('email', TRUE) );
				$cidade = strip_tags($this -> input -> post('cidade', TRUE)) ;
				$telefone = strip_tags($this -> input -> post('telefone', TRUE));
				$endereco = strip_tags($this -> input -> post('endereco', TRUE));
				$assunto = strip_tags($this -> input -> post('assunto', TRUE));
				$mensagem = strip_tags($this -> input -> post('mensagem', TRUE));

                $this -> session -> set_flashdata('feedbackContact', 'success');

                $emailContato = $this -> config -> item('email_contato');
				$emailContatoExtra = $this -> config -> item('email_contato_extra');
				$emailContatoOpera = $this -> config -> item('email_opera_no_site');
				$emailOperaExtra = $this -> config -> item('email_site_na_opera');
				$site = $this -> config -> item('nome_site');

				$AddressEmailPrincipal = "$emailContato";

				$AddressEmailOpera = "$emailContatoOpera";
				$AddressEmailOpera .= ", $emailOperaExtra";

				$headers = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= "From: $site <$emailContato>\n";
				$headers .= "Return-path: $emailContato";

				$Subject = "[FALE CONOSCO] Contato de ".$nome;

	            //Content
	            $body = '<div style="width:400px; padding:10px; margin:auto; color:black; font-family:Verdana, Geneva, sans-serif; font-size:11px;">
		            	<p style="text-align:center; margin:0;"><img src="'.base_url('imagens/logo.png').'" /></p>
		            	<h3 style="font-size:18px;"><strong>'.$nome.' entrou em contato:</strong></h3>
		            	<p>
		                <strong>Nome:</strong> '.$nome.'<br />
		            		<strong>Email:</strong> '.$email.'<br />
		            		<strong>Cidade:</strong> '.$cidade.'<br />
		            		<strong>Telefone:</strong> '.$telefone.'<br />
		                    <strong>Endereço:</strong> '.$endereco.'<br />
		                    <strong>Assunto:</strong> '.$assunto.'<br />
		            		<strong>Mensagem:</strong> '.$mensagem.'<br />
		            	</p>
		                </div>';

	            @mail($AddressEmailPrincipal,$Subject,$body,$headers);
	            @mail($AddressEmailOpera,$Subject,$body,$headers);

		        redirect('contato/', 'refresh');

			}else{

				$this -> index();

			}

		}else{

			show_404();

		}

    }

}

?>