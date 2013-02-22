<?php

class Ajax_listas extends CI_Controller{

	public function __construct(){

		parent::__construct();

	}

    public function index(){


        if( isset( $_POST["nome"] ) ){

            $nome = trim($_POST["nome"]);

        }

        if( isset( $_POST["letra"]) ){

            $letra = $_POST["letra"];

            if( $nome != 'Inorgânicos' && $nome != "Orgânicos" ){

                $sql_lista = "SELECT plantas.* FROM plantas, plantas_tipo_plantas, tipo_plantas WHERE tipo_plantas.nome='$nome' AND plantas_tipo_plantas.id_tipo = tipo_plantas.id AND plantas.id = plantas_tipo_plantas.id_plantas AND plantas.nome LIKE '$letra%' ";

            }else{

                $sql_lista = "SELECT * FROM vasos WHERE tipo='$nome' AND nome LIKE '$letra%'";

            }

            $sel_lista = $this -> db -> query($sql_lista);

        }else{

            if( $nome != 'Inorgânicos' && $nome != "Orgânicos" ){

              $sql_lista = "SELECT plantas.* FROM plantas, plantas_tipo_plantas, tipo_plantas WHERE tipo_plantas.nome='$nome' AND plantas_tipo_plantas.id_tipo = tipo_plantas.id AND plantas.id = plantas_tipo_plantas.id_plantas ORDER BY nome ASC";

            }else{

              $sql_lista = "SELECT * FROM vasos WHERE tipo='$nome'";

            }

            $sel_lista = $this -> db -> query($sql_lista);

        }

        $listas = $sel_lista->result();

        echo '<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                    <div class="viewport">
                        <div class="overview">';

        foreach( $listas as $ind => $lista ){

            if( ($ind+1) % 2 == 0 ){ $class="par"; }else{ $class="impar"; }

            echo '
                <p class="'.$class.'">'.$lista->nome.'</p>
            ';

        }

        echo '</div>  </div>';

    }

}

?>
