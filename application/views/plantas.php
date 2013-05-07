<div role="main" class="container">

    <article class="box_content" id="content_plantas">

         <div class="menu_article menu_plantas">

            <ul>

                <li><a href="#" class="link_menu_interno link_jardim"><div class="sprite icones_menu_interno jardim"></div> <p class="texto_link jardim">Jardim</p></a></li>
                <li><a href="#" class="link_menu_interno link_interior"><div class="sprite icones_menu_interno interior"></div> <p class="texto_link interior">Interior</p></a></li>
                <li><a href="#" class="link_menu_interno link_sementes"><div class="sprite icones_menu_interno sementes"></div> <p class="texto_link sementes">Reflorestamento e sementes</p></a></li>
                <li><a href="#" class="link_menu_interno link_flores"><div class="sprite icones_menu_interno flores"></div> <p class="texto_link flores">Flores</p></a></li>
                <li><a href="#" class="link_menu_interno link_grama"><div class="sprite icones_menu_interno grama"></div> <p class="texto_link grama">Grama</p></a></li>

            </ul>


         </div>

         <div class="slider slider_plantas">

              <ul class="interno">

                <li><img src="<?php echo site_url(); ?>imagens/plantas1.png" /></li>
                <li><img src="<?php echo site_url(); ?>imagens/plantas2.png" /></li>

              </ul>

         </div>



         <div id="order_texto" style="display:none;">

            <h1><div class="sprite icone_pagina"></div> Plantas</h1>
            <p>
A Fênix Móveis e Paisagismo busca aperfeiçoar a estética do jardim de seus clientes partindo da mistura de seus elementos (flores, árvores, grama, etc.) e de objetos ou móveis que buscam combinar suas cores e formas às da paisagem. Com designers treinados e a utilização de softwares especializados a equipe faz com que o jardim fique exatamente como o cliente deseja e ele pode ainda acompanhar todo o processo.
<br /><br />
A utilização de elementos mais simples como vasos, grades e cercas e outros elementos mais específicos como o uso de esculturas, pedras coloridas, lagos e pequenas pontes são muito procurados para criar o cenário ideal.
<br /><br />
As reuniões para acompanhamento do projeto podem ainda ser feitas na lanchonete localizada dentro da Fênix Móveis e Paisagismo para que você possa apreciar um
            </p>

         </div>

         <div class="order_listas">

            <h1 class="nome_lista"><div id="icone_lista" class="sprite icones_menu_interno"></div> Jardim</h1>
            <h2 class="texto_lista">Escolha de A à Z as melhores plantas para seu jardim.</h2>

            <p class="alfabeto">
              <a href="#" class="letra">A</a>
              <a href="#" class="letra">B</a>
              <a href="#" class="letra">C</a>
              <a href="#" class="letra">D</a>
              <a href="#" class="letra">E</a>
              <a href="#" class="letra">F</a>
              <a href="#" class="letra">G</a>
              <a href="#" class="letra">H</a>
              <a href="#" class="letra">I</a>
              <a href="#" class="letra">J</a>
              <a href="#" class="letra">K</a>
              <a href="#" class="letra">L</a>
              <a href="#" class="letra">M</a>
              <a href="#" class="letra">N</a>
              <a href="#" class="letra">O</a>
              <a href="#" class="letra">P</a>
              <a href="#" class="letra">Q</a>
              <a href="#" class="letra">R</a>
              <a href="#" class="letra">S</a>
              <a href="#" class="letra">T</a>
              <a href="#" class="letra">U</a>
              <a href="#" class="letra">V</a>
              <a href="#" class="letra">W</a>
              <a href="#" class="letra">X</a>
              <a href="#" class="letra">Y</a>
              <a href="#" class="letra">Z</a>
            </p>

            <ul class="lista" id="scroll">

              <?php foreach($plantas as $ind => $planta){ ?>

                <li class='<?php if( ($ind+1) % 2 == 0 ){ echo "par"; }else{ echo "impar"; } ?>' ><?php echo $planta->nome; ?></li>

              <?php } ?>

            </ul>

         </div>

    </article>

</div>