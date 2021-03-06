<?php

class Trabalhe_conosco extends CI_controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){  

		$this->load->view('header');
		$this->load->view('topo');
		$this->load->view('trabalhe_conosco');
		$this->load->view('footer');
		
		$this -> output -> cache(60*24); // Se for dinamico remover essa linha

    }

    public function enviar_trabalhe(){

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

			$this -> load -> library('form_validation');

			$this -> form_validation -> set_rules('nome', $this -> lang -> line('label_form_field_name'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('email', $this -> lang -> line('label_form_field_email'), 'required|valid_email|xss_clean');
			$this -> form_validation -> set_rules('cidade', $this -> lang -> line('label_form_field_city'), 'required|min_length[2]|xss_clean');
			$this -> form_validation -> set_rules('estados', $this -> lang -> line('label_form_field_state'), 'required|exact_length[2]|xss_clean');
			//$this -> form_validation -> set_rules('curriculo', $this -> lang -> line('label_form_field_curriculo'), 'required|xss_clean');
			$this -> form_validation -> set_rules('telefone', $this -> lang -> line('label_form_field_tel'), 'required|max_length[13]|xss_clean');
			$this -> form_validation -> set_rules('cargo_pretendido', $this -> lang -> line('label_form_field_cargo'), 'required|xss_clean');
			$this -> form_validation -> set_rules('mensagem', $this -> lang -> line('label_form_field_message'), 'xss_clean');

			if( $this -> form_validation -> run() ){

				$nome = strip_tags($this -> input -> post('nome', TRUE));
				$email = strip_tags( $this -> input -> post('email', TRUE) );
				$cidade = strip_tags($this -> input -> post('cidade', TRUE)) ;
				$estado = strip_tags($this -> input -> post('estados', TRUE)) ;
				$curriculo = $_FILES["curriculo"];
				$telefone = strip_tags($this -> input -> post('telefone', TRUE));
				$cargo = strip_tags($this -> input -> post('cargo_pretendido', TRUE));
				$mensagem = strip_tags($this -> input -> post('mensagem', TRUE));

                $ftp_config["hostname"] = $this -> config -> item('ftp_hostname');
                $ftp_config["username"] = $this -> config -> item('ftp_username');
                $ftp_config["password"] = $this -> config -> item('ftp_password');
                $ftp_config["debug"] = TRUE;

                $this->ftp->connect($ftp_config);

                if(!preg_match("/.(doc|docx|rtf|pdf|txt|cdr|ppt|pptx|pps|ppsx){1}$/i", $curriculo['name'])) {
                    $this -> session -> set_flashdata('feedback', 'error_type');
                    redirect('trabalhe_conosco/', 'refresh');
                }

                if( ($curriculo["size"] / 1024) > 5120 ){
                    $this -> session -> set_flashdata('feedback', 'error_size');
                    redirect('trabalhe_conosco/', 'refresh');
                }

                preg_match("/.(doc|docx|rtf|pdf|txt|cdr|ppt|pptx|pps|ppsx|gif){1}$/i", $curriculo['name'], $ext);
                $a1 = $curriculo['tmp_name'];
                $ext = $ext[1];
                $b1 = "curriculo_(".$email.").".$ext;
                $this->ftp->upload( $curriculo["tmp_name"], dirname($_SERVER['SCRIPT_NAME'])."/".$this -> config -> item('pasta_curriculos')."/".$b1 );
                                
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

				$Subject = "[TRABALHE CONOSCO] Contato de ".$nome;

	            //Content
	            $body = '<div style="width:400px; padding:10px; margin:auto; color:black; font-family:Verdana, Geneva, sans-serif; font-size:11px;">
		            	<p style="text-align:center; margin:0;"><img src="'.base_url('img/logo.png').'" /></p>
		            	<h3 style="font-size:18px;"><strong>'.$nome.' entrou em contato:</strong></h3>
		            	<p>
		                <strong>Nome:</strong> '.$nome.'<br />
		            		<strong>Email:</strong> '.$email.'<br />
		            		<strong>Cidade:</strong> '.$cidade.'<br />
		            		<strong>Estado:</strong> '.$estado.'<br />
		            		<strong>Telefone:</strong> '.$telefone.'<br />
		                    <strong>Cargo pretendido:</strong> '.$cargo.'<br />
		            		<strong>Mensagem:</strong> '.$mensagem.'<br />
		            		<strong>Curriculo:</strong> <a href="'.site_url( $this -> config -> item('pasta_curriculos').$b1 ).'">Clique aqui para baixar</a>
		            	</p>
		                </div>';

	            @mail($AddressEmailPrincipal,$Subject,$body,$headers);
	            @mail($AddressEmailOpera,$Subject,$body,$headers);

                $this -> session -> set_flashdata('feedback', 'success');

		        redirect('trabalhe_conosco/', 'refresh');

			}else{

				$this -> index();

			}

		}else{

			show_404();

		}

    }

}

?>