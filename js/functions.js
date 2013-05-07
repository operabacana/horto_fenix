/* Plugin Opera Internationalization */
(function($){

    $.internationalization = function(lines){

        var linesFiltered;

        $.getJSON('internationalization', function(data) {linesFiltered = data;});

        return linesFiltered;

    };

})(jQuery);


/*
    CARROSSEL PLUGIN
*/

(function($){$.fn.jCarouselLite=function(o){o=$.extend({btnPrev:null,btnNext:null,btnGo:null,mouseWheel:false,auto:null,speed:200,easing:null,vertical:false,circular:true,visible:3,start:0,scroll:1,beforeStart:null,afterEnd:null},o||{});return this.each(function(){var b=false,animCss=o.vertical?"top":"left",sizeCss=o.vertical?"height":"width";var c=$(this),ul=$("ul",c),tLi=$("li",ul),tl=tLi.size(),v=o.visible;if(o.circular){ul.prepend(tLi.slice(tl-v-1+1).clone()).append(tLi.slice(0,v).clone());o.start+=v}var f=$("li",ul),itemLength=f.size(),curr=o.start;c.css("visibility","visible");f.css({overflow:"hidden",float:o.vertical?"none":"left"});ul.css({margin:"0",padding:"0",position:"relative","list-style-type":"none","z-index":"1"});c.css({overflow:"hidden",position:"relative","z-index":"2",left:"0px"});var g=o.vertical?height(f):width(f);var h=g*itemLength;var j=g*v;f.css({width:f.width(),height:f.height()});ul.css(sizeCss,h+"px").css(animCss,-(curr*g));c.css(sizeCss,j+"px");if(o.btnPrev)$(o.btnPrev).click(function(){return go(curr-o.scroll)});if(o.btnNext)$(o.btnNext).click(function(){return go(curr+o.scroll)});if(o.btnGo)$.each(o.btnGo,function(i,a){$(a).click(function(){return go(o.circular?o.visible+i:i)})});if(o.mouseWheel&&c.mousewheel)c.mousewheel(function(e,d){return d>0?go(curr-o.scroll):go(curr+o.scroll)});if(o.auto)setInterval(function(){go(curr+o.scroll)},o.auto+o.speed);function vis(){return f.slice(curr).slice(0,v)};function go(a){if(!b){if(o.beforeStart)o.beforeStart.call(this,vis());if(o.circular){if(a<=o.start-v-1){ul.css(animCss,-((itemLength-(v*2))*g)+"px");curr=a==o.start-v-1?itemLength-(v*2)-1:itemLength-(v*2)-o.scroll}else if(a>=itemLength-v+1){ul.css(animCss,-((v)*g)+"px");curr=a==itemLength-v+1?v+1:v+o.scroll}else curr=a}else{if(a<0||a>itemLength-v)return;else curr=a}b=true;ul.animate(animCss=="left"?{left:-(curr*g)}:{top:-(curr*g)},o.speed,o.easing,function(){if(o.afterEnd)o.afterEnd.call(this,vis());b=false});if(!o.circular){$(o.btnPrev+","+o.btnNext).removeClass("disabled");$((curr-o.scroll<0&&o.btnPrev)||(curr+o.scroll>itemLength-v&&o.btnNext)||[]).addClass("disabled")}}return false}})};function css(a,b){return parseInt($.css(a[0],b))||0};function width(a){return a[0].offsetWidth+css(a,'marginLeft')+css(a,'marginRight')};function height(a){return a[0].offsetHeight+css(a,'marginTop')+css(a,'marginBottom')}})(jQuery);<!--  -->

/*
	Masked Input plugin for jQuery
	Copyright (c) 2007-2011 Josh Bush (digitalbush.com)
	Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
	Version: 1.3
*/

(function(a){var b=(a.browser.msie?"paste":"input")+".mask",c=window.orientation!=undefined;a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},dataName:"rawMaskFn"},a.fn.extend({caret:function(a,b){if(this.length!=0){if(typeof a=="number"){b=typeof b=="number"?b:a;return this.each(function(){if(this.setSelectionRange)this.setSelectionRange(a,b);else if(this.createTextRange){var c=this.createTextRange();c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select()}})}if(this[0].setSelectionRange)a=this[0].selectionStart,b=this[0].selectionEnd;else if(document.selection&&document.selection.createRange){var c=document.selection.createRange();a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length}return{begin:a,end:b}}},unmask:function(){return this.trigger("unmask")},mask:function(d,e){if(!d&&this.length>0){var f=a(this[0]);return f.data(a.mask.dataName)()}e=a.extend({placeholder:"_",completed:null},e);var g=a.mask.definitions,h=[],i=d.length,j=null,k=d.length;a.each(d.split(""),function(a,b){b=="?"?(k--,i=a):g[b]?(h.push(new RegExp(g[b])),j==null&&(j=h.length-1)):h.push(null)});return this.trigger("unmask").each(function(){function v(a){var b=f.val(),c=-1;for(var d=0,g=0;d<k;d++)if(h[d]){l[d]=e.placeholder;while(g++<b.length){var m=b.charAt(g-1);if(h[d].test(m)){l[d]=m,c=d;break}}if(g>b.length)break}else l[d]==b.charAt(g)&&d!=i&&(g++,c=d);if(!a&&c+1<i)f.val(""),t(0,k);else if(a||c+1>=i)u(),a||f.val(f.val().substring(0,c+1));return i?d:j}function u(){return f.val(l.join("")).val()}function t(a,b){for(var c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.placeholder)}function s(a){var b=a.which,c=f.caret();if(a.ctrlKey||a.altKey||a.metaKey||b<32)return!0;if(b){c.end-c.begin!=0&&(t(c.begin,c.end),p(c.begin,c.end-1));var d=n(c.begin-1);if(d<k){var g=String.fromCharCode(b);if(h[d].test(g)){q(d),l[d]=g,u();var i=n(d);f.caret(i),e.completed&&i>=k&&e.completed.call(f)}}return!1}}function r(a){var b=a.which;if(b==8||b==46||c&&b==127){var d=f.caret(),e=d.begin,g=d.end;g-e==0&&(e=b!=46?o(e):g=n(e-1),g=b==46?n(g):g),t(e,g),p(e,g-1);return!1}if(b==27){f.val(m),f.caret(0,v());return!1}}function q(a){for(var b=a,c=e.placeholder;b<k;b++)if(h[b]){var d=n(b),f=l[b];l[b]=c;if(d<k&&h[d].test(f))c=f;else break}}function p(a,b){if(!(a<0)){for(var c=a,d=n(b);c<k;c++)if(h[c]){if(d<k&&h[c].test(l[d]))l[c]=l[d],l[d]=e.placeholder;else break;d=n(d)}u(),f.caret(Math.max(j,a))}}function o(a){while(--a>=0&&!h[a]);return a}function n(a){while(++a<=k&&!h[a]);return a}var f=a(this),l=a.map(d.split(""),function(a,b){if(a!="?")return g[a]?e.placeholder:a}),m=f.val();f.data(a.mask.dataName,function(){return a.map(l,function(a,b){return h[b]&&a!=e.placeholder?a:null}).join("")}),f.attr("readonly")||f.one("unmask",function(){f.unbind(".mask").removeData(a.mask.dataName)}).bind("focus.mask",function(){m=f.val();var b=v();u();var c=function(){b==d.length?f.caret(0,b):f.caret(b)};(a.browser.msie?c:function(){setTimeout(c,0)})()}).bind("blur.mask",function(){v(),f.val()!=m&&f.change()}).bind("keydown.mask",r).bind("keypress.mask",s).bind(b,function(){setTimeout(function(){f.caret(v(!0))},0)}),v()})}})})(jQuery)

$ind = 1;
$cores_botao = ["#f98a07", "#e4dc0d", "#5dd11f", "#ed3615"];

$(function(){


      /******************************* CARROSSEIS **********************************/
   $(document).find(".carrossel_projetos").jCarouselLite({

        btnNext: ".next",
        btnPrev: ".prev",
        visible: 5,
        circular: false

   });


   $(document).find(".fechar_galeria").click(function(event){

        event.preventDefault();
        $(document).find(".carrossel_galerias").remove();
        $(document).find(".box_carrossel").remove();
        $(document).find(".topo_galeria").after($cloneDiv);
        $(document).find(".box_imgs").after($cloneDivMini);
        $(document).find(".display").hide();

   });

   $(document).find(".fechar_moveis").click(function(event){

        event.preventDefault();
        $(document).find(".carrossel_galerias").remove();
        $(document).find(".box_carrossel").remove();
        $(document).find(".topo_galeria_internos").after($cloneDivInternos);
        $(document).find(".box_imgs_internos").after($cloneDivMiniInternos);
        $(document).find(".topo_galeria_externos").after($cloneDivExternos);
        $(document).find(".box_imgs_externos").after($cloneDivMiniExternos);
        $(document).find(".display, .display_internos, .display_externos").hide();

   });

   $(document).find(".carrossel_projetos img, .galeria_interna").click(function(){

       $nome = $(this).text();

       if($(this).hasClass("galeria_interna")){
        $ind = 0;
       }else{
        $ind = $(this).parent().index();
       }

       $(document).find(".display").show();

       if($nome == " Interior"){
            $(document).find(".display_internos").show();
            $cloneDivInternos = $(document).find(".carrossel_galerias_internos").clone();
            $cloneDivMiniInternos = $(document).find(".box_carrossel_internos").clone();
            $cloneDivExternos = $(document).find(".carrossel_galerias_externos").clone();
            $cloneDivMiniExternos = $(document).find(".box_carrossel_externos").clone();
       }else if($nome == " Exterior"){
            $(document).find(".display_externos").show();
            $cloneDivInternos = $(document).find(".carrossel_galerias_internos").clone();
            $cloneDivMiniInternos = $(document).find(".box_carrossel_internos").clone();
            $cloneDivExternos = $(document).find(".carrossel_galerias_externos").clone();
            $cloneDivMiniExternos = $(document).find(".box_carrossel_externos").clone();
       }else{
            $cloneDiv = $(document).find(".carrossel_galerias").clone();
            $cloneDivMini = $(document).find(".box_carrossel").clone();
       }

       $(document).find(".texto_link_galeria").text($nome);

       $(document).find(".carrossel_imagens_mini").jCarouselLite({

            btnNext: ".prox_vert",
            btnPrev: ".ant_vert",
            visible: 4,
            vertical: 1,
            circular: false

       });

       $(document).find(".carrossel_imagens").jCarouselLite({

            start: $ind,
            btnNext: ".prox",
            btnPrev: ".ant",
            visible: 1,
            circular: false

       });

       $('.ordena_infos').tinyscrollbar();

   });

   $(document).delegate(".display img", "click", function(){

       $cloneDiv = $(document).find(".carrossel_galerias").clone().end().remove();
       $(document).find(".topo_galeria").after($cloneDiv);

       $ind = $(this).parent().index();

       $(document).find(".carrossel_imagens").jCarouselLite({

            start: $ind,
            btnNext: ".prox",
            btnPrev: ".ant",
            visible: 1,
            circular: false

       });

   });

   $(document).delegate(".display_internos img", "click", function(){

       $cloneDiv = $(document).find(".carrossel_galerias_internos").clone().end().remove();
       $(document).find(".topo_galeria_internos").after($cloneDiv);

       $ind = $(this).parent().index();

       $(document).find(".carrossel_imagens").jCarouselLite({

            start: $ind,
            btnNext: ".prox",
            btnPrev: ".ant",
            visible: 1,
            circular: false

       });

   });

   $(document).delegate(".display_externos img", "click" ,function(){

       $cloneDiv = $(document).find(".carrossel_galerias_externos").clone().end().remove();
       $(document).find(".topo_galeria_externos").after($cloneDiv);

       $ind = $(this).parent().index();

       $(document).find(".carrossel_imagens").jCarouselLite({

            start: $ind,
            btnNext: ".prox",
            btnPrev: ".ant",
            visible: 1,
            circular: false

       });

   });
   /******************************* CARROSSEIS **********************************/

   /******************************* SLIDER **********************************/
   $tamanho=0;
   $slider = $(document).find(".slider");
   $arrayOffset = $slider.find("ul").children().map(function(){

       $tamanho += $(this).width();
       return $(this);

   }).get();

   $slider.find("ul").width($tamanho);

   $totalArrayOffset = $arrayOffset.length;

   $slider.append(function(){

        $texto = "<div class='painel_button'>";
        for($i=0;$i < $totalArrayOffset; $i++){
            $texto += "<div class='button'></div>";
        }
        $texto += "</div>";

        return $texto;
   });

   $slider.delegate(".button", "click", function(){

        $i = $(this).index();

        $(document).find(".button").css("background", "#fff");// Desse site, apenas.
        $(this).css("backgroundColor", $cores_botao[$i]);// Desse site, apenas.

        $slider.find("ul.interno li").hide();
        $arrayOffset[$i].show();

        $slider.find("ul").animate({

            left: -$arrayOffset[$i].position().left+"px"

        });

   });
   /******************************* SLIDER **********************************/

   var jsonLinesFormCadastreSe = $.internationalization( 'linhas' );

    $("#telefone").mask("(99) 9999-9999");
    $("#formCadastre_se").validate({

        rules:{

            "nome": {

                required: true,
                minlength: 2

            },
            "email": {

                required: true,
                email: true

            },
            "cidade": {

                required: true

            },
            "telefone": {

                required: true

            },
            "endereco": {

                required: true

            },
            "assunto":{

                required: true

            },
            "mensagem": {

                required: true

            }

        },

        messages:{

            "nome": {

                required: "",
                minlength: ""

            },
            "email": {

                required: "",
                email: ""

            },
            "cidade": {

                required: ""

            },
            "telefone": {

                required: ""

            },
            "endereco": {

                required: true

            },
            "assunto": {

                required: ""

            },
            "mensagem": {

                required: ""

            }

        }

    });

    $("#form_cadastro").validate({

        rules:{

            "nome": {

                required: true,
                minlength: 2

            },
            "email": {

                required: true,
                email: true

            }
        },

        messages:{

            "nome": {

                required: "",
                minlength: ""

            },
            "email": {

                required: "",
                email: "",

            }

        }

    });

   /********************************* LISTAS ************************************/
   $(document).delegate(".link_menu_interno", "click", function(event){

        event.preventDefault();

        $nome = $(this).text();

        $(document).find("body").css("cursor", "wait");
        $(document).load("http://localhost/horto_fenix/ajax_listas", { nome: $nome }, function(data){

                    if($nome == " Jardim"){

                            $(document).find(".nome_lista")
                                .html("<div id='icone_lista' class='sprite icones_menu_interno'></div> "+$nome)
                                .next()
                                .text("Escolha de A à Z as melhores plantas para seu jardim.");
                            $(document).find(".lista").html(data);

                    }else if($nome == " Interior"){

                            $(document).find(".nome_lista")
                                .html("<div id='icone_lista' class='sprite icones_menu_interno interior'></div> "+$nome)
                                .next()
                                .text("Escolha de A à Z as plantas que melhor se adaptam à interiores.");
                            $(document).find(".lista").html(data);

                    }else if($nome == " Reflorestamento e sementes"){

                            $(document).find(".nome_lista")
                                .html("<div id='icone_lista' class='sprite icones_menu_interno sementes'></div> "+$nome)
                                .next()
                                .text("Escolha de A à Z as melhores plantas e sementes para o plantio.");
                            $(document).find(".lista").html(data);

                    }else if($nome == " Flores"){

                            $(document).find(".nome_lista")
                                .html("<div id='icone_lista' class='sprite icones_menu_interno flores'></div> "+$nome)
                                .next()
                                .text("Escolha de A à Z as mais lindas flores.");
                            $(document).find(".lista").html(data);

                    }else if($nome == " Grama"){

                            $(document).find(".nome_lista")
                                .html("<div id='icone_lista' class='sprite icones_menu_interno grama'></div> "+$nome)
                                .next()
                                .text("Escolha de A à Z o tipo de grama perfeito para o seu jardim.");
                            $(document).find(".lista").html(data);

                    }else if($nome == " Inorgânicos"){

                            $(document).find("#order_texto").hide().next().show();
                            $(document).find(".nome_lista")
                                .html("<div id='icone_lista' class='sprite icones_menu_interno inorganico'></div> "+$nome)
                                .next()
                                .text("Escolha de A a Z os melhoras vasos e cachepo para sua escolha:");
                            $(document).find(".lista").html(data);

                    }else if($nome == " Orgânicos"){

                            $(document).find("#order_texto").hide().next().show();
                            $(document).find(".nome_lista")
                                .html("<div id='icone_lista' class='sprite icones_menu_interno organico'></div> "+$nome)
                                .next()
                                .text("Escolha de A a Z os melhores vassos para a decoração da sua casa ou jardim:");
                            $(document).find(".lista").html(data);

                    }

                    $(document).find("body").css("cursor", "default");

        });

   });

   $(document).delegate(".letra", "click", function(event){

        event.preventDefault();
        $(document).find("body").css("cursor", "wait");
        $letra = $(this).text();
        $nome = $(document).find(".nome_lista").text();

        $(document).load("http://localhost/horto_fenix/ajax_listas", { letra: $letra, nome: $nome }, function(data){

            $(document).find(".lista").html(data);
            $(document).find("body").css("cursor", "default");

        });

   });
   /********************************* LISTAS ************************************/


});
