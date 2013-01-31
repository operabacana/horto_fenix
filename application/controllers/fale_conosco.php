<?php

class Fale_conosco extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

		$this->load->view('header');
		$this->load->view('topo');
		$this->load->view('fale_conosco');
		$this->load->view('footer');
		
		$this -> output -> cache(60*24); // Se for dinamico remover essa linha
		

    }

	public function enviar_fale_conosco(){

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

			$this -> load -> library('form_validation');

			$this -> form_validation -> set_rules('nome', $this -> lang -> line('label_form_field_name'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('email', $this -> lang -> line('label_form_field_email'), 'required|valid_email|xss_clean');
			$this -> form_validation -> set_rules('cidade', $this -> lang -> line('label_form_field_city'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('estados', $this -> lang -> line('label_form_field_state'), 'required|exact_length[2]|xss_clean');
			$this -> form_validation -> set_rules('empresa', $this -> lang -> line('label_form_field_empresa'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('telefone', $this -> lang -> line('label_form_field_tel'), 'required|valid_br_phone_number|xss_clean');
			$this -> form_validation -> set_rules('assunto', $this -> lang -> line('label_form_field_subject'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('mensagem', $this -> lang -> line('label_form_field_message'), 'required|min_length[2]|xss_clean');

			if( $this -> form_validation -> run() ){

				$tipo = strip_tags($this -> input -> post('faleconosco', TRUE));
				$nome = strip_tags($this -> input -> post('nome', TRUE));
				$email = strip_tags( $this -> input -> post('email', TRUE) );
				$cidade = strip_tags($this -> input -> post('cidade', TRUE)) ;
				$estado = strip_tags($this -> input -> post('estados', TRUE)) ;
				$telefone = strip_tags($this -> input -> post('telefone', TRUE));
				$assunto = strip_tags($this -> input -> post('assunto', TRUE));
				$mensagem = strip_tags($this -> input -> post('mensagem', TRUE));

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
		            	<p style="text-align:center; margin:0;"><img src="'.base_url('img/logos/logo.png').'" /></p>
		            	<h3 style="font-size:18px;"><strong>'.$nome.' entrou em contato:</strong></h3>
		            	<p>
		                <strong>Nome:</strong> '.$nome.'<br />
		            		<strong>Email:</strong> '.$email.'<br />
		            		<strong>Cidade:</strong> '.$cidade.'<br />
		            		<strong>Estado:</strong> '.$estado.'<br />
		            		<strong>Telefone:</strong> '.$telefone.'<br />
		                    <strong>Assunto:</strong> '.$assunto.'<br />
		            		<strong>Coment?rios:</strong> '.$mensagem.'<br />
		            	</p>
		                </div>';

	            @mail($AddressEmailPrincipal,$Subject,$body,$headers);
	            @mail($AddressEmailOpera,$Subject,$body,$headers);

                $this -> session -> set_flashdata('feedback', 'success');

		        redirect('fale_conosco/', 'refresh');

			}else{

				$this -> index();

			}

		}else{

			show_404();

		}

	}
    
}

?>