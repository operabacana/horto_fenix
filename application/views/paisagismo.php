<div role="main" class="container">

    <div class="slider slider_paisagismo">

        <ul>

            <li><img src="<?php echo site_url(); ?>imagens/paisagismo1.png" /></li>
            <li><img src="<?php echo site_url(); ?>imagens/paisagismo2.png" /></li>

        </ul>

    </div>

    <article class="box_content" id="content_paisagismo">

         <div id="order_texto">

            <h1><div class="sprite icone_pagina"></div> Paisagismo</h1>
            <p>
A Fênix Móveis e Paisagismo busca aperfeiçoar a estética do jardim de seus clientes partindo da mistura de seus elementos (flores, árvores, grama, etc.) e de objetos ou móveis que buscam combinar suas cores e formas às da paisagem. Com designers treinados e a utilização de softwares especializados a equipe faz com que o jardim fique exatamente como o cliente deseja e ele pode ainda acompanhar todo o processo.
<br /><br />
A utilização de elementos mais simples como vasos, grades e cercas e outros elementos mais específicos como o uso de esculturas, pedras coloridas, lagos e pequenas pontes são muito procurados para criar o cenário ideal.
<br /><br />
As reuniões para acompanhamento do projeto podem ainda ser feitas na lanchonete localizada dentro da Fênix Móveis e Paisagismo para que você possa apreciar um
            </p>

         </div>

         <div class="carrossel">

             <p>Conheça nossos projetos:</p>

             <div class="prev"></div>

             <div class="carrossel_projetos">

                <ul>

                    <?php foreach($paisagismos as $ind => $paisagismo){ ?>
                        <li><img src="<?php echo site_url(); ?>fotos_paisagismo/P/<?php echo $paisagismo->foto_pequena; ?>" width="90" /></li>
                    <?php } ?>

                </ul>

             </div>

             <div class="next"></div>

         </div>

    </article>

</div>
<div class="display back_galeria galeria_paisagismo"></div>
<div class="display ordena_galeria">

    <div class="box_imgs box_imgs_paisagismo">

        <div class="topo_galeria">

            <p><div class="sprite icones_menu_galeria icones_paisagismo"></div> <p class="texto_link paisagismo">Paisagismo</p></p>
            <a href="#" class="fechar_galeria fechar_paisagismo">X Fechar</a>

        </div>

         <div class="carrossel_galerias">

             <div class="ant ant_paisagismo"></div>

             <div class="carrossel_imagens">

                <ul>
                    <?php foreach($paisagismos as $ind => $paisagismo){ ?>
                    <li>
                        <img src="<?php echo site_url(); ?>fotos_paisagismo/G/<?php echo $paisagismo->foto_grande; ?>" width="601"/>
                        <div class="ordena_infos infos_paisagismo">
                            <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                                <div class="viewport">
                                    <div class="overview">
                                        <p><label class="label_infos_paisagismo">Projeto: </label> <?php echo $paisagismo->projeto; ?></p>
                                        <p><label class="label_infos_paisagismo">Descrição: </label><?php echo $paisagismo->descricao; ?></p>
                                        <p><label class="label_infos_paisagismo">Problema: </label><?php echo $paisagismo->problema; ?></p>
                                        <p><label class="label_infos_paisagismo">Solução: </label><?php echo $paisagismo->solucao; ?></p>
                                    </div>
                                </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

             </div>

             <div class="prox prox_paisagismo"></div>

         </div>

    </div>

    <div class="box_carrossel box_carrossel_paisagismo">

             <div class="ant_vert ant_vert_paisagismo"></div>

             <div class="carrossel_imagens_mini">

                <ul>
                    <?php foreach($paisagismos as $ind => $paisagismo){ ?>
                        <li><img src="<?php echo site_url(); ?>fotos_paisagismo/P/<?php echo $paisagismo->foto_pequena; ?>" width="205" /></li>
                    <?php } ?>
                </ul>

             </div>

             <div class="prox_vert prox_vert_paisagismo"></div>

    </div>

</div>