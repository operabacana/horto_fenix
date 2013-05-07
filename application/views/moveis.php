<div role="main" class="container">

    <article class="box_content" id="content_moveis">

         <div class="menu_article menu_moveis">

            <ul>

                <li><a href="#" class="link_menu_interno link_interior galeria_interna"><div class="sprite icones_menu_interno interior"></div> <p class="texto_link interior">Interior</p></a></li>
                <li><a href="#" class="link_menu_interno link_exterior galeria_interna"><div class="sprite icones_menu_interno exterior"></div> <p class="texto_link exterior">Exterior</p></a></li>

            </ul>


         </div>

          <div class="slider slider_jardinagem">

              <ul class="interno">

                  <li><img src="<?php echo site_url(); ?>imagens/moveis1.png" /></li>
                  <li><img src="<?php echo site_url(); ?>imagens/moveis2.png" /></li>

              </ul>

          </div>

         <div id="order_texto">

            <h1><div class="sprite icone_pagina"></div> Móveis</h1>
            <p>
A Fênix trabalha com madeira de qualidade para criar móveis únicos. Todos são projetados por quem entende e podem ser criados sob medida, incluindo um processo de planejamento e pré-desenho para a construção dos móveis. As peças podem ser utilizadas tanto no interior quanto no exterior dos ambientes.
<br /><br />
Acrescente essa decoração especial à sua casa, afinal, móveis de madeira nunca saem de moda e são garantia de requinte e estilo em qualquer ambiente.
            </p>

         </div>

         <div class="order_listas">



         </div>

    </article>

</div>
<div class="display back_galeria galeria_moveis"></div>
<div class="display_internos ordena_galeria">

    <div class="box_imgs box_imgs_moveis box_imgs_internos">

        <div class="topo_galeria_internos">

            <p><div class="sprite icones_menu_galeria icones_moveis"></div> <p class="texto_link moveis texto_link_galeria">Móveis</p></p>
            <a href="#" class="fechar_moveis">X Fechar</a>

        </div>

         <div class="carrossel_galerias carrossel_galerias_internos">

             <div class="ant ant_moveis"></div>

             <div class="carrossel_imagens">

                <ul>

                    <?php foreach($internos as $ind=>$interno){ ?>

                      <li>
                          <img src="<?php echo site_url(); ?>fotos_moveis/G/<?php echo $interno->foto_grande; ?>" width="601"/>
                          <div class="ordena_infos infos_moveis">
                              <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                                  <div class="viewport">
                                      <div class="overview">
                                          <?php /* ?><p><label class="label_infos_moveis">Produto: </label><?php echo $interno->produto; ?></p><?php */ ?>
                                          <?php /* ?><p><label class="label_infos_moveis">Descrição: </label><?php echo $interno->descricao; ?></p><?php */ ?>
                                          <?php /* ?><p><label class="label_infos_moveis">Problema: </label><?php echo $interno->problema; ?></p><?php */ ?>
                                          <?php /* ?><p><label class="label_infos_moveis">Solução: </label><?php echo $interno->solucao; ?></p><?php */ ?>
                                      </div>
                                  </div>
                          </div>
                      </li>

                    <?php } ?>

                </ul>

             </div>

             <div class="prox prox_moveis"></div>

         </div>

    </div>

    <div class="box_carrossel box_carrossel_moveis box_carrossel_internos">

             <div class="ant_vert ant_vert_moveis"></div>

             <div class="carrossel_imagens_mini carrossel_imagens_mini_intermos">

                <ul>
                    <?php foreach($internos as $ind=>$interno){ ?>
                        <li><img src="<?php echo site_url(); ?>fotos_moveis/P/<?php echo $interno->foto_pequena; ?>" width="205" /></li>
                    <?php } ?>
                </ul>

             </div>

             <div class="prox_vert prox_vert_moveis"></div>

    </div>

</div>
<div class="display_externos ordena_galeria">

    <div class="box_imgs box_imgs_moveis box_imgs_externos">

        <div class="topo_galeria_externos">

            <p><div class="sprite icones_menu_galeria icones_moveis"></div> <p class="texto_link moveis texto_link_galeria">Móveis</p></p>
            <a href="#" class="fechar_moveis">X Fechar</a>

        </div>

         <div class="carrossel_galerias carrossel_galerias_externos">

             <div class="ant ant_moveis"></div>

             <div class="carrossel_imagens">

                <ul>

                    <?php foreach($externos as $ind=>$externo){ ?>

                      <li>
                          <img src="<?php echo site_url(); ?>fotos_moveis/G/<?php echo $externo->foto_grande; ?>" width="601"/>
                          <div class="ordena_infos infos_moveis">
                              <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                                  <div class="viewport">
                                      <div class="overview">
                                          <?php /* ?><p><label class="label_infos_moveis">Produto: </label><?php echo $externo->produto; ?></p><?php */ ?>
                                          <?php /* ?><p><label class="label_infos_moveis">Descrição: </label><?php echo $externo->descricao; ?></p><?php */ ?>
                                          <?php /* ?><p><label class="label_infos_moveis">Problema: </label><?php echo $externo->problema; ?></p><?php */ ?>
                                          <?php /* ?><p><label class="label_infos_moveis">Solução: </label><?php echo $externo->solucao; ?></p><?php */ ?>
                                      </div>
                                  </div>
                          </div>
                      </li>

                    <?php } ?>

                </ul>

             </div>

             <div class="prox prox_moveis"></div>

         </div>

    </div>

    <div class="box_carrossel box_carrossel_moveis box_carrossel_externos">

             <div class="ant_vert ant_vert_moveis"></div>

             <div class="carrossel_imagens_mini carrossel_imagens_mini_extermos">

                <ul>
                    <?php foreach($externos as $ind=>$externo){ ?>
                        <li><img src="<?php echo site_url(); ?>fotos_moveis/P/<?php echo $externo->foto_pequena; ?>" width="205" /></li>
                    <?php } ?>
                </ul>

             </div>

             <div class="prox_vert prox_vert_moveis"></div>

    </div>

</div>
