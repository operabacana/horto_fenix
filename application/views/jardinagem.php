<div role="main" class="container">

    <div class="slider slider_jardinagem">

        <ul>

            <li><img src="<?php echo site_url(); ?>imagens/jardinagem1.png" /></li>
            <li><img src="<?php echo site_url(); ?>imagens/jardinagem2.png" /></li>

        </ul>

    </div>

    <article class="box_content" id="content_jardinagem">

         <div id="order_texto">

            <h1><div class="sprite icone_pagina"></div> Jardinagem</h1>
            <p>
A jardinagem é um dos pontos fortes da Fênix Móveis e Paisagismo. A análise do terreno é feita e os serviços inclusos cobrem desde rega e poda até substituição de plantas que estão morrendo e dedetização de agentes invasores que estejam prejudicando seu jardim.
<br /><br />
A equipe é muito experiente e inspira confiança. O serviço é feito no local: sendo casa, apartamento ou terreno. O trabalho é feito com jardins grandes ou pequenos e não é necessário que você tenha montado o jardim com as plantas da Fênix para que seja atendido.
Este serviço cobre toda a região serrana do Rio de Janeiro.
            </p>

         </div>

         <div class="carrossel">

             <p>Conheça nossos projetos:</p>

             <div class="prev"></div>

             <div class="carrossel_projetos">

                <ul>
                    <?php foreach($jardinagens as $ind => $jardinagem){ ?>
                        <li><img src="<?php echo site_url(); ?>fotos_jardinagem/P/<?php echo $jardinagem->foto_pequena; ?>" width="90" /></li>
                    <?php } ?>

                </ul>

             </div>

             <div class="next"></div>

         </div>

    </article>

</div>
<div class="display back_galeria galeria_jardinagem"></div>
<div class="display ordena_galeria">

    <div class="box_imgs box_imgs_jardinagem">

        <div class="topo_galeria">

            <p><div class="sprite icones_menu_galeria icones_jardinagem"></div> <p class="texto_link jardinagem">Jardinagem</p></p>
            <a href="#" class="fechar_galeria fechar_jardinagem">X Fechar</a>

        </div>

         <div class="carrossel_galerias">

             <div class="ant ant_jardinagem"></div>

             <div class="carrossel_imagens">

                <ul>

                    <?php foreach($jardinagens as $ind => $jardinagem){ ?>
                    <li>
                        <img src="<?php echo site_url(); ?>fotos_jardinagem/G/<?php echo $jardinagem->foto_grande; ?>" width="601"/>
                        <div class="ordena_infos infos_paisagismo">
                            <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                                <div class="viewport">
                                    <div class="overview">
                                        <p><label class="label_infos_paisagismo">Jardim: </label> <?php echo $jardinagem->jardim; ?></p>
                                        <p><label class="label_infos_paisagismo">Descrição: </label><?php echo $jardinagem->descricao; ?></p>
                                        <p><label class="label_infos_paisagismo">Problema: </label><?php echo $jardinagem->problema; ?></p>
                                        <p><label class="label_infos_paisagismo">Solução: </label><?php echo $jardinagem->solucao; ?></p>
                                    </div>
                                </div>
                        </div>
                    </li>
                    <?php } ?>

                </ul>

             </div>

             <div class="prox prox_jardinagem"></div>

         </div>

    </div>

    <div class="box_carrossel box_carrossel_jardinagem">

             <div class="ant_vert ant_vert_jardinagem"></div>

             <div class="carrossel_imagens_mini">

                <ul>
                    <?php foreach($jardinagens as $ind => $jardinagem){ ?>
                        <li><img src="<?php echo site_url(); ?>fotos_jardinagem/P/<?php echo $jardinagem->foto_pequena; ?>" width="205" /></li>
                    <?php } ?>
                </ul>

             </div>

             <div class="prox_vert prox_vert_jardinagem"></div>

    </div>

</div>
